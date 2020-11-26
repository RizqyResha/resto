<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center">
    <div class="row col-md-6 ml-5 mt-5">
        <div class="d-flex justify-content-center">
        <table class="table table-bordered">
            <tbody>
                <!-- Nama -->
                <tr>
                <th colspan="1">Nama Pelanggan</td>
                <td colspan="5">{{$nama_pelanggan}}</td>
                </tr>
                <!-- Kode Pemesanan -->
                <tr>
                <th colspan="1">Kode Pemesanan</td>
                <td colspan="5">{{$kode_order}}</td>
                </tr>
                <!-- Tanggal -->
                <tr>
                    <th colspan="1">Tanggal Pemesanan</td>
                    <td colspan="5">{{$tanggal}}</td>
                </tr>
                <!-- Title -->
                <tr>
                    <th colspan="6" class="text-center">Pesanan</th>
                </tr>
                <!-- TH -->
                <tr class="text-center">
                    <th scope="row">No</th>
                    <th colspan="2">Nama Masakan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
                <!-- TB -->
                <?php $no = 1 ?>
                @foreach($data as $row)
                <tr class="text-center">
                    <td scope="row">{{$no++}}</td>
                    <td colspan="2">{{$row->nama_masakan}}</td>
                    <td>{{$row->harga_masakan}}</td>
                    <td>{{$row->jumlah_pesan}}</td>
                    <td>{{$row->total_bayar}}</td>
                </tr>
                @endforeach
                <!-- total -->
                <tr class="text-center">
                    <th colspan="5" class="text-center">Total Pembayaran</th>
                    <th>{{$total_bayar}}</th>
                </tr>
                <tr class="text-center">
                    <th colspan="5" class="text-center">Bayar</th>
                    <th>{{$jumlah_bayar}}</th>
                </tr>
                <tr class="text-center">
                    <th colspan="5" class="text-center">Kembalian</th>
                    <th>{{$kembalian}}</th>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
    </div>
    
</div>
</body>
</html>