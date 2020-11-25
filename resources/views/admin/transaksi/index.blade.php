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
				<div class="col-md-12">
				
				<span>Nama Pemesan : {{$namapemesan}} </span>
				<span>Nomor Meja   : {{$nomeja}} </span>
             	
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
				</div>
				<div class="row">
				<div class="col-md-11 text-right justfy-content-end">
					<span>Total : Rp. {{$jumlah_bayar}} </span> |
				</div>
				
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