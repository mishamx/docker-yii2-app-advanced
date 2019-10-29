Docker Yii2 App Advanced
========================

How to use?
-----------
```bash
composer global require "fxp/composer-asset-plugin:~1.1.1"
composer create-project --prefer-dist --stability=dev 2mxdev/yii2-docker-app-advanced yii-application
./init # interactive
docker-compose build
docker-compose up
```

Open new  terminal window

```bash
docker-compose run --rm console ./yii migrate
```

