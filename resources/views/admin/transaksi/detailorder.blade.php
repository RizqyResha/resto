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
					<div class="input-group input-group-sm mb-4">
				  		<div class="input-group-prepend">
				    		<span class="input-group-text" id="inputGroup-sizing-sm">Cari ID Pemesanan</span>
				  		</div>
				  		<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
				  		<div class="input-group-append">
				      		<button class="btn btn-danger" type="button" id="button-addon2">Cari</button>
				    	</div>
					</div>
				</div>
				<ul class="nav nav-tabs mb-3">
					<li class="nav-item">
						<a class="nav-link {{ request()->status == '' ? 'active':'' }}" href=""> Lihat Order </a>
					</li>
					<li class="nav-item">
						<a class="nav-link {{ request()->status == 'belum_bayar' ? 'active':'' }}" href="?status=belum_bayar"> Lihat Detail Order </a>
					</li>
				</ul>
				<div class="col-md-12">
					<table class="table table-striped">
				  <thead>
				    	<tr>
				      		<th scope="col">No</th>
							<th scope="col">Nomor Meja</th>
				      		<th scope="col">Nama Masakan</th>
				      		<th scope="col">Harga Masakan</th>
				      		<th scope="col">Jumlah Pesan</th>
				      		<th scope="col">Total</th>
				    	</tr>
				  	</thead>
				  	<tbody>
				    	<tr>
				      	<th scope="row">1</th>
						<td scope="col">14</td>
				      	<td>Tamusu</td>
				      	<td>Rp. 15000</td>
				      	<td>1</td>
				      	<td>Rp.15000</td>
				    	</tr>
				  	</tbody>
					</table>
					<hr>
				</div>
				<div class="col-md-11 text-right justfy-content-end">
					<span>Total : Rp 15.000</span> |
				</div>
				<div class="col-md-5">
					<div class="input-group input-group-sm mb-3">
				  		<div class="input-group-prepend">
				    		<span class="input-group-text" id="inputGroup-sizing-sm">Bayar</span>
				  		</div>
				  		<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
					</div>
					<div class="input-group input-group-sm mb-3">
				  		<div class="input-group-prepend">
				    		<span class="input-group-text" id="inputGroup-sizing-sm">Kembali</span>
				  		</div>
				  		<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled value="0">
					</div>
				</div>
				<div class="col-md-2">
					<a href="#" class="btn btn-danger btn-block">Bayar</a>
				</div>
			</div>
		</div>
		</div>
	</div>		
</div>
@endsection