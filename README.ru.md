# Laravel project-task manager

Простой менеджер проектов и задач вдохновлённый такими сервисами как WEEEK и Trello.

English version: [README.md](README.md)

## Функционал

- Пользовательская авторизация
- Доски проектов и списки задач
- CRUD-операции с задачами и проектами
- Авторизация через Middleware

## Стек

- PHP
- Laravel
- MySQL
- JavaScript
- Tailwind CSS

## Установка

Клонируйте репозиторий в вашу директорию

`git clone https://github.com/wisheddude/Project-manager-laravel`

Перейдите в директорию проекта

`cd Project-manager-laravel`

Установите зависимости

`composer install`

Переименуйте файл окружения

`ren .env.example .env`

Сгенерируйте ключ для приложения

`php artisan key:generate`

Создайте миграции и заполните базу данных

`php artisan migrate --seed`

Установите необходимые пакеты и скомпилируйте стили

`npm install`

`npm run build`

Отлично, запустите проект командой

`php artisan serve`

## Использование

Чтобы войти, используйте следующие данные: mail@example.com, passwd

## Скриншоты

### Страница входа

![Login page](docs/screenshots/Login.png)

### Страница регистрации

![Sign up page](docs/screenshots/SignUp.png)

### Главная страница

![Main page](docs/screenshots/Main.png)

### Задачи в проекте

![Tasks in project](docs/screenshots/InProject.png)

### Страница создания проекта

![Project create page](docs/screenshots/ProjectCreate.png)

### Страница редактирования проекта

![Project edit page](docs/screenshots/ProjectEdit.png)
