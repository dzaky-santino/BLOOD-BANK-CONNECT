# Blood Bank Connect

**Blood Bank Connect** Blood Bank Connect merupakan website untuk melayani rumah sakit, pendonor, dan
penerima darah. Bagi rumah sakit, website ini menyediakan database yang terorganisir
dengan informasi lengkap, sehingga memudahkan pencarian pendonor yang sesuai dan
juga mudah dalam pengelolaan stok darah. Lalu memudahkan pendonor mengetahui
informasi kapan untuk melakukan donor darah serta membantu mendapatkan penerima
darah dengan cepat karena rumah sakit dapat dengan mudah menemukan pendonor yang
cocok.

---

## Cara Instalasi dan Penggunaan

Berikut adalah langkah-langkah untuk menginstal dan menggunakan aplikasi ini:

### 1. Clone Repository
Clone repository ini ke direktori lokal Anda:
```bash
git clone https://github.com/dzaky-santino/blood-bank-connect.git
```

### 2. Masuk Ke Folder si-jaki
```bash
cd blood-bank-connect
```

### 3. Membuat File .env
Copy file .env.example menjadi .env:
```bash
cp .env.example .env
```
Kemudian, sesuaikan konfigurasi database di file .env sesuai dengan pengaturan server lokal Anda.

### 4. Instal Dependensi PHP
Jalankan perintah berikut untuk menginstal dependensi PHP menggunakan Composer:
```bash
composer install
```

### 5. Instal Dependensi Frontend
Pastikan Anda sudah menginstal Node.js dan npm. Kemudian jalankan perintah berikut untuk menginstal dependensi frontend:
```bash
npm install
```

### 6. Generate Application Key
Generate application key Laravel untuk aplikasi Anda:
```bash
php artisan key:generate
```
### 7. Migrasi dan Seeder
Lakukan migrasi database dan jalankan seeder untuk mengisi data awal aplikasi:
```bash
php artisan migrate --seed
```

### 8. Menambahkan Akun Admin
Seeder default hanya membuat akun pengguna (User). Anda dapat menambahkan akun admin dengan cara berikut:
1. Buka file database/seeders/UserSeeder.php 
2. Tambahkan kode berikut:

```php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
    'name' => 'Admin',
    'email' => 'admin@gmail.com',
    'password' => Hash::make('admin123'),
    'role' => 'admin',
    'image' => null,
]);
```

3. Setelah menambahkan kode, jalankan ulang seeder:
```bash
php artisan db:seed
```

### 9. Compile Asset Frontend
Setelah semua dependensi frontend terinstal, jalankan perintah berikut untuk meng-compile asset:
```bash
npm run dev
```

### 10. Jalankan Server Lokal
Jalankan server lokal untuk melihat website:
```bash
php artisan serve
```
Website dapat diakses melalui URL:
```arduino
http://127.0.0.1:8000
```

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
