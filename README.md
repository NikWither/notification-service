# Notification Service (Laravel + Docker)

Минимальный бэкенд-стек без фронтенда: `Laravel`, `MySQL`, `Nginx`, `phpMyAdmin`.

## Что внутри

- `app` — PHP-FPM контейнер с Laravel
- `mysql` — база данных MySQL 8
- `nginx` — веб-сервер (проксирует PHP)
- `phpmyadmin` — веб-админка базы

## Быстрый запуск

Выполняй команды из корня проекта:

```bash
docker compose up -d --build
```

Проверка статуса:

```bash
docker compose ps
```

## Первый запуск Laravel

Если проект уже развернут (есть `artisan`, `composer.json`) — просто:

```bash
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate
```

## Доступы

- Приложение: `http://localhost:8000`
- phpMyAdmin: `http://localhost:8080`
- MySQL: `localhost:3306`

## Как зайти в контейнеры

```bash
docker compose exec app sh
docker compose exec mysql sh
docker compose exec phpmyadmin sh
```

## Важно

- `artisan` удалять **нельзя** — это основной CLI Laravel.
- Фронтенд (Node/npm/Vite) из проекта удален.
- Redis и Horizon не используются.

## Полезные команды

```bash
docker compose logs -f
docker compose logs -f app
docker compose restart
docker compose down
```
