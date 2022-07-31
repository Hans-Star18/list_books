# Books

Dalam website ini membutuhkan

-   Laravel Framework 9.22.1
-   PHP 8.1.6

# Cara Penggunaan

-   Download dulu programnya.
-   Extract foldernya.
-   Pastikan persyaratannya di atas dipenuhi.
-   Pastikan server MySQL nya sudah dinyalakan.
-   Setelah itu buat database dengan nama `daftar_buku` atau yang lainnya.
-   Tapi pastikan `DB_DATABASE=nama_database` `DB_USERNAME=user_database` `DB_PASSWORD=pass_database` sama dengan dengan yang dibuat.
-   Konfigurasi di atas bisa dilihat di bagian `.env` pada folder laravelnya.
-   Setelah semuanya terpenuhi lalu jalankan `php artisan migrate:fresh --seed` di terminal folder laravelnya maka data yang diperlukan otomatis akan ditambahkan ke dtabase yang di buat.
-   Jika `php artisan migrate:fresh --seed` gagal dijalankan, maka bisa insert manual isi databasenya di folder `mysql/list_book.sql`.
-   Lalu ketikan `php artisan serve` di terminal folder laravelnya, kemudian buka link yang diberikan.
-   Maka program akan berjalan dengan sempurna.
