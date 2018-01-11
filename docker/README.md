<p align="center">
  <img src="https://www.docker.com/sites/default/files/vertical_large.png" height="89" alt="LUYA Logo"/><img src="https://raw.githubusercontent.com/luyadev/luya/master/docs/logo/luya-logo-0.2x.png" alt="LUYA Logo"/>
</p>

# Docker Quickstart

### :one: Build Docker Image "luya_composer"

```sh
docker-compose build --build-arg GITHUB_TOKEN=token luya_composer
```

### :two: Start Docker

Starting the docker container, this can take up to 10 minutes.

```sh
docker-compose up
```

> After building the docker image from step 1, just the `docker-composer up` command must be run in future.

Wait until `docker_luya_composer_1 exited with code 0`

### :three: Setup LUYA

The last command will run the common LUYA commands and initialize a default admin user. 

```sh
docker-compose run luya_php setup
```

You'r done, you can now login at http://localhost:8080 with E-Mail `admin@admin.com` Password `admin`


## Docker Containers

| ID | What For | Listening Ports |
| --- | --- | --- |
| docker_luya_composer_1 | Installs Composer Dependencies each time "fired-up" | - |
| docker_luya_php_1 | Handles PHP Requests as FPM and you can use it as `Luya` Command-Proxy | 9000 |
| docker_luya_web_1 | Handles Web Requests (Nginx) | 8080 :arrow_right: 80 |
| docker_luya_db_1 | MySQL Database | 3306 |

## Composer

Use Composer from the Docker-Container to install and update:

```
cd /to/your/luya-kickstarter/docker
docker-compose run luya_composer install
docker-compose run luya_composer update
```

## Console commands

In order to run console commands like `migrate`, `import` or your custom commands use:

```sh
docker-compose run -ti luya_php luya <command>
```
