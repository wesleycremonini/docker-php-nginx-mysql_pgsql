### About:

Initial setup for no-framework php development with MVC architecture and Service & Repository pattern.

###### Composer packages:

filp/whoops -> Error handler
monolog/monolog -> Logger
illuminate/database -> ORM
bramus/router -> Routing

###### How to use:

1. Clone this repo
2. cd path/to/clone
3. docker compose up --build -d
4. docker exec -it php-fpm bash
5. composer install && composer dump
6. enjoy & develop
