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

### Setup (Non Interactive)

| Non Interactive | Interactive |
| --- | --- |
| `docker exec -t docker_luya_php_1 luya admin/setup --email=foo@bar.com --password=test --firstname=John --lastname=Doe --interactive=0` | `docker exec -ti docker_luya_php_1 luya admin/setup` |

