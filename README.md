# hello-symfony-messenger

## How to use
```sh
# setup
make setup
docker-compose up

# run messenger:consume
docker-compose exec php make consume

# enqueue message
curl -v 'http://localhost:8080/?type=1'

# open RabbitMQ console
open http://localhost:15671
```

## Note
- To test Doctrine Transport
  - See https://github.com/tamakiii-sandbox/hello-symfony-messenger/pull/1/commits/7f5602c5282c332b0ade3a511459403dcb0e9128
