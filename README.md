## About E-Parking

E-Parking merupakan aplikasi untuk mempermudah dalam manajemen parkir. Manfaat yang diberikan adalah sebagai berikut :

- Mempermudah dalam memonitor tempat parkir yang kosong, hal ini sangat berguna bagi tempat parkir dengan skala ukuran yang cukup besar & luas
- Mempermudah pendataan kendaraan yang terparkir
- Mempermudah dalam perhitungan pemasukan parkir

## Struktur Database

Aplikasi ini terdiri dari beberapa tabel berikut :

- users (Menampung data akun user)
- bloks (Menampung data blok parkir)
- slots (Menampung data slot parkir)
- jenis_kendaraans (Menampung data jenis kendaraan)
- kendaraans (Menampung data kendaraan parkir)
- transaksis (Menampung data parkir masuk & parkir keluar)

## Cara Install

1. Buat database baru di Mysql dengan nama "parkir"
2. Buka project pada code editor (Disini saya menggunakan Visual Studio Code)
3. Buka aplikasi web service lokal (XAMPP), aktifkan untuk "Apache" & "MySQL"
4. Pada terminal Visual Studio Code, jalankan perintah "php artisan migrate:fresh --seed"
5. Pada terminal Visual Studio Code, jalankan perintah "php artisan serve"
6. Buka link http://127.0.0.1:8000 pada browser

## Fitur Aplikasi

1. Tambah, Edit, Hapus (CRUD) data Blok parkir
2. Tambah, Edit, Hapus (CRUD) data Slot parkir
3. Tambah & Edit data Jenis Kendaraan
4. Pengecekan ketersediaan data blok dan slot parkir
5. Tambah parkir masuk
6. Proses parkir keluar

## Alur/Cara Penggunaan

1. User login dengan menggunakan 2 opsi berikut :
    - Data dummy (username/email : admin@gmail.com, password : test1234)
    - Daftar akun, dengan mengklik "Daftar sekarang"
2. Tambah data Blok 
3. Tambah data Slot
4. Tambah data jenis kendaraan
5. Tambah Parkir masuk
6. Klik "Selesai" pada daftar parkir masuk, untuk memproses parkir keluar