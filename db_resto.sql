-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2020 pada 00.37
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_resto`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(191) NOT NULL,
  `email` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_admin`, `username`, `password`, `email`, `created_at`, `updated_at`, `remember_token`) VALUES
(9, 'Rizqy Resha Prameswara', 'Admin', '$2y$10$Vx.e2PsFhOQ6CWkyCM7o5OtFR1.r8qX6fGcOuYtGCYDb0yh//7mE2', 'Rizqyresha22@gmail.com', '2020-11-21 04:42:55', '2020-11-21 04:42:55', NULL),
(13, 'Candra Saputra', 'admin2', '$2y$10$vig.MHtLZ1MLWCtyql3.X.tv8S9pR20szTUz53XMWz2KAjMoZKgMa', 'admin2@gmail.com', '2020-11-21 05:36:13', '2020-11-21 05:36:13', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_order`
--

CREATE TABLE `tbl_detail_order` (
  `id_detail_order` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `kode_order` varchar(100) NOT NULL,
  `id_masakan` int(11) NOT NULL,
  `nama_masakan` varchar(100) NOT NULL,
  `harga_masakan` int(11) NOT NULL,
  `diskon` int(12) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `jumlah_pesan` int(11) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_detail_order`
--

INSERT INTO `tbl_detail_order` (`id_detail_order`, `id_order`, `kode_order`, `id_masakan`, `nama_masakan`, `harga_masakan`, `diskon`, `total_bayar`, `jumlah_pesan`, `no_meja`, `status`) VALUES
(1, 1, 'ORD11232020001', 6, 'Tamusu', 15000, 5, 14250, 1, 5, 'BELUM_BAYAR'),
(2, 1, 'ORD11232020001', 3, 'Jus Jambu', 5000, 0, 10000, 2, 5, 'BELUM_BAYAR'),
(3, 2, 'ORD12082020001', 6, 'Tamusu', 15000, 0, 15000, 1, 6, 'SELESAI'),
(4, 2, 'ORD12082020001', 4, 'Ice Cream Coklat', 12000, 0, 12000, 1, 6, 'SELESAI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kasir`
--

CREATE TABLE `tbl_kasir` (
  `id_kasir` int(11) NOT NULL,
  `file_foto_kasir` text NOT NULL,
  `nama_kasir` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remember_token` text DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kasir`
--

INSERT INTO `tbl_kasir` (`id_kasir`, `file_foto_kasir`, `nama_kasir`, `jenis_kelamin`, `alamat`, `no_hp`, `email`, `username`, `password`, `created_at`, `updated_at`, `remember_token`, `status`) VALUES
(1, 'Paimon1607400822.jpg', 'Paimon', 'Perempuan', 'JL.Raya Teyvat', '081283772839', 'paimon@com.com', 'mahoyo', '$2y$10$WaHFeBUwh.IstDWXY7wVLePR3ibDHlRJXbwowiP8BPLxmr7OWZUFi', '2020-12-07 21:13:42', '2020-12-07 21:13:50', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_laporan`
--

CREATE TABLE `tbl_laporan` (
  `id_laporan` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah_transaksi` int(11) DEFAULT NULL,
  `jumlah_penghasilan` int(11) DEFAULT NULL,
  `jumlah_suplier_masuk` int(11) DEFAULT NULL,
  `jumlah_produk_terjual` int(11) DEFAULT NULL,
  `jumlah_uang_keluar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_laporan`
--

INSERT INTO `tbl_laporan` (`id_laporan`, `tanggal`, `jumlah_transaksi`, `jumlah_penghasilan`, `jumlah_suplier_masuk`, `jumlah_produk_terjual`, `jumlah_uang_keluar`) VALUES
(15, '2020-11-26', 15, 670000, NULL, 42, NULL),
(16, '2020-12-08', 37, 2659543, NULL, 91, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_masakan`
--

CREATE TABLE `tbl_masakan` (
  `id_masakan` int(11) NOT NULL,
  `file_gambar_masakan` text NOT NULL,
  `nama_masakan` varchar(100) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_masakan`
--

INSERT INTO `tbl_masakan` (`id_masakan`, `file_gambar_masakan`, `nama_masakan`, `nama_kategori`, `deskripsi`, `harga`, `diskon`, `stok`, `status`) VALUES
(3, 'gambar_masakan_1605703824.jpg', 'Jus Jambu', 'Minuman', 'Jus jambu dengan jambu pilihan dari pohon mang ade langsung', 5000, 0, 50, 'Tersedia'),
(4, 'gambar_masakan_1605704160.jpg', 'Ice Cream Coklat', 'Dessert', 'Ice Cream coklat dengan campuran cacao asli import dari brazilia dengan texture yang sangat lembut dan creamy', 12000, 5, 100, 'Tersedia'),
(6, 'gambar_masakan_1606013220.jpg', 'Tamusu', 'Makanan', 'Tamusu Terbuat dari usus Sapi Asli', 15000, 2, 100, 'Tersedia'),
(7, 'gambar_masakan_1607599333.jpg', 'Hiu Goreng', 'Makanan', 'Hiu Gorenks Garinks', 50000, 50, 100, 'Tersedia'),
(8, 'gambar_masakan_1607599369.jpg', 'Migoreng Rumah', 'Makanan', 'Indomie goreng cmn pakek tomat dan timun doang', 5000, 0, 100, 'Tersedia'),
(9, 'gambar_masakan_1607599406.jpg', 'Nasigoreng Yunani', 'Makanan', 'Nasi Goreng yunani Top Markotop serasa makan sejarah', 18000, 0, 1000, 'Tersedia'),
(10, 'gambar_masakan_1607599886.jpg', 'Eskrim Magnum', 'Dessert', 'Eskrim Magnum Dingin Enak', 12000, 0, 100, 'Tersedia'),
(11, 'gambar_masakan_1607599926.jpg', 'Italian Pizza', 'Makanan', 'Pizza Di masak Di Italia', 64000, 0, 100, 'Tersedia'),
(12, 'gambar_masakan_1607599987.jpg', 'Pepsi', 'Minuman', 'Pepsi Asli Berwarna Biru segar Bersoda', 8000, 0, 100, 'Tersedia'),
(13, 'gambar_masakan_1607600027.jpg', 'Paimon', 'Makanan', 'Makanan Khas dari Teyvat Mantap serbaguna', 60000, 70, 0, 'Habis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_meja`
--

CREATE TABLE `tbl_meja` (
  `id_meja` int(11) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_meja`
--

INSERT INTO `tbl_meja` (`id_meja`, `no_meja`, `keterangan`) VALUES
(4, 5, 'Lorem ipsum dolor sit amet,'),
(9, 6, 'sfgsaf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(11) NOT NULL,
  `kode_order` varchar(100) NOT NULL,
  `id_meja` int(11) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `kode_order`, `id_meja`, `no_meja`, `id_pelanggan`, `nama_pelanggan`, `tanggal`, `total_bayar`, `keterangan`, `status`) VALUES
(1, 'ORD11232020001', 4, 5, 1, 'Rizqy Resha P', '2020-11-23', 19250, 'No Description ', 'BELUM_BAYAR'),
(2, 'ORD12082020001', 9, 6, 3, 'Resha P Rizqy', '2020-12-08', 27000, 'no desc', 'SELESAI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_owner`
--

CREATE TABLE `tbl_owner` (
  `id_owner` int(11) NOT NULL,
  `nama_owner` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(191) NOT NULL,
  `email` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_owner`
--

INSERT INTO `tbl_owner` (`id_owner`, `nama_owner`, `username`, `password`, `email`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'RizqyR', 'rizqy', '$2y$10$uGo/dcQBxNJYa2eTAEF9hOtTv2z9TETkdMWrXCDzyMcxOuN1ExCG6', 'rizqy@gmail.com', '2020-12-07 21:45:22', '2020-12-07 21:45:30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(191) NOT NULL,
  `QRpassword` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `username`, `password`, `QRpassword`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Rizqy Resha P', 'rizqyresha22@gmail.com', 'pelanggan1', '$2y$10$TuMl87Eru3CLglbfTSeaH.7peCk93iyCkno2128lreC.pUTU6U6nO', NULL, '2020-11-22 19:10:50', '2020-11-22 19:25:18', NULL),
(3, 'Resha P Rizqy', 'pelanggan2@gmail.com', 'pelanggan2', '$2y$10$GDVJ5fh5FdW5F6DEOijVc.UfzMTyAGEw7isGisUv6KFzSZ6.mPwVi', NULL, '2020-12-08 01:40:18', '2020-12-08 01:40:18', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengaturan`
--

CREATE TABLE `tbl_pengaturan` (
  `id_pengaturan` int(11) NOT NULL,
  `logo_restoran` text NOT NULL,
  `nama_restoran` text NOT NULL,
  `banner_1` text NOT NULL,
  `banner_2` text NOT NULL,
  `banner_3` text NOT NULL,
  `small_banner1` text NOT NULL,
  `small_banner2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_suplier`
--

CREATE TABLE `tbl_suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama_suplier` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `kode_order` varchar(100) NOT NULL,
  `file_struk_transaksi` text DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `total_bayar` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `jumlah_masakan_dipesan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `level_petugas` varchar(10) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_order`, `kode_order`, `file_struk_transaksi`, `id_pelanggan`, `nama_pelanggan`, `total_bayar`, `jumlah_bayar`, `kembalian`, `jumlah_masakan_dipesan`, `tanggal`, `level_petugas`, `id_petugas`) VALUES
(1, 2, 'ORD12082020001', NULL, 3, 'Resha P Rizqy', 27000, 30000, 3000, 2, '2020-12-08', 'ADMIN', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_waiter`
--

CREATE TABLE `tbl_waiter` (
  `id_waiter` int(11) NOT NULL,
  `file_foto_waiter` text NOT NULL,
  `nama_waiter` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `remember_token` varchar(100) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_waiter`
--

INSERT INTO `tbl_waiter` (`id_waiter`, `file_foto_waiter`, `nama_waiter`, `jenis_kelamin`, `alamat`, `no_hp`, `email`, `username`, `password`, `created_at`, `updated_at`, `remember_token`, `status`) VALUES
(2, 'RizqyReshaP1607357158.jpg', 'Rizqy Resha P', 'Laki-Laki', 'jl.rayaklpc', '081224224678', 'cakrawalagaming0405@gmail.com', 'minerf', '$2y$10$.iGQ7uRJ7MUnX57bV5rSMOJQJEzz1QJU.EX.2k0XzgvuKyq/Ftc8S', '2020-12-07 09:05:58', '2020-12-07 18:37:17', NULL, 'Non-Aktif'),
(3, 'GuzAzmiModeDewa1607388856.jpg', 'Guz Azmi Mode Dewa', 'Laki-Laki', 'Jl. Vrindafan rumah krisna rt 01 rw 02', '081382615596', 'zachary56@example.net', 'azmimyazmi', '$2y$10$zhbmoKo1aW4DSZ0zLvJvweEncDtr7GuM39ViPWS234vLFyVlAjcr2', '2020-12-07 17:54:17', '2020-12-07 20:31:24', NULL, 'Non-Aktif'),
(4, 'ReeChan1607392838.jpg', 'ReeChan', 'Perempuan', 'JL. Kwosawoski Rt20 rw100', '081927637212', 'ree@hotmail.com', 'reechanuwu', '$2y$10$uOKKH3hSDeYJX7YWRW4CwefTQLxrInWwngJ0M7H.Q5W8nGTiuIRJ.', '2020-12-07 19:00:38', '2020-12-11 07:39:02', NULL, 'Aktif'),
(5, 'Minerf1607393251.jpg', 'Minerf', 'Laki-Laki', 'JL.Raya Unknown RT20 RW20', '081382615596', 'rizqyresha22@gmail.com', 'minerfamz2', '$2y$10$XKl50zU2Zg4W0r2JXt.5AOmc5lemPCKWnI3o5N3muNRM2yfZZRfFK', '2020-12-07 19:07:31', '2020-12-07 19:09:52', NULL, 'Aktif'),
(6, 'WideBlackZetsu1607393447.jpg', 'Wide Black Zetsu', 'Laki-Laki', 'JLJLKJLSJ', '12341212', 'cakrawalagaming0405@gmail.com', 'minerfamz1', '$2y$10$NwhgqyfkAevrB7VPuOyRsuJ2C.rEMcnq.yDs/0RB758PLRW85PuKm', '2020-12-07 19:10:47', '2020-12-07 20:31:30', NULL, 'Non-Aktif'),
(7, 'SadDoge1607393911.jpg', 'Sad Doge', 'Laki-Laki', 'Saddoge', '082983928293', 'caschsal@gamlo.com', 'minerfa', '$2y$10$izoguoeTQ9.xa2Yk6bCAQe.tR3FDRfmoiifs3iItA.7TlPSQSSmaC', '2020-12-07 19:18:31', '2020-12-07 19:21:18', NULL, 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD PRIMARY KEY (`id_detail_order`);

--
-- Indeks untuk tabel `tbl_kasir`
--
ALTER TABLE `tbl_kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indeks untuk tabel `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `tbl_masakan`
--
ALTER TABLE `tbl_masakan`
  ADD PRIMARY KEY (`id_masakan`) USING BTREE;

--
-- Indeks untuk tabel `tbl_meja`
--
ALTER TABLE `tbl_meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`) USING BTREE;

--
-- Indeks untuk tabel `tbl_owner`
--
ALTER TABLE `tbl_owner`
  ADD PRIMARY KEY (`id_owner`);

--
-- Indeks untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `tbl_pengaturan`
--
ALTER TABLE `tbl_pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indeks untuk tabel `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tbl_waiter`
--
ALTER TABLE `tbl_waiter`
  ADD PRIMARY KEY (`id_waiter`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  MODIFY `id_detail_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_kasir`
--
ALTER TABLE `tbl_kasir`
  MODIFY `id_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_masakan`
--
ALTER TABLE `tbl_masakan`
  MODIFY `id_masakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_meja`
--
ALTER TABLE `tbl_meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_owner`
--
ALTER TABLE `tbl_owner`
  MODIFY `id_owner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengaturan`
--
ALTER TABLE `tbl_pengaturan`
  MODIFY `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_waiter`
--
ALTER TABLE `tbl_waiter`
  MODIFY `id_waiter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
