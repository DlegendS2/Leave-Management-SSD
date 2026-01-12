
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

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Leave Management System

## 1. Project Description
This is a web-based Leave Management System built with **Laravel** and **Bootstrap 5**.  
It allows staff to submit leave requests with optional medical proofs, and admins to approve or reject them.  
Features include role-based access control, audit logging, secure file uploads, and session management.

---

## 2. Installation Steps

1. Clone the repository:
```bash
git clone https://github.com/DlegendS2/Leave-Management-SSD.git
cd Leave-Management-SSD
```
2. Copy environment file and configure:
```bash
cp .env.example .env
```
3. Generate Laravel application key:
```bash
php artisan key:generate
```
4. Configure database in .env:
```bash
DB_DATABASE=leave_management
DB_USERNAME=root
DB_PASSWORD=
```
5. Run migrations and seed admin:
```bash
php artisan migrate
php artisan db:seed --class=AdminSeeder
```
6. Create storage link for files:
```bash
php artisan storage:link
```
7. Start the local development server
```bash
php artisan serve
```
Access the application at http://127.0.0.1:8000.

## 3. Security Features Summary
Authentication & Session Security:
- CSRF protection enabled
- Secure login with hashed passwords (bcrypt)
- Session timeout and invalidation on logout

Access Control:
- Role-Based Access Control (RBAC) for staff/admin
- Prevents IDOR (users cannot access others’ data)

Input Validation:
- Server-side and client-side input validation
- Leave dates validated (start_date <= end_date)
- File uploads validated for type and size

File Upload Security:
- Files stored in storage/app/private/medical_proofs
- Only allowed types: PDF, JPG, JPEG, PNG
- Max size: 2MB

Sensitive Data Protection:
- Passwords hashed using bcrypt
- No plaintext credentials logged
- HTTPS recommended for deployment

Logging & Monitoring:
- Audit logs track user actions (login, logout, leave applied, admin actions)

Error Handling & Output Encoding:
- Custom messages for invalid login, leave errors, and file download errors
- Validation errors displayed to users without leaking sensitive info

## 4. How to Run the App
1. Make sure PHP >= 8.1, Composer, MySQL, and XAMPP are installed.
2. Configure .env with your database.
3. Run migrations and seeders:
```bash
php artisan migrate --seed
```

4. Start server:
```bash
php artisan serve
```
5. Access via browser: http://127.0.0.1:8000
- Staff login redirects to profile page
- Admin login redirects to dashboard with leave approvals and audit trail

## 5. Dependencies
- Laravel Framework 10.x
- PHP 8.1+
- MySQL
- Composer
- Bootstrap 5
- Font Awesome 6

<img width="1853" height="862" alt="image_2026-01-12_184637033" src="https://github.com/user-attachments/assets/06940d82-23f2-4406-82f9-aa239ab0b911" />
<img width="1839" height="856" alt="image_2026-01-12_184729996" src="https://github.com/user-attachments/assets/840bd938-4abb-43b2-aa7b-dff4ef98ed54" />
<img width="1861" height="848" alt="image_2026-01-12_184807008" src="https://github.com/user-attachments/assets/b3b0640e-240d-44cb-a599-a4dc7c1b317c" />
<img width="1842" height="856" alt="image_2026-01-12_184829432" src="https://github.com/user-attachments/assets/0586e121-2fd8-47ad-b24b-d41ed295227f" />
