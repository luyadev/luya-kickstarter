## Step 1
### Start Docker
```
docker-compose up
```

## Step 2

### Migrate (Non Interactive)
```
docker exec -t docker_luya_php_1 luya migrate --interactive=0
```

### Migrate (Interactive)

```
docker exec -ti docker_luya_php_1 luya migrate
```

## Step 3

### Import
```
docker exec -t docker_luya_php_1 luya import
```


## Step 4

### Setup (Non Interactive)
```
docker exec -t docker_luya_php_1 luya admin/setup --email=foo@bar.com --password=test --firstname=John --lastname=Doe --interactive=0

```

### Setup (Interactive)
```
docker exec -ti docker_luya_php_1 luya admin/setup

```