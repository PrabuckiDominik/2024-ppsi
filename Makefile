dev:
	@docker compose up -d
	@docker compose exec node npm run dev

stop:
	@docker compose stop

node:
	@docker compose exec -it node bash

php:
	@docker compose exec -it php bash
