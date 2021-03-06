@extends('guest.master')

@section('konten')

<div class="section-body">
  <div class="row">
    <div class="col-md-10 offset-md-1">    
      <div class="card mt-3">
          <div class="card-body">
            <a href="/menu" class="btn btn-icon icon-left btn-danger mb-3 px-3"><i class="fas fa-plus"></i> Tambah</a>
            @if(session('message'))
            <div class="alert alert-success alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                  <span>×</span>
                </button>
                {{ session('message') }}
              </div>
            </div>
            @endif
              <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">No</th>
                          <th scope="col">Masakan</th>
                          <th></th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody class="mt-2">
                      <tr>
                          <th scope="row">1</th>
                          <td>
                            <img src="{{asset('assets/img/news/img01.jpg')}}" width="100" class="img-thumbnail mr-3 mt-2" align="left">
                            
                            <a href="#" class="font-weight-normal">
                                <b>Ramen</b>
                            </a><br>
                            <span>  <b>Harga  :</b> Rp 10.000</span><br>
                            <span>  <b>Kategori  :</b> Makanan</span><br>
                            <span>  <b>Status :</b> Tersedia</span><br>
                          </td>
                          <td></td>
                          <td>
                            <div class="input-group mb-3 row">
                              <input type="number" class="form-control col-md-2" aria-label="Username" value="1" aria-describedby="basic-addon1">
                              <a href="#" data-id="" class="btn btn-danger confirm_script col-md-1 ml-2">
                                <form action="" id="delete" method="POST">  
                                </form>
                                <i class="fas fa-trash"></i></a>
                            </div>
                          </td>
                      </tr>             
                  </tbody>
              </table>
          </div>
      </div>
    </div>
    <div class="col-md-2 offset-md-1">
      <div class="input-group mb-3 mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon3">No meja</span>
        </div>
        <input type="number" class="form-control" id="basic-url" aria-describedby="basic-addon3">
      </div>
    </div>
    <div class="col-md-10 offset-md-1">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">Keterangan</span>
        </div>
        <textarea class="form-control" aria-label="With textarea"></textarea>
      </div>
    </div>
    <div class="col-md-10 offset-md-1">
      <a href="" class="btn btn-danger px-5 mt-3 float-right">Pesan</a>
    </div>
  </div>    
</div>

@endsection

@push('page-scripts')

<script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>

@endpush

@push('after-scripts')

<script>
$(".confirm_script").click(function(e) {
  // id = e.target.dataset.id;
  swal({
      title: 'Yakin hapus data?',
      text: 'Data yang dihapus tidak bisa dibalikin',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
      // $('#delete').submit();
      } else {
      swal('Your imaginary file is safe!');
      }
    });
});
</script>
@endpush