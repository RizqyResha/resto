<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masakan;

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
