# PRODUCT REQUIREMENT DOCUMENT (PRD)

# AL FAIZ
Platform Pembelajaran Online Gratis UTBK, SKD, dan CPNS

Versi: 1.0
Tanggal: 23 Juni 2026

---

# 1. Executive Summary

AL Faiz adalah platform pembelajaran online gratis yang berfokus pada materi persiapan UTBK, SKD Sekolah Kedinasan, dan CPNS.

Platform dibangun menggunakan:

- Framework : CodeIgniter 3.1.13
- Backend : PHP
- Database : MySQL
- Frontend : Bootstrap 5 + jQuery
- Arsitektur : MVC

Tujuan utama platform adalah menyediakan pembelajaran gratis dan berkualitas bagi seluruh masyarakat Indonesia.

---

# 2. Product Vision

Menjadi platform pembelajaran gratis terbaik untuk persiapan UTBK, SKD, dan CPNS di Indonesia.

---

# 3. Product Goals

- Menyediakan akses belajar gratis.
- Menyediakan materi terstruktur.
- Mempermudah proses belajar mandiri.
- Meningkatkan tingkat kelulusan peserta.

---

# 4. User Roles

## Guest

Hak akses:

- Melihat landing page.
- Melihat daftar course.
- Melihat detail course.
- Melihat preview materi (terkunci).

Tidak dapat:

- Membuka materi.
- Menonton video.
- Download PDF.
- Komentar.

## User

Hak akses:

- Mengakses seluruh materi.
- Menonton video.
- Download PDF.
- Progress belajar.
- Bookmark.
- Riwayat belajar.
- Komentar.
- Dark mode.

## Admin

Hak akses penuh terhadap sistem.

---

# 5. Course Category

## UTBK

- Penalaran Umum
- Pengetahuan Kuantitatif
- Literasi Indonesia
- Literasi Inggris
- Penalaran Matematika

## SKD

- TWK
- TIU
- TKP
- Try Out

## CPNS

- TWK
- TIU
- TKP
- Passing Grade
- Try Out

---

# 6. Functional Requirements

## Authentication

### User

- Register
- Login
- Forgot Password
- Logout
- Edit Profile
- Ganti Password

### Admin

- Login Admin
- Logout

---

# 7. Landing Page

Urutan section:

1. Navbar
2. Hero
3. Kategori Pembelajaran
4. Course Terbaru
5. Course Populer
6. Kenapa Memilih AL Faiz
7. Statistik Website
8. FAQ
9. CTA
10. Footer

---

# 8. Dashboard User

Menu:

- Dashboard Saya
- My Learning
- Bookmark
- Riwayat Belajar
- Profil
- Pengaturan
- Logout

Fitur:

- Progress Belajar
- Course terakhir
- Statistik belajar

---

# 9. Dashboard Admin

Menu:

- Dashboard
- Kategori
- Course
- Materi
- User
- Komentar
- FAQ
- Banner
- Pengaturan

---

# 10. Progress Belajar

Progress dihitung:

Progress = Materi Selesai / Total Materi x 100

User dapat:

- Melihat progress course.
- Melanjutkan pembelajaran terakhir.

---

# 11. Komentar dan Diskusi

User:

- Tambah komentar.
- Edit komentar sendiri.
- Hapus komentar sendiri.

Admin:

- Balas komentar.
- Hapus komentar.
- Pin komentar.

---

# 12. Dark Mode

Mode:

- Light
- Dark

Penyimpanan:

- LocalStorage
- Database User

Field:

theme

---

# 13. Database Design

## users

id
nama
email
password
foto
role
theme
status
created_at
updated_at

## categories

id
nama
slug
icon
created_at

## courses

id
category_id
judul
slug
thumbnail
deskripsi
status
created_at

## lessons

id
course_id
judul
slug
deskripsi
video_youtube
pdf
urutan

## bookmarks

id
user_id
lesson_id

## history

id
user_id
lesson_id
last_access

## lesson_progress

id
user_id
lesson_id
status
completed_at

## course_progress

id
user_id
course_id
progress

## comments

id
lesson_id
user_id
parent_id
komentar
created_at

---

# 14. ERD

Category
|
|-- Course
      |
      |-- Lesson

User
|
|-- Bookmark
|-- History
|-- Progress
|-- Comment

---

# 15. UI Guidelines

## Color

Primary : #7A0C0C
Dark : #4A0000
Gold : #C49A3A
White : #FFFFFF
Light : #F8F8F8

## Typography

Heading : Cinzel
Body : Poppins

---

# 16. Security

- Password Hash
- CSRF Protection
- XSS Filtering
- Query Builder
- Session Management
- Form Validation

---

# 17. SEO

- Friendly URL
- Meta Title
- Meta Description
- Sitemap XML
- Robots TXT

---

# 18. Struktur Folder CI3

application/

controllers/
models/
views/

assets/

css/
js/
images/

uploads/

course/
pdf/
profile/

---

# 19. Testing

Black Box Testing:

- Login
- Register
- CRUD Course
- CRUD Materi
- Progress
- Komentar

---

# 20. Future Development

Versi 1.5

- Bank Soal
- Try Out Online

Versi 2.0

- Ranking
- Sertifikat
- Notifikasi

---

# 21. Success Metrics

- Total User
- Total Course
- Visitor Harian
- Total Materi Selesai
- Engagement Komentar
