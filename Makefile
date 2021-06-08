.PHONY: help setup build clean

help:
	@cat $(firstword $(MAKEFILE_LIST))

setup: \
	vendor \
	build

build: Dockerfile
	docker-compose build

vendor:
	composer install

clean:
	docker-compose down -v
	rm -rf vendor
