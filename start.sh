#!/usr/bin/env bash

# Cache konfigurasi
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Jalankan migrasi (jika perlu)
php artisan migrate --force

# Jalankan server di port yang diberikan Railway
php artisan serve --host=0.0.0.0 --port=${PORT}
