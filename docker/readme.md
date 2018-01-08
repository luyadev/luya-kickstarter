# Docker Quickstart
:rocket:

## :one:
#### Start Docker

*This takes about 5-10 Minutes*

```
docker-compose up
```

## :two:

### Migrate Database

| Non Interactive | Interactive |
| --- | --- |
| `docker exec -t docker_luya_php_1 luya migrate --interactive=0` | `docker exec -ti docker_luya_php_1 luya migrate` |

## :three:

### Import Dependencies

| Non Interactive |
| --- |
| `docker exec -t docker_luya_php_1 luya import` |

## :four:

### Account Setup

| Non Interactive | Interactive |
| --- | --- |
| `docker exec -t docker_luya_php_1 luya admin/setup --email=foo@bar.com --password=test --firstname=John --lastname=Doe --interactive=0` | `docker exec -ti docker_luya_php_1 luya admin/setup` |

## :five:

Check http://localhost:8080


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
