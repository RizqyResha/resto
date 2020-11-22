@extends('admin/layout.master')

@section('title','Masakan')
@section('title2','index')

@section('konten')

<div class="section-body">
  <div class="row">
    <div class="col-md-12">
      <div class="card mt-3">
          <div class="card-body">
            <div class="col-md-12">
              <a href="{{route('masakan.create')}}" class="btn btn-icon icon-left btn-primary mb-3 px-3"><i class="fas fa-plus"></i> Tambah</a>
              <div class="float-right">
              <form action="?" method="GET">
                <div class="input-group mb-3">
                  <input name="keyword" id="caribuku" type="text" class="form-control" placeholder="Cari..." aria-label="Cari" aria-describedby="button-addon2" value="{{ Request()->keyword }}">
                  <div class="input-group-append">
                    <button id="btncaribuku" class="btn btn-outline-secondary bg-primary" type="submit" id="button-addon2"><i class="fas fa-search text-light"></i></button>
                  </div>
                </div>
              </form>
              </div>
            </div>
          
            
              @if (session('store'))
              <div class="alert alert-success alert-dismissible fade show">
                  <button type="button" class="close" data-dismiss="alert">
                      <span>&times;</span>
                  </button>
                  <strong>Success!</strong> {{ session('destroy') }}.
              </div>  
              @endif

              @if (session('update'))
              <div class="alert alert-success alert-dismissible fade show">
                  <button type="button" class="close" data-dismiss="alert">
                      <span>&times;</span>
                  </button>
              <strong>Success!</strong> {{ session('destroy') }}.
              </div>  
              @endif

              @if(session('destroy'))
              <div class="alert alert-success alert-dismissible fade show">
                  <button type="button" class="close" data-dismiss="alert">
                      <span>&times;</span>
                  </button>
                  <strong>Succes!</strong>{{ session('destroy')}}.
              </div>
              @endif
            
              <table class="table table-responsive">
                  <thead>
                      <tr class="">
                          <th scope="col" style="width:1%" class="text-center">No</th>
                          <th scope="col">Masakan</th>
                          <th class="text-center">Aksi</th>
                      </tr>
                  </thead>
                  <tbody class="mt-2">
                  <?php $no = 1 ?>
                    @foreach($data as $row)
                      <tr>
                          <th scope="row" class="text-center">{{$no++}}</th>
                          <td>
                            <img src="{{url('assets/masakans/'.$row->file_gambar_masakan)}}" width="100" class="img-thumbnail mr-3 mt-4" align="left">
                            <br>
                            <a href="#" class="font-weight-normal">
                                <b>{{$row->nama_masakan}}</b>
                            </a><br>
                            <span>  <b>Harga     :</b> {{$row->harga}}</span><br>
                            <span>  <b>Kategori  :</b> {{$row->nama_kategori}}</span><br>
                            <span>  
                            @if($row->status == 'Tersedia') <b>Status :</b> <span class="text-success">Tersedia</span>
                            @elseif($row->status == 'Habis') <b>Status :</b> <span class="text-warning">Habis</span>
                            @endif
                            </span><br>
                          </td>
                          <td>
                            <div class="d-flex justify-content-center p-0">
                            <a href="{{route('masakan.edit',['masakan'=>$row->id_masakan])}}" class="btn btn-primary mr-1"><i class="fas fa-edit"></i></a>
                            <a href="#" data-id="" class="btn btn-danger confirm_script mr-3">
                              <form action="{{ route('masakan.destroy',['masakan'=>$row->id_masakan])}}" class="delete_form" method="POST">
                                @method('DELETE')
                                @csrf
                              </form>
                              <i class="fas fa-trash"></i>
                            </a>
                              <form action="{{route('masakan.updateStatus',['masakan'=>$row->id_masakan])}}" method="post">
                                @csrf
                                <button class="btn btn-success mr-1" name='status' value="Tersedia" type="submit">Tersedia</a>
                                <button class="btn btn-warning" name='status' value="Habis" type="submit">Habis</a>
                              </form>
                            </div>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
              
          </div>
      </div>
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
        $('.delete_form').submit();
      } else {
      swal('Your imaginary file is safe!');
      }
    });
});
</script>
@endpush