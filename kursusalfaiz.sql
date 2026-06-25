-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2026 at 07:18 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kursusalfaiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `judul`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Sukses UTBK SNBT bersama Al Faiz', 'Belajar gratis dengan materi terstruktur standar UTBK SNBT terbaru.', 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=1200&auto=format&fit=crop&q=80', '2026-06-23 15:36:51', '2026-06-23 15:36:51'),
(2, 'Lolos SKD Sekolah Kedinasan & CPNS', 'Materi TIU, TWK, dan TKP ter-update dibahas secara tuntas.', 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?w=1200&auto=format&fit=crop&q=80', '2026-06-23 15:36:51', '2026-06-23 15:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nama_kategori`, `slug`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'UTBK', 'utbk', 'fa-graduation-cap', '2026-06-23 15:36:51', '2026-06-23 15:36:51'),
(2, 'SKD Kedinasan', 'skd', 'fa-shield-halved', '2026-06-23 15:36:51', '2026-06-23 15:36:51'),
(3, 'CPNS', 'cpns', 'fa-user-tie', '2026-06-23 15:36:51', '2026-06-23 15:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL COMMENT 'Digunakan untuk reply/balasan komentar',
  `komentar` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `status` enum('aktif','non-aktif') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `category_id`, `judul`, `slug`, `thumbnail`, `deskripsi`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Penalaran Umum UTBK', 'penalaran-umum', 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=600&auto=format&fit=crop&q=60', 'Materi dan strategi menjawab soal Penalaran Umum UTBK SNBT secara cepat dan tepat.\r\n\r\nKelas ini dirancang khusus untuk memberikan wawasan mendalam mengenai materi yang diujikan dalam seleksi. Melalui pembahasan soal HOTS (Higher Order Thinking Skills), pengerjaan modul terstruktur, dan trik pengerjaan cepat ala Al Faiz, peluang kelulusan Anda akan meningkat pesat.', 'aktif', '2026-06-23 15:36:51', '2026-06-24 06:29:05'),
(2, 2, 'TIU SKD Kedinasan', 'tiu-skd', 'https://images.unsplash.com/photo-1506784983877-45594efa4cbe?w=600&auto=format&fit=crop&q=60', 'Pembahasan lengkap Tes Intelegensia Umum (TIU) untuk Seleksi Kompetensi Dasar Sekolah Kedinasan.', 'aktif', '2026-06-23 15:36:51', '2026-06-24 08:46:40'),
(11, 1, 'Pengetahuan Kuantitatif', 'pengetahuan-kuantitatif', 'https://images.unsplash.com/photo-1509228468518-180dd4864904?w=600&auto=format&fit=crop&q=60', 'Kumpulan konsep matematika dasar, logika aritmatika, dan pemecahan masalah kuantitatif.', 'aktif', '2026-06-24 04:55:01', '2026-06-24 09:55:01'),
(12, 1, 'Penalaran Matematika', 'penalaran-matematika', 'https://images.unsplash.com/photo-1635070041078-e363dbe005cb?w=600&auto=format&fit=crop&q=60', 'Analisis data, peluang, dan pemecahan kasus kontekstual menggunakan matematika.', 'aktif', '2026-06-24 05:07:35', '2026-06-24 10:07:35'),
(13, 2, 'Tes Wawasan Kebangsaan (TWK) SKD', 'tes-wawasan-kebangsaan-twk-skd', 'https://images.unsplash.com/photo-1493612276216-ee3925520721?w=600&auto=format&fit=crop&q=60', 'Penguasaan materi Pancasila, UUD 1945, Bhinneka Tunggal Ika, dan NKRI.', 'aktif', '2026-06-24 05:08:34', '2026-06-24 10:10:06'),
(14, 2, 'Tes Inteligensia Umum (TIU) SKD', 'tes-inteligensia-umum-tiu-skd', 'https://images.unsplash.com/photo-1506784983877-45594efa4cbe?w=600&auto=format&fit=crop&q=60', 'Kemampuan verbal, numerik, dan figural untuk SKD Sekolah Kedinasan.', 'aktif', '2026-06-24 05:09:01', '2026-06-24 10:10:02'),
(15, 3, 'Kupas Tuntas TIU CPNS 2026', 'kupas-tuntas-tiu-cpns-2026', 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=600&auto=format&fit=crop&q=60', 'Persiapan intensif Tes Inteligensia Umum CPNS dengan metode pengerjaan kilat.', 'aktif', '2026-06-24 05:09:22', '2026-06-24 10:10:12'),
(16, 1, 'Literasi Bahasa Inggris UTBK', 'literasi-bahasa-inggris-utbk', 'https://images.unsplash.com/photo-1546410531-bb4caa6b424d?w=600&auto=format&fit=crop&q=60', 'Pemahaman teks bacaan, grammar kontekstual, dan kosakata untuk materi Bahasa Inggris UTBK.', 'aktif', '2026-06-24 10:37:57', '2026-06-24 10:37:57'),
(17, 1, 'Literasi Bahasa Indonesia UTBK', 'literasi-bahasa-indonesia-utbk', 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=600&auto=format&fit=crop&q=60', 'Teknik menganalisis gagasan utama, kesimpulan paragraf, dan struktur teks Bahasa Indonesia.', 'aktif', '2026-06-24 10:37:57', '2026-06-24 10:37:57'),
(18, 2, 'Tes Karakteristik Pribadi (TKP) SKD', 'tkp-skd-kedinasan', 'https://images.unsplash.com/photo-1513258496099-48168024aec0?w=600&auto=format&fit=crop&q=60', 'Strategi menjawab soal aspek pelayanan publik, jejaring kerja, sosial budaya, dan profesionalisme.', 'aktif', '2026-06-24 10:37:57', '2026-06-24 10:37:57'),
(19, 3, 'Kupas Tuntas TWK CPNS 2026', 'twk-cpns-2026', 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=600&auto=format&fit=crop&q=60', 'Penguasaan materi integritas, nasionalisme, bela negara, dan pilar negara untuk seleksi CPNS.', 'aktif', '2026-06-24 10:37:57', '2026-06-24 10:37:57'),
(20, 3, 'Kupas Tuntas TKP CPNS 2026', 'tkp-cpns-2026', 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=600&auto=format&fit=crop&q=60', 'Latihan soal karakteristik kepribadian dengan bobot skor 5 untuk poin tertinggi seleksi CPNS.', 'aktif', '2026-06-24 10:37:57', '2026-06-24 10:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `course_progress`
--

CREATE TABLE `course_progress` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `progress` decimal(5,2) NOT NULL DEFAULT 0.00 COMMENT 'Persentase penyelesaian course (0 - 100)',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_progress`
--

INSERT INTO `course_progress` (`id`, `user_id`, `course_id`, `progress`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 0.00, '2026-06-24 10:55:46', '2026-06-24 10:57:29'),
(2, 2, 19, 0.00, '2026-06-24 10:57:50', '2026-06-24 10:57:54'),
(3, 2, 17, 10.00, '2026-06-24 11:45:22', '2026-06-24 11:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `pertanyaan`, `jawaban`, `created_at`, `updated_at`) VALUES
(1, 'Apakah seluruh pembelajaran di Al Faiz benar-benar gratis?', 'Ya, betul sekali. Visi utama Al Faiz adalah menyediakan akses pembelajaran berkualitas secara gratis untuk seluruh pejuang UTBK, SKD, dan CPNS di Indonesia.', '2026-06-23 15:36:51', '2026-06-23 15:36:51'),
(2, 'Bagaimana cara mendownload modul materi PDF?', 'Kamu harus mendaftar dan masuk (login) ke dalam akun terlebih dahulu. Setelah itu, buka pelajaran (lesson) yang kamu tuju, dan link download PDF akan aktif di bawah video pembelajaran.', '2026-06-23 15:36:51', '2026-06-23 15:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `last_access` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `video_youtube` varchar(50) DEFAULT NULL COMMENT 'YouTube Video ID',
  `pdf` varchar(255) DEFAULT NULL COMMENT 'Filepath to PDF resource',
  `urutan` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `course_id`, `judul`, `slug`, `deskripsi`, `video_youtube`, `pdf`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pengantar Penalaran Logis & Silogisme', 'penalaran-umum-utbk-pengantar-penalaran-logis-silogisme', 'Materi ini membahas konsep dasar logika deduktif, induktif, serta penyelesaian praktis soal-soal silogisme.', 'ewFcYSSweuY', 'uploads/pdf/modul_pengantar_silogisme.pdf', 1, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(2, 1, 'Logika Analitik & Pola Posisi Duduk', 'penalaran-umum-utbk-logika-analitik-pola-posisi-duduk', 'Pembahasan trik mengurutkan dan memposisikan objek berdasarkan syarat batas yang diberikan pada teks.', 'PWxH10VkGvQ', 'uploads/pdf/modul_logika_analitik.pdf', 2, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(3, 1, 'Analisis Pernyataan Benar/Salah dari Teks', 'penalaran-umum-utbk-analisis-pernyataan-benar-salah-dari-teks', 'Melatih ketelitian membaca teks panjang untuk memverifikasi kebenaran opsi pernyataan di UTBK.', 'VtR_bRRPFsc', 'uploads/pdf/modul_analisis_teks.pdf', 3, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(4, 1, 'Penarikan Kesimpulan Modus Ponens, Tollens, & Silogisme', 'penalaran-umum-utbk-penarikan-kesimpulan-modus-ponens-tollens-silogisme', 'Kupas tuntas aturan penarikan kesimpulan logis formal matematika beserta jebakan-jebakannya.', '7PswKezaVrI', 'uploads/pdf/modul_penarikan_kesimpulan.pdf', 4, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(5, 1, 'Penalaran Kuantitatif Dasar & Pola Barisan', 'penalaran-umum-utbk-penalaran-kuantitatif-dasar-pola-barisan', 'Memahami operasi bilangan sederhana, perbandingan nilai, dan deret aritmetika/geometri dalam Penalaran Umum.', 'Gy-PaJN2oAo', 'uploads/pdf/modul_penalaran_kuantitatif.pdf', 5, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(6, 1, 'Interpretasi Grafik, Tabel, & Diagram Data', 'penalaran-umum-utbk-interpretasi-grafik-tabel-diagram-data', 'Menganalisis tren naik-turun dan perbandingan persentase pada data visual statistik.', 'OhpPtKZ702I', 'uploads/pdf/modul_interpretasi_data.pdf', 6, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(7, 1, 'Logika Himpunan & Aplikasi Diagram Venn', 'penalaran-umum-utbk-logika-himpunan-aplikasi-diagram-venn', 'Penyelesaian kasus irisan, gabungan, dan selisih himpunan dalam soal cerita logika.', 'ewFcYSSweuY', 'uploads/pdf/modul_logika_himpunan.pdf', 7, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(8, 1, 'Analisis Pola Gambar (Figural)', 'penalaran-umum-utbk-analisis-pola-gambar-figural', 'Menemukan pola rotasi, pencerminan, analogi, dan kelanjutan barisan gambar visual.', '7PswKezaVrI', 'uploads/pdf/modul_figural_spasial.pdf', 8, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(9, 1, 'Pemecahan Masalah Logika Kompleks', 'penalaran-umum-utbk-pemecahan-masalah-logika-kompleks', 'Studi kasus gabungan beberapa teknik penalaran untuk menyelesaikan soal-soal HOTS.', 'Gy-PaJN2oAo', 'uploads/pdf/modul_soal_hots_logika.pdf', 9, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(10, 1, 'Latihan Soal Campuran & Simulasi PU', 'penalaran-umum-utbk-latihan-soal-campuran-simulasi-pu', 'Latihan simulasi pengerjaan paket soal Penalaran Umum dengan pembatasan waktu ala UTBK asli.', 'ewFcYSSweuY', 'uploads/pdf/modul_simulasi_latihan_pu.pdf', 10, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(11, 2, 'Pengantar TIU Kedinasan & Strategi Lulus', 'tiu-skd-kedinasan-pengantar-tiu-kedinasan-strategi-lulus', 'Penjelasan umum format ujian TIU, pembagian waktu, dan pola soal yang paling sering keluar.', 'U7nwPRLVSRA', 'uploads/pdf/modul_pengantar_silogisme.pdf', 1, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(12, 2, 'Kemampuan Verbal: Analogi Kata & Hubungan Fungsi', 'tiu-skd-kedinasan-kemampuan-verbal-analogi-kata-hubungan-fungsi', 'Strategi menemukan padanan hubungan kata yang tepat dan menghindari distractor pilihan ganda.', 'N1WsZnohr-E', 'uploads/pdf/modul_logika_analitik.pdf', 2, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(13, 2, 'Kemampuan Verbal: Silogisme & Logika Posisi', 'tiu-skd-kedinasan-kemampuan-verbal-silogisme-logika-posisi', 'Latihan menyimpulkan premis-premis dan memecahkan soal cerita analisis susunan.', 'OhpPtKZ702I', 'uploads/pdf/modul_analisis_teks.pdf', 3, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(14, 2, 'Kemampuan Numerik: Deret Angka & Pola Barisan Bilangan', 'tiu-skd-kedinasan-kemampuan-numerik-deret-angka-pola-barisan-bilangan', 'Mengidentifikasi pola deret matematika bertingkat, larik banyak, dan pola kombinasi.', '7PswKezaVrI', 'uploads/pdf/modul_penarikan_kesimpulan.pdf', 4, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(15, 2, 'Aritmetika Sosial: Untung, Rugi, Bunga, & Diskon', 'tiu-skd-kedinasan-aritmetika-sosial-untung-rugi-bunga-diskon', 'Rumus cepat menghitung persentase keuntungan, kerugian, bunga bank, dan diskon bertingkat.', 'N1WsZnohr-E', 'uploads/pdf/modul_penalaran_kuantitatif.pdf', 5, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(16, 2, 'Perbandingan Kuantitatif: Senilai & Berbalik Nilai', 'tiu-skd-kedinasan-perbandingan-kuantitatif-senilai-berbalik-nilai', 'Memecahkan masalah perbandingan tarif kerja, konsumsi bahan bakar, skala, dan peta.', 'Gy-PaJN2oAo', 'uploads/pdf/modul_interpretasi_data.pdf', 6, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(17, 2, 'Soal Cerita Persamaan & Pertidaksamaan Linear', 'tiu-skd-kedinasan-soal-cerita-persamaan-pertidaksamaan-linear', 'Mengubah kalimat sehari-hari menjadi model matematika dan menyelesaikan nilai variabel.', 'ewFcYSSweuY', 'uploads/pdf/modul_logika_himpunan.pdf', 7, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(18, 2, 'Kemampuan Figural: Analogi, Klasifikasi, & Serial Gambar', 'tiu-skd-kedinasan-kemampuan-figural-analogi-klasifikasi-serial-gambar', 'Menguasai analisis spasial 2D untuk memecahkan deret gambar dan perbedaan visual.', 'U7nwPRLVSRA', 'uploads/pdf/modul_figural_spasial.pdf', 8, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(19, 2, 'Analisis Kecepatan, Jarak, Waktu, & Kerja Bersama', 'tiu-skd-kedinasan-analisis-kecepatan-jarak-waktu-kerja-bersama', 'Cara cepat menghitung waktu menyusul, berpapasan, dan durasi kerja kelompok menyelesaikan proyek.', 'Gy-PaJN2oAo', 'uploads/pdf/modul_soal_hots_logika.pdf', 9, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(20, 2, 'Try Out & Pembahasan Soal Asli TIU Kedinasan', 'tiu-skd-kedinasan-try-out-pembahasan-soal-asli-tiu-kedinasan', 'Simulasi try out mandiri materi TIU Kedinasan lengkap dengan pembahasan trik cepat.', 'VtR_bRRPFsc', 'uploads/pdf/modul_simulasi_latihan_pu.pdf', 10, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(21, 11, 'Sistem Bilangan Riil & Operasi Hitung Campuran', 'pengetahuan-kuantitatif-sistem-bilangan-riil-operasi-hitung-campuran', 'Pemahaman sifat bilangan prima, genap-ganjil, pecahan, desimal, serta prioritas operasi matematika.', 'N1WsZnohr-E', 'uploads/pdf/modul_pengantar_silogisme.pdf', 1, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(22, 11, 'Persamaan & Fungsi Kuadrat Lanjutan', 'pengetahuan-kuantitatif-persamaan-fungsi-kuadrat-lanjutan', 'Menentukan akar-akar persamaan kuadrat, sifat diskriminan, dan menggambar grafik parabola.', 'fqqQ7c1va88', 'uploads/pdf/modul_logika_analitik.pdf', 2, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(23, 11, 'Sistem Persamaan Linear Dua & Tiga Variabel (SPLDV & SPLTV)', 'pengetahuan-kuantitatif-sistem-persamaan-linear-dua-tiga-variabel-spldv-spltv', 'Metode eliminasi-substitusi super cepat dan pemodelan aljabar untuk soal UTBK.', 'U7nwPRLVSRA', 'uploads/pdf/modul_analisis_teks.pdf', 3, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(24, 11, 'Teori Peluang & Aturan Pencacahan', 'pengetahuan-kuantitatif-teori-peluang-aturan-pencacahan', 'Konsep permutasi, kombinasi, aturan perkalian/penambahan, dan peluang kejadian bersyarat.', 'unhQJhnYpH4', 'uploads/pdf/modul_penarikan_kesimpulan.pdf', 4, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(25, 11, 'Statistika Deskriptif: Mean, Median, Modus, & Kuartil', 'pengetahuan-kuantitatif-statistika-deskriptif-mean-median-modus-kuartil', 'Pengukuran pemusatan data tunggal dan data kelompok beserta penyebaran data.', 'j5oA41KFdL8', 'uploads/pdf/modul_penalaran_kuantitatif.pdf', 5, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(26, 11, 'Geometri Bidang Datar: Segitiga & Lingkaran', 'pengetahuan-kuantitatif-geometri-bidang-datar-segitiga-lingkaran', 'Menghitung luas, keliling, kesebangunan, kekongruenan, teorema Pythagoras, dan sudut lingkaran.', 'PWxH10VkGvQ', 'uploads/pdf/modul_interpretasi_data.pdf', 6, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(27, 11, 'Geometri Ruang: Volume & Luas Permukaan', 'pengetahuan-kuantitatif-geometri-ruang-volume-luas-permukaan', 'Rumus dan penerapan dimensi tiga pada kubus, balok, tabung, kerucut, dan bola.', 'ewFcYSSweuY', 'uploads/pdf/modul_logika_himpunan.pdf', 7, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(28, 11, 'Fungsi Komposisi & Fungsi Invers', 'pengetahuan-kuantitatif-fungsi-komposisi-fungsi-invers', 'Operasi aljabar fungsi gabungan dan mencari fungsi kebalikan secara terstruktur.', 'N1WsZnohr-E', 'uploads/pdf/modul_figural_spasial.pdf', 8, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(29, 11, 'Eksponen, Logaritma, & Pertidaksamaan Nilai Mutlak', 'pengetahuan-kuantitatif-eksponen-logaritma-pertidaksamaan-nilai-mutlak', 'Menyelesaikan persamaan eksponen logaritma serta interval penyelesaian pertidaksamaan.', 'j5oA41KFdL8', 'uploads/pdf/modul_soal_hots_logika.pdf', 9, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(30, 11, 'Pembahasan Paket Soal PK UTBK Terkini', 'pengetahuan-kuantitatif-pembahasan-paket-soal-pk-utbk-terkini', 'Kumpulan soal HOTS Pengetahuan Kuantitatif tahun-tahun terakhir beserta solusinya.', 'U7nwPRLVSRA', 'uploads/pdf/modul_simulasi_latihan_pu.pdf', 10, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(31, 12, 'Konsep Pemodelan Matematika Realistis', 'penalaran-matematika-konsep-pemodelan-matematika-realistis', 'Menerjemahkan narasi kontekstual panjang ke dalam sistem persamaan matematika.', 'N1WsZnohr-E', 'uploads/pdf/modul_pengantar_silogisme.pdf', 1, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(32, 12, 'Masalah Keuangan & Aritmetika Sosial Lanjutan', 'penalaran-matematika-masalah-keuangan-aritmetika-sosial-lanjutan', 'Analisis studi kasus laba rugi bisnis, bunga majemuk, inflasi, dan angsuran pinjaman.', 'PWxH10VkGvQ', 'uploads/pdf/modul_logika_analitik.pdf', 2, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(33, 12, 'Analisis Data Statistik dalam Pengambilan Keputusan', 'penalaran-matematika-analisis-data-statistik-dalam-pengambilan-keputusan', 'Membaca data riil di lapangan (sensus, riset) untuk menyimpulkan probabilitas kesuksesan.', 'VtR_bRRPFsc', 'uploads/pdf/modul_analisis_teks.pdf', 3, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(34, 12, 'Logika Matematika dalam Studi Kasus', 'penalaran-matematika-logika-matematika-dalam-studi-kasus', 'Penerapan tabel kebenaran dan kesimpulan matematis dalam menganalisis argumen publik.', 'ewFcYSSweuY', 'uploads/pdf/modul_penarikan_kesimpulan.pdf', 4, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(35, 12, 'Optimasi Linear & Program Linear Sederhana', 'penalaran-matematika-optimasi-linear-program-linear-sederhana', 'Menentukan nilai maksimum dan minimum keuntungan dari batasan sumber daya tertentu.', 'OhpPtKZ702I', 'uploads/pdf/modul_penalaran_kuantitatif.pdf', 5, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(36, 12, 'Masalah Pertumbuhan & Peluruhan Populasi', 'penalaran-matematika-masalah-pertumbuhan-peluruhan-populasi', 'Memodelkan pertumbuhan bakteri atau peluruhan zat radioaktif menggunakan rumus eksponensial.', 'N1WsZnohr-E', 'uploads/pdf/modul_interpretasi_data.pdf', 6, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(37, 12, 'Penerapan Trigonometri dalam Pengukuran Jarak', 'penalaran-matematika-penerapan-trigonometri-dalam-pengukuran-jarak', 'Menggunakan sudut elevasi dan depresi untuk mengukur tinggi gedung, pohon, atau lebar sungai.', 'ewFcYSSweuY', 'uploads/pdf/modul_logika_himpunan.pdf', 7, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(38, 12, 'Sistem Koordinat Kartesius & Geometri Analitis', 'penalaran-matematika-sistem-koordinat-kartesius-geometri-analitis', 'Menentukan persamaan garis, kemiringan (gradien), jarak dua titik, dan titik potong.', 'OhpPtKZ702I', 'uploads/pdf/modul_figural_spasial.pdf', 8, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(39, 12, 'Limit, Turunan, & Aplikasi Maksimum/Minimum', 'penalaran-matematika-limit-turunan-aplikasi-maksimum-minimum', 'Menemukan titik stasioner dan laju perubahan suatu fungsi dalam konteks fisika/ekonomi.', 'Gy-PaJN2oAo', 'uploads/pdf/modul_soal_hots_logika.pdf', 9, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(40, 12, 'Simulasi Soal Cerita Penalaran Matematika UTBK', 'penalaran-matematika-simulasi-soal-cerita-penalaran-matematika-utbk', 'Latihan intensif memecahkan soal cerita multi-konsep Penalaran Matematika.', 'U7nwPRLVSRA', 'uploads/pdf/modul_simulasi_latihan_pu.pdf', 10, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(41, 13, 'Pancasila sebagai Ideologi & Dasar Negara', 'tes-wawasan-kebangsaan-twk-skd-pancasila-sebagai-ideologi-dasar-negara', 'Memahami kedudukan, fungsi, sejarah perumusan, dan butir-butir Pancasila beserta penerapannya.', '7PswKezaVrI', 'uploads/pdf/modul_pengantar_silogisme.pdf', 1, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(42, 13, 'UUD 1945: Sejarah Amandemen & Pasal-Pasal Krusial', 'tes-wawasan-kebangsaan-twk-skd-uud-1945-sejarah-amandemen-pasal-pasal-krusial', 'Studi mendalam pasal UUD 1945 sebelum dan sesudah amandemen, serta sistem ketatanegaraan.', 'VtR_bRRPFsc', 'uploads/pdf/modul_logika_analitik.pdf', 2, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(43, 13, 'Bhinneka Tunggal Ika: Sejarah & Integrasi Nasional', 'tes-wawasan-kebangsaan-twk-skd-bhinneka-tunggal-ika-sejarah-integrasi-nasional', 'Mempelajari sejarah persatuan bangsa, ancaman disintegrasi, dan cara merawat toleransi.', '7PswKezaVrI', 'uploads/pdf/modul_analisis_teks.pdf', 3, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(44, 13, 'NKRI: Sistem Pemerintahan & Lembaga Negara', 'tes-wawasan-kebangsaan-twk-skd-nkri-sistem-pemerintahan-lembaga-negara', 'Struktur kekuasaan legislatif, eksekutif, yudikatif, serta otonomi daerah di Indonesia.', 'PWxH10VkGvQ', 'uploads/pdf/modul_penarikan_kesimpulan.pdf', 4, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(45, 13, 'Nasionalisme: Konsep, Sejarah, & Implementasi', 'tes-wawasan-kebangsaan-twk-skd-nasionalisme-konsep-sejarah-implementasi', 'Bagaimana menumbuhkan cinta tanah air, sejarah sumpah pemuda, dan bela negara sejak pra-kemerdekaan.', 'N1WsZnohr-E', 'uploads/pdf/modul_penalaran_kuantitatif.pdf', 5, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(46, 13, 'Integritas: Nilai Kejujuran & Pemberantasan Korupsi', 'tes-wawasan-kebangsaan-twk-skd-integritas-nilai-kejujuran-pemberantasan-korupsi', 'Korelasi integritas pribadi aparatur sipil negara dengan pencegahan korupsi di lingkungan birokrasi.', 'ewFcYSSweuY', 'uploads/pdf/modul_interpretasi_data.pdf', 6, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(47, 13, 'Bela Negara: Hak, Kewajiban, & Isu Kontemporer', 'tes-wawasan-kebangsaan-twk-skd-bela-negara-hak-kewajiban-isu-kontemporer', 'Prinsip-prinsip bela negara dan perwujudannya dalam menghadapi tantangan modern (hoaks, cyber-threat).', 'OhpPtKZ702I', 'uploads/pdf/modul_logika_himpunan.pdf', 7, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(48, 13, 'Sejarah Perjuangan Bangsa & Diplomasi Indonesia', 'tes-wawasan-kebangsaan-twk-skd-sejarah-perjuangan-bangsa-diplomasi-indonesia', 'Perjuangan fisik dan perundingan politik penting pasca kemerdekaan (KMB, Linggarjati, Renville).', 'j5oA41KFdL8', 'uploads/pdf/modul_figural_spasial.pdf', 8, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(49, 13, 'Peran Indonesia dalam Hubungan Internasional', 'tes-wawasan-kebangsaan-twk-skd-peran-indonesia-dalam-hubungan-internasional', 'Konsep politik luar negeri bebas aktif dan peran aktif Indonesia di PBB, ASEAN, serta G20.', '7PswKezaVrI', 'uploads/pdf/modul_soal_hots_logika.pdf', 9, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(50, 13, 'Latihan Soal Analisis Studi Kasus TWK SKD', 'tes-wawasan-kebangsaan-twk-skd-latihan-soal-analisis-studi-kasus-twk-skd', 'Penyelesaian soal analisis TWK bernalar tinggi yang membutuhkan penalaran kritis kebangsaan.', 'j5oA41KFdL8', 'uploads/pdf/modul_simulasi_latihan_pu.pdf', 10, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(51, 14, 'Konsep Dasar TIU CPNS: Silogisme & Logika Posisi', 'tes-inteligensia-umum-tiu-skd-konsep-dasar-tiu-cpns-silogisme-logika-posisi', 'Aturan penarikan kesimpulan yang valid serta pemecahan teka-teki logika posisi.', 'PWxH10VkGvQ', 'uploads/pdf/modul_pengantar_silogisme.pdf', 1, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(52, 14, 'Analogi & Sinonim-Antonim dalam Tes Verbal', 'tes-inteligensia-umum-tiu-skd-analogi-sinonim-antonim-dalam-tes-verbal', 'Meningkatkan perbendaharaan kata ilmiah, hubungan semantik, dan analogi logika antar kata.', 'Gy-PaJN2oAo', 'uploads/pdf/modul_logika_analitik.pdf', 2, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(53, 14, 'Kecepatan Berhitung: Deret Angka & Pola Berulang', 'tes-inteligensia-umum-tiu-skd-kecepatan-berhitung-deret-angka-pola-berulang', 'Mengidentifikasi pola deret bilangan berpola fibonacci, kuadratik, atau aritmetika bertingkat.', 'unhQJhnYpH4', 'uploads/pdf/modul_analisis_teks.pdf', 3, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(54, 14, 'Aljabar Praktis: Sistem Persamaan & Rumus Cepat', 'tes-inteligensia-umum-tiu-skd-aljabar-praktis-sistem-persamaan-rumus-cepat', 'Trik hitung persamaan linier tanpa menghabiskan waktu coretan kertas.', 'U7nwPRLVSRA', 'uploads/pdf/modul_penarikan_kesimpulan.pdf', 4, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(55, 14, 'Soal Cerita Aritmetika: Jarak, Waktu, Kecepatan, Debit', 'tes-inteligensia-umum-tiu-skd-soal-cerita-aritmetika-jarak-waktu-kecepatan-debit', 'Memahami konsep menyusul, berpapasan, dan pengisian tangki air dengan beberapa keran.', 'ewFcYSSweuY', 'uploads/pdf/modul_penalaran_kuantitatif.pdf', 5, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(56, 14, 'Logika Figural: Pencerminan, Rotasi, & Deret Gambar', 'tes-inteligensia-umum-tiu-skd-logika-figural-pencerminan-rotasi-deret-gambar', 'Kemampuan spasial untuk menebak gambar selanjutnya atau menemukan gambar yang berbeda.', 'Gy-PaJN2oAo', 'uploads/pdf/modul_interpretasi_data.pdf', 6, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(57, 14, 'Perbandingan Nilai & Trik Skala Peta', 'tes-inteligensia-umum-tiu-skd-perbandingan-nilai-trik-skala-peta', 'Menghitung rasio proporsional, perbandingan usia, dan konversi dimensi peta/makat.', 'VtR_bRRPFsc', 'uploads/pdf/modul_logika_himpunan.pdf', 7, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(58, 14, 'Teori Himpunan & Pembagian Kelompok', 'tes-inteligensia-umum-tiu-skd-teori-himpunan-pembagian-kelompok', 'Kasus siswa yang menyukai beberapa pelajaran, pembagian tugas kelompok, dan irisan Venn.', 'Gy-PaJN2oAo', 'uploads/pdf/modul_figural_spasial.pdf', 8, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(59, 14, 'Statistika Sederhana & Analisis Rata-Rata Gabungan', 'tes-inteligensia-umum-tiu-skd-statistika-sederhana-analisis-rata-rata-gabungan', 'Menghitung rata-rata kelas jika ada siswa yang keluar, masuk, atau nilainya dikoreksi.', 'OhpPtKZ702I', 'uploads/pdf/modul_soal_hots_logika.pdf', 9, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(60, 14, 'Pembahasan Try Out TIU SKD Terlengkap', 'tes-inteligensia-umum-tiu-skd-pembahasan-try-out-tiu-skd-terlengkap', 'Review menyeluruh paket soal TIU standard nasional beserta analisis waktu pengerjaan.', 'fqqQ7c1va88', 'uploads/pdf/modul_simulasi_latihan_pu.pdf', 10, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(61, 15, 'Bedah Kisi-Kisi Terupdate TIU CPNS 2026', 'kupas-tuntas-tiu-cpns-2026-bedah-kisi-kisi-terupdate-tiu-cpns-2026', 'Analisis tren tipe soal baru yang berpotensi keluar di tes CPNS 2026.', 'OhpPtKZ702I', 'uploads/pdf/modul_pengantar_silogisme.pdf', 1, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(62, 15, 'Trik Cepat Operasi Hitung & Taksiran Nilai', 'kupas-tuntas-tiu-cpns-2026-trik-cepat-operasi-hitung-taksiran-nilai', 'Metode pembulatan cerdas dan eliminasi opsi jawaban untuk operasi desimal dan pecahan.', 'ewFcYSSweuY', 'uploads/pdf/modul_logika_analitik.pdf', 2, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(63, 15, 'Penalaran Logis: Penarikan Kesimpulan Kategori Sulit', 'kupas-tuntas-tiu-cpns-2026-penalaran-logis-penarikan-kesimpulan-kategori-sulit', 'Silogisme bersyarat dan silogisme kategoris yang memiliki premis negatif atau partikular.', 'U7nwPRLVSRA', 'uploads/pdf/modul_analisis_teks.pdf', 3, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(64, 15, 'Penalaran Analitis: Penjadwalan & Pengelompokan Data', 'kupas-tuntas-tiu-cpns-2026-penalaran-analitis-penjadwalan-pengelompokan-data', 'Logika kompleks untuk menjadwalkan pembicara seminar, antrean teller, atau tata letak rumah.', 'N1WsZnohr-E', 'uploads/pdf/modul_penarikan_kesimpulan.pdf', 4, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(65, 15, 'Deret Angka Huruf & Barisan Dua Larik Lanjutan', 'kupas-tuntas-tiu-cpns-2026-deret-angka-huruf-barisan-dua-larik-lanjutan', 'Menemukan pola deret huruf alfabet dan deret angka kombinasi matematika.', 'unhQJhnYpH4', 'uploads/pdf/modul_penalaran_kuantitatif.pdf', 5, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(66, 15, 'Aritmetika Sosial: Perhitungan Pajak, Zakat, & Investasi', 'kupas-tuntas-tiu-cpns-2026-aritmetika-sosial-perhitungan-pajak-zakat-investasi', 'Menghitung pajak penghasilan, zakat harta, bunga obligasi, dan keuntungan reksa dana.', 'unhQJhnYpH4', 'uploads/pdf/modul_interpretasi_data.pdf', 6, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(67, 15, 'Masalah Pekerja Bersama & Waktu Paruh', 'kupas-tuntas-tiu-cpns-2026-masalah-pekerja-bersama-waktu-paruh', 'Rumus khusus penyelesaian pengerjaan proyek oleh pekerja dengan produktivitas berbeda.', 'N1WsZnohr-E', 'uploads/pdf/modul_logika_himpunan.pdf', 7, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(68, 15, 'Figural Analogi 3D & Jaring-Jaring Kubus', 'kupas-tuntas-tiu-cpns-2026-figural-analogi-3d-jaring-jaring-kubus', 'Memvisualisasikan pelipatan kertas 2D menjadi bentuk kotak/kubus 3D di benak Anda.', 'ewFcYSSweuY', 'uploads/pdf/modul_figural_spasial.pdf', 8, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(69, 15, 'Perbandingan Kuantitatif Hubungan X dan Y', 'kupas-tuntas-tiu-cpns-2026-perbandingan-kuantitatif-hubungan-x-dan-y', 'Menentukan hubungan ukuran kuantitas X dan Y berdasarkan variabel matematis pembatas.', 'ewFcYSSweuY', 'uploads/pdf/modul_soal_hots_logika.pdf', 9, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(70, 15, 'Try Out Prediksi Kelulusan TIU CPNS 2026', 'kupas-tuntas-tiu-cpns-2026-try-out-prediksi-kelulusan-tiu-cpns-2026', 'Latihan soal ujian prediksi kelulusan dengan bobot soal setara ujian resmi.', 'VtR_bRRPFsc', 'uploads/pdf/modul_simulasi_latihan_pu.pdf', 10, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(71, 16, 'Reading Comprehension: Identifying Main Ideas & Topic Sentences', 'literasi-bahasa-inggris-utbk-reading-comprehension-identifying-main-ideas-topic-sentences', 'How to quickly identify the paragraph theme and author\'s core argument.', 'unhQJhnYpH4', 'uploads/pdf/modul_pengantar_silogisme.pdf', 1, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(72, 16, 'Understanding Text Structure & Author\'s Purpose', 'literasi-bahasa-inggris-utbk-understanding-text-structure-author-s-purpose', 'Analyzing expository, descriptive, and argumentative patterns in UTBK texts.', 'OhpPtKZ702I', 'uploads/pdf/modul_logika_analitik.pdf', 2, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(73, 16, 'Vocabulary in Context & Synonym Clues', 'literasi-bahasa-inggris-utbk-vocabulary-in-context-synonym-clues', 'Strategies for guessing unfamiliar words based on the surrounding sentence context.', '7PswKezaVrI', 'uploads/pdf/modul_analisis_teks.pdf', 3, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(74, 16, 'Tone and Attitude of the Author in Passages', 'literasi-bahasa-inggris-utbk-tone-and-attitude-of-the-author-in-passages', 'Determining if the author is optimistic, critical, neutral, or objective about a topic.', 'j5oA41KFdL8', 'uploads/pdf/modul_penarikan_kesimpulan.pdf', 4, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(75, 16, 'Making Inferences and Drawing Conclusions from Texts', 'literasi-bahasa-inggris-utbk-making-inferences-and-drawing-conclusions-from-texts', 'Reading between the lines to answer questions on implied information.', '7PswKezaVrI', 'uploads/pdf/modul_penalaran_kuantitatif.pdf', 5, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(76, 16, 'Finding Specific Details & Scanning Techniques', 'literasi-bahasa-inggris-utbk-finding-specific-details-scanning-techniques', 'Locating dates, numbers, definitions, and support statements quickly.', 'ewFcYSSweuY', 'uploads/pdf/modul_interpretasi_data.pdf', 6, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(77, 16, 'Summarizing and Paraphrasing English Texts', 'literasi-bahasa-inggris-utbk-summarizing-and-paraphrasing-english-texts', 'Identifying correct restatements of complex sentences and paragraph summaries.', 'fqqQ7c1va88', 'uploads/pdf/modul_logika_himpunan.pdf', 7, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(78, 16, 'Analysing Arguments & Evidence in Academic Passages', 'literasi-bahasa-inggris-utbk-analysing-arguments-evidence-in-academic-passages', 'Evaluating the strength of claims and identifying supporting evidence.', 'Gy-PaJN2oAo', 'uploads/pdf/modul_figural_spasial.pdf', 8, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(79, 16, 'Comparing Multiple Passages (Double Passage Questions)', 'literasi-bahasa-inggris-utbk-comparing-multiple-passages-double-passage-questions', 'Synthesizing information from two separate texts with overlapping topics.', '7PswKezaVrI', 'uploads/pdf/modul_soal_hots_logika.pdf', 9, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(80, 16, 'Full Exercise & Simulation Literasi Bahasa Inggris', 'literasi-bahasa-inggris-utbk-full-exercise-simulation-literasi-bahasa-inggris', 'Practicing a timed test simulation with high-difficulty English texts.', 'j5oA41KFdL8', 'uploads/pdf/modul_simulasi_latihan_pu.pdf', 10, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(81, 17, 'Ide Pokok, Kalimat Utama, & Kalimat Penjelas dalam Teks', 'literasi-bahasa-indonesia-utbk-ide-pokok-kalimat-utama-kalimat-penjelas-dalam-teks', 'Cara menentukan inti paragraf secara sistematis pada berbagai jenis paragraf.', 'Gy-PaJN2oAo', 'uploads/pdf/modul_pengantar_silogisme.pdf', 1, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(82, 17, 'Menganalisis Hubungan Antarparagraf & Struktur Teks', 'literasi-bahasa-indonesia-utbk-menganalisis-hubungan-antarparagraf-struktur-teks', 'Memahami bagaimana gagasan di paragraf kedua berhubungan dengan paragraf pertama.', 'U7nwPRLVSRA', 'uploads/pdf/modul_logika_analitik.pdf', 2, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(83, 17, 'Menyimpulkan Isi Teks & Membedakan Opini vs Fakta', 'literasi-bahasa-indonesia-utbk-menyimpulkan-isi-teks-membedakan-opini-vs-fakta', 'Merangkum isi seluruh bacaan dan memilah opini penulis dengan data faktual.', 'fqqQ7c1va88', 'uploads/pdf/modul_analisis_teks.pdf', 3, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(84, 17, 'Menentukan Makna Kata/Istilah Kontekstual & EYD Terbaru', 'literasi-bahasa-indonesia-utbk-menentukan-makna-kata-istilah-kontekstual-eyd-terbaru', 'Memahami istilah ilmiah populer dan memperbaiki kalimat sesuai ejaan terbaru.', 'Gy-PaJN2oAo', 'uploads/pdf/modul_penarikan_kesimpulan.pdf', 4, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(85, 17, 'Keefektifan Kalimat & Kepaduan Paragraf', 'literasi-bahasa-indonesia-utbk-keefektifan-kalimat-kepaduan-paragraf', 'Mengidifikasi kalimat mubazir, rancu, atau tidak sejajar dalam paragraf.', 'U7nwPRLVSRA', 'uploads/pdf/modul_penalaran_kuantitatif.pdf', 5, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(86, 17, 'Menganalisis Argumen, Kritik, & Dukungan dalam Teks', 'literasi-bahasa-indonesia-utbk-menganalisis-argumen-kritik-dukungan-dalam-teks', 'Menemukan asumsi tersirat penulis dan mengevaluasi argumen pro/kontra.', '7PswKezaVrI', 'uploads/pdf/modul_interpretasi_data.pdf', 6, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(87, 17, 'Teknik Membaca Cepat (Skimming-Scanning) Soal Panjang', 'literasi-bahasa-indonesia-utbk-teknik-membaca-cepat-skimming-scanning-soal-panjang', 'Membaca teks UTBK yang sangat panjang secara efisien dalam waktu sempit.', 'N1WsZnohr-E', 'uploads/pdf/modul_logika_himpunan.pdf', 7, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(88, 17, 'Membaca Grafik, Tabel, & Diagram dalam Teks Literasi', 'literasi-bahasa-indonesia-utbk-membaca-grafik-tabel-diagram-dalam-teks-literasi', 'Menghubungkan teks narasi dengan infografis pendukung secara komprehensif.', 'ewFcYSSweuY', 'uploads/pdf/modul_figural_spasial.pdf', 8, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(89, 17, 'Membandingkan Dua Teks dengan Topik Sama/Berbeda', 'literasi-bahasa-indonesia-utbk-membandingkan-dua-teks-dengan-topik-sama-berbeda', 'Mencari persamaan opini, perbedaan argumen, atau keselarasan dari dua bacaan.', 'ewFcYSSweuY', 'uploads/pdf/modul_soal_hots_logika.pdf', 9, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(90, 17, 'Latihan Soal Literasi Bahasa Indonesia & Analisis Jawaban', 'literasi-bahasa-indonesia-utbk-latihan-soal-literasi-bahasa-indonesia-analisis-jawaban', 'Simulasi latihan mandiri paket soal literasi bahasa Indonesia beserta analisis kesalahan.', 'Gy-PaJN2oAo', 'uploads/pdf/modul_simulasi_latihan_pu.pdf', 10, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(91, 18, 'Pengantar TKP: Memahami Kunci Jawaban Skala Nilai 1-5', 'tes-karakteristik-pribadi-tkp-skd-pengantar-tkp-memahami-kunci-jawaban-skala-nilai-1-5', 'Metode analisis opsi jawaban berbobot nilai tertinggi (5) dan menghindari opsi bernilai 1.', 'j5oA41KFdL8', 'uploads/pdf/modul_pengantar_silogisme.pdf', 1, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(92, 18, 'Aspek Pelayanan Publik & Keramahan dalam Bekerja', 'tes-karakteristik-pribadi-tkp-skd-aspek-pelayanan-publik-keramahan-dalam-bekerja', 'Menyelesaikan dilema kepuasan masyarakat vs kepatuhan SOP bagi seorang pelayan publik.', '7PswKezaVrI', 'uploads/pdf/modul_logika_analitik.pdf', 2, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(93, 18, 'Aspek Jejaring Kerja & Kemitraan Profesional', 'tes-karakteristik-pribadi-tkp-skd-aspek-jejaring-kerja-kemitraan-profesional', 'Membangun hubungan sinergis, kerja sama, dan koordinasi dengan rekan kerja/pihak luar.', 'Gy-PaJN2oAo', 'uploads/pdf/modul_analisis_teks.pdf', 3, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(94, 18, 'Aspek Sosial Budaya & Toleransi Kebhinekaan', 'tes-karakteristik-pribadi-tkp-skd-aspek-sosial-budaya-toleransi-kebhinekaan', 'Bagaimana bersikap di lingkungan kerja majemuk dan mengatasi konflik bernuansa SARA.', 'OhpPtKZ702I', 'uploads/pdf/modul_penarikan_kesimpulan.pdf', 4, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(95, 18, 'Aspek Teknologi Informasi dan Komunikasi (TIK) dalam Tugas', 'tes-karakteristik-pribadi-tkp-skd-aspek-teknologi-informasi-dan-komunikasi-tik-dalam-tugas', 'Penerapan sistem digital untuk meningkatkan efisiensi dan menyikapi kendala teknologi.', 'VtR_bRRPFsc', 'uploads/pdf/modul_penalaran_kuantitatif.pdf', 5, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(96, 18, 'Aspek Profesionalisme & Integritas Kerja', 'tes-karakteristik-pribadi-tkp-skd-aspek-profesionalisme-integritas-kerja', 'Menjaga kualitas kerja, ketepatan waktu, dan integritas di tengah cobaan suap/gratifikasi.', 'U7nwPRLVSRA', 'uploads/pdf/modul_interpretasi_data.pdf', 6, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(97, 18, 'Aspek Anti Radikalisme: Identifikasi & Penanganan Kasus', 'tes-karakteristik-pribadi-tkp-skd-aspek-anti-radikalisme-identifikasi-penanganan-kasus', 'Sikap menolak ideologi ekstrem di tempat kerja dan menjaga keutuhan ideologi negara.', 'fqqQ7c1va88', 'uploads/pdf/modul_logika_himpunan.pdf', 7, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(98, 18, 'Pengambilan Keputusan dalam Kondisi Tertekan/Darurat', 'tes-karakteristik-pribadi-tkp-skd-pengambilan-keputusan-dalam-kondisi-tertekan-darurat', 'Memilih solusi terbaik saat dihadapkan pada keterbatasan waktu, anggaran, atau staf.', 'j5oA41KFdL8', 'uploads/pdf/modul_figural_spasial.pdf', 8, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(99, 18, 'Manajemen Waktu, Konflik, & Stres di Tempat Kerja', 'tes-karakteristik-pribadi-tkp-skd-manajemen-waktu-konflik-stres-di-tempat-kerja', 'Strategi menangani beban kerja berlebih, gesekan dengan atasan, dan menjaga keharmonisan.', 'fqqQ7c1va88', 'uploads/pdf/modul_soal_hots_logika.pdf', 9, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(100, 18, 'Simulasi Soal TKP SKD dengan Pembahasan Poin Terbesar', 'tes-karakteristik-pribadi-tkp-skd-simulasi-soal-tkp-skd-dengan-pembahasan-poin-terbesar', 'Latihan 30 soal TKP terpilih untuk menguji sensitivitas terhadap nilai poin 5.', 'OhpPtKZ702I', 'uploads/pdf/modul_simulasi_latihan_pu.pdf', 10, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(101, 19, 'Kisi-Kisi & Fokus Pembelajaran TWK CPNS 2026', 'kupas-tuntas-twk-cpns-2026-kisi-kisi-fokus-pembelajaran-twk-cpns-2026', 'Pendalaman materi yang diprioritaskan keluar di tes wawasan kebangsaan CPNS 2026.', 'fqqQ7c1va88', 'uploads/pdf/modul_pengantar_silogisme.pdf', 1, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(102, 19, 'Pengamalan Nilai Pancasila dalam Studi Kasus Kehidupan Nyata', 'kupas-tuntas-twk-cpns-2026-pengamalan-nilai-pancasila-dalam-studi-kasus-kehidupan-nyata', 'Analisis kasus sehari-hari dikaitkan dengan pengamalan sila ke-1 sampai ke-5.', 'OhpPtKZ702I', 'uploads/pdf/modul_logika_analitik.pdf', 2, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(103, 19, 'Konstitusi: Sejarah Lahirnya UUD 1945 & Lembaga Negara', 'kupas-tuntas-twk-cpns-2026-konstitusi-sejarah-lahirnya-uud-1945-lembaga-negara', 'Struktur UUD 1945, tata urutan perundangan, dan batas wewenang MPR, DPR, DPD, MK, MA.', 'Gy-PaJN2oAo', 'uploads/pdf/modul_analisis_teks.pdf', 3, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(104, 19, 'Implementasi Kebijakan Otonomi Daerah & Desentralisasi', 'kupas-tuntas-twk-cpns-2026-implementasi-kebijakan-otonomi-daerah-desentralisasi', 'Konsep pembagian wewenang pusat dan daerah serta pemahaman fiskal daerah.', 'OhpPtKZ702I', 'uploads/pdf/modul_penarikan_kesimpulan.pdf', 4, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(105, 19, 'Bela Negara vs Patriotisme: Perbedaan & Contoh Nyata', 'kupas-tuntas-twk-cpns-2026-bela-negara-vs-patriotisme-perbedaan-contoh-nyata', 'Menganalisis perbedaan motivasi dan perwujudan bela negara dengan patriotisme/nasionalisme.', 'PWxH10VkGvQ', 'uploads/pdf/modul_penalaran_kuantitatif.pdf', 5, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(106, 19, 'Sejarah Modern Indonesia: Proklamasi, Orde Baru, & Reformasi', 'kupas-tuntas-twk-cpns-2026-sejarah-modern-indonesia-proklamasi-orde-baru-reformasi', 'Mempelajari kronologi transisi kekuasaan, penyusunan kabinet, dan lahirnya era demokrasi.', 'U7nwPRLVSRA', 'uploads/pdf/modul_interpretasi_data.pdf', 6, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(107, 19, 'Dinamika Politik Luar Negeri Indonesia & Peran Global', 'kupas-tuntas-twk-cpns-2026-dinamika-politik-luar-negeri-indonesia-peran-global', 'Sejarah KAA, Deklarasi Djuanda, pendirian ASEAN, Kontingen Garuda, dan diplomasi maritim.', 'Gy-PaJN2oAo', 'uploads/pdf/modul_logika_himpunan.pdf', 7, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(108, 19, 'Peran Integritas & Etika Pemerintahan dalam Mencegah KKN', 'kupas-tuntas-twk-cpns-2026-peran-integritas-etika-pemerintahan-dalam-mencegah-kkn', 'Korupsi, Kolusi, Nepotisme dalam kacamata hukum ketatanegaraan dan pencegahannya.', 'fqqQ7c1va88', 'uploads/pdf/modul_figural_spasial.pdf', 8, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(109, 19, 'Tokoh Pahlawan Nasional & Inspirasi Nilai Kejuangan', 'kupas-tuntas-twk-cpns-2026-tokoh-pahlawan-nasional-inspirasi-nilai-kejuangan', 'Meneladani sikap integritas tokoh sejarah bangsa (Hatta, Natsir, Agus Salim, Hoegeng).', 'VtR_bRRPFsc', 'uploads/pdf/modul_soal_hots_logika.pdf', 9, '2026-06-24 15:32:18', '2026-06-24 15:32:18'),
(110, 19, 'Paket Try Out Prediksi TWK CPNS 2026', 'kupas-tuntas-twk-cpns-2026-paket-try-out-prediksi-twk-cpns-2026', 'Simulasi try out ujian TWK dengan soal model penalaran tinggi terupdate.', 'U7nwPRLVSRA', 'uploads/pdf/modul_simulasi_latihan_pu.pdf', 10, '2026-06-24 15:32:19', '2026-06-24 15:32:19'),
(111, 20, 'Strategi Mendapatkan Nilai Maksimal (Poin 5) di TKP CPNS 2026', 'kupas-tuntas-tkp-cpns-2026-strategi-mendapatkan-nilai-maksimal-poin-5-di-tkp-cpns-2026', 'Membedakan karakteristik soal TKP CPNS terbaru dan teknik eliminasi cepat.', 'j5oA41KFdL8', 'uploads/pdf/modul_pengantar_silogisme.pdf', 1, '2026-06-24 15:32:19', '2026-06-24 15:32:19'),
(112, 20, 'Studi Kasus Pelayanan Publik Prima di Era Digital', 'kupas-tuntas-tkp-cpns-2026-studi-kasus-pelayanan-publik-prima-di-era-digital', 'Menangani komplain masyarakat lewat media sosial dan implementasi sistem online.', 'VtR_bRRPFsc', 'uploads/pdf/modul_logika_analitik.pdf', 2, '2026-06-24 15:32:19', '2026-06-24 15:32:19'),
(113, 20, 'Kerjasama Tim (Teamwork) & Kolaborasi Multisektoral', 'kupas-tuntas-tkp-cpns-2026-kerjasama-tim-teamwork-kolaborasi-multisektoral', 'Menyelesaikan tugas kelompok dengan anggota yang pasif atau memiliki latar belakang berbeda.', 'ewFcYSSweuY', 'uploads/pdf/modul_analisis_teks.pdf', 3, '2026-06-24 15:32:19', '2026-06-24 15:32:19'),
(114, 20, 'Adaptasi Terhadap Perubahan (Adaptability) & Inovasi Kerja', 'kupas-tuntas-tkp-cpns-2026-adaptasi-terhadap-perubahan-adaptability-inovasi-kerja', 'Respon ASN terhadap restrukturisasi organisasi dan adopsi alat bantu AI atau otomasi.', 'Gy-PaJN2oAo', 'uploads/pdf/modul_penarikan_kesimpulan.pdf', 4, '2026-06-24 15:32:19', '2026-06-24 15:32:19'),
(115, 20, 'Menghadapi Radikalisme & Ekstremisme di Lingkungan ASN', 'kupas-tuntas-tkp-cpns-2026-menghadapi-radikalisme-ekstremisme-di-lingkungan-asn', 'Langkah pencegahan infiltrasi paham radikal di media sosial dan lingkungan kerja.', 'PWxH10VkGvQ', 'uploads/pdf/modul_penalaran_kuantitatif.pdf', 5, '2026-06-24 15:32:19', '2026-06-24 15:32:19'),
(116, 20, 'Pengendalian Diri & Orientasi pada Pelayanan', 'kupas-tuntas-tkp-cpns-2026-pengendalian-diri-orientasi-pada-pelayanan', 'Menjaga profesionalisme kerja saat mengalami masalah keluarga atau kelelahan fisik.', 'OhpPtKZ702I', 'uploads/pdf/modul_interpretasi_data.pdf', 6, '2026-06-24 15:32:19', '2026-06-24 15:32:19'),
(117, 20, 'Ketekunan, Daya Juang, & Semangat Berprestasi', 'kupas-tuntas-tkp-cpns-2026-ketekunan-daya-juang-semangat-berprestasi', 'Menyelesaikan target kerja berat dengan tenggat waktu sangat ketat.', 'fqqQ7c1va88', 'uploads/pdf/modul_logika_himpunan.pdf', 7, '2026-06-24 15:32:19', '2026-06-24 15:32:19'),
(118, 20, 'Mengelola Konflik Kepentingan & Menjaga Netralitas ASN', 'kupas-tuntas-tkp-cpns-2026-mengelola-konflik-kepentingan-menjaga-netralitas-asn', 'Menjaga jarak dari afiliasi politik praktis menjelang pemilu dan pilkada.', 'U7nwPRLVSRA', 'uploads/pdf/modul_figural_spasial.pdf', 8, '2026-06-24 15:32:19', '2026-06-24 15:32:19'),
(119, 20, 'Mengembangkan Diri & Mengembangkan Orang Lain', 'kupas-tuntas-tkp-cpns-2026-mengembangkan-diri-mengembangkan-orang-lain', 'Pentingnya mengikuti diklat mandiri dan membimbing staf magang atau junior.', 'N1WsZnohr-E', 'uploads/pdf/modul_soal_hots_logika.pdf', 9, '2026-06-24 15:32:19', '2026-06-24 15:32:19'),
(120, 20, 'Latihan Simulasi Soal TKP CPNS 2026 & Kunci Analisis Poin 5', 'kupas-tuntas-tkp-cpns-2026-latihan-simulasi-soal-tkp-cpns-2026-kunci-analisis-poin-5', 'Uji kemampuan Anda dalam mendeteksi opsi bernilai 5 pada paket soal TKP terupdate.', 'N1WsZnohr-E', 'uploads/pdf/modul_simulasi_latihan_pu.pdf', 10, '2026-06-24 15:32:19', '2026-06-24 15:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_progress`
--

CREATE TABLE `lesson_progress` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `status` enum('belum_selesai','selesai') NOT NULL DEFAULT 'belum_selesai',
  `completed_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lesson_progress`
--

INSERT INTO `lesson_progress` (`id`, `user_id`, `lesson_id`, `status`, `completed_at`) VALUES
(1, 2, 1, 'belum_selesai', NULL),
(2, 2, 101, 'belum_selesai', NULL),
(3, 2, 81, 'selesai', '2026-06-24 11:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'web_name', 'AL Faiz', '2026-06-23 15:36:51', '2026-06-23 15:36:51'),
(2, 'maintenance_mode', 'non-aktif', '2026-06-23 15:36:51', '2026-06-23 15:36:51'),
(3, 'footer_copyright', '┬® 2026 AL Faiz. All rights reserved. Platform Pembelajaran Gratis Terkemuka di Indonesia.', '2026-06-23 15:36:51', '2026-06-23 15:36:51'),
(4, 'seo_title', 'AL Faiz - Belajar Online Gratis UTBK, SKD & CPNS', '2026-06-23 15:36:51', '2026-06-23 15:36:51'),
(5, 'seo_desc', 'Platform belajar online gratis untuk persiapan ujian masuk perguruan tinggi UTBK SNBT, seleksi Sekolah Kedinasan SKD, dan seleksi CPNS.', '2026-06-23 15:36:51', '2026-06-23 15:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `theme` enum('light','dark') NOT NULL DEFAULT 'light',
  `status` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `password`, `foto`, `role`, `theme`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Al Faiz Admin', 'admin@alfaiz.com', '$2y$10$oYjF9V75J/mXmC.c3f7H3u7U9sA1w15rT4e95lOk/c6122440b', 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=60', 'admin', 'light', 'aktif', '2026-06-23 15:36:51', '2026-06-23 15:36:51'),
(2, 'Dodi Devrian', 'user@alfaiz.com', '6ad14ba9986e3615423dfca256d04e3f', 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=60', 'user', 'light', 'aktif', '2026-06-23 15:36:51', '2026-06-24 16:54:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_lesson_bookmark` (`user_id`,`lesson_id`),
  ADD KEY `fk_bookmarks_lesson` (`lesson_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_lesson` (`lesson_id`),
  ADD KEY `fk_comments_user` (`user_id`),
  ADD KEY `fk_comments_parent` (`parent_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `fk_courses_category` (`category_id`);

--
-- Indexes for table `course_progress`
--
ALTER TABLE `course_progress`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_course_progress` (`user_id`,`course_id`),
  ADD KEY `fk_course_progress_course` (`course_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_lesson_history` (`user_id`,`lesson_id`),
  ADD KEY `fk_history_lesson` (`lesson_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `fk_lessons_course` (`course_id`);

--
-- Indexes for table `lesson_progress`
--
ALTER TABLE `lesson_progress`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_lesson_progress` (`user_id`,`lesson_id`),
  ADD KEY `fk_lesson_progress_lesson` (`lesson_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `course_progress`
--
ALTER TABLE `course_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `lesson_progress`
--
ALTER TABLE `lesson_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `fk_bookmarks_lesson` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_bookmarks_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_lesson` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_comments_parent` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_comments_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `fk_courses_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_progress`
--
ALTER TABLE `course_progress`
  ADD CONSTRAINT `fk_course_progress_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_course_progress_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `fk_history_lesson` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_history_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `fk_lessons_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lesson_progress`
--
ALTER TABLE `lesson_progress`
  ADD CONSTRAINT `fk_lesson_progress_lesson` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_lesson_progress_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
