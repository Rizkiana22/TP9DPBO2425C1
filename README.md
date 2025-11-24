# TP9DPBO2425C1

## 📝 Janji
Saya **Muhammad Rizkiana Pratama** dengan **NIM 2404421** mengerjakan **Tugas Praktikum 9** dalam mata kuliah **Desain dan Pemrograman Berorientasi Objek** dengan keberkahan-Nya.Saya **tidak melakukan kecurangan** seperti yang telah dispesifikasikan.  
**Aamiin.**

---

## 📐 Desain Program (Arsitektur MVP)

Program ini dibangun menggunakan pola **MVP (Model–View–Presenter)**, di mana setiap komponen memiliki tugas yang terpisah dan jelas.

---

### 1. 🧩 Model (`/models`)

Model menangani seluruh **logika data**, termasuk:
- Struktur data (entity class)
- Koneksi dan akses database
- Operasi CRUD (Create, Read, Update, Delete)
- Interface (kontrak) model

**Isi direktori:**
- `DB.php` → Koneksi database  
- `Pembalap.php`, `Tim.php` → Entity class  
- `TabelPembalap.php`, `TabelTim.php` → Query CRUD ke database  
- `KontrakModelPembalap.php`, `KontrakModelTim.php` → Interface Model  

---

### 2. 🖼️ View (`/views`)

View berfungsi menampilkan data ke pengguna melalui HTML.  
View **tidak memiliki logika bisnis** dan hanya menerima data yang telah diproses oleh Presenter.

**Isi direktori:**
- `ViewPembalap.php`, `ViewTim.php` → Menampilkan data  
- `KontrakViewPembalap.php`, `KontrakViewTim.php` → Interface View  

> View tidak pernah berhubungan langsung dengan database.

---

### 3. 🎛️ Presenter (`/presenters`)

Presenter merupakan **penghubung antara View dan Model**.

Tugas Presenter:
- Menerima permintaan dari View
- Berkomunikasi dengan Model
- Melakukan logika bisnis
- Mengirim data siap tampil ke View

**Isi direktori:**
- `PresenterPembalap.php`, `PresenterTim.php`  
- `KontrakPresenterPembalap.php`, `KontrakPresenterTim.php`  

> Presenter memastikan View tidak mengakses database secara langsung.

---

## 🔄 Alur Kerja Program

Alur kerja MVP dalam aplikasi ini adalah sebagai berikut:

1. User membuka halaman melalui `index.php`.
2. `index.php` menentukan aksi (misalnya: tampilkan daftar pembalap, tambah pembalap).
3. View memanggil Presenter terkait.
4. Presenter meminta data atau melakukan aksi melalui Model:
   - Mengambil seluruh data  
   - Menambahkan data  
   - Menghapus data  
5. Model mengakses database melalui `DB.php`.
6. Model mengembalikan data ke Presenter.
7. Presenter melakukan validasi atau formatting jika diperlukan.
8. Presenter mengirim data ke View.
9. View menampilkan data menggunakan template HTML.

---

## Dokumentasi
