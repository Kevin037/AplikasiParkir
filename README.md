## About E-Parking

E-Parking merupakan aplikasi untuk mempermudah dalam manajemen parkir. Manfaat yang diberikan adalah sebagai berikut :

- Mempermudah dalam memonitor tempat parkir yang kosong, hal ini sangat berguna bagi tempat parkir dengan skala ukuran yang cukup besar & luas
- Mempermudah pendataan kendaraan yang terparkir
- Mempermudah dalam perhitungan pemasukan parkir

## Struktur Database

Aplikasi ini terdiri dari beberapa tabel berikut :

- ser
- k
- Mempermudah dalam perhitungan pemasukan parkir

## Cara Install

1. Buat database baru di Mysql dengan nama "parkir"
2. Buka project pada code editor (Disini saya menggunakan Visual Studio Code)
3. Buka aplikasi web service lokal (XAMPP), aktifkan untuk "Apache" & "MySQL"
4. Pada terminal Visual Studio Code, jalankan perintah "php artisan migrate:fresh --seed"
5. Pada terminal Visual Studio Code, jalankan perintah "php artisan serve"
6. Buka link http://127.0.0.1:8000 pada browser