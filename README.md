
**Dog Registry Challenge**

This project is a Challenge for Giga IT

Run following commands:

    $ composer install
    $ touch database/database.sqlite
    $ cp .env.example .env

Remove following lines in .env file

    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=

Change DB CONNECTION to sqlite

    DB_CONNECTION=sqlite

Run following commands

    $ php artisan migrate
    $ php artisan serve

Open browser

    go to http://localhost:8000/

Ready! Register your dog :)
