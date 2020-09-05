-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Sep 2020 pada 20.25
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
(3, '198609262015051002', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_dokumen` varchar(50) NOT NULL,
  `type_dokumen` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `nip`, `nama_dokumen`, `type_dokumen`, `keterangan`) VALUES
(4, '198609262015051002', 'SK', 'SK', 'UMPAN.docx');

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
('', ''),
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
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `status_notifikasi` enum('R','U') NOT NULL COMMENT 'R=Read, U=Unread',
  `tanggal_notifikasi` datetime NOT NULL,
  `temp_tgl` date NOT NULL,
  `jenis_notifikasi` enum('KB','KP','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `nik`, `status_notifikasi`, `tanggal_notifikasi`, `temp_tgl`, `jenis_notifikasi`) VALUES
(117, '198609262015051002', 'R', '2020-07-29 00:30:27', '2020-07-29', 'KB'),
(118, '198609262015051002', 'U', '2020-07-29 00:30:27', '2020-07-29', 'KP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengangkatan`
--

CREATE TABLE `pengangkatan` (
  `id_pengangkatan` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `tanggal_pengangkatan` date NOT NULL,
  `nomor_sk` varchar(50) NOT NULL,
  `tgl_kenaikan_berkala` date NOT NULL,
  `tgl_kenaikan_pangkat` date NOT NULL,
  `tgl_pensiun` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengangkatan`
--

INSERT INTO `pengangkatan` (`id_pengangkatan`, `nip`, `tanggal_pengangkatan`, `nomor_sk`, `tgl_kenaikan_berkala`, `tgl_kenaikan_pangkat`, `tgl_pensiun`) VALUES
(2, '198609262015051002', '2020-07-31', 'SK2', '2020-08-29', '2020-10-29', '2030-07-31');

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
('K01', 'Optimal', '-', 'T01'),
('K02', 'Normal', '-', 'T02'),
('K03', 'Pra Hipertensi', '-', 'T01'),
('K04', 'Hipertensi Derajat I', '-', 'T02'),
('K05', 'Hipertensi Derajat II', '-', 'T02'),
('K06', 'Hipertensi Urgensi Asimtomatik', '-', 'T02'),
('K07', 'Hipertensi Urgensi Simtomatik', '-', 'T02'),
('K08', 'Hipertensi Emergensi', '-', 'T02');

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
-- Struktur dari tabel `ref_golongan`
--

CREATE TABLE `ref_golongan` (
  `id_golongan` int(11) NOT NULL,
  `nama_golongan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ref_golongan`
--

INSERT INTO `ref_golongan` (`id_golongan`, `nama_golongan`) VALUES
(1, 'I/A'),
(3, 'I/B'),
(4, 'I/C'),
(5, 'I/D'),
(6, 'II/A'),
(7, 'II/B'),
(8, 'II/C'),
(9, 'II/D'),
(10, 'III/A'),
(11, 'III/B'),
(12, 'III/C'),
(13, 'III/D'),
(14, 'IV/A'),
(15, 'IV/B'),
(16, 'IV/C'),
(17, 'IV/D'),
(18, 'IV/E');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_jabatan`
--

CREATE TABLE `ref_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ref_jabatan`
--

INSERT INTO `ref_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'CAMAT'),
(2, 'SEKRETARIS'),
(3, 'KASUBAG UMUM DAN KEPEGAWAIAN'),
(4, 'KASUBAG PEP DAN KEUANGAN'),
(5, 'KASI PEMERINTAHAN DAN PELAYANAN'),
(6, 'KASI KESEJAHTERAAN SOSIAL'),
(7, 'KASI PEMBANGUNAN DAN PEMBERDAYAAN MASYARAKAT'),
(8, 'KASI TRANTIBUM'),
(9, 'PELAKSANA');

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
-- Struktur dari tabel `riwayat_kenaikan_pangkat`
--

CREATE TABLE `riwayat_kenaikan_pangkat` (
  `id_riwayat` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `tanggal_kenaikan` date NOT NULL,
  `kenaikan_berkala` date NOT NULL,
  `kenaikan_pangkat` date NOT NULL,
  `pensiun` date NOT NULL,
  `no_sk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `riwayat_kenaikan_pangkat`
--

INSERT INTO `riwayat_kenaikan_pangkat` (`id_riwayat`, `nip`, `id_jabatan`, `id_golongan`, `tanggal_kenaikan`, `kenaikan_berkala`, `kenaikan_pangkat`, `pensiun`, `no_sk`) VALUES
(2, '198609262015051002', 1, 13, '2020-07-26', '2022-07-26', '2022-07-26', '2022-07-26', 'SK'),
(6, '198609262015051002', 1, 14, '2020-07-31', '2020-08-29', '2020-10-29', '2030-07-31', 'SK2');

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
(16, 'G17', 'K05');

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
(3, '123456789', 'Yayat Nurhidaya', '', 'S.Kom', 'Majalengka', '1997-04-04', 1, 1, 'pancingan.jpg', 'yayat9744@gmail.com', '3210060004', '3210060', '3210', 32, 'Panyindangan', '087654678876', 1, 14);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indeks untuk tabel `pengangkatan`
--
ALTER TABLE `pengangkatan`
  ADD PRIMARY KEY (`id_pengangkatan`);

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
-- Indeks untuk tabel `ref_golongan`
--
ALTER TABLE `ref_golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indeks untuk tabel `ref_jabatan`
--
ALTER TABLE `ref_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `ref_jk`
--
ALTER TABLE `ref_jk`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indeks untuk tabel `riwayat_kenaikan_pangkat`
--
ALTER TABLE `riwayat_kenaikan_pangkat`
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
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT untuk tabel `pengangkatan`
--
ALTER TABLE `pengangkatan`
  MODIFY `id_pengangkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ref_agama`
--
ALTER TABLE `ref_agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ref_golongan`
--
ALTER TABLE `ref_golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `ref_jabatan`
--
ALTER TABLE `ref_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `ref_jk`
--
ALTER TABLE `ref_jk`
  MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `riwayat_kenaikan_pangkat`
--
ALTER TABLE `riwayat_kenaikan_pangkat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `rule`
--
ALTER TABLE `rule`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
