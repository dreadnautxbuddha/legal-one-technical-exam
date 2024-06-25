# Overview
This project serves as a technical exam for Legal One.

# Setup

### Environment Variables
> ⚠️ Before anything else, you need to setup your .env file first. Both [Docker Compose](https://docs.docker.com/compose/) and the project needs it in order to work properly 

First, copy the `.env` file to yours:

```shell
cp .env .env.local
```

then in your `.env.local` file, supply the following environment variables:

1. `POSTGRES_USER`
2. `POSTGRES_PASSWORD` 
3. `POSTGRES_DB` 
4. `SERVER_NAME` 
5. `HTTP_PORT` 
6. `HTTPS_PORT` 
7. `HTTP3_PORT`

After that, you can proceed with the next steps. 

### Docker Compose
This project uses [Docker Compose](https://docs.docker.com/compose/) for development. Simply clone the project, and run the following:

```shell
docker compose build
docker compose up -d
``` 

### Install dependencies
Once the containers are up and running, you can now install the dependencies by entering the `php` container:
```shell
docker compose exec -it php /bin/bash
```

and installing the Composer packages:

```shell
composer install
```

### Database migrations
once you have installed the Composer packages, you can start running the migrations:

```shell
php bin/console doctrine:migrations:migrate
```

# Unit Tests
Tests can be run by entering the `php` container again:

```shell
docker compose exec -it php /bin/bash
```

and running:

```shell
php bin/phpunit
```

# Usage
Find out more about how this command is used [here](./docs/index.md).
