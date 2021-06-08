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

