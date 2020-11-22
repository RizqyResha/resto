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
        $data = DB::table('tbl_order')
                ->where('tbl_order.kode_order','=',$request->keyword)
                ->orderBy('tbl_order.id_order')
                ->paginate(10);
        return view('admin.transaksi.order',['data'=>$data]);
    }
}
