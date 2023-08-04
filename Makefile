# Makefile

install:
	composer install

brain-games:
	php ./bin/brain-games

validate:
	composer validate

.PHONY: install