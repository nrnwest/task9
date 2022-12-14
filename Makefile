##################
# Variables
##################

DOCKER_COMPOSE = docker-compose -f ./_docker/docker-compose.yml --env-file ./_docker/.env
DOCKER_COMPOSE_EXEC = exec -u www-data php-fpm

PRINT_SEPARATOR = "\n"
PRINT_WELCOME = Welcome: http://localhost:4000
PRINT_SWAGGER = Swagger: http://localhost:4000/api/documentation
PRINT_COVERAGE = Coverage: http://localhost:4000/coverage/index.html
PRINT_PGADMIN = pgAdmin: http://localhost:4000/browser/

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

net:
	docker network ls

##################
# App
##################

php:
	${DOCKER_COMPOSE} ${DOCKER_COMPOSE_EXEC}  bash
composer:
	${DOCKER_COMPOSE} ${DOCKER_COMPOSE_EXEC} composer install

##################
# Test
##################
test:
	${DOCKER_COMPOSE} ${DOCKER_COMPOSE_EXEC} php artisan test

##################
# Database
##################

db_migrate:
	${DOCKER_COMPOSE} ${DOCKER_COMPOSE_EXEC} php artisan migrate

db_seed:
	${DOCKER_COMPOSE} ${DOCKER_COMPOSE_EXEC} php artisan db:seed

db_add:
	make db_migrate db_seed

#################
#  Deployment
#################
dep:
	make build  up  composer pause10 db_add print

deploy_laravel:
	${DOCKER_COMPOSE} ${DOCKER_COMPOSE_EXEC} composer install --optimize-autoloader --no-dev
	${DOCKER_COMPOSE} ${DOCKER_COMPOSE_EXEC} php artisan config:cache
	#${DOCKER_COMPOSE} ${DOCKER_COMPOSE_EXEC} php artisan route:cache
	${DOCKER_COMPOSE} ${DOCKER_COMPOSE_EXEC} php artisan view:cache
	@echo edit file .env APP_DEBUG=false

redeploy_laravel:
	${DOCKER_COMPOSE} ${DOCKER_COMPOSE_EXEC} composer install --optimize-autoloader
	${DOCKER_COMPOSE} ${DOCKER_COMPOSE_EXEC} php artisan config:clear
	${DOCKER_COMPOSE} ${DOCKER_COMPOSE_EXEC} php artisan route:clear
	${DOCKER_COMPOSE} ${DOCKER_COMPOSE_EXEC} php artisan view:clear
	@echo edit file .env APP_DEBUG=false

#################
# pause
# for weak computers.
#################

pause10:
	sleep 10

#################
# Hi
#################
print:
	@echo ${PRINT_SEPARATOR}
	@echo ${PRINT_WELCOME}
	@echo ${PRINT_SWAGGER}
	@echo ${PRINT_COVERAGE}
	@echo ${PRINT_PGADMIN}
	@echo ${PRINT_SEPARATOR}
