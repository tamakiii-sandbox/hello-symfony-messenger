.PHONY: help setup build server clean

DATABASE_USER := root
DATABASE_PASSWORD := password
DATABASE_HOST := mysql
DATABASE_PORT := 3306
DATABASE_NAME := app

help:
	@cat $(firstword $(MAKEFILE_LIST))

setup: \
	vendor \
	.env.local \
	build

build: Dockerfile
	docker-compose build

server:
	symfony server:start --port=80

vendor:
	composer install

.env.local:
	echo 'DATABASE_URL="mysql://$(DATABASE_USER):$(DATABASE_PASSWORD)@$(DATABASE_HOST):$(DATABASE_PORT)/$(DATABASE_NAME)?serverVersion=13&charset=utf8"' > $@

clean:
	docker-compose down -v
	-rm -rf vendor
	-rm -f .env.local
