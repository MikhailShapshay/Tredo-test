<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>TREDO — Тестовое задание</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f9fafb;
            color: #333;
            padding: 40px;
            line-height: 1.6;
        }
        h1 {
            font-size: 2rem;
            color: #1f2937;
        }
        a {
            color: #2563eb;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        code {
            background-color: #e5e7eb;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: monospace;
        }
        .note {
            margin-top: 2rem;
            font-style: italic;
            color: #6b7280;
        }
    </style>
</head>
<body>
<h1>TREDO<br>Тестовое задание</h1>

<p><a href="http://localhost/" target="_blank">http://localhost/</a> — главная страница</p>

<p><a href="http://localhost/admin/" target="_blank">http://localhost/admin/</a> — административная панель</p>
<ul>
    <li>Логин: <code>admin@example.com</code></li>
    <li>Пароль: <code>password</code></li>
</ul>

<p><a href="http://localhost/api/documentation" target="_blank">http://localhost/api/documentation</a> — описание API (Swagger)</p>

<p><a href="http://localhost/api/register-device" target="_blank">http://localhost/api/register-device</a> — регистрация устройства</p>

<p><a href="http://localhost/api/notification-delivered" target="_blank">http://localhost/api/notification-delivered</a> — эндпоинт доставки сообщения</p>

<p><a href="http://localhost/fcm.html" target="_blank">http://localhost/fcm.html</a> — страница создания FCM-токена для браузера (для тестов)</p>

<p class="note">
    Авторизацию и токены для API не стал делать для упрощения проекта (да и в задаче не было).
</p>
</body>
</html>
