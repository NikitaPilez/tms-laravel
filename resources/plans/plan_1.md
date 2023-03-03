## Laravel
### Установка Laravel и первый запуск приложения
### Конфигурация приложения
### Развертывание приложение с помощью OpenServer
### Структура каталогов
### Первый маршрут контроллер и view.
### Роутинг

## Ссылки
[Фреймворк](https://highload.today/frejmvorki-v-veb-razrabotke/)
[Документация Laravel](https://laravel.com/docs/10.x/installation)
[Документация Laravel на русском](https://laravel.su/docs/8.x/installation)
[Конфигурация приложения](https://laravel.su/docs/8.x/configuration)
[Структура каталогов](https://laravel.su/docs/8.x/structure)
[Роутинг](https://laravel.su/docs/8.x/routing)

## План по установке приложения:
* Клонируем приложение через git clone
* Копируем .env.example в .env и заполняем нужные данные (например доступы к БД)
* генерируем ключ `php artisan key:generate`
* накатываем зависимости `composer install`
* запускаем сервер `php artisan serve`
