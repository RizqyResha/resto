@extends('guest.master')

@section('konten')

<div class="row">
    <div class="col-md-12 ">
      <div class="owl-carousel owl-theme">
          <div class="item"><img src="{{asset('assets/img/resized1.jpg')}}" style="width:100%"></div>
          <div class="item"><img src="{{asset('assets/img/resized2.jpg')}}" style="width:100%"></div>
          <div class="item"><img src="{{asset('assets/img/resized3.jpg')}}" style="width:100%"></div>
      </div>
    </div>
</div>

<!-- Lihat Order Button -->
<div class="container-fluid">
<div class="row d-flex justify-content-end float-right mb-5 mr-5 fixed-bottom ">
<button  type="button" class="btn btn-danger btn-circle btn-lg p-0"><i class=" text-light fas fa-shopping-basket"></i></button>
</div>
</div>

<!-- End Lihat order Button -->

<div class="container-fluid">
<div class="container">
    <div class="row">
    <a href="#">
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fas fa-utensils text-light"></i>
        <span class="count-numbers text-light"><h5>Lihat Semua Makanan</h5></span>
        <a href="#" class="count-name text-light">Klik disini</a>
      </div>
    </div>
    </a>

    <a href="#">
    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fas fa-wine-glass text-light "></i>
        <span class="count-numbers text-light"><h5>Lihat Semua Minuman</h5></span>
        <a href="#" class="count-name text-light">Klik disini</a>
      </div>
    </div>
    </a>

    <a href="#">
    <div class="col-md-3">
      <div class="card-counter success">
        <i class="fas fa-ice-cream text-light"></i>
        <span class="count-numbers text-light"><h5>Lihat Semua Dessert</h5></span>
        <a href="#" class="count-name text-light">Klik disini</a>
      </div>
    </div>
    </a>

    <a href="#">
    <div class="col-md-3">
      <div class="card-counter info">
        <i class="fa fa-users text-light"></i>
        <span class="count-numbers text-light"><h5>Pesan Sebagai Member</h5></span>
        <a href="#" class="count-name text-light">Klik disini</a>
      </div>
    </div>
    </a>
  </div>
</div>

<!-- MAKANAN -->
<div class="item d-flex justify-content-center mb-2 mt-2">
<i class="text-danger fas fa-utensils fa-3x"></i>
</div>
<div class="row">
<div class="owl-carousel owl-theme">
<!-- Item MAKANAN -->
<div class="item">
<div class="item d-flex justify-content-center">
		<div class="col-md-9 p-1">
			<div class="card mb-6 shadow-sm">
				<div class="row no-gutters">
          <div class="col-md-5 mt-2 ml-2 mb-2 mr-2">
            <img src="{{asset('assets/img/news/img01.jpg')}}" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title">Nasi Goreng</h5>
              <span class="text-danger">Rp. 24000</span>
              <textarea class="col-md-12 mr-5" rows="6" readonly>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce iaculis, tellus quis venenatis varius, urna sapien porta justo, quis tempus tellus velit eget justo. Nulla feugiat gravida nisi, in auctor lorem suscipit vitae. Vestibulum id condimentum lacus, quis pharetra lacus. Proin eu arcu quis ante lobortis tincidunt in id elit. Integer ante felis, volutpat quis mi eu, elementum mollis dolor. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In feugiat orci arcu, vitae efficitur arcu interdum id.</textarea>
              <div class="row d-flex justify-content-center">
                <a href="" class="btn btn-danger btn-block col-lg-4 mt-2 mr-1 text-center"><i class="fas fa-plus"></i> Order</a>
                <a href="" class="btn btn-danger btn-block col-lg-6 mt-2 text-center"><i class="fas fa-plus"></i> Diskon 10% Order Member</a>
              </div>                        
            </div>
        </div>
			</div>
	</div> 
</div>
</div>
<!-- End Item MAKANAN -->
</div>
</div> 
<!-- End MAKANAN-->

<!-- MINUMAN -->
<div class="item d-flex justify-content-center mb-2 mt-2">
<i class="text-danger fas fa-wine-glass fa-3x"></i>
</div>
<div class="row">
<div class="owl-carousel owl-theme">
<!-- Item MINUMAN -->
<div class="item">
<div class="item d-flex justify-content-center">
		<div class="col-md-9 p-1">
			<div class="card mb-6 shadow-sm">
				<div class="row no-gutters">
          <div class="col-md-5 mt-2 ml-2 mb-2 mr-2">
            <img src="{{asset('assets/img/news/img01.jpg')}}" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title">Nasi Goreng</h5>
              <span class="text-danger">Rp. 24000</span>
              <textarea class="col-md-12 mr-5" rows="6" readonly>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce iaculis, tellus quis venenatis varius, urna sapien porta justo, quis tempus tellus velit eget justo. Nulla feugiat gravida nisi, in auctor lorem suscipit vitae. Vestibulum id condimentum lacus, quis pharetra lacus. Proin eu arcu quis ante lobortis tincidunt in id elit. Integer ante felis, volutpat quis mi eu, elementum mollis dolor. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In feugiat orci arcu, vitae efficitur arcu interdum id.</textarea>
              <div class="row d-flex justify-content-center">
                <a href="" class="btn btn-danger btn-block col-lg-4 mt-2 mr-1 text-center"><i class="fas fa-plus"></i> Order</a>
                <a href="" class="btn btn-danger btn-block col-lg-6 mt-2 text-center"><i class="fas fa-plus"></i> Diskon 10% Order Member</a>
              </div>                        
            </div>
        </div>
			</div>
	</div> 
</div>
</div>
<!-- End Item MINUMAN -->
</div>
</div> 
<!-- End MINUMAN-->

<!-- DESSERT -->
<div class="item d-flex justify-content-center mb-2 mt-2">
<i class="text-danger fas fa-ice-cream fa-3x"></i>
</div>
<!-- Item DESSERT -->
<div class="row">
<div class="owl-carousel owl-theme">
<div class="item">
<div class="item d-flex justify-content-center">
		<div class="col-md-9 p-1">
			<div class="card mb-6 shadow-sm">
				<div class="row no-gutters">
          <div class="col-md-5 mt-2 ml-2 mb-2 mr-2">
            <img src="{{asset('assets/img/news/img01.jpg')}}" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title">Nasi Goreng</h5>
              <span class="text-danger">Rp. 24000</span>
              <textarea class="col-md-12 mr-5" rows="6" readonly>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce iaculis, tellus quis venenatis varius, urna sapien porta justo, quis tempus tellus velit eget justo. Nulla feugiat gravida nisi, in auctor lorem suscipit vitae. Vestibulum id condimentum lacus, quis pharetra lacus. Proin eu arcu quis ante lobortis tincidunt in id elit. Integer ante felis, volutpat quis mi eu, elementum mollis dolor. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In feugiat orci arcu, vitae efficitur arcu interdum id.</textarea>
              <div class="row d-flex justify-content-center">
                <a href="" class="btn btn-danger btn-block col-lg-4 mt-2 mr-1 text-center"><i class="fas fa-plus"></i> Order</a>
                <a href="" class="btn btn-danger btn-block col-lg-6 mt-2 text-center"><i class="fas fa-plus"></i> Diskon 10% Order Member</a>
              </div>                        
            </div>
        </div>
			</div>
	</div> 
</div>
</div>
<!-- End Item DESSERT -->
</div>
</div> 
<!-- End DESSERT-->

</div>

<div class="d-flex justify-content-center">
  <div class="card col-md-12 mt-5">
  <div class="table-responsive">
  <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Nama Makanan</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Harga</th>
          <th scope="col">Batal</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Nasi Goreng</td>
          <td>2</td>
          <td>24000</td>
          <td>
            <button class="btn btn-sm btn-danger tombol-hapus" type="button" data-url="">
              <i class="fas fa-trash alt"></i>
            </button>
          </td>
        </tr>
        <tr>
          <td>Jus Jambu</td>
          <td>2</td>
          <td>10000</td>
          <td>
            <button class="btn btn-sm btn-danger tombol-hapus" type="button" data-url="">
              <i class="fas fa-trash alt"></i>
            </button>
          </td>
        </tr>
        <tr>
          <td>Pancake</td>
          <td>2</td>
          <td>16000</td>
          <td>
            <button class="btn btn-sm btn-danger tombol-hapus" type="button" data-url="">
              <i class="fas fa-trash alt"></i>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="card-footer">
      <div class="d-flex justify-content-center">

        <h6>Total Pembayaran = <b>Rp.50000</b></h6>
      </div>
      <div class="d-flex justify-content-center">
        <button class="btn btn-sm btn-danger tombol-hapus col-md-3 mt-2" type="button" data-url="" >
          Pesan Sekarang !
        </button>
      </div>
    </div>
    <!-- <div class="card-footer">
      
    </div> -->
  </div>
  </div>
</div>
</div>
  

@endsection

@push('after-scripts')
<script type="text/javascript">
  $('.owl-carousel').owlCarousel({
      loop:true,
      margin:0,
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