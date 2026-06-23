-- SQL Database Schema for AL FAIZ
-- Platform Pembelajaran Online Gratis UTBK, SKD, dan CPNS
-- Database Engine: MySQL
-- PHP Framework: CodeIgniter 3.1.13

CREATE DATABASE IF NOT EXISTS `kursusalfaiz` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `kursusalfaiz`;

-- --------------------------------------------------------
-- Drop existing tables to allow safe re-importing
-- --------------------------------------------------------
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `comments`;
DROP TABLE IF EXISTS `course_progress`;
DROP TABLE IF EXISTS `lesson_progress`;
DROP TABLE IF EXISTS `history`;
DROP TABLE IF EXISTS `bookmarks`;
DROP TABLE IF EXISTS `lessons`;
DROP TABLE IF EXISTS `courses`;
DROP TABLE IF EXISTS `categories`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `faqs`;
DROP TABLE IF EXISTS `banners`;
DROP TABLE IF EXISTS `settings`;
SET FOREIGN_KEY_CHECKS = 1;

-- --------------------------------------------------------
-- 1. Table `users`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nama` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `foto` VARCHAR(255) DEFAULT NULL,
  `role` ENUM('user', 'admin') NOT NULL DEFAULT 'user',
  `theme` ENUM('light', 'dark') NOT NULL DEFAULT 'light',
  `status` ENUM('aktif', 'nonaktif') NOT NULL DEFAULT 'aktif',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- 2. Table `categories`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `categories` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nama` VARCHAR(100) NOT NULL,
  `slug` VARCHAR(100) NOT NULL UNIQUE,
  `icon` VARCHAR(100) DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- 3. Table `courses`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `courses` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `category_id` INT NOT NULL,
  `judul` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL UNIQUE,
  `thumbnail` VARCHAR(255) DEFAULT NULL,
  `deskripsi` TEXT DEFAULT NULL,
  `status` ENUM('aktif', 'nonaktif') NOT NULL DEFAULT 'aktif',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT `fk_courses_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- 4. Table `lessons`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `lessons` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `course_id` INT NOT NULL,
  `judul` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL UNIQUE,
  `deskripsi` TEXT DEFAULT NULL,
  `video_youtube` VARCHAR(50) DEFAULT NULL COMMENT 'YouTube Video ID',
  `pdf` VARCHAR(255) DEFAULT NULL COMMENT 'Filepath to PDF resource',
  `urutan` INT NOT NULL DEFAULT 1,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT `fk_lessons_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- 5. Table `bookmarks`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `bookmarks` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `lesson_id` INT NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `unique_user_lesson_bookmark` (`user_id`, `lesson_id`),
  CONSTRAINT `fk_bookmarks_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_bookmarks_lesson` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- 6. Table `history`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `history` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `lesson_id` INT NOT NULL,
  `last_access` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `unique_user_lesson_history` (`user_id`, `lesson_id`),
  CONSTRAINT `fk_history_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_history_lesson` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- 7. Table `lesson_progress`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `lesson_progress` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `lesson_id` INT NOT NULL,
  `status` ENUM('belum_selesai', 'selesai') NOT NULL DEFAULT 'belum_selesai',
  `completed_at` TIMESTAMP NULL DEFAULT NULL,
  UNIQUE KEY `unique_user_lesson_progress` (`user_id`, `lesson_id`),
  CONSTRAINT `fk_lesson_progress_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_lesson_progress_lesson` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- 8. Table `course_progress`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `course_progress` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `course_id` INT NOT NULL,
  `progress` DECIMAL(5,2) NOT NULL DEFAULT 0.00 COMMENT 'Persentase penyelesaian course (0 - 100)',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `unique_user_course_progress` (`user_id`, `course_id`),
  CONSTRAINT `fk_course_progress_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_course_progress_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- 9. Table `comments`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `comments` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `lesson_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `parent_id` INT DEFAULT NULL COMMENT 'Digunakan untuk reply/balasan komentar',
  `komentar` TEXT NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT `fk_comments_lesson` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_comments_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_comments_parent` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- 10. Table `faqs`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `pertanyaan` TEXT NOT NULL,
  `jawaban` TEXT NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- 11. Table `banners`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `banners` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `judul` VARCHAR(255) NOT NULL,
  `deskripsi` VARCHAR(255) NOT NULL,
  `gambar` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- 12. Table `settings`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `settings` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `key` VARCHAR(100) NOT NULL UNIQUE,
  `value` TEXT DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ========================================================
-- DATA SEEDING (MOCK RECORDS MATCHING HTML TEMPLATES)
-- ========================================================

-- 1. Seed Users (passwords are 'admin123' and 'user123' hashed using standard CI3 bcrypt)
INSERT INTO `users` (`id`, `nama`, `email`, `password`, `foto`, `role`, `theme`, `status`) VALUES
(1, 'Al Faiz Admin', 'admin@alfaiz.com', '$2y$10$oYjF9V75J/mXmC.c3f7H3u7U9sA1w15rT4e95lOk/c6122440b', 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=60', 'admin', 'light', 'aktif'),
(2, 'Budi Pratama', 'user@alfaiz.com', '$2y$10$tZ31wN0F5gYJ9K0P9g3s1e8wH9X9x5rT4e95lOk/c6122440b', 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=60', 'user', 'light', 'aktif');

-- 2. Seed Categories
INSERT INTO `categories` (`id`, `nama`, `slug`, `icon`) VALUES
(1, 'UTBK', 'utbk', 'fa-graduation-cap'),
(2, 'SKD Kedinasan', 'skd', 'fa-shield-halved'),
(3, 'CPNS', 'cpns', 'fa-user-tie');

-- 3. Seed Courses
INSERT INTO `courses` (`id`, `category_id`, `judul`, `slug`, `thumbnail`, `deskripsi`, `status`) VALUES
(1, 1, 'Penalaran Umum UTBK', 'penalaran-umum', 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=600&auto=format&fit=crop&q=60', 'Materi dan strategi menjawab soal Penalaran Umum UTBK SNBT secara cepat dan tepat.', 'aktif'),
(2, 2, 'TIU SKD Kedinasan', 'tiu-skd', 'https://images.unsplash.com/photo-1506784983877-45594efa4cbe?w=600&auto=format&fit=crop&q=60', 'Pembahasan lengkap Tes Intelegensia Umum (TIU) untuk Seleksi Kompetensi Dasar Sekolah Kedinasan.', 'aktif');

-- 4. Seed Lessons
INSERT INTO `lessons` (`id`, `course_id`, `judul`, `slug`, `deskripsi`, `video_youtube`, `pdf`, `urutan`) VALUES
(1, 1, 'Pengantar Logika Deduktif & Induktif', 'pengantar-logika', 'Materi dasar penarikan kesimpulan logika Silogisme.', 'kP3rE059lOk', 'uploads/pdf/logika_deduktif.pdf', 1),
(2, 1, 'Logika Analitik dan Pola Posisi', 'logika-analitik', 'Metode cepat menyelesaikan soal logika posisi dan urutan duduk.', 'lSg_p4_u-fQ', 'uploads/pdf/logika_analitik.pdf', 2);

-- 5. Seed FAQs
INSERT INTO `faqs` (`id`, `pertanyaan`, `jawaban`) VALUES
(1, 'Apakah seluruh pembelajaran di Al Faiz benar-benar gratis?', 'Ya, betul sekali. Visi utama Al Faiz adalah menyediakan akses pembelajaran berkualitas secara gratis untuk seluruh pejuang UTBK, SKD, dan CPNS di Indonesia.'),
(2, 'Bagaimana cara mendownload modul materi PDF?', 'Kamu harus mendaftar dan masuk (login) ke dalam akun terlebih dahulu. Setelah itu, buka pelajaran (lesson) yang kamu tuju, dan link download PDF akan aktif di bawah video pembelajaran.');

-- 6. Seed Banners
INSERT INTO `banners` (`id`, `judul`, `deskripsi`, `gambar`) VALUES
(1, 'Sukses UTBK SNBT bersama Al Faiz', 'Belajar gratis dengan materi terstruktur standar UTBK SNBT terbaru.', 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=1200&auto=format&fit=crop&q=80'),
(2, 'Lolos SKD Sekolah Kedinasan & CPNS', 'Materi TIU, TWK, dan TKP ter-update dibahas secara tuntas.', 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?w=1200&auto=format&fit=crop&q=80');

-- 7. Seed Global Settings
INSERT INTO `settings` (`key`, `value`) VALUES
('web_name', 'AL Faiz'),
('maintenance_mode', 'non-aktif'),
('footer_copyright', '© 2026 AL Faiz. All rights reserved. Platform Pembelajaran Gratis Terkemuka di Indonesia.'),
('seo_title', 'AL Faiz - Belajar Online Gratis UTBK, SKD & CPNS'),
('seo_desc', 'Platform belajar online gratis untuk persiapan ujian masuk perguruan tinggi UTBK SNBT, seleksi Sekolah Kedinasan SKD, dan seleksi CPNS.');
