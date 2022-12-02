##################
# Variables
##################

DOCKER_COMPOSE = docker-compose -f ./_docker/docker-compose.yml --env-file ./_docker/.env
DOCKER_COMPOSE_PHP_FPM_EXEC = ${DOCKER_COMPOSE} exec -u www-data php-fpm
DOCKER_COMPOSE_TEST = ${DOCKER_COMPOSE} exec -u www-data php-fpm php bin/console

##################
# Docker compose
##################

build:
	${DOCKER_COMPOSE} build
start:
	${DOCKER_COMPOSE} start
stop:
	${DOCKER_COMPOSE} stop
up:
	${DOCKER_COMPOSE} up -d --remove-orphans
ps:
	${DOCKER_COMPOSE} ps
logs:
	${DOCKER_COMPOSE} logs -f
down:
	${DOCKER_COMPOSE} down -v --rmi=all --remove-orphans
restart:
	make stop start

##################
# App
##################

php:
	${DOCKER_COMPOSE} exec -u www-data php-fpm bash
composer:
	${DOCKER_COMPOSE} exec -u www-data php-fpm composer install

##################
# Test
##################
test:
	${DOCKER_COMPOSE} exec -u www-data php-fpm php artisan test

##################
# Database
##################

migrate:
	${DOCKER_COMPOSE} exec -u www-data php-fpm php artisan migrate
seed:
	${DOCKER_COMPOSE} exec -u www-data php-fpm php artisan db:seed

#################
#  Deployment
#################
dep:
	make build pause5 up pause4 composer pause60 migrate seed wprint

#################
# pause
# for weak computers.
#################

pause60:
	sleep 60
pause5:
	sleep 5
pause4:
	sleep 4

#################
# Hi
#################
wprint:
	@echo "\n"
	@echo Welcome: http://localhost:5000 Swager: http://localhost:5000/api/documentation
	@echo Coverage: http://localhost:5000/coverage/index.html pgAdmin: http://localhost:5050/browser/
	@echo "\n\n"

