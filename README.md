# Laravel Project with Docker

This is a Laravel project configured to run within Docker.

## Prerequisites

- Docker
- Docker Compose

## Getting Started

1. Clone the repository or unzip
    ```
    git clone <REPO_URL>
    ``` 

2. Navigate into the project directory:

    ```
    cd your_project_name
    ```
3. Copy the .env.example file and rename it to .env:

    ```
    cp .env.example .env
    ```
4. Modify the .env file to configure your database settings:

   Update the following variables to match your database configuration:

   ```
   DB_CONNECTION=mysql
   DB_HOST=db
   DB_PORT=3306
   DB_DATABASE=beer
   DB_USERNAME=beer_user
   DB_PASSWORD=!ed23zA24d
   ```
5. Build and start the Docker containers:

    ```
    docker-compose up -d --build
    ```
6. Access the Docker container shell:
    ```
    docker exec -it app-beers bash
    ```
7. Install PHP dependencies using Composer:

    ```
    composer install
    ```
8. Generate the Laravel application key:

    ```
    php artisan key:generate
    ```
9. Run the database migrations:

    ```
    php artisan migrate
    ```
10. Seed the database (for create User):

    ```
    php artisan db:seed
    ```
