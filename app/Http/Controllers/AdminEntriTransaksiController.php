<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Transaksi;

class AdminEntriTransaksiController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status;
        $sortir = $status == 'SELESAI' || $status == "BELUM_BAYAR" ? 'asc' : 'desc';
        $result = Order::where('status','like',"%{$status}%")
                        ->where('nama_pelanggan','like',"%{$request->keyword}%")
                        ->where('kode_order','like',"%{$request->keyword}%")
                        ->where('total_bayar','like',"%{$request->keyword}%")
                        ->orderBy('tanggal', $sortir)->paginate(10);
        return view('admin.entriTransaksi.index',['data'=>$result]);
    }

    public function OpenPDF($kodeorder)
    {
        $lokasi_file_struk = public_path('/assets/struk_transaksi/' . $kodeorder .'.pdf');
        return response()->file($lokasi_file_struk);
        // return dd($lokasi_file_struk);
    }
}
