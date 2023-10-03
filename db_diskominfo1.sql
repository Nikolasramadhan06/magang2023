-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Okt 2023 pada 03.06
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_diskominfo1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `about_us` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id`, `about_us`, `visi`, `misi`, `user_id`, `admin_id`) VALUES
(1, 'Tugas dan fungsi Dinas Komunikasi dan Informatika Kabupaten Indramayu telah diatur dalam Peraturan Bupati Indramayu Nomor 48 tahun 2016 tentang Organisasi dan Tata Kerja Dinas Komunikasi dan Informatika  Kabupaten Indramayu. Dinas Komunikasi dan Informtika  Kabupaten Indramayu mempunyai tugas pokok melaksanakan urusan Pemerintahan yang menjadi Kewenangan Daerah  dan Tugas Pembantuan yang diberika kepada Daerah  di bidang Komunikasi dan Infornatika, Statistik dan Persandian. Sedangkan untuk menyelenggarakan tugas pokok tersebut, Komunikasi dan Informatika Kabupaten Indramayu mempunyai fungsi sebagai berikut:\r\n\r\nPerumusan kebijaksanaan teknis di bidang Komunikasi Informatika, Statistik dan Persandian ;\r\nPelaksanaan Kebijakan di bidang Komunikasi dan Informatika, Statistik, dan Persandian ;\r\nPelaksanaan Evaluasi dan Pelaporan di Bidang Komunikasi dan Informatika, Statistik dan Persandian ;\r\nPelaksanaan administrasi Dinas di Bidang Komunikasi dan Informatika, Statistik dan Persandian ;\r\nPelaksanaan Pengelolaan UPT ;\r\nPelaksanaan Fungsi lain yang diberikan oleh Bupati terkait dengan tugas dan fungsinya.', '“TERWUJUDNYA masyarakat informasi melalui Teknologi Informasi dan Komunikasi menuju Indramayu E-Govermment”12345', '1. Meningkatkan pelayanan dan aksebiltas informasi;\r\n2. Meningkatkan kerjasama dan kemitraaan dengan dunia usaha, lembaga pemerintahan dan masyarakat dalam pengembangan TIK;\r\n3. Meningkatkan sarana dan prasarana infrasruktur dan jaringan Komunikasi dan Informatika;\r\n4. Meningkatkan informasi pelayanan publik;\r\n5. Meningkatkan data/informasi statistik Daerah;\r\n6. Meningkatkan Sarana dan Prasarana Persandian;\r\n7. Menguatkan perencanaan, pengkajian dan evaluasi pengembangan Komunikasi dan Informatika;\r\n8. Meningkatkan PAD sektor Komunikasi dan Informatika;', 1, 1),
(2, '', 'BERSIH, RELIGIUS, MAJU, ADIL, MAKMUR, HEBAT', 'Mewujudkan Tata Kelola Pemerintahan Yang Melayani, Melindungi, Bersih, Bebas Korupsi,Kolusi.Nepotisme, Transparan, Akuntabel, Profesional Dandemokratis, Dengan 3 (Tiga) Program Prioritas, Yaitu : Peningkatan Sarana Dan Prasarana Aparatur, Peningkatan Kapasitas Sumber Daya Aparatur dan Pembinaan Dan Pengawasan Penyelenggaraan Pemerintahan Daerah.', 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `no_telepon` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `no_telepon`, `email`, `password`, `image`, `created_at`, `admin_id`) VALUES
(1, 'diskominfo', '', 'diskominfo@gmail.com', 'admindiskominfo', '', '2023-08-01', 1),
(2, 'dinkes', '', 'dinkes@gmail.com', 'admindinkes', '', '2023-08-04', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` varchar(300) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `judul`, `isi`, `gambar`, `user_id`, `admin_id`) VALUES
(2, '', '', '', 1, 1),
(7, '', '', '', 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas`
--

CREATE TABLE `identitas` (
  `id` int(11) NOT NULL,
  `judul_website` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `identitas`
--

INSERT INTO `identitas` (`id`, `judul_website`, `alamat`, `provinsi`, `email`, `no_telepon`, `user_id`, `admin_id`) VALUES
(3, 'Dinkes', 'SINDANG', 'JAWABARAT', 'qwert@gmail.com', '12345', 2, 2),
(5, 'DISKOMINFO', 'Sindang', 'Jawabarat', 'diskominfo@gmail.com', '12345', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `isi` varchar(10000) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `judul`, `isi`, `gambar`, `user_id`, `admin_id`) VALUES
(1, 'Pembakab indramayu, Turunkan alat berat tutup akses proyek pertamina yang mambandel', 'DISKOMINFO INDRAMAYU – Pemkab Indramayu melalui Satuan Polisi Pamong Praja (Satpol PP) bersikap tegas dengan membongkar akses jalan menuju proyek eksplorasi East Akasia Cinta (EAC) di Desa Pondoh, Kecamatan Juntinyuat.  Pembongkaran dilakukan menggunakan alat berat yang didatangkan khusus. Langkah tegas dilakukan karena Pemkab Indramayu menilai PT Pertamina EP membandel. Pemkab juga menganggap proyek eksplorasi EAC 001 Desa Pondoh belum mengantongi izin resmi.  Pembongkaran akses jalan dikawal ketat petugas Satpol PP serta didampingi dinas teknis terkait. Diantara dinas yang diturunkan yakni Dinas PUPR dan Dinas Ketahanan Pangan dan Pertanian serta Camat Juntinyuat.  Kepala Satpol PP dan Pemadam Kebakaran Kabupaten Indramayu, Teguh Budiarso didampingi Camat Juntinyuat, Asep Kusdianti, menjelaskan, pembongkaran akses sumur eksplorasi terpaksa dilakukan karena PT Pertamina EP dianggap membandel.  Beberapa kali diperingatkan agar menyelesaikan kewajiban perizinan tidak digubris. Paling krusial, kata Teguh, yakni soal wajib adanya lahan sawah pengganti konsekuensi dari penggunaan lahan pertanian yang saat ini dijadikan lokasi eksplorasi.  “Ini perintah Undang-undang nomor 41 tahun 2009 tentang Perlindungan Lahan Pertanian Pangan Berkelanjutan (LP2B) dan Perda nomor 16 tahun 2013 juga tentang LP2B. Prinsipnya, kami tidak menghalangi proyek nasional, sepanjang seluruh regulasi dan aturan terpenuhi,” kata Teguh.  Sementara itu, sejauh ini belum ada keterangan resmi dari PT Pertamina EP soal adanya penutupan kegiatan proyek eksplorasi di Desa Pondoh tersebut.  Sekadar informasi, LP2B di Kabupaten Indramayu sesuai dengan Perda nomor 16 tahun 2013 adalah lahan yang dijadikan penopang program ketahanan pangan Kabupaten Indramayu dan nasional. Oleh karenanya, Pemkab Indramayu berkewajiban melindungi lahan tersebut.  Jika terpaksa digunakan untuk kegiatan atau kepentingan tertentu, maka harus diadakan lahan pengganti agar luasan LP2B tetap sama. Data yang tercatat kuasa LP2B di Kabupaten Indramayu mencapai 84.684 hektare.  “Kabupaten Indramayu tetap berkomitmen untuk mendukung swasembada beras untuk mendukung program nasional, sesuai perintah Presiden Joko Widodo kepada kami,” tukas Bupati Indramayu, Nina Agustina, beberapa waktu lalu. (Aa Deni/Diskominfo)', 'IMG-20230825-WA00171.jpg', 1, 1),
(4, 'pemcam indramayu bersama polres indramayu resmikan kampung bebas narkoba123', 'DISKOMINFO INDRAMAYU – Pemerintah Kecamatan Indramayu bersama dengan Polres Indramayu meresmikan kampung bebas narkoba yang berada di Kelurahan Lemah Mekar, Kecamatan Indramayu, Rabu (23/8/2023).  Peresmian kampung bebas narkoba dihadiri Camat Indramayu, Indra Mulyana, Kasatresnarkoba Polres Indramayu, AKP. Otong Jubaedi, Kapolsek Indramayu, AKP. Suhendi, Danramil 1601 Indramayu, Kapten Inf. Disman, Lurah Lemah Mekar, Dodi Supardi, dan Analis Pemberdayaan Masyarakat BNN Kota Cirebon, Rengga Renata.  Kemudian, turut hadir pula UPTD/B wilayah Kecamatan Indramayu, Kuwu dan Lurah se Kecamatan Indramayu, Ketua RT dan RW se-Kelurahan Lemah Mekar, serta karang taruna, tokoh agama, tokoh pemuda dan tokoh masyarakat Kelurahan Lemah Mekar.  Kasatresnarkoba Polres Indramayu, AKP. Otong Jubaedi menyampaikan, pencanangan kampung bebas narkoba merupakan upaya dalam rangka mencegah dan memberantas peredaran serta penyalahgunaan narkoba yang sangat merugikan dan membahayakan masyarakat.  Lebih lanjut Otong, tanggung jawab pemberantasan narkoba tidak hanya berada pada ranah pemerintah dan aparat penegak hukum, melainkan pula menjadi tanggung jawab bersama berbagai pihak.  Melalui kampung bebas narkoba diberharap, pelibatan masyarakat serta komponen lintas sektoral dapat meningkat sehingga Pencegahan, Pemberantasan, Penyalahgunaan dan Peredaran Gelap Narkotika (P4GN) dapat berjalan secara optimal.  “Semoga dengan hadirnya kampung bebas narkoba ini dapat menurunkan tingkat kerawanan penyalahgunaan narkoba. Nanti kita akan sebarkan informasi melalui banner, spanduk, poster, reklame maupun brosur serta penyuluhan tentang bahaya narkoba sebagai tindakan preventif,” ungkapnya.  Sementara itu Camat Indramayu, Indra Mulyana, menyambut baik dengan adanya peresmian dan deklarasi kampung bebas narkoba. Menurutnya upaya preventif pencegahan peredaran narkoba di setiap lingkungan harus makin gencar dilaksanakan.  “Pencegahan ini memang sepatutnya dilakukan dari bawah mulai dari lingkungan tingkat RT hingga secara bertahap dan menyeluruh yang melibatkan setiap warga, sehingga tidak hanya mengandalkan dari pihak kepolisian, TNI ataupun aparat pemerintahan lainnya,” tuturnya.  Indra menambahkan, pihaknya beserta dengan Bhabinkamtimbas secara rutin melakukan sosialisasi terhadap masyarakat terkait pencegahan dan penyalahgunaan narkoba tersebut.  Namun demikian, Indra merasa upaya tersebut belum cukup, sehingga melalui kampung bebas narkoba tersebut dirinya berharap masyarakat dapat lebih proaktif menyikapi permasalahan narkoba sehingga keluarga hebat, sehat dan bermartabat tanpa narkoba dapat terwujud.  “Semoga kampung bebas narkoba ini menjadi awalan berdirinya kampung-kampung bebas narkoba di wilayah lain di Kecamatan Indramayu dan khususnya di Kabupaten Indramayu. Butuh semangat dan komitmen semua pihak dalam memberantas narkoba,” pungkasnya.  Dalam kesempatan tersebut Camat Indra Mulyana juga memberikan santunan kepada beberapa anak yatim piatu yang ada lingkungan Kelurahan Lemah Mekar. (FKR/MTQ—Tim Publikasi Diskominfo Indramayu)', '', 1, 1),
(10, 'a1', 'ss1', '42.png', 2, 2),
(11, 's', 'x', '1222.png', 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `pesan` text NOT NULL,
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `jabatan`, `gambar`, `admin_id`, `user_id`) VALUES
(1, 'a1', 'qa', 'diskominfo2.png', 1, 1),
(2, 'aa', 'a', '', 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `update_at` date NOT NULL,
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `update_at`, `admin_id`, `user_id`) VALUES
(1, 'diskominfo', '0000-00-00', '0000-00-00', 1, 1),
(2, 'dinkes', '0000-00-00', '0000-00-00', 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `slide`
--

CREATE TABLE `slide` (
  `id_gambar` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `slide`
--

INSERT INTO `slide` (`id_gambar`, `gambar`, `user_id`, `admin_id`) VALUES
(1, '357514468_664755635692004_6456218678587617106_n.jpg', 1, 1),
(2, 'imyu6.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `struktur`
--

CREATE TABLE `struktur` (
  `id_gambar` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `struktur`
--

INSERT INTO `struktur` (`id_gambar`, `gambar`, `user_id`, `admin_id`) VALUES
(4, 'struktur.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `email_verified_at` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `remember` date NOT NULL,
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember`, `admin_id`, `user_id`) VALUES
(1, 'diskominfo', 'diskominfo@gmail.com', 'admindiskominfo', '', 'admin123', '0000-00-00', 1, 1),
(2, 'dinkes', 'dinkes@gmail.com', 'admindinkes', '', 'admin456', '0000-00-00', 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indeks untuk tabel `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indeks untuk tabel `struktur`
--
ALTER TABLE `struktur`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `struktur`
--
ALTER TABLE `struktur`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
