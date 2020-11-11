@extends('guest.master')

@section('konten')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 text-center">
      <h1 class="text-danger mb-3"> MENU </h1>
    </div>
      <div class="col-md-10 offset-md-1 mb-3">
        <div class="card-deck">
          <div class="card">
            <img src="{{asset('assets/img/news/img01.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">INI NAMA MAKANAN</h5>
              <span class="text-danger">Rp. 10000</span>
            </div>
            <div class="card-footer">
                <a href="" class="btn btn-danger btn-block"><i class="fas fa-plus"></i> Keranjang</a>
            </div>
          </div>
          <div class="card">
            <img src="{{asset('assets/img/news/img01.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">INI NAMA MAKANAN</h5>
              <span class="text-danger">Rp. 10000</span>
            </div>
            <div class="card-footer">
                <a href="" class="btn btn-danger btn-block"><i class="fas fa-plus"></i> Keranjang</a>
            </div>
          </div>
          <div class="card">
            <img src="{{asset('assets/img/news/img01.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">INI NAMA MAKANAN</h5>
              <span class="text-danger">Rp. 10000</span>
            </div>
            <div class="card-footer">
                <a href="" class="btn btn-danger btn-block"><i class="fas fa-plus"></i> Keranjang</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-10 offset-md-1">
        <div class="card-deck">
          <div class="card">
            <img src="{{asset('assets/img/news/img01.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">INI NAMA MAKANAN</h5>
              <span class="text-danger">Rp. 10000</span>
            </div>
            <div class="card-footer">
                <a href="" class="btn btn-danger btn-block"><i class="fas fa-plus"></i> Keranjang</a>
            </div>
          </div>
          <div class="card">
            <img src="{{asset('assets/img/news/img01.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">INI NAMA MAKANAN</h5>
              <span class="text-danger">Rp. 10000</span>
            </div>
            <div class="card-footer">
                <a href="" class="btn btn-danger btn-block"><i class="fas fa-plus"></i> Keranjang</a>
            </div>
          </div>
          <div class="card">
            <img src="{{asset('assets/img/news/img01.jpg')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">INI NAMA MAKANAN</h5>
              <span class="text-danger">Rp. 10000</span>
            </div>
            <div class="card-footer">
                <a href="" class="btn btn-danger btn-block"><i class="fas fa-plus"></i> Keranjang</a>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>

@endsection

@push('after-scripts')
<script type="text/javascript">
  $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      autoplay:1000,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:1
          }
      }
  })
</script>
@endpush