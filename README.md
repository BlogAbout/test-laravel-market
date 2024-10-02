Install all packages

```
composer install

npm i
```

Create database and configure .env

Run migrations.

Without mock:

`php artisan migrate`

Or with mock:

`php artisan migrate --seed`

Run server

`php artisan serve`

Go to http://127.0.0.1:8000/

For access to order page: login with credits:

```
Login: test@test.ru
Password: testtest
```
