init: check-if-env-file-exist
	@docker compose build

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

prod:
	@docker compose -f ./docker-compose.prod.yml up -d
	@docker compose -f ./docker-compose.prod.yml exec -it php bash

prod-down:
	@docker compose -f ./docker-compose.prod.yml down

check-if-env-file-exist:
	@if [ ! -f ".env" ]; then \
	  echo ".env file does not exist. Create a .env file and adjust it." ;\
	  exit 1;\
	fi; \
