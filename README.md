# Yii2 example site for News

# Quick start:

1. Install Docker & Docker-compose

2. Execute command : <code>docker-compose up -d --build && docker-compose exec backend composer install && docker-compose exec backend /usr/local/bin/php yii migrate --interactive 0 && docker-compose exec backend chmod -R 777 /app/backend/assets /app/backend/runtime /app/frontend/assets /app/frontend/runtime
</code>

# Run

* Backend - http://localhost:21080/
* Frontend - http://localhost:20080/
* Adminer for DB - http://localhost:8080/

# Users

* admin:secret
* test:test

# Fill tables

* Add news by http://localhost:21080/news/create
* Add rubrics for news by http://localhost:21080/news-rubric

# Use REST API

Get all news by rubric & included rubrics
<code>
  curl --location --request GET 'http://localhost:20080/api/v1/news/rubric?rubric_id={rubric_id}' \
--header 'Accept: application/json' \
--header 'Authorization: Bearer {auth_key}'
</code>

auth bearer token = user's "Auth Key"
format JSON
rubric_id from table rubric
