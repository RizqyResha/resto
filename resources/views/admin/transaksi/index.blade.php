@extends('admin/layout.master')

@section('title','Transaksi')
@section('title2','index')

@section('konten')
<div class="container-fluid mt-3">
	<div class="row">
		<div class="col-md-12">
		<div class="card mt-3">
        	<div class="card-body">
				<div class="col-md-12">
					<h1 id="sbita" class="text-danger">RESTO</h1>
				</div>
				<div class="col-md-12 text-right">
					<span id="me">Admin</span><br>
					<span class="text-danger"><i class="fas fa-user"></i> {{ \Auth::guard('admin')->user()->nama_admin }}</span>
				</div>
				<div class="col-md-8 mt-5">
					<form action="{{route('admintransaksi.carikode')}}" method="POST">
						@csrf
                		<div class="input-group mb-3">
                  			<input name="kode_order" id="caripesanan" type="text" class="form-control" placeholder="Cari Kode Order" aria-label="Cari" aria-describedby="button-addon2" value="{{ Request()->keyword }}">
                  			<div class="input-group-append">
                    			<button id="btncaribuku" class="btn btn-outline-secondary bg-danger" type="submit" id="button-addon2"><i class="fas fa-search text-light"></i></button>
                  			</div>
                		</div>
              		</form>
				</div>
				<div class="row">
					<div class="col-md-4 ml-3">
						<div class="input-group mb-2">
				  			<div class="input-group-prepend">
				    			<span class="input-group-text" id="inputGroup-sizing-sm">Nama Pemesan</span>
				  			</div>
				  			<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly value="{{$namapemesan}}">
						</div>
					</div>
					<div class="col-md-4"></div>
					<div class="col-md-3 ml-5">
						<div class="input-group">
				  			<div class="input-group-prepend">
				    			<span class="input-group-text" id="inputGroup-sizing-sm">Nomor Meja</span>
				  			</div>
				  			<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly value="{{$nomeja}}">
						</div>
					</div>
				</div>
				<div class="col-md-12">             	
					<table class="table table-striped">
				  	<thead>
				    	<tr>
				      	<th scope="col">No</th>
				      	<th scope="col">Nama masakan</th>
				      	<th scope="col">Harga masakan</th>
				      	<th scope="col">Jumlah pesan</th>
						<th scope="col">Total</th>
				    	</tr>
				  	</thead>
				  	<tbody>
					  
					  <?php $no = 1; $val = 0; ?>
					    @foreach($data as $row)
				    	<tr>
				      	<th scope="row">{{$no++}}</th>
				      	<td>{{$row->nama_masakan}}</td>
				      	<td>Rp.{{$row->harga_masakan}}</td>
						<td>{{$row->jumlah_pesan}}</td>
				      	<td>Rp.{{$row->total_bayar}}</td>
				    	</tr>
						@endforeach
					   
				  	</tbody>
					</table>
					<hr>
					<div class="row">
					<div class="col-md-8"></div>
					<div class="col-md-4">
						<div class="input-group mb-3">
				  			<div class="input-group-prepend">
				    			<span class="input-group-text" id="inputGroup-sizing-sm">Total Bayar</span>
				  			</div>
				  			<input type="text" id="totalbayar" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly value="{{$jumlah_bayar}}">
						</div>
					</div>
					</div>
				</div>
				<div class="col-md-5 mt-4">
				<form action="{{route('admintransaksi.bayar')}}" class="bayar" method="POST">
				@csrf
					<input type="hidden" name="kode_order" value='{{$kode_order}}' class="form-control">
					<input type="hidden" name="nama_pelanggan" value='{{$namapemesan}}' class="form-control">
					<input type="hidden" name="jumlah_bayar" value='{{$jumlah_bayar}}' class="form-control">
					<div class="form-group input-group mb-3">
				  		<div class="input-group-prepend" for="bayar">
				    		<span class="input-group-text" id="inputGroup-sizing-sm">Bayar</span>
				  		</div>
				  		<input required type="number" name="bayar" id="bayar" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" onInput="kalkulasi()" value="0">
					</div>
					<div class="form-group input-group input-group-sm mb-3">
				  		<div class="input-group-prepend" for="kembalian">
				    		<span class="input-group-text" id="inputGroup-sizing-sm">Kembali</span>
				  		</div>
				  		<input type="text" name="kembalian" id="kembalian" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly value="0">
					</div>
				</div>
				</form>
				<div class="row justify-content-between">
				<div class="col-md-2 ml-3">
					<a class="btn btn-danger btn-block confirm_script text-light">Bayar</a>
				</div>
				
				<div class="col-md-2 mr-3">
					<a href="{{route('admin.transaksi')}}" class="btn btn-primary btn-block text-light float-right">Clear</a>
				</div>

				</div>

			</div>
		</div>
		</div>
	</div>		
</div>
@endsection

<script type="text/javascript">
function kalkulasi() {
	var totalpembayaran = document.getElementById("totalbayar").value;
	var bayar = document.getElementById("bayar").value;
	var kembalian = parseInt(bayar) - parseInt(totalpembayaran);

	// if (isNaN(document.getElementById("bayar").value;)){
	// 	document.getElementById("bayar").value = 0;
	// }

	if (isNaN(kembalian)){
		document.getElementById("kembalian").value = 0;
	}
	else if (kembalian < 0){
		document.getElementById("kembalian").value = 0;
	}else{
		document.getElementById("kembalian").value = kembalian;
	}	
}

</script>

@push('page-scripts')

<script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>

@endpush

@push('after-scripts')

<script>
$(".confirm_script").click(function(e) {
  // id = e.target.dataset.id;
  var totalpembayaran = parseInt(document.getElementById("totalbayar").value);
  var bayar = parseInt(document.getElementById("bayar").value);
  var kembalian = bayar - totalpembayaran;

  if (bayar < totalpembayaran || isNaN(bayar))
  {
	swal({
      title: 'Pembayaran Gagal',
      text: 'Jumlah Bayar tidak memadai',
      icon: 'warning',
      dangerMode: true,
    })
  }else{
	swal({
      title: 'Yakin Selesaikan Transaksi',
      text: 'Transaksi yang diselesaikan tidak bisa di kembalikan',
      icon: 'info',
      buttons: true,
      dangerMode: true,
    })
    .then((selesaikan) => {
      if (selesaikan) {
        $('.bayar').submit();
      } else {
      swal('Selesaikan Transaksi di batalkan');
      }
    });
  }
});
</script>
@endpush