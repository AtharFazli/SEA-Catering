# 🍽️ SEA-Catering

<div align="center">

![SEA-Catering Logo](https://img.shields.io/badge/SEA--Catering-🍽️-orange?style=for-the-badge)

   **Platform Katering Cerdas untuk Event & Kebutuhan Perusahaan**

[![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat-square&logo=laravel)](https://laravel.com)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=flat-square&logo=mysql)](https://mysql.com)
[![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=flat-square&logo=php)](https://php.net)
[![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)](https://choosealicense.com/licenses/mit/)

</div>

---

## ✨ Tentang Aplikasi

**SEA‑Catering** adalah aplikasi manajemen katering yang dirancang untuk menyederhanakan proses pemesanan dan pengelolaan katering, baik untuk acara khusus maupun kebutuhan rutin perusahaan. Dengan antarmuka yang intuitif dan fitur yang komprehensif, SEA‑Catering membantu bisnis katering bekerja lebih efisien dan terorganisir.

### 🎯 Mengapa Memilih SEA-Catering?

- **📱 User Experience Terbaik** - Interface yang clean dan responsive
- **🔒 Keamanan Tingkat Tinggi** - Sistem autentikasi dan otorisasi yang robust
- **📊 Analytics & Reporting** - Dashboard lengkap dengan insight bisnis
- **⚡ Performance Optimal** - Dibangun dengan teknologi modern Laravel 12

---

## 🚀 Fitur Unggulan

### 🍽️ **Subscription Management**
- Pemesanan meal plan mingguan yang fleksibel
- Pemilihan hari pengiriman sesuai kebutuhan
- Beragam pilihan tipe makanan (vegetarian, non-vegetarian, diet khusus)
- Sistem recurring payment otomatis

### 👥 **User Dashboard**
- **Kelola Langganan**: Lihat, jeda, atau batalkan langganan dengan mudah

### 🛡️ **Sistem Keamanan**
- **Multi-Role Access**: Admin, Staff, dan User dengan permission berbeda
- **Spatie Permission**: Sistem otorisasi yang granular
- **Middleware Protection**: Keamanan berlapis pada setiap route

### 📈 **Admin Dashboard**
- **Real-time Analytics**: Statistik penjualan dan performa bisnis
- **User Management**: Kelola pengguna dan hak akses
- **Subscription Control**: Re-aktivasi langganan yang dibatalkan
- **Revenue Tracking**: Monitor pendapatan dan tren bisnis

---

## 🛠️ Tech Stack

<div align="center">

| **Backend** | **Frontend** | **Database** | **Tools** |
|-------------|-------------|-------------|-----------|
| ![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat-square&logo=laravel) | ![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=flat-square&logo=HTML5&logoColor=white) | ![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=flat-square&logo=MySQL&logoColor=white) | ![Composer](https://img.shields.io/badge/Composer-Dependency-885630?style=flat-square&logo=Composer&logoColor=white) |
| ![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=flat-square&logo=php) | ![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat-square&logo=CSS3&logoColor=white) | ![Eloquent](https://img.shields.io/badge/Eloquent_ORM-FF2D20?style=flat-square) | ![NPM](https://img.shields.io/badge/NPM-Package-CB3837?style=flat-square&logo=NPM&logoColor=white) |
| ![Spatie](https://img.shields.io/badge/Spatie-Permission-blue?style=flat-square) | ![JavaScript](https://img.shields.io/badge/JavaScript-ES6+-F7DF1E?style=flat-square&logo=JavaScript&logoColor=black) | | ![Git](https://img.shields.io/badge/Git-F05032?style=flat-square&logo=Git&logoColor=white) |

</div>

---

## 📋 System Requirements

### Minimum Requirements:
- **PHP**: 8.1 atau lebih tinggi
- **Composer**: 2.0+
- **MySQL**: 8.0+
- **Node.js**: 16.0+
- **NPM**: 8.0+
- **Git**: 2.0+


---

## 🚀 Quick Start Guide

### 📦 Installation

```bash
# 1. Clone repository
git clone https://github.com/AtharFazli/SEA-Catering.git
cd SEA-Catering

# 2. Install PHP dependencies
composer install

# 3. Install Node.js dependencies
npm install

# 4. Setup environment
cp .env.example .env
```

### ⚙️ Configuration

Edit file `.env` dengan konfigurasi berikut:

```env
# Application Settings
APP_NAME="SEA-Catering"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

# Database Configuration
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sea_catering
DB_USERNAME=root
DB_PASSWORD=your_password_here

# File Storage
FILESYSTEM_DRIVER=public

# Mail Configuration (Optional)
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_password
```

### 🔐 Setup Database

```bash
# Generate application key
php artisan key:generate

# Run database migrations
php artisan migrate

# Seed database with sample data
php artisan db:seed

```

### 🎨 Compile Assets

```bash
# For development
npm run dev

# For production
npm run build

```

### 🚀 Launch Application

```bash
# Start development server
php artisan serve

# Application will be available at:
# http://localhost:8000
```

---

## 🔑 Default Credentials

### 👨‍💼 Admin Access
```
📧 Email: admin@gmail.com
🔐 Password: password
```

### 👤 User Access
```
📧 Email: athar@gmail.com
🔐 Password: password
```


---

## 📁 Project Structure

```
SEA-Catering/
├─ 📁 app/
│   ├─ 📁 Http/
│   │   ├─ 📁 Controllers/
│   │   └─ 📁 Requests/
│   ├─ 📁 Models/
│   ├─ 📁 Providers/
│   └─ 📁 View/
├─ 📁 database/
│   ├─ 📁 factories/
│   ├─ 📁 migrations/
│   └─ 📁 seeders/
├─ 📁 public/
│   ├─ 📁 build/
│   ├─ 📁 dashboard/
│   ├─ 📁 img/
│   └─ 📁 QuickStart/
├─ 📁 resources/
│   ├─ 📁 css/
│   ├─ 📁 js/
│   └─ 📁 views/
├─ 📁 routes/
│   ├─ auth.php
│   ├─ console.php
│   └─ web.php
├─ 📁 storage/
├─ 📁 tests/
├─ .env.example
├─ composer.json
├─ package.json
└─ README.md
```

---

## 🌟 Key Features Walkthrough

### 1. **Subscription System**
- Flexible meal planning dengan opsi mingguan
- Customizable delivery schedule
- Multiple meal categories dan dietary preferences
- Automated billing dan renewal

### 2. **User Management**
- Role-based access control (RBAC)
- User registration
- Subscription history dan analytics

### 3. **Admin Panel**
- Comprehensive dashboard dengan real-time metrics
- User dan subscription management
- Revenue tracking dan reporting

---

## 🤝 Contributing

Kami menyambut kontribusi dari komunitas! Berikut cara berkontribusi:

1. **Fork** repository ini
2. **Create** feature branch (`git checkout -b feature/amazing-feature`)
3. **Commit** perubahan (`git commit -m 'Add amazing feature'`)
4. **Push** ke branch (`git push origin feature/amazing-feature`)
5. **Open** Pull Request

### 📝 Contribution Guidelines
- Ikuti coding standards Laravel
- Tulis unit tests untuk fitur baru
- Update dokumentasi jika diperlukan
- Gunakan commit message yang deskriptif

---

## 🐛 Bug Reports & Feature Requests

Temukan bug atau punya ide fitur baru? Jangan ragu untuk:

- **🐛 Report Bug**: [Create Issue](https://github.com/AtharFazli/SEA-Catering/issues)
- **💡 Request Feature**: [Feature Request](https://github.com/AtharFazli/SEA-Catering/issues)
- **💬 Ask Question**: [Discussions](https://github.com/AtharFazli/SEA-Catering/discussions)

---

## 📜 License

Project ini dilisensikan di bawah **MIT License**. Lihat file [LICENSE](https://choosealicense.com/licenses/mit/) untuk detail lengkap.

---

## 🙏 Acknowledgments

- **Laravel Team** - Framework yang amazing
- **Spatie** - Package permission yang powerful
- **Community Contributors** - Terima kasih atas dukungannya!

---

<div align="center">

**⭐ Jika project ini bermanfaat, jangan lupa berikan star!**

[![GitHub stars](https://img.shields.io/github/stars/AtharFazli/SEA-Catering?style=social)](https://github.com/AtharFazli/SEA-Catering/stargazers)
[![GitHub forks](https://img.shields.io/github/forks/AtharFazli/SEA-Catering?style=social)](https://github.com/AtharFazli/SEA-Catering/network/members)

---

**Dibuat dengan ❤️ oleh Tim SEA-Catering**

 [📧 Email](mailto:atharfs9@gmail.com) • [🐦 Twitter](https://x.com/atharfazli)

</div>