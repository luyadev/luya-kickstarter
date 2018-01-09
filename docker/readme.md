# Docker Quickstart
:rocket:

## :one:
#### Prerequisite

**Add your Github Token in docker-compose.yml**

## :two:
#### Start Docker

```
docker-compose up
```

**Composer needs 5-10 Minutes**  

Wait until `docker_luya_composer_1 exited with code 0`

## :three:

### Setup Luya

```
docker-compose run luya_php setup
```


## :heart:

Login http://localhost:8080 with E-Mail `admin@admin.com` Password `admin`


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
