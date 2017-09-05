Docker Yii2 App Advanced
========================

How to use?
-----------

1. Create new empty folder 
1. Run command on docker container (mishamx/yii2-app-advanced)
```bash
docker run --rm -v `echo $( pwd )`:/var/www/html mishamx/yii2-app-advanced:latest /sbin/dockerize init
```
1. Build test configuration
```bash
docker-compose -f docker-compose-test.yml build
```
1. Run all tests
```bash
docker-compose -f docker-compose-test.yml up
```