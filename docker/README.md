<p align="center">
  <img src="https://www.docker.com/sites/default/files/vertical_large.png" height="89" alt="LUYA Logo"/><img src="https://raw.githubusercontent.com/luyadev/luya/master/docs/logo/luya-logo-0.2x.png" alt="LUYA Logo"/>
</p>

# Docker Quickstart

**Keep in mind this dockerized LUYA setup is only for development and not for production env!**

### :one: Provide env config

> The docker commands have to be run in the root folder where the `docker-compose.yml` file is located.

Rename the `.env.dist` file to `.env` and add your github access token. This is used for composer cause it will reach the api rate limit. In order to get your access token go to: [https://github.com/settings/tokens](https://github.com/settings/tokens/new?description=luya_kickstarter_docker_token&scopes=repo)

> **Important** .env should never be exposed to your VCS.

### :two: Build Docker Image "luya_composer"

```sh
docker-compose build
```

### :three: Start Docker

Starting the docker container, this can take up to 10 minutes.

```sh
docker-compose up
```

> After building the docker image from step 1, just the `docker-composer up` command must be run in future.

Wait until `docker_luya_composer_1 exited with code 0`

### :four: Setup LUYA

The last command will run the common LUYA commands and initialize a default admin user. 

```sh
docker-compose run luya_php setup
```

You'r done, you can now login at http://localhost:8080 with E-Mail `admin@admin.com` Password `admin`

## Docker Containers and Port forwarding

|ID|What for|Listening ports|
|---|---|---|
|docker_luya_composer_1|Installs Composer Dependencies each time "fired-up"|-|
|docker_luya_php_1|Handles PHP Requests as FPM and you can use it as `luya` Command-Proxy|9000|
|docker_luya_web_1|Handles Web Requests (Nginx)|8080 :arrow_right: 80|
|docker_luya_db_1|MySQL Database|3306|

## General Docker infos

|Command|What it does
|---|---
|docker-composer down|This will shutdown/destroy all containers (including the databse)
|docker-compose build|This will freshly build the docker image from the yml file. So assuming you make changes in the yml file you have to run down and run build again.
|docker-composer up|This will serve the docker container so you can access trough web browser.
|docker-composer run|Starts the provided container.
|docker-composer exec|Execute a command in a running container.

## Composer

Use Composer from the Docker-Container to install and update:

```sh
docker-compose run luya_composer <composer_command>
```

An example *composer_command* could be `install`, `update` or `dump-autoload``

## Console commands

In order to run console commands like `migrate`, `import` or your custom commands use:

```sh
docker-compose exec luya_php luya <command>
```

> maybe in older versions its `-ti` instead of `-T`
