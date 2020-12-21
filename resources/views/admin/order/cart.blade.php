@extends('admin/layout.master')

@section('title','Keranjang')
@section('title2','index')

@section('konten')

<div class="section-body">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <form action="">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col">Masakan</th>
                            <th scope="col" class="text-center">Nama Masakan</th>
                            <th scope="col" class="text-center">Harga</th>
                            <th scope="col" class="text-center">Jumlah Pesan</th>
                            <th scope="col" class="text-center">Diskon</th>
                            <th scope="col" class="text-center">Total</th>
                            <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td><img src="{{asset('assets/masakans/noimage.jpg')}}" width="200px" class="img-fluid img-thumbnail mt-2 mb-2" alt="Sheep"></td>
                                <td class="text-center">Tamusu Enak</td>
                                <td class="text-center">10000</td>
                                <td class="text-center">1</td>
                                <td class="text-center">10%</td>
                                <td class="text-center">9000</td>
                                <td>
                                    <a href="#" class="btn btn-success mr-1"><i class="fas fa-plus"></i></a>
                                    <a href="#" class="btn btn-danger mr-1"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-3 float-right">
                            <div class="input-group float-right">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">No Meja</span>
                                </div>
                                <input type="text" id="nomeja" name="no_meja" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-3 float-right">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Total Bayar</span>
                                </div>
                                <input type="text" id="nama_pemesan" name="nama_pemesan" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly value="">
                            </div>
                        </div>
                        <div class="col-md-3 float-right mt-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Atas Nama</span>
                                </div>
                                <input type="text" id="totalbayar" name="total_bayar" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required >
                            </div>
                        </div>
                        <!-- hidden input -->
                        <input type="hidden" hidden id="id_user" name="id_user" class="form-control" value="">
                        <input type="hidden" hidden id="level_user" name="level_user" class="form-control" value="">
                        <input type="hidden" hidden id="nama_user" name="nama_user" class="form-control" value="">
                        <div class="row mt-3 ml-1 col-md-12">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <a type="submit" class="btn col-md-5 btn-success mr-2 text-white" data-toggle="modal" data-target="">Kembali Ke Menu</a>
                                <button type="submit" class="btn col-md-5 btn-danger" data-toggle="modal" data-target="">Proses Sekarang</button>
                            </div>
                        </div> 
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection