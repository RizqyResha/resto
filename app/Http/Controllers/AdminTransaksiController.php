<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Order;
Use App\DetailOrder;
use App\Laporan;
Use Carbon\Carbon;

class AdminTransaksiController extends Controller
{
    public function order(Request $request)
    {
        // $data = DB::table('tbl_order')
        //     ->where('tbl_order.kode_order','like',"%{$request->keyword}%")
        //     ->orderBy('tbl_order.id_order')
        //     ->paginate(10);

        // $data = DB::table('tbl_order')->get();

        // return view('admin.transaksi.order',['data'=>$data]);

        $data = DB::table('tbl_detail_order')->where('kode_order','=',$request->kode_order);
        $data = $data->get();
        $jumlah_bayar = DB::table('tbl_detail_order')->where('kode_order','=', $request->kode_order)->sum('total_bayar');
        $namapemesan = DB::table('tbl_order')->select('nama_pelanggan')->where('kode_order','=', $request->kode_order)->pluck('nama_pelanggan')->first();
        $kode_order = $request->kode_order;
        $nomeja = DB::table('tbl_detail_order')->select('no_meja')->where('kode_order','=', $request->kode_order)->pluck('no_meja')->first();
        return view('admin.transaksi.index',['data'=>$data,'jumlah_bayar'=>$jumlah_bayar,'nomeja'=>$nomeja,'namapemesan'=>$namapemesan,'kode_order'=>$kode_order])->with('dataset');
        // return dd($namapemesan);
    }

    public function CariKodeOrder(Request $request)
    {
        $data = DB::table('tbl_detail_order')->where('kode_order','=',$request->kode_order)->where('status','=','BELUM_BAYAR');
        $data = $data->get();
        $jumlah_bayar = DB::table('tbl_detail_order')->where('kode_order','=', $request->kode_order)->where('status','=','BELUM_BAYAR')->sum('total_bayar');
        $namapemesan = DB::table('tbl_order')->select('nama_pelanggan')->where('kode_order','=', $request->kode_order)->where('status','=','BELUM_BAYAR')->pluck('nama_pelanggan')->first();
        $kode_order = $request->kode_order;
        $nomeja = DB::table('tbl_detail_order')->select('no_meja')->where('kode_order','=', $request->kode_order)->where('status','=','BELUM_BAYAR')->pluck('no_meja')->first();
        return view('admin.transaksi.index',['data'=>$data,'jumlah_bayar'=>$jumlah_bayar,'nomeja'=>$nomeja,'namapemesan'=>$namapemesan,'kode_order'=>$kode_order])->with('dataset');
        // return dd($namapemesan);
    }

    public function Bayar(Request $request)
    {
        // //UPDATE STATUS
        $statusselesai = ['status'=>'SELESAI'];
        Order::where('kode_order','=',$request->kode_order)->update($statusselesai);
        DetailOrder::where('kode_order','=',$request->kode_order)->update($statusselesai);
        // //END UPDATE STATUS
        
        // //INSERT INTO LAPORAN
        $tanggal_sekarang = Carbon::today()->format('y-m-d');
        $check_data = Laporan::where('tanggal','=',$tanggal_sekarang)->count();
        $jumlah_transaksi_awal = 1;
        $jumlah_produk_terjual = DetailOrder::where('kode_order','=',$request->kode_order)->count();
        if ($check_data == 0)
        {
            Laporan::create([
                'tanggal'=>Carbon::now(),
                'jumlah_transaksi'=>$jumlah_transaksi_awal,
                'jumlah_penghasilan'=>$request->jumlah_bayar,
                'jumlah_produk_terjual'=>$jumlah_produk_terjual,
            ]);
            return redirect()->route('admin.transaksi');
        }else{
            //GATHERING DATA
            $jml_transaksi = Laporan::where('tanggal','=',$tanggal_sekarang)->first()->pluck('jumlah_transaksi');
            $jml_penghasilan = Laporan::where('tanggal','=',$tanggal_sekarang)->first()->pluck('jumlah_penghasilan');
            $jml_produk_terjual = Laporan::where('tanggal','=',$tanggal_sekarang)->first()->pluck('jumlah_produk_terjual');
            $artmtk_jml_transaksi = $jml_transaksi[0] + 1;
            $artmtk_jml_penghasilan = $jml_penghasilan[0] + $request->jumlah_bayar;
            $artmtk_jml_produk_terjual = $jml_produk_terjual[0] + $jumlah_produk_terjual;
            // return dd($jml_transaksi);
            //END GATHERING DATA

            $query = 
            [
              'jumlah_transaksi'=>$artmtk_jml_transaksi,
              'jumlah_penghasilan'=>$artmtk_jml_penghasilan,
              'jumlah_produk_terjual'=>$artmtk_jml_produk_terjual,  
            ];

            //UPDATE DATA
            Laporan::where('tanggal','=',$tanggal_sekarang)->update($query);
            return redirect()->route('admin.transaksi');
        }

        // return redirect()->route('admin.transaksi');
        // return dd($check_data);
    }
}
