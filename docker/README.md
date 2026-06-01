# Docker Setup — Notification Service

Стек: **Laravel** (PHP-FPM), **MySQL**, **Nginx**, **phpMyAdmin**. Без Redis и без отдельных воркеров очередей.

## Быстрый старт

### 1. Файл окружения

```bash
cp .env.example .env
```

(Если `.env` уже есть — этот шаг можно пропустить.)

### 2. Запуск контейнеров

```bash
docker compose up -d --build
```

### 3. Создание Laravel-проекта (если папка пустая)

```bash
docker compose exec app composer create-project laravel/laravel /tmp/laravel
docker compose exec app sh -lc "cp -a /tmp/laravel/. /var/www/html/"
```

### 4. Настройка Laravel

```bash
docker compose exec app cp .env.example .env
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate
```

### 5. Доступ

| Сервис      | URL                      |
|-------------|--------------------------|
| Приложение  | http://localhost:8000    |
| phpMyAdmin  | http://localhost:8080    |
| MySQL       | localhost:3306           |

## Сервисы

| Сервис       | Описание                          |
|--------------|-----------------------------------|
| `mysql`      | MySQL 8.0                         |
| `app`        | PHP 8.4-FPM, Laravel              |
| `nginx`      | Веб-сервер                        |
| `phpmyadmin` | Админка БД                        |

## Полезные команды

```bash
docker compose logs -f
docker compose logs -f app
docker compose down
docker compose restart
docker compose exec app bash
docker compose exec app php artisan migrate
```

## Переменные окружения

Пример в `.env.example`. Основные:

```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=notification_service
DB_USERNAME=notification_service
DB_PASSWORD=password

QUEUE_CONNECTION=sync

APP_PORT=8000
PHPMYADMIN_PORT=8080
```

## Примечания

- Composer-зависимости и миграции выполняются вручную после первого запуска.
- Фронтенд (Vite/npm) в проекте не используется.
- Redis и Laravel Horizon не входят в стек.
