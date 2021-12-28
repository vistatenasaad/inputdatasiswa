-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Nov 2021 pada 10.53
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_siswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE `data_siswa` (
  `no_id` int(11) NOT NULL,
  `nama_atlet` varchar(150) NOT NULL,
  `tgl_reg` varchar(100) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `bb` varchar(50) NOT NULL,
  `tb` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `tingkat` varchar(100) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `ket` varchar(50) NOT NULL,
  `nama_wali` varchar(100) NOT NULL,
  `no_hpwali` varchar(50) NOT NULL,
  `alamat_wali` text NOT NULL,
  `foto_siswa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`no_id`, `nama_atlet`, `tgl_reg`, `ttl`, `jenis_kelamin`, `bb`, `tb`, `no_hp`, `tingkat`, `kelas`, `ket`, `nama_wali`, `no_hpwali`, `alamat_wali`, `foto_siswa`) VALUES
(9, 'Adiba Salva Maulina Putri', '8 Agustus 2015', 'Malang, 24 Mei 2003', 'Perempuan', '49', '155', '083835960444', 'Merah Strip Hitam 1', 'Kyurugi', 'Aktif', 'Munir', '081234567890', 'Jl.Martosujono No.25 Punten, Bumiaji, Batu', 'namchin.jpg'),
(11, 'Angda Tenado Abrianzaveo', '08 Agustus 2015', 'Malang, 22 Oktober 2005', 'Laki-Laki', '68', '170', '081234567890', 'Merah Strip Hitam 1', 'Kyurugi', 'Aktif', 'abc', '081234567890', 'Jl.abc', 'namchin.jpg'),
(12, 'Dwi Wijayanto', '08 Agustus 2015', 'Malang, 8 Juni 1990', 'Laki-Laki', '67', '170', '081234567890', 'Hitam', 'Poomsae', 'Aktif', 'abc', '081234567890', 'Jl.abc', 'namchin.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_sekolah`
--

CREATE TABLE `profil_sekolah` (
  `no_id` int(11) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `no_tlp` varchar(50) NOT NULL,
  `kepsek` varchar(100) NOT NULL,
  `nis_kepsek` varchar(100) NOT NULL,
  `wakil_kepsek` varchar(100) NOT NULL,
  `nis_wakil` varchar(100) NOT NULL,
  `logo_sekolah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profil_sekolah`
--

INSERT INTO `profil_sekolah` (`no_id`, `nama_sekolah`, `alamat_sekolah`, `no_tlp`, `kepsek`, `nis_kepsek`, `wakil_kepsek`, `nis_wakil`, `logo_sekolah`) VALUES
(1, 'Taekwondo Bumiaji', 'Jl.Raya Junggo ', '0341-1234', 'Dwi Wijayanto', '20203729', 'Suntari Waluyo', '20203729', '17265467_596304143899416_8012627924412792832_n.jpg.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp`
--

CREATE TABLE `spp` (
  `idspp` int(11) NOT NULL,
  `idsiswa` text NOT NULL,
  `bulan` date NOT NULL,
  `keterangan` text NOT NULL,
  `tglbayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `spp`
--

INSERT INTO `spp` (`idspp`, `idsiswa`, `bulan`, `keterangan`, `tglbayar`) VALUES
(8, '5', '2021-01-10', 'Lunas', '2021-10-29'),
(9, '5', '2021-02-10', 'Lunas', '2021-10-29'),
(10, '5', '2021-03-10', 'Lunas', '2021-10-29'),
(11, '5', '2021-04-10', 'Lunas', '2021-10-29'),
(12, '5', '2021-05-10', 'Lunas', '2021-10-29'),
(13, '5', '2021-06-10', 'Lunas', '2021-10-29'),
(14, '5', '2021-07-10', 'Lunas', '2021-10-31'),
(15, '9', '2021-01-10', 'Lunas', '2021-11-02'),
(16, '9', '2021-02-10', 'Lunas', '2021-11-02'),
(17, '9', '2021-03-10', 'Lunas', '2021-11-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_login`
--

CREATE TABLE `user_login` (
  `no_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_login`
--

INSERT INTO `user_login` (`no_id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`no_id`);

--
-- Indeks untuk tabel `profil_sekolah`
--
ALTER TABLE `profil_sekolah`
  ADD PRIMARY KEY (`no_id`);

--
-- Indeks untuk tabel `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`idspp`);

--
-- Indeks untuk tabel `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`no_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `no_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `profil_sekolah`
--
ALTER TABLE `profil_sekolah`
  MODIFY `no_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `spp`
--
ALTER TABLE `spp`
  MODIFY `idspp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user_login`
--
ALTER TABLE `user_login`
  MODIFY `no_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
