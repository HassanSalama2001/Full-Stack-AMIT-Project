In order to use the admin part of the project
You have to migrate the database and seed it using command

> php artisan make:migrate --seed

and then in the login form use:

email: admin@admin.com
password: 1234
