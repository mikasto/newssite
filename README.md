# Yii2 example site for News

# Quick start:

<code>
docker-compose up -d --build && docker-compose exec backend composer install && docker-compose exec backend /usr/local/bin/php yii migrate --interactive 0 && docker-compose exec backend chmod -R 777 /app/backend/assets /app/backend/runtime /app/frontend/assets /app/frontend/runtime
</doce>

# Run

* Backend - http://localhost:21080/
* Frontend - http://localhost:20080/
* Adminer for DB - http://localhost:8080/
