<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Notification Service') }}</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f6f7f9;
            color: #1f2937;
        }
        .wrap {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }
        .card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 24px;
            max-width: 560px;
            width: 100%;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.06);
        }
        h1 {
            margin: 0 0 10px 0;
            font-size: 24px;
        }
        p {
            margin: 0;
            color: #4b5563;
            line-height: 1.5;
        }
    </style>
</head>
<body>
<div class="wrap">
    <div class="card">
        <h1>{{ config('app.name', 'Notification Service') }}</h1>
        <p>Laravel работает в Docker. Стек: PHP-FPM + Nginx + MySQL + phpMyAdmin. Фронтенд-зависимости удалены.</p>
    </div>
</div>
</body>
</html>
