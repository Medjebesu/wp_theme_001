docker compose exec wordpress rm -rf /var/www/html/wp-content/themes/medjeworks-001/*
docker compose cp ../medjeworks-001 wordpress:/var/www/html/wp-content/themes