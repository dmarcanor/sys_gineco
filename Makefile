build:
	docker-compose -f docker-compose.yml build
up:
	docker-compose -f docker-compose.yml up -d
start:
	docker-compose -f docker-compose.yml start
down:
	docker-compose -f docker-compose.yml down
destroy:
	docker-compose -f docker-compose.yml down -v
stop:
	docker-compose -f docker-compose.yml stop
restart:
	docker-compose -f docker-compose.yml stop
	docker-compose -f docker-compose.yml up -d
ps:
	docker-compose -f docker-compose.yml ps
logs:
	docker-compose -f docker-compose.yml logs --tail=100 -f

login-php:
	docker-compose -f docker-compose.yml exec php sh

logs-mysql:
	docker-compose -f docker-compose.yml logs --tail=100 -f mysql
login-mysql:
	docker-compose -f docker-compose.yml exec mysql /bin/bash

logs-php:
	docker-compose -f docker-compose.yml logs --tail=100 -f php

logs-nginx:
	docker-compose -f docker-compose.yml logs --tail=100 -f nginx
login-nginx:
	docker-compose -f docker-compose.yml exec nginx /bin/bash

test:
	docker-compose exec php php vendor/bin/phpunit

#make fun=your_function_test test-filter
test-filter:
	docker-compose exec php php vendor/bin/phpunit --filter $(fun)

migrate:
	docker-compose exec php php artisan migrate

migrate-refresh:
	docker-compose exec php php artisan migrate:refresh

migrate-rollback:
	docker-compose exec php php artisan migrate:rollback

swap-memory:
	/bin/dd if=/dev/zero of=/var/swap.1 bs=1M count=1024
	/sbin/mkswap /var/swap.1
	/sbin/swapon /var/swap.1
