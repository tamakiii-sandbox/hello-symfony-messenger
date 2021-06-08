.PHONY: help setup build server clean

help:
	@cat $(firstword $(MAKEFILE_LIST))

setup: \
	vendor \
	build

build: Dockerfile
	docker-compose build

server:
	symfony server:start --port=80

vendor:
	composer install

clean:
	docker-compose down -v
	rm -rf vendor
