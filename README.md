# Vokasi Studio

Proyek ini dibuat sebagai kepentingan pemenuhan mata kuliah Proyek SI D3 Komputer dan Sistem Informasi Sekolah Vokasi Universitas Gadjah Mada. Proyek ini adalah penggabungan 4 sub sistem Vokasi Studio yang sebelumnya sudah diselesaikan oleh Yola, Ipul, dan Ikhsan.

## Requirement : 
- NodeJS dan NPM
- PHP versi 5.x atau lebih
- Grunt

## How to use : 
Install semua modul yang diperlukan untuk development :
```
npm install
```

Jalankan grunt sebagai task runner untuk compile SCSS ke css : 
```
grunt
```

Apabila akan diubah css, ubah melalui folder `assets/scss`. Untuk file PHP bisa langsung dilakukan editing. Jangan lupa sesuaikan `application/config/config.php` sesuai folder kalian.

Untuk melihat hasilnya tinggal akses ke : 
```
http://localhost/namafolder
```

## Software yang digunakan : 

Dalam proyek ini digunakan beberapa software, antara lain : 
- CodeIgniter PHP Framework v2.x
- Bootstrap
- AdminLTE
- jQuery
