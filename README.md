## About This Project

Just a simple project that have authentication and crud for product model.

## Installation

-   clone this repository
-   composer install
    ```
        composer install
    ```
-   copy `.env.example` to `.env`
-   generate key
    ```
        php artisan key:generate
    ```
-   create the database & adjust the settings in `.env`
    ```
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=programming_test
        DB_USERNAME=root
        DB_PASSWORD=
    ```
-   run fresh migration command
    ```
        php artisan migrate:fresh
    ```
-   install Vite and the Laravel plugin
    ```
        npm install
    ```
-   build and version the assets for production
    ```
        npm run build
    ```
