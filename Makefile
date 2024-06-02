dev:
	@docker compose up -d
	@docker compose exec node npm run dev

stop:
	@docker compose stop

node:
	@docker compose exec -it node bash

php:
	@docker compose exec -it php bash

migrate:
	@docker compose exec php php artisan migrate:fresh
	
seed:
	@make migrate
	@docker compose exec php php artisan db:seed