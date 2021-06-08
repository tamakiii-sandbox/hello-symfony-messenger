.PHONY: help clean

help:
	@cat $(firstword $(MAKEFILE_LIST))

setup: \
	build

build: Dockerfile
	docker-compose build

clean:
	docker-compose down -v
