-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Feb 2023 pada 11.15
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cetak`
--

CREATE TABLE `cetak` (
  `id` int(11) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `narasi` text NOT NULL,
  `penutup` text NOT NULL,
  `kepala_dinas` varchar(255) NOT NULL,
  `nip_kepala_dinas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cetak`
--

INSERT INTO `cetak` (`id`, `nomor`, `narasi`, `penutup`, `kepala_dinas`, `nip_kepala_dinas`) VALUES
(1, '01', 'Bersama ini dalam rangka implementasi Sistem Pemerintahan Berbasis Elektronik (SPBE) pada Instansi Pemerintah sebagaimana Peraturan Bupati Kediri No 33 Tahun 2019 tentang SPBE, dengan ini kami sampaikan permohonan pemanfaatan fasilitas Cloud / Web Hosting melalui layanan layanan Pusat Data yang dikelola oleh Dinas Komunikasi dan Informatika', ' Terima Kasih', 'Mahfud MD. SPD', '8323802');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_form`
--

CREATE TABLE `tb_form` (
  `id` int(11) NOT NULL,
  `nama_domain` varchar(255) NOT NULL,
  `layanan_id` int(11) NOT NULL,
  `nama_pengelola` varchar(255) NOT NULL,
  `nip` int(11) NOT NULL,
  `pangkat_golongan` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `no_hp` int(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `syarat_ketentuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_form`
--

INSERT INTO `tb_form` (`id`, `nama_domain`, `layanan_id`, `nama_pengelola`, `nip`, `pangkat_golongan`, `jabatan`, `no_hp`, `email`, `syarat_ketentuan`) VALUES
(17, '0', 1, '1', 1, '1', '1', 1, '1', 'sk_1677119702.pdf'),
(18, '1', 2, '1', 1, '1', '1', 1, '1', 'sk_1677136192.pdf'),
(19, '0', 3, '1', 1, '1', '1', 1, '1', 'sk_1677216982.pdf'),
(20, '0', 4, '1', 1, '1', '1', 1, '1', 'sk_1677217152.pdf'),
(21, '0', 5, '1', 1, '1', '1', 1, '1', 'sk_1677217412.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_layanan`
--

CREATE TABLE `tb_layanan` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_layanan`
--

INSERT INTO `tb_layanan` (`id`, `judul`, `isi`, `gambar`) VALUES
(1, 'VPS', '<p>VPS adalah server virtual yang berfungsi untuk menyimpan data dan file pada website. Layanan VPS digunakan pada website yang membutuhkan sumber daya besar. Karena penggunanya tidak perlu berbagi sumber daya dengan website lain seperti halnya pada shared hosting. Hal ini karena VPS menggunakan teknologi virtualisasi yang membagi server fisik menjadi beberapa sumber daya yang berbeda. Dengan sumber daya pribadi, performa website dari pengguna server ini tidak akan terpengaruh oleh pengguna lainnya. Selain itu dengan VPS, pengguna bebas untuk melakukan konfigurasi pada servernya.</p>', '1677119702.png'),
(2, 'Domain', '<p>Domain adalah sebuah nama yang dipilih untuk menjadi alamat dari website yang diinginkan dan biasanya nama itu yang akan diketikan di mesin pencari untuk mencari website yang dimiliki secara keseluruhan. Domain juga dapat disebut sebagai alamat website. Domain ini sangatlah penting untuk website yang dimiliki, karena dengan adanya domain ini akan membuat orang lain untuk mengingat dari alamat yang dimiliki dan dapat mengetikkannya secara tepat untuk menuju website yang dimiliki berada. Layanan domain di pusat data Diskominfo menggunakan domain (nama domain).kedirikab.go.id&nbsp;</p>', '1677136192.png'),
(3, 'Collocation Server', '<p>Colocation server adalah sebuah layanan yang menyediakan tempat untuk menyimpan atau menitipkan server yang dimilikinya ke sebuah data center. Data center di Dinas Kominfo sudah menyediakan standar keamanan fisik dan infrastruktur yang mendukung. Data center di Dinas Kominfo sudah mendukung kestabilitan arus listrik, suhu, UPS, akses internet, power generator, flooring, dan CCTV.</p>', '1677216982.png'),
(4, 'Layanan Email', '<p>Email merupakan suatu sarana untuk mengirim dan menerima pesan digital melalui jaringan komputer dan internet. Dengan kata lain, sebuah email dapat berperan sebagai identitas pribadi seseorang di internet. Biasanya email pribadi digunakan untuk mengirim dan menerima pesan, mengirimkan dan menerima dokumen (pdf, doc, excel), dan kegiatan komunikasi lainnya. Layanan email di Dinas Kominfo menggunakan @kedirikab.go.id.</p>', '1677217152.png'),
(5, 'Web Hosting', '<p>Hosting adalah sebuah tempat yang disediakan untuk website. Hal ini digambarkan seperti bangunan dari website. Bangunan tersebut dapat menjadi bangunan bagi bisnis apabila menyewanya. Pengguna dapat berpindah ke bangunan lainnya dengan membawa nama dari website pengguna kapanpun dan tidak ada yang mengikat pengguna harus bertahan di satu bangunan tersebut seperti awal pengguna baru memulainya. Komputer apapun dapat menjadi host, bahkan komputer yang dimiliki di rumah pun dapat menjadi host dari website yang dimiliki.</p>', '1677217412.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_permohonan`
--

CREATE TABLE `tb_permohonan` (
  `id` int(11) NOT NULL,
  `waktu_pengajuan` varchar(255) DEFAULT NULL,
  `nama_domain` varchar(255) DEFAULT NULL,
  `nama_pengelola` varchar(255) DEFAULT NULL,
  `nip` int(25) DEFAULT NULL,
  `pangkat_golongan` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `jabatan` varchar(233) DEFAULT NULL,
  `no_hp` int(20) DEFAULT NULL,
  `jenis_layanan` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `dokumen_ASN_KTP` varchar(50) NOT NULL,
  `dokumen_surat_pic` varchar(255) NOT NULL,
  `dokumen_surat_pengajuan` varchar(255) NOT NULL,
  `dokumen_kontrak` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_permohonan`
--

INSERT INTO `tb_permohonan` (`id`, `waktu_pengajuan`, `nama_domain`, `nama_pengelola`, `nip`, `pangkat_golongan`, `email`, `jabatan`, `no_hp`, `jenis_layanan`, `keterangan`, `dokumen_ASN_KTP`, `dokumen_surat_pic`, `dokumen_surat_pengajuan`, `dokumen_kontrak`, `status`) VALUES
(57, '24 Februari 2023', NULL, 'Anton', 3238983, 'Karyawan', 'jwacana@example.net', 'karyawan', 2147483647, 'Web Hosting', NULL, 'dok1_1677217649.pdf', 'dok2_1677217649.pdf', 'dok3_1677217649.pdf', 'dok4_1677217649.pdf', 1),
(58, '24 Februari 2023', 'google.com', 'Ridofas', 2147483647, 'Karyawan', 'jwacana@example.net', 'karyawan', 938884992, 'Domain', NULL, 'dok1_1677218050.pdf', 'dok2_1677218050.pdf', 'dok3_1677218050.pdf', 'dok4_1677218050.pdf', 0),
(59, '27 Februari 2023', NULL, 'Rido', 323, '2323', 'muhainun059@gmail.com', 'k', 3232, 'Layanan Email', 'fak', 'dok1_1677490409.pdf', 'dok2_1677490409.pdf', 'dok3_1677490409.pdf', 'dok4_1677490409.pdf', 0),
(60, '27 Februari 2023', NULL, 'm', 3238983, '2323', 'jwacana@example.net', 'jj', 3232, 'Web Hosting', 'cek area', 'dok1_1677491104.pdf', 'dok2_1677491104.pdf', 'dok3_1677491104.pdf', 'dok4_1677491104.pdf', 0),
(61, '27 Februari 2023', NULL, 'sas', 323, '2323', 'yayan@gmail.com', 'kepala', 3232, 'Web Hosting', 'cek', 'dok1_1677492447.pdf', 'dok2_1677492447.pdf', 'dok3_1677492447.pdf', 'dok4_1677492447.pdf', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `superadmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `superadmin`) VALUES
(4, 'superadmin', '$2y$10$OmdsI29HU93d8hmlwV0I3OhtGCft7vtyykeLRrE/Ut5om8Bqnf9cK', 1),
(5, 'admin', '$2y$10$zKjxxk6cMigCYEyUc.noK.ywlTEr2CKbk9B9tSQwOba/KzDtzDuS6', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cetak`
--
ALTER TABLE `cetak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_form`
--
ALTER TABLE `tb_form`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_layanan`
--
ALTER TABLE `tb_layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cetak`
--
ALTER TABLE `cetak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_form`
--
ALTER TABLE `tb_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_layanan`
--
ALTER TABLE `tb_layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
