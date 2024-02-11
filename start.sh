#!/bin/sh

composer install
php artisan key:generate
php artisan storage:link
_sleep_seconds=20
echo "Attendo ${_sleep_seconds}s che il db si attivi..."
sleep ${_sleep_seconds}s
echo "Inizializzo il db tramite php artisan migrate... attendi il completamento"
php artisan migrate
echo "db inizializzato"

#exec docker-php-entrypoint php-fpm
