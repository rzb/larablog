# Larablog test

This is a test. Not intended for use in production. 

## Stack/skills

- Laravel 8
- MySQL
- VueJS
- Tailwind
- Varnish
- TDD
- Gitflow

## Thoughts

### Using varnish for full page caching

In order to minimise the strain put on our system during traffic peaks, I decided to leverage Varnish for full page cache. It will cache the homepage and the individual post pages for 2 minutes.

In a real world app, we'd need to know more about the traffic. For example, depending on how the users interact with the client's blog, it could be more appropriate to purge the homepage cache on post creation instead of using TTL. Also, parts of the content that depend on auth, like the link to the dashboard, could be loaded using ESI.

### Ordering by publication_date

I wasn't sure if the requirement was to allow the user to toggle asc and desc. And I couldn't have asked on the weekend. So I assumed you just wanted posts to be sorted by latest by default. Of course, no assumptions in real world projects!

## Instalation

### Clone repo with submodules:
```sh
$ git clone --recurse-submodules git@github.com:rzb/larablog.git
# Or, if you have already cloned it without the option to clone submodules... 
$ git submodule init
$ git submodule update
```

### Create laravel env file from example:

```sh
$ cp .env.example .env
```

### Create docker env file from example:

```sh
$ cp laradock/env-example laradock/.env
```

Mind COMPOSE_PATH_SEPARATOR if you're unluck to be on a Win machine like me.

### Start docker containers:

```sh
$ cd laradock
$ docker-compose up -d nginx mysql proxy
```  

The above will create a full laravel dev environment including MySQL and Varnish, and will also start running the cron job for importing posts from the provided remote server.

Varnish will be on port 80 and will redirect requests to nginx when cache is not applicable.

### Install composer packages:

```sh
$ docker-compose exec workspace composer install
```

### Generate app key:
```sh
$ docker-compose exec workspace php artisan key:generate
```

### Migrate and seed admin user:
```sh
$ docker-compose exec workspace php artisan migrate --seed
```

### Run tests
```sh
$ docker-compose exec workspace php artisan test
```
