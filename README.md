# TREDO
Тестовое задание

## Установка

1. Запустите Docker-контейнеры:
```bash
   docker-compose up -d --build
```
2. Установите зависимости:
```bash
   docker-compose exec php composer install --no-interaction --prefer-dist
```
3. Скопировать в корень проекта файл .env (скинул отдельно)
4. Запустите очередь (для обработки пушей)
```bash
    docker exec app php artisan queue:work
```
## Описание ссылок:

- **http://localhost/** - главная страница

- **http://localhost/admin/** - административная панель<br>
  **Логин:** admin@example.com<br>
  **Пароль:** password

- **http://localhost/api/documentation** - описание API (**Swagger**)

- **http://localhost/api/register-device** - регистрация устройства

- **http://localhost/api/notification-delivered** - эндпоинт доставки сообщения

- **http://localhost/fcm.html** - страница создания FCM-токена для браузера  (для тестов)

Авторизацию и токены для API не стал делать для упрощения проекта (да и в задаче небыло)
