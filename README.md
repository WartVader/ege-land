## Как запустить проект
1) Запустить докер (или же через OpenServer, XAMPP, ...) - `docker-compose up -d`
2) Пройти по этому адресу - http://localhost:5050, всплывет окно с паролем (admin)
    * Создать новый сервер
    * Hostname - `postgres`
    * Port - `5432`
    * Username - тот что указали в файле `.env` поле `DB_USERNAME` (admin)
    * Password - поле `DB_PASSWORD` (admin)
    * Создать БД ege
3) Установить зависимости - `composer install` и `npm i`
4) Провести миграции - `php artisan migrate`
5) Создать ключ - `php artisan key:generate`
6) Запустить сервер - `php artisan serve`

Возможно какие-то этапы мог пропустить
