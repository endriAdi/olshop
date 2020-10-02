-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Agu 2020 pada 09.21
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `foto`) VALUES
(1, 'admin', 'admin', 'skawan', '1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_produk`
--

CREATE TABLE `foto_produk` (
  `id_foto_produk` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_foto_produk` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `foto_produk`
--

INSERT INTO `foto_produk` (`id_foto_produk`, `id_produk`, `nama_foto_produk`) VALUES
(1, 32, 'sdfgdsgd.jpg'),
(3, 32, 'Bali.jpg'),
(4, 33, '9c133eececbad4143af412594d696218.jpg'),
(5, 33, '1.jpg'),
(6, 33, 'ac2fde73b6cb31d370c47f1d3c22666c.jpg'),
(7, 33, 'd09bf711484f923f1688dbabb7b46128.jpg'),
(8, 34, '0_8535e100-d604-44b9-af58-514f4371e4b5_512_512.jpg'),
(9, 0, 'Desert.jpg'),
(10, 35, 't-shirt sh 1.jpg'),
(11, 35, 't-shirt sh 2.jpg'),
(12, 35, 't-shirt sh 3.jpg'),
(13, 36, 't-shirt sh 1a.jpg'),
(14, 36, 't-shirt sh 2a.jpg'),
(15, 36, 't-shirt sh 3a.jpg'),
(16, 37, 't-shirt sh 1b.jpg'),
(17, 37, 't-shirt sh 2b.jpg'),
(18, 37, 't-shirt sh 3b.jpg'),
(19, 38, '2a.jpg'),
(20, 38, '2b.jpg'),
(21, 38, '2c.jpg'),
(22, 39, '3a.jpg'),
(23, 39, '3b.jpg'),
(24, 39, '3c.jpg'),
(25, 40, '4a.jpg'),
(26, 40, '4b.jpg'),
(27, 40, '4c.jpg'),
(28, 41, '5a.jpg'),
(29, 41, '5b.jpg'),
(30, 41, '5c.jpg'),
(31, 42, '1a.png'),
(32, 42, '1b.jpg'),
(33, 42, '1c.jpg'),
(34, 43, '2a.jpg'),
(35, 43, '2b.jpg'),
(36, 43, '2c.jpg'),
(37, 44, '2aa.jpg'),
(38, 44, '2bb.jpg'),
(39, 44, '2cc.jpg'),
(40, 45, '3aa.jpg'),
(41, 45, '3bb.jpg'),
(42, 45, '3cc.jpg'),
(43, 46, '4bb.jpg'),
(44, 46, '4bb.jpg'),
(45, 46, '4cc.jpg'),
(46, 47, '5aa.jpg'),
(47, 47, '5bb.jpg'),
(48, 47, '5cc.jpg'),
(49, 48, '6aa.jpg'),
(50, 48, '6bb.jpg'),
(51, 48, '6cc.jpg'),
(52, 49, '1.jpg'),
(53, 49, 'asdad.jpg'),
(54, 49, 'asdams.jpg'),
(55, 50, '2.jpg'),
(56, 50, 'asdkasjd.jpg'),
(57, 50, 'asffaf.jpg'),
(58, 51, '3.jpg'),
(59, 51, 'dasd.jpg'),
(60, 51, 'fdmsfkjwmf.jpg'),
(61, 52, 'dfgdgdsf.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 't-shirt'),
(2, 'long shirt'),
(3, 'Hodie'),
(4, 'Kolor'),
(5, 'kaos polos'),
(6, 'custom');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(25) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(25) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `foto_pelanggan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`, `foto_pelanggan`) VALUES
(1, 'skawan@gmail.com', 'skawan', 'skawan', '085156554053', '', '2.png'),
(2, 'endry@gmail.com', '1', 'endri', '2342342', 'dfdsfsf', '2.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(2, 36, 'endri', 'bni', 328000, '2020-04-09', '20200409050058halal.jpg'),
(3, 37, 'endri', 'bri', 298000, '2020-04-09', '20200409050147tug.jpg'),
(4, 33, 'eaede', '213233', 625000, '2020-06-29', '202006290618501080PX jual.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(50) NOT NULL,
  `total_berat` int(11) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `distrik` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `kodepos` varchar(255) NOT NULL,
  `ekspedisi` varchar(255) NOT NULL,
  `paket` varchar(255) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `estimasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`, `total_berat`, `provinsi`, `distrik`, `tipe`, `kodepos`, `ekspedisi`, `paket`, `ongkir`, `estimasi`) VALUES
(33, 1, '2020-04-08', 625000, 'asdsafsaf', 'dikirim', '213124', 0, '', '', '', '', '', '', 0, ''),
(34, 1, '2020-04-08', 425000, '', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(35, 1, '2020-04-08', 150000, '', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(36, 2, '2020-04-08', 328000, 'asasasasa', 'lunas', '213124', 0, '', '', '', '', '', '', 0, ''),
(37, 2, '2020-04-08', 298000, 'asdadda', 'lunas', '122412', 0, '', '', '', '', '', '', 0, ''),
(38, 2, '2020-04-08', 491000, 'asasasas', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(39, 2, '2020-04-08', 118000, 'aasd', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(40, 2, '2020-04-09', 477000, 'palur', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(41, 2, '2020-04-09', 558000, 'dqwdqw', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(42, 2, '2020-04-09', 808000, 'assasasa', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(43, 2, '2020-04-18', 295000, 'ewwefwe', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(44, 4, '2020-04-19', 258000, 'dwwdwdw', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(45, 4, '2020-04-19', 665000, 'qaa', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(46, 2, '2020-05-11', 120000, 'adadssa', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(47, 1, '2020-06-23', 340000, 'wqfedvs', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(48, 1, '2020-06-29', 1150000, 'csada', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(49, 1, '2020-06-29', 70000, 'bnm,.,', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(50, 1, '2020-06-29', 140000, 'zzxc', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(51, 1, '2020-06-29', 70000, '', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(52, 1, '2020-07-06', 140000, 'jhj', 'pending', '', 0, '', '', '', '', '', '', 0, ''),
(53, 2, '2020-07-23', 110000, 'andong', 'pending', '', 1200, 'Jawa Tengah', 'Boyolali', 'Kabupaten', '57312', 'pos', 'Paket Kilat Khusus', 10000, '1-2 HARI'),
(54, 1, '2020-08-21', 2620000, 'Palur', 'pending', '', 4900, 'Jawa Tengah', 'Karanganyar', 'Kabupaten', '57718', 'tiki', 'REG', 65000, '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `id_kategori`, `id_ukuran`, `jumlah`, `nama`, `harga`, `subharga`) VALUES
(1, 1, 1, 0, 0, 1, '', 0, 0),
(2, 0, 3, 0, 0, 1, '', 0, 0),
(3, 0, 5, 0, 0, 1, '', 0, 0),
(4, 0, 3, 0, 0, 1, '', 0, 0),
(5, 0, 5, 0, 0, 1, '', 0, 0),
(6, 4, 3, 4, 0, 1, '', 0, 0),
(7, 4, 5, 1, 0, 1, '', 0, 0),
(8, 5, 3, 2, 0, 1, '', 0, 0),
(9, 5, 5, 1, 0, 1, '', 0, 0),
(10, 6, 5, 3, 0, 1, '', 0, 0),
(11, 6, 10, 1, 0, 1, '', 0, 0),
(12, 7, 10, 2, 0, 1, '', 0, 0),
(13, 8, 10, 0, 0, 2, 'pdh', 500000, 1000000),
(14, 8, 3, 0, 0, 1, 'kaos 2', 80000, 80000),
(15, 9, 10, 0, 0, 1, 'pdh', 200000, 200000),
(16, 9, 6, 0, 0, 1, 'svadv', 150000, 150000),
(17, 10, 10, 0, 0, 1, 'pdh', 200000, 200000),
(18, 11, 10, 0, 0, 1, 'pdh', 200000, 200000),
(19, 12, 10, 0, 0, 1, 'pdh', 200000, 200000),
(20, 13, 10, 0, 0, 2, 'pdh', 200000, 400000),
(21, 14, 10, 0, 0, 1, 'pdh', 200000, 200000),
(22, 15, 0, 0, 0, 1, '', 0, 0),
(23, 15, 10, 0, 0, 1, 'pdh', 200000, 200000),
(24, 16, 10, 0, 0, 1, 'pdh', 200000, 200000),
(25, 17, 5, 0, 0, 1, 'kaos sfb', 90000, 90000),
(26, 17, 3, 0, 0, 3, 'kaos 2', 80000, 240000),
(27, 17, 10, 0, 0, 1, 'pdh', 200000, 200000),
(28, 17, 9, 0, 0, 1, 'ygldfckt', 120000, 120000),
(29, 17, 7, 0, 0, 1, 'kgmkmt', 200000, 200000),
(30, 18, 10, 0, 0, 1, 'pdh', 200000, 200000),
(31, 19, 10, 0, 0, 2, 'pdh', 200000, 400000),
(32, 20, 3, 0, 0, 1, 'kaos 2', 80000, 80000),
(33, 21, 3, 0, 0, 1, 'kaos 2', 80000, 80000),
(34, 22, 10, 0, 0, 1, 'pdh', 200000, 200000),
(35, 23, 10, 0, 0, 1, 'pdh', 200000, 200000),
(36, 24, 3, 0, 0, 1, 'kaos 2', 80000, 80000),
(37, 25, 3, 0, 0, 1, 'kaos 2', 80000, 80000),
(38, 25, 6, 0, 0, 1, 'svadv', 150000, 150000),
(39, 26, 5, 0, 0, 0, 'kaos sfb', 90000, 0),
(40, 26, 7, 0, 0, 1, 'kgmkmt', 200000, 200000),
(41, 27, 7, 0, 0, 4, 'kgmkmt', 200000, 800000),
(42, 27, 6, 0, 0, 4, 'svadv', 150000, 600000),
(43, 27, 5, 0, 0, 1, 'kaos sfb', 90000, 90000),
(44, 28, 6, 0, 0, 4, 'svadv', 150000, 600000),
(45, 28, 5, 0, 0, 1, 'kaos sfb', 90000, 90000),
(46, 29, 5, 0, 0, 1, 'kaos sfb', 90000, 90000),
(47, 30, 6, 0, 0, 2, 'svadv', 150000, 300000),
(48, 31, 6, 0, 0, 2, 'svadv', 150000, 300000),
(49, 32, 6, 0, 0, 3, 'svadv', 150000, 450000),
(50, 33, 10, 0, 0, 3, 'pdh', 200000, 600000),
(51, 34, 7, 0, 0, 2, 'kgmkmt', 200000, 400000),
(52, 35, 6, 0, 0, 1, 'svadv', 150000, 150000),
(53, 36, 6, 0, 0, 2, 'svadv', 150000, 300000),
(54, 37, 5, 0, 0, 3, 'kaos sfb', 90000, 270000),
(55, 38, 6, 0, 0, 2, 'svadv', 150000, 300000),
(56, 38, 3, 0, 0, 2, 'kaos 2', 80000, 160000),
(57, 39, 5, 0, 0, 1, 'kaos sfb', 90000, 90000),
(58, 40, 6, 0, 0, 3, 'svadv', 150000, 450000),
(59, 41, 6, 0, 0, 3, 'svadv', 150000, 450000),
(60, 41, 3, 0, 0, 1, 'kaos 2', 80000, 80000),
(61, 42, 5, 0, 0, 2, 'kaos sfb', 90000, 180000),
(62, 42, 10, 0, 0, 3, 'pdh', 200000, 600000),
(63, 43, 5, 0, 0, 3, 'kaos pendaki', 90000, 270000),
(64, 44, 15, 0, 0, 1, 'kemeja a', 230000, 230000),
(65, 45, 17, 0, 0, 2, 'kemeja b', 320000, 640000),
(66, 46, 19, 0, 0, 1, 'pdh keren', 120000, 120000),
(67, 47, 33, 0, 0, 1, 'kemeja 1', 340000, 340000),
(68, 48, 37, 0, 0, 1, 'kaos sh setia hati', 1150000, 1150000),
(69, 49, 38, 0, 0, 1, 'kaos penikmat senja', 70000, 70000),
(70, 50, 38, 0, 0, 2, 'kaos penikmat senja', 70000, 140000),
(71, 51, 38, 0, 0, 1, 'kaos penikmat senja', 70000, 70000),
(72, 52, 38, 0, 0, 2, 'kaos penikmat senja', 70000, 140000),
(73, 0, 40, 0, 0, 1, 't-shirt emperor', 100000, 100000),
(74, 0, 37, 0, 0, 1, 'kaos sh setia hati', 1150000, 1150000),
(75, 0, 37, 0, 0, 2, 'kaos sh setia hati', 1150000, 2300000),
(76, 0, 37, 0, 0, 1, 'kaos sh setia hati', 1150000, 1150000),
(77, 0, 37, 0, 0, 2, 'kaos sh setia hati', 1150000, 2300000),
(78, 0, 39, 0, 0, 2, 't-shirt pendaki', 125000, 250000),
(79, 0, 40, 0, 0, 3, 't-shirt emperor', 100000, 300000),
(80, 0, 40, 0, 0, 1, 't-shirt emperor', 100000, 100000),
(81, 53, 40, 0, 0, 1, 't-shirt emperor', 100000, 100000),
(82, 54, 37, 0, 0, 2, 'kaos sh setia hati', 1150000, 2300000),
(83, 54, 39, 0, 0, 1, 't-shirt pendaki', 125000, 125000),
(84, 54, 42, 0, 0, 1, 'Kaos Panjang psht', 130000, 130000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_produk`
--

CREATE TABLE `penilaian_produk` (
  `id_penilaian_produk` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian_produk`
--

INSERT INTO `penilaian_produk` (`id_penilaian_produk`, `id_produk`, `id_pelanggan`, `keterangan`) VALUES
(1, 37, 1, 'Produk sangat OKEE, Nyaman Dipakai'),
(2, 37, 2, 'mantapssss!!');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `id_ukuran`, `nama_produk`, `harga_produk`, `deskripsi`, `foto`, `stok_produk`, `berat_produk`) VALUES
(37, 0, 0, 'kaos sh setia hati', 1150000, 'dqwdqw', 't-shirt sh 1b.jpg', 15, 1000),
(38, 1, 0, 'kaos penikmat senja', 70000, 'a\r\na\r\na\r\na\r\na\r\na\r\na\r\na\r\na\r\n', '2a.jpg', 24, 0),
(39, 0, 0, 't-shirt pendaki', 125000, 's\r\ns', '3a.jpg', 97, 1400),
(40, 1, 0, 't-shirt emperor', 100000, 'd\r\nd\r\nd\r\nd\r\nd\r\nd\r\nd\r\nd\r\nd', '4a.jpg', 44, 0),
(41, 1, 0, 't-shirt sh', 90000, 'z\r\nz\r\nz\r\nz\r\nz\r\nzz\r\nz\r\nz\r\nz\r\nz\r\nz\r\n', '5a.jpg', 32, 0),
(42, 0, 0, 'Kaos Panjang psht', 130000, 'Kaos Panjang', '1a.png', 19, 1500),
(44, 2, 0, 'Kaos Panjang GOES', 100000, 'Kaos Panjang GOWESSSS!!', '2aa.jpg', 50, 0),
(45, 2, 0, 'Kaos Panjang PPI', 130000, 'Kaos Panjang Pendaki Pelajar Indonesia', '3aa.jpg', 100, 0),
(46, 2, 0, 'Kaos  Pendakian', 125000, 'Kaos Panjang Pendakian', '4bb.jpg', 60, 0),
(47, 2, 0, 'Kaos Terbaru', 90000, 'Kaos Panjang', '5aa.jpg', 10, 0),
(48, 2, 0, 'Kaos Emperor', 90000, 'emperor catalogue', '6aa.jpg', 30, 0),
(49, 4, 0, 'Kolor 1', 25000, 'dfkjasdfjladflasd', '1.jpg', 5, 0),
(50, 4, 0, 'Kolor 2', 25000, 'md;flfjejf;qwdqwd', '2.jpg', 5, 0),
(51, 4, 0, 'Kolor 3', 25000, 'sacasdsamd', '3.jpg', 10, 0),
(52, 1, 0, 'kaos harian terbaru', 70000, 'nononon', 'dfgdgdsf.jpg', 10, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran_produk`
--

CREATE TABLE `ukuran_produk` (
  `id_ukuran` int(11) NOT NULL,
  `ukuran` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ukuran_produk`
--

INSERT INTO `ukuran_produk` (`id_ukuran`, `ukuran`) VALUES
(1, 'M'),
(2, 'L'),
(3, 'XL'),
(4, 'XXL');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD PRIMARY KEY (`id_foto_produk`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `penilaian_produk`
--
ALTER TABLE `penilaian_produk`
  ADD PRIMARY KEY (`id_penilaian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `ukuran_produk`
--
ALTER TABLE `ukuran_produk`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `foto_produk`
--
ALTER TABLE `foto_produk`
  MODIFY `id_foto_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `penilaian_produk`
--
ALTER TABLE `penilaian_produk`
  MODIFY `id_penilaian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `ukuran_produk`
--
ALTER TABLE `ukuran_produk`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
