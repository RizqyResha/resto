@extends('guest.master')

@section('konten')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 offset-md-3 mt-5 text-center">
			<span class="text-danger ">Scan code qr dibawah ini untuk memesan sebagai member</span>
			<img src="{{asset('assets/img/qr.png')}}" style="width: 100%;">
		</div>
	</div>			
</div>
<br>
<br>
<br>
<br>
<br>
@endsection