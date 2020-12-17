<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Masakan;
use Image;

class MasakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = DB::table('tbl_masakan')
                ->where('tbl_masakan.nama_masakan','like',"%{$request->keyword}%")
                ->orWhere('tbl_masakan.nama_kategori','like',"%{$request->keyword}%")
                ->orWhere('tbl_masakan.harga','like',"%{$request->keyword}%")
                ->orWhere('tbl_masakan.status','like',"%{$request->keyword}%")
                ->orWhere('tbl_masakan.deskripsi','like',"%{$request->keyword}%")
                ->orderBy('tbl_masakan.id_masakan')
                ->paginate(5);
        return view('admin.masakan.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.masakan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //lokasi file foto di simpan
        $lokasi_file = public_path('/assets/masakans');

        //Validasi Status
        if($request->stok <= 0)
        {
            $status = 'Habis';
        }elseif($request->stok > 0){
            $status = 'Tersedia';
        }
        
        if(!empty($request->file_gambar_masakan))
        {
        //Resize Gambar Masakan
        $gambar_masakan = $request->file('file_gambar_masakan');
        $nama_gambar_masakan = 'gambar_masakan_'. time() . '.' . $gambar_masakan->getClientOriginalExtension();
        $resize_gambar_masakan = Image::make($gambar_masakan->getRealPath());
        $resize_gambar_masakan->resize(150, 150)->save($lokasi_file . '/' . $nama_gambar_masakan);
        //End resize Gambar Masakan
            
        
        Masakan::create([
            'file_gambar_masakan'=>$nama_gambar_masakan,
            'nama_masakan'=>$request->nama_masakan,
            'nama_kategori'=>$request->kategori_masakan,
            'deskripsi'=>$request->deskripsi_masakan,
            'harga'=>$request->harga_masakan,
            'diskon'=>$request->diskon_masakan,
            'stok'=>$request->stok,
            'status'=>$status
        ]);
        }else{
            Masakan::create([
                'file_gambar_masakan'=>'noimage.png',
                'nama_masakan'=>$request->nama_masakan,
                'nama_kategori'=>$request->kategori_masakan,
                'deskripsi'=>$request->deskripsi_masakan,
                'harga'=>$request->harga_masakan,
                'diskon'=>$request->diskon_masakan,
                'stok'=>$request->stok,
                'status'=>$status
            ]); 
        }

        return redirect()->route('masakan.index')->with('store','Berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Masakan $masakan)
    {
        return view('admin.masakan.edit',['data'=>$masakan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Masakan $masakan)
    {
        //lokasi file foto di simpan
        $lokasi_file = public_path('/assets/masakans');

        //Validasi Status
        if($request->stok <= 0)
        {
            $status = 'Habis';
        }else{
            $status = 'Tersedia';
        }

        if(!empty($request->file_gambar_masakan))
        {
        //Resize Gambar Masakan
        $gambar_masakan = $request->file('file_gambar_masakan');
        $nama_gambar_masakan = 'gambar_masakan_'. time() . '.' . $gambar_masakan->getClientOriginalExtension();
        $resize_gambar_masakan = Image::make($gambar_masakan->getRealPath());
        $resize_gambar_masakan->resize(150, 150)->save($lokasi_file . '/' . $nama_gambar_masakan);
        //End resize Gambar Masakan
        
        $query = [
            'file_gambar_masakan'=>$nama_gambar_masakan,
            'nama_masakan'=>$request->nama_masakan,
            'nama_kategori'=>$request->kategori_masakan,
            'deskripsi'=>$request->deskripsi_masakan,
            'harga'=>$request->harga_masakan,
            'stok'=>$request->stok,
            'diskon'=>$request->diskon_masakan,
            'status'=>$status
        ];

        }else{
            $query = [
                'nama_masakan'=>$request->nama_masakan,
                'nama_kategori'=>$request->kategori_masakan,
                'deskripsi'=>$request->deskripsi_masakan,
                'harga'=>$request->harga_masakan,
                'stok'=>$request->stok,
                'diskon'=>$request->diskon_masakan,
                'status'=>$status
            ]; 
        }
        $masakan->update($query);
        return redirect()->route('masakan.index')->with('store','Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Masakan $masakan)
    {
        $masakan->delete();
        return redirect()->route('masakan.index')->with('destroy','Berhasil dihapus!');
    }

    public function UpdateStatus(Request $request, Masakan $masakan)
    {
        $total_stok = Masakan::select('stok')->where('id_masakan','=',$masakan->id_masakan)->pluck('stok')->first();
        $aritmatika_tambah = $total_stok + 10;
        if ($total_stok <= 10)
        {
            $status = 'Habis';
            $aritmatika_kurang = 0;  
        }else{
            $status = 'Tersedia';
            $aritmatika_kurang = $total_stok - 10;
        }
        if($request->status == 'add')
        {
            $masakan->update([
                'status'=>'Tersedia',
                'stok'=> $aritmatika_tambah
                ]);
            return redirect()->route('masakan.index');
        }elseif($request->status == 'dec'){
            $masakan->update([
                'status'=>$status,
                'stok'=> $aritmatika_kurang
                ]);
            return redirect()->route('masakan.index');
        }elseif($request->status == 'Habis'){
            $masakan->update([
                'status'=>'Habis',
                'stok'=> 0
                ]);
            return redirect()->route('masakan.index');
        }
        return redirect()->route('masakan.index');
        // return dd($total_stok);
    }

    // public function statusTersedia(Request $request)
    // {
    //     $id_masakan=$request->id_masakan;
    //     $model = new YourModel();
    //     //assumed your column is "approved" and approved status is "0"
    //     $updated = $model->find($id_masakan)->update(['status'=>'Tersedia']);
    //     return redirect()->route('masakan.index');
    // }
    
    // public function statusHabis(Masakan $masakan)
    // {
    //     $query = ['status'=>'Habis'];
    //     $masakan->update($query);
    //     return redirect()->route('masakan.index');
    // }
}
