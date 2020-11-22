@extends('admin/layout.master')

@section('title','Masakan')
@section('title2','tambah')

@section('konten')

<div class="card">
  <div class="card-header">
    <h4>Tambah masakan</h4>
  </div>
  <div class="card-body">
    <form action="{{route('masakan.store')}}" method="POST"  enctype="multipart/form-data">
    @csrf
    <div class="row d-flex justify-content-center">
      <div class="col-md-2 mt-4 mb-2">
        <img src="{{url('assets/masakans/noimage.png')}}" width="150" class="img-thumbnail mr-3" align="left" id="preview">
      </div>
      <div class="col-md-8">
        <label>Pilih Gambar Masakan</label>
          <div class="form-group">
            <div class="custom-file">
              <input name="file_gambar_masakan" type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control" id="inputGambar_masakan" placeholder=" masukan file gambar buku" name="gambar">
              <label class="custom-file-label" for="inputGambar_masakan">Cari Gambar</label>
            </div>
          </div>
          
          <div class="form-group">
            <label>Nama Masakan</label>
            <input type="text" name="nama_masakan" value="" class="form-control" required>  
          </div>
        </div>
          
        <div class="col-md-5">
          <div class="form-group">
            <label>Harga Masakan</label>
            <div class=""><input type="number" name="harga_masakan" class="form-control" required></div>
          </div>
        </div>

        <div class="col-md-5">
          <div class="form-group">
            <label>Diskon</label>
            <div class=""><input type="number" name="diskon_masakan" class="form-control" value="0" required></div>
          </div>
        </div>

        <div class="col-md-5">
          <div class="form-group">
            <label for="kategori-masakan">Pilih Kategori Masakan</label>
            <select name="kategori_masakan" class="form-control" id="kategori-masakan1" required>
              <option>Makanan</option>
              <option>Minuman</option>
              <option>Dessert</option>
            </select>
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <label for="kategori-masakan">Deskripsi masakan</label>
            <textarea class="form-control" name="deskripsi_masakan" id="" rows="1" required></textarea>
          </div>
        </div>
    </div>    
      <div class="card-footer text-right">
        <button class="btn btn-primary mr-1" type="submit">Submit</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary" type="reset">Cancel</a>
      </div>
    </form>
  </div>
</div>

<script>
    $('#inputGambar_masakan').on('change',function(){
    //get the file name
      var fileName = $(this).val();
      var panjangnamafile = fileName.length;
      if (panjangnamafile > 22){
        hasilpotong = fileName.substring(0, 22);
        $(this).next('.custom-file-label').html(hasilpotong);
      }else{
        $(this).next('.custom-file-label').html(fileName);
      }
  })
</script>
@endsection


@push('js')
<script type="text/javascript">
	
	function filePreview(input) {
		if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#preview').attr('src',e.target.result)
		}
		reader.readAsDataURL(input.files[0]);
	}
}

$(function(){
	$("#inputGambar_masakan").change(function () {
		filePreview(this);
	});
});

</script>
@endpush
