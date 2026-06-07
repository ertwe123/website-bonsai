-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Mar 2024 pada 13.35
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ikancupang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(3) NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gejala`
--

CREATE TABLE `tb_gejala` (
  `id` int(11) NOT NULL,
  `kdgejala` varchar(3) DEFAULT NULL,
  `gejala` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tb_gejala`
--

INSERT INTO `tb_gejala` (`id`, `kdgejala`, `gejala`) VALUES
(1, 'G1', 'bintik-bintik putih pada sisik ikan'),
(2, 'G2', 'nafsu makan cupang akan berkurang'),
(3, 'G3', 'warnanya terlihat pucat'),
(4, 'G4', 'ekornya menguncup'),
(5, 'G5', 'cupang menabrakkan dirinya ke dinding akuarium karena rasa gatal di tubuhnya.'),
(6, 'G6', 'bercak putih pada sirip ikan. Bentuknya seperti gumpalan kapas'),
(7, 'G7', 'gerakannya semakin pasif'),
(8, 'G8', 'air akuarium yang kotor'),
(9, 'G9', 'bintik-bintik berwarna emas cenderung gelap seperti karat pada tubuh cupang'),
(10, 'G10', 'kemerahan pada sirip cupang'),
(11, 'G11', 'sirip sobek dan rontok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penyakit`
--

CREATE TABLE `tb_penyakit` (
  `id` int(11) NOT NULL,
  `kdpenyakit` varchar(3) DEFAULT NULL,
  `nama_penyakit` varchar(100) DEFAULT NULL,
  `definisi` text DEFAULT NULL,
  `solusi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`id`, `kdpenyakit`, `nama_penyakit`, `definisi`, `solusi`) VALUES
(1, 'P1', 'White Spot (Bintik Putih)', 'Cupang dapat terkena penyakit white spot (bintik putih) yang menyerang sisik ikan dan gampang sekali menular. Air yang kotor dan pakan yang tidak bersih biasanya akan menimbulkan gejala bintik-bintik putih pada sisik ikan. Jika sudah terkena penyakit ini, nafsu makan cupang akan berkurang, warnanya terlihat pucat, serta sirip dan ekornya menguncup. Dalam beberapa kasus, cupang menabrakkan dirinya ke dinding akuarium karena rasa gatal di tubuhnya.', 'Jika cupang peliharaanmu mulai mengalami gejala ini, segera lakukan karantina. Bersihkan akuarium dan segera gant airnya. Kemudian tambahkan obat biru dan garam pada air yang baru. Agar penyembuhan semakin cepat, biasakan ikan terkena sinar matahari pagi.'),
(2, 'P2', 'Infeksi Jamur Kulit', 'Infeksi jamur kulit ini ditandai dengan munculnya bercak putih pada sirip ikan. Bentuknya seperti gumpalan kapas. Jika sudah terkena penyakit ini, biasanya nafsu makan cupang akan menurun, gerakannya semakin pasif, dan dalam beberapa kasus warnanya semakin memudar. Penyebabnya lagi-lagi air akuarium yang kotor karena jarang dibersihkan.', 'Untuk mengobati cupang kesayanganmu, segera ganti air secara menyeluruh dan lakukan karantina pada cupang. Kemudian tambahkan obat biru pada air yang baru. Selain obat biru, air rendaman ketapang juga bisa menjadi pilihan. Selama karantina upayakan untuk mengganti air sekali tiga hari.'),
(3, 'P3', 'Velvet (Bintik Emas/Karatan)', 'Penyekit ini ditandai dengan munculnya bintik-bintik berwarna emas cenderung gelap seperti karat pada tubuh cupang. Cupang juga akan semakin pasif dan malas bergerak, warnanya menjadi pucat, siripnya menguncup, serta nafsu makan berkurang. Penyebab penyakit ini kurang lebih sama dengan penyakit sebelumnya, yaitu air yang tidak bersih dan kualitas pakan yang tidak terjaga.', 'Jika menemui ciri-ciri seperti ini, segera obati cupangmu dengan melakukan karantina. Bersihkan akurium, ganti air menyeluruh, beri garam ikan, dan tambahkan obat biru atau air rendaman Ketapang. Lakukan pengobatan setiap tiga hari sekali sampai velvet menghilang.'),
(4, 'P4', 'Fin Rot (Busuk Sirip)', 'Jika muncul warna kemerahan pada sirip cupang, sirip sobek dan rontok, warna cupang menjadi lebih pucat, bahkan jika dibiarkan badan ikan ikut membusuk, kamu perlu waspada. Cupang peliharaanmu diserang penyakit fin rot. Penyakit ini disebabkan bakteri yang muncul akibat kualitas dan kebersihan air yang buruk.', 'Pengobatannya dapat dilakukan dengan mengarantina ikan, membersihkan akuarium, dan mengganti air baru. Kemudian tambahkan antibiotic dan garam khusus ikan. Jika berhasil, sirip ikanmu akan tumbuh kembali.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rules`
--

CREATE TABLE `tb_rules` (
  `id_rules` int(11) NOT NULL,
  `id_gejala` int(11) DEFAULT NULL,
  `id_penyakit` int(11) DEFAULT NULL,
  `belief` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tb_rules`
--

INSERT INTO `tb_rules` (`id_rules`, `id_gejala`, `id_penyakit`, `belief`) VALUES
(253, 11, 4, 0.8),
(252, 10, 4, 0.8),
(251, 3, 4, 0.3),
(250, 9, 3, 0.8),
(249, 7, 3, 0.3),
(248, 4, 3, 0.3),
(247, 3, 3, 0.3),
(246, 2, 3, 0.3),
(245, 7, 2, 0.3),
(244, 6, 2, 0.8),
(243, 3, 2, 0.3),
(242, 2, 2, 0.3),
(241, 5, 1, 0.8),
(240, 4, 1, 0.3),
(239, 3, 1, 0.3),
(238, 2, 1, 0.3),
(237, 1, 1, 0.8);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_gejala`
--
ALTER TABLE `tb_gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_rules`
--
ALTER TABLE `tb_rules`
  ADD PRIMARY KEY (`id_rules`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_gejala`
--
ALTER TABLE `tb_gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tb_rules`
--
ALTER TABLE `tb_rules`
  MODIFY `id_rules` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
