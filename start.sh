#!/bin/sh

until nc -z "$DB_HOST" "$DB_PORT"; do
  echo "Waiting for DB ($DB_HOST:$DB_PORT)..."
  sleep 2
done

php artisan migrate --force

npm run build

php artisan reverb:start

