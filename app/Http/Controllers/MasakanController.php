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
                ->paginate(10);
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
            'status'=>'Tersedia'
        ]);
        }else{
            Masakan::create([
                'file_gambar_masakan'=>'noimage.png',
                'nama_masakan'=>$request->nama_masakan,
                'nama_kategori'=>$request->kategori_masakan,
                'deskripsi'=>$request->deskripsi_masakan,
                'harga'=>$request->harga_masakan,
                'diskon'=>$request->diskon_masakan,
                'status'=>'Tersedia'
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
            'diskon'=>$request->diskon_masakan,
        ];

        }else{
            $query = [
                'nama_masakan'=>$request->nama_masakan,
                'nama_kategori'=>$request->kategori_masakan,
                'deskripsi'=>$request->deskripsi_masakan,
                'harga'=>$request->harga_masakan,
                'diskon'=>$request->diskon_masakan,
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
        if($request->status == 'Tersedia')
        {
            $masakan->update(['status'=>'Tersedia']);
            return redirect()->route('masakan.index');
        }else{
            $masakan->update(['status'=>'Habis']);
            return redirect()->route('masakan.index');
        }
        return redirect()->route('masakan.index');
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
