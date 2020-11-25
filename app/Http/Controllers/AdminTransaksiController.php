<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Order;
Use App\DetailOrder;

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

        $data = DetailOrder::join('tbl_order','id_order','=','tbl_order.id_order')
                            ->join('tbl_detail_order','id_order','=','tbl_detail_order.id_order')
                            ->where('tbl_detail_order.kode_order','=',$request->keyword);
        return view('admin.transaksi.index',['data'=>$data]);
            

    }

    public function CariKodeOrder(Request $request)
    {
        $data = DB::table('tbl_detail_order')->where('kode_order','=',$request->kode_order);
        $data = $data->get();
        $jumlah_bayar = DB::table('tbl_detail_order')->where('kode_order','=', $request->kode_order)->sum('total_bayar');
        $namapemesan = DB::table('tbl_order')->select('nama_pelanggan')->where('kode_order','=', $request->kode_order)->get();
        $nomeja = DB::table('tbl_detail_order')->select('no_meja')->where('kode_order','=', $request->kode_order)->get();
        return view('admin.transaksi.index',['data'=>$data,'jumlah_bayar'=>$jumlah_bayar,'nomeja'=>$nomeja,'namapemesan'=>$namapemesan])->with('dataset');
        // return dd($data);
    }
}
