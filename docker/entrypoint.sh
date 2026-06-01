#!/bin/sh

set -e

until nc -z mysql 3306; do
    echo "MySQL is unavailable - sleeping"
    sleep 2
done

echo "MySQL is up - ready!"

chown -R www-data:www-data storage bootstrap/cache || true
chmod -R 775 storage bootstrap/cache || true

# cache clear
php artisan config:clear || true
php artisan cache:clear || true
php artisan route:clear || true
php artisan view:clear || true

php artisan storage:link || true

echo "Container is ready!"

exec "$@"
