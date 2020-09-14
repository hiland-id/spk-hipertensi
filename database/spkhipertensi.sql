-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Sep 2020 pada 20.37
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spkhipertensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `app_level` enum('admin','pegawai') NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('A','NA') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `nik`, `app_level`, `password`, `status`) VALUES
(2, '123456789', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'A'),
(3, '198609262015051002', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'A'),
(5, '321006040497000001', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'A'),
(6, '321006040497000002', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` varchar(4) NOT NULL,
  `gejala` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `gejala`) VALUES
('G01', 'Nilai Sistolik <120  mmHg'),
('G02', 'Nilai Diastolik <80 mmHg'),
('G03', 'Nilai Sistolik  121 - 130 mmHg'),
('G04', 'Nilai Diastolik 81 – 85 mmHg'),
('G05', 'Nilai Sistolik 130 – 139 mmHg'),
('G06', 'Nilai Diastolik 85-89 mmHg'),
('G07', 'Nilai Sistolik 140 - 159 mmHg'),
('G08', 'Nilai Diastolik 90 - 99 mmHg'),
('G09', 'Nilai Sistolik 160 - 179 mmHg'),
('G10', 'Nilai Diastolik 100 - 109 mmHg'),
('G11', 'Nilai Sistolik 180 - 220 mmHg'),
('G12', 'Nilai Diastolik 110 - 140 mmHg'),
('G13', 'Nilai Sistolik >220 mmHg'),
('G14', 'Nilai Diastolik >140 mmHg'),
('G15', 'Sakit Kepala'),
('G16', 'Gelisah'),
('G17', 'Pusing'),
('G18', 'Rasa Sakit DIdada'),
('G19', 'Mudah Lelah'),
('G20', 'Sering Asimptomatik'),
('G21', 'Sakit Kepala Berat'),
('G22', 'Napas Pendek'),
('G23', 'Nokturia'),
('G24', 'Disatria'),
('G25', 'Gangguan Kesadaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` varchar(3) NOT NULL,
  `penyakit` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_terapi` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `penyakit`, `deskripsi`, `id_terapi`) VALUES
('K01', 'Optimal', 'tekanan darah Optimal menurut WHO adalah kurang atau sama dengan 120/80 mmHg. Tekanan darah optimal perlu dijaga setiap harinya. Caranya adalah dengan menerapkan pola hidup sehat, mulai dari mengonsumsi makanan sehat, menjaga berat badan ideal, hingga berolahraga teratur.', 'T01'),
('K02', 'Normal', 'Tekanan darah normal menurut WHO adalah kurang atau sama dengan 130/85 mmHg. Tekanan darah normal perlu dijaga setiap harinya. Caranya adalah dengan menerapkan pola hidup sehat, mulai dari mengonsumsi makanan sehat, menjaga berat badan ideal, hingga berolahraga teratur.', 'T02'),
('K03', 'Pra Hipertensi', 'Kondisi prahipertensi memiliki risiko yang lebih tinggi terhadap kejadian penyakit kardiovaskular, seperti penyakit jantung koroner dan stroke. Perubahan gaya hidup sehat dan resep obat penurun tekanan darah dari dokter mungkin diperlukan pasien, agar tidak risiko terjadinya kondisi medis serius menurun.Kondisi prahipertensi memiliki risiko yang lebih tinggi terhadap kejadian penyakit kardiovaskular, seperti penyakit jantung koroner dan stroke. Perubahan gaya hidup sehat dan resep obat penurun tekanan darah dari dokter mungkin diperlukan pasien, agar tidak risiko terjadinya kondisi medis serius menurun.', 'T01'),
('K04', 'Hipertensi Derajat I', 'Tekanan darah sistolik 140–159 mmHg atau tekanan darah diastolik 90–99 mmHg. Jika tekanan darah sistolik atau diastolik Anda berada pada rentang ini, Anda sudah memerlukan pengobatan karena risiko terjadinya kerusakan pada organ menjadi lebih tinggi.', 'T02'),
('K05', 'Hipertensi Derajat II', 'Tekanan darah sistolik > 160 mmHg atau tekanan darah diastolik > dari 100 mmHg. Pada tahap ini, penderita biasanya membutuhkan lebih dari satu obat.', 'T02'),
('K06', 'Hipertensi Urgensi Asimtomatik', 'Urgensi hipertensi adalah situasi klinis di mana tekanan darah sangat tinggi (misalnya, ≥180 / ≥110 mmHg) dengan gejala minimal atau tanpa gejala, dan tidak ada tanda atau gejala yang menunjukkan kerusakan organ akut.', 'T02'),
('K07', 'Hipertensi Urgensi Simtomatik', 'Urgensi hipertensi adalah situasi klinis di mana tekanan darah sangat tinggi (misalnya, ≥180 / ≥110 mmHg) dengan gejala minimal atau tanpa gejala, dan tidak ada tanda atau gejala yang menunjukkan kerusakan organ akut.', 'T02'),
('K08', 'Hipertensi Emergensi', 'Seseorang disebut mengalami hipertensi emergensi apabila tekanan darah sistoliknya lebih dari 220 mmHg dan diastoliknya lebih dari 140 mmHg. Jika tidak diatasi, hipertensi emergensi dapat menyebabkan kerusakan berat pada organ tubuh.', 'T02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_agama`
--

CREATE TABLE `ref_agama` (
  `id_agama` int(11) NOT NULL,
  `nama_agama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ref_agama`
--

INSERT INTO `ref_agama` (`id_agama`, `nama_agama`) VALUES
(1, 'Islam'),
(2, 'Protestan'),
(3, 'Katolik'),
(4, 'Hindu'),
(5, 'Buddha'),
(6, 'Khonghucu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_jk`
--

CREATE TABLE `ref_jk` (
  `id_jk` int(11) NOT NULL,
  `nama_jk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ref_jk`
--

INSERT INTO `ref_jk` (`id_jk`, `nama_jk`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_periksa`
--

CREATE TABLE `riwayat_periksa` (
  `id_riwayat` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `id_penyakit` varchar(5) NOT NULL,
  `tgl_periksa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `riwayat_periksa`
--

INSERT INTO `riwayat_periksa` (`id_riwayat`, `nik`, `id_penyakit`, `tgl_periksa`) VALUES
(5, '321006040497000001', 'K03', '0000-00-00'),
(6, '123456789', 'K01', '0000-00-00'),
(7, '123456789', 'K01', '2020-09-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rule`
--

CREATE TABLE `rule` (
  `id_rule` int(11) NOT NULL,
  `id_gejala` varchar(3) NOT NULL,
  `id_penyakit` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rule`
--

INSERT INTO `rule` (`id_rule`, `id_gejala`, `id_penyakit`) VALUES
(1, 'G01', 'K01'),
(2, 'G02', 'K01'),
(3, 'G03', 'K02'),
(4, 'G04', 'K02'),
(5, 'G05', 'K03'),
(6, 'G06', 'K03'),
(7, 'G17', 'K03'),
(8, 'G07', 'K04'),
(9, 'G08', 'K04'),
(10, 'G15', 'K04'),
(11, 'G17', 'K04'),
(12, 'G09', 'K05'),
(13, 'G10', 'K05'),
(14, 'G15', 'K05'),
(15, 'G16', 'K05'),
(16, 'G17', 'K05'),
(17, 'G11', 'K06'),
(18, 'G12', 'K06'),
(19, 'G15', 'K06'),
(20, 'G16', 'K06'),
(21, 'G20', 'K06'),
(22, 'G11', 'K07'),
(23, 'G12', 'K07'),
(24, 'G21', 'K07'),
(25, 'G22', 'K07'),
(26, 'G13', 'K08'),
(27, 'G14', 'K08'),
(28, 'G18', 'K08'),
(29, 'G22', 'K08'),
(30, 'G23', 'K08'),
(31, 'G24', 'K08'),
(32, 'G25', 'K08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `terapi`
--

CREATE TABLE `terapi` (
  `id_terapi` varchar(3) NOT NULL,
  `terapi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `terapi`
--

INSERT INTO `terapi` (`id_terapi`, `terapi`) VALUES
('T01', 'Gaya Hidup Sehat'),
('T02', 'Farmakologi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_pegawai` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gelar_depan` varchar(10) NOT NULL,
  `gelar_belakang` varchar(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_jk` int(11) NOT NULL COMMENT 'ref_jk',
  `id_agama` int(11) NOT NULL COMMENT 'ref_jk',
  `foto` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_desa` varchar(20) NOT NULL COMMENT 'api',
  `id_kecamatan` varchar(20) NOT NULL COMMENT 'api',
  `id_kabupaten` varchar(20) NOT NULL COMMENT 'api',
  `id_provinsi` int(11) NOT NULL COMMENT 'api',
  `alamat_lengkap` text NOT NULL,
  `no_telepon` char(15) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_pegawai`, `nik`, `nama`, `gelar_depan`, `gelar_belakang`, `tempat_lahir`, `tanggal_lahir`, `id_jk`, `id_agama`, `foto`, `email`, `id_desa`, `id_kecamatan`, `id_kabupaten`, `id_provinsi`, `alamat_lengkap`, `no_telepon`, `id_jabatan`, `id_golongan`) VALUES
(3, '123456789', 'Admin', 'Dr.', '', 'Padang', '1997-04-04', 1, 1, 'admin.png', 'admin@gmail.com', '3210060004', '3210060', '3210', 32, 'Panyindangan', '087654678876', 1, 14),
(6, '321006040497000001', 'Bpk X', '', '', 'a', '2018-01-01', 1, 1, 'avatar.png', '', '1371060010', '1371060', '1371', 13, 'a', '089720903314', 0, 0),
(7, '321006040497000002', 'Ibu X', '', '', 'Padang', '2018-02-02', 2, 1, 'avatar2.png', '', '1376011010', '1376011', '1376', 13, 'a', '089987765678', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indeks untuk tabel `ref_agama`
--
ALTER TABLE `ref_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indeks untuk tabel `ref_jk`
--
ALTER TABLE `ref_jk`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indeks untuk tabel `riwayat_periksa`
--
ALTER TABLE `riwayat_periksa`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indeks untuk tabel `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`id_rule`);

--
-- Indeks untuk tabel `terapi`
--
ALTER TABLE `terapi`
  ADD PRIMARY KEY (`id_terapi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `nip` (`nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ref_agama`
--
ALTER TABLE `ref_agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ref_jk`
--
ALTER TABLE `ref_jk`
  MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `riwayat_periksa`
--
ALTER TABLE `riwayat_periksa`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `rule`
--
ALTER TABLE `rule`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
