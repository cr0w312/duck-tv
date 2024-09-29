## Тестовое задание duck-tv

Разворачиваем окружение

```
git clone https://github.com/cr0w312/duck-tv.git
```

```
cd duck-tv
```

```
cp .env.example .env
```

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

после успешной установки запускаем контейнер

```
./vendor/bin/sail up -d
```

```
./vendor/bin/sail artisan key:generate
```

```
./vendor/bin/sail artisan migrate
```

```
./vendor/bin/sail artisan db:seed
```

```
./vendor/bin/sail npm install
```

```
./vendor/bin/sail npm run dev
```

Открываем браузер по адресу http://localhost