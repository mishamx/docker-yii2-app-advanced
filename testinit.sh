#!/usr/bin/env bash

basetime=$(date +%s%N)
function runtime {
	time=$((($(date +%s%N) - ${basetime})/1000000))
	echo $(awk "BEGIN {printf \"%.4f\",${time}/1000}")
}
function logger {
	echo "$(runtime)    $1"
}
function migrate_up {
	./yii migrate/up --interactive=0
	./yii rbac-migrate/up --interactive=0
}

logger "Wait MySQL server"
echo "Waiting for MySQL"
until mysql -h $DB_HOST -P $DB_PORT -u $DB_USER_NAME -p$DB_USER_PASSWORD &> /dev/null
do
  printf "."
  sleep 1
done

sleep 3
echo ""
logger "MySQL server is running"

logger "Run migration"
php yii_test migrate --interactive=0
logger "Composer validate"
composer validate --strict
logger "Codecept"
vendor/bin/codecept run
