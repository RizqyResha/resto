<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masakan;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
Use Carbon\Carbon;
use App\Order;
use App\DetailOrder;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $condition = 1;
        $kategori = 'Semua';
        $result = Masakan::where('nama_masakan','like',"%{$request->keyword}%")
                        ->orWhere('deskripsi','like',"%{$request->keyword}%")
                        ->orWhere('harga','like',"%{$request->keyword}%")
                        ->paginate(4);
        return view('admin.order.index',['data'=>$result,'condition'=>$condition,'kat'=>$kategori]);
    }

    public function Order(Request $request)
    {
        
        $thisDate = Carbon::today()->format('y-m-d');
        $kode_order = DB::table('tbl_order')
                        ->select('kode_order')
                        ->where('id_petugas','=',$request->id_petugas)
                        ->where('tanggal','=',$thisDate)
                        ->where('status','=','PROSSES')
                        ->pluck('kode_order')
                        ->first();
        $armtk_totalbayar = $request->total_bayar * $request->jumlah_pesan;
        if(empty($kode_order))
        {
            $jumlah_order = Order::select('kode_order')->where('tanggal','=',$thisDate)->count();
            $kode_order_new = 'ORD' . Carbon::today()->format('mdy') . ($jumlah_order + 1);
            Order::create([
                'kode_order'=> $kode_order_new,
                'tanggal'=>$thisDate,
                'keterangan'=>'nodesc',
                'status'=>'PROSSES',
                'id_petugas'=>$request->id_petugas,
                'level_petugas'=>$request->level_petugas
            ]);
            $id_order = DB::table('tbl_order')
                        ->select('id_order')
                        ->where('kode_order','=',$kode_order_new)
                        ->pluck('id_order')
                        ->first();

            DetailOrder::create([
                'id_order'=>$id_order,
                'kode_order'=>$kode_order_new,
                'id_masakan'=>$request->id_masakan,
                'nama_masakan'=>$request->nama_masakan,
                'harga_masakan'=>$request->harga_masakan,
                'diskon'=>$request->diskon,
                'total_bayar'=>$armtk_totalbayar,
                'jumlah_pesan'=>$request->jumlah_pesan,
                'status'=>'PROSSES'
            ]);
            return dd($kode_order_new);
        }else{
            $id_order = DB::table('tbl_order')
                        ->select('id_order')
                        ->where('kode_order','=',$kode_order)
                        ->pluck('id_order')
                        ->first();
            $check_detail_order = DetailOrder::select('id_detail_order')
                                    ->where('kode_order','=',$kode_order)
                                    ->where('id_masakan','=',$request->id_masakan)
                                    ->pluck('id_detail_order')
                                    ->first();
            if(empty($check_detail_order))
            {
                DetailOrder::create([
                    'id_order'=>$id_order,
                    'kode_order'=>$kode_order,
                    'id_masakan'=>$request->id_masakan,
                    'nama_masakan'=>$request->nama_masakan,
                    'harga_masakan'=>$request->harga_masakan,
                    'diskon'=>$request->diskon,
                    'total_bayar'=>$armtk_totalbayar,
                    'jumlah_pesan'=>$request->jumlah_pesan,
                    'status'=>'PROSSES'
                ]);
                return dd('kosong');
            }else{
                $get_totalbyr = DetailOrder::select('total_bayar')
                                            ->where('id_masakan','=',$request->id_masakan)
                                            ->where('kode_order','=',$kode_order)
                                            ->pluck('total_bayar')
                                            ->first();
                $get_jmlpesan = DetailOrder::select('jumlah_pesan')
                                            ->where('id_masakan','=',$request->id_masakan)
                                            ->where('kode_order','=',$kode_order)
                                            ->pluck('jumlah_pesan')
                                            ->first();
                $armtk_totalbyr_thp1 = $request->total_bayar * $request->jumlah_pesan;
                $armtk_totalbyr = $get_totalbyr + $armtk_totalbyr_thp1;
                $armtk_jmlpesan = $get_jmlpesan + $request->jumlah_pesan;
                DetailOrder::where('id_masakan','=',$request->id_masakan)
                            ->where('kode_order','=',$kode_order)
                            ->update([
                                'total_bayar' => $armtk_totalbyr,
                                'jumlah_pesan' => $armtk_jmlpesan
                             ]);
                return dd($check_detail_order);
            }
        }
    }

    Public function Kategori(Request $request, $kategori)
    {
        if ($kategori == 'Semua')
        {
            $condition = 1;
            $result = Masakan::where('nama_masakan','like',"%{$request->keyword}%")
                            ->orWhere('deskripsi','like',"%{$request->keyword}%")
                            ->orWhere('harga','like',"%{$request->keyword}%")
                            ->paginate(4);
            return view('admin.order.index',['data'=>$result,'condition'=>$condition,'kat'=>$kategori]);
        }elseif($kategori == 'Makanan'){
            $condition = 0;
            $result = Masakan::where('nama_masakan','like',"%{$request->keyword}%")
                            ->where('nama_kategori','=','Makanan')
                            ->paginate(4);
            return view('admin.order.index',['data'=>$result,'condition'=>$condition,'kat'=>$kategori]);
        }elseif($kategori == 'Minuman'){
            $condition = 0;
            $result = Masakan::where('nama_masakan','like',"%{$request->keyword}%")
                            ->where('nama_kategori','=','Minuman')
                            ->paginate(4);
            return view('admin.order.index',['data'=>$result,'condition'=>$condition,'kat'=>$kategori]);
        }elseif($kategori == 'Dessert'){
            $condition = 0;
            $result = Masakan::where('nama_masakan','like',"%{$request->keyword}%")
                            ->where('nama_kategori','=','Dessert')
                            ->paginate(4);
            return view('admin.order.index',['data'=>$result,'condition'=>$condition,'kat'=>$kategori]);
        }
    }
}
