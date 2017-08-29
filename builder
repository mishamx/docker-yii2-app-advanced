#!/usr/bin/env bash

LINE="========================================================================="
PROJECT="mishamx/docker-yii2-app-advanced"
MODE="FBA"
STABILITY="dev"

function basecopy {
    APP_PATH="/app/*"
    echo ""
    echo "Copy files"
    for f in $APP_PATH;
    do
        if [[ $f = '/app/environments' ]] || \
           [[ $f = '/app/Dockerfile-builder' ]] || \
           [[ $f = '/app/.github' ]] || \
           [[ $f = '/app/builder' ]] || \
           [[ $f = '/app/README.md' ]] || \
           [[ $f = '/app/init' ]]
        then
            echo "Ignore $f"
        else
            echo "Copy $f"
            cp -R $f /var/www/html/
        fi
    done
}

case "$1" in

    "fb")
        echo "Frontend & Backend"
        MODE="FB"
        ;;

    "fba")
        echo "Frontend & Backend & API"
        MODE="FBA"
        ;;
    *)
        echo "Use: $0 <fb|fba>"
        exit 0
        ;;

esac

echo $LINE
echo "Create project $PROJECT"
echo $LINE

# TODO: remove for prod
#composer create-project --prefer-dist --stability=$STABILITY $PROJECT /app
echo "Init $MODE"
echo $LINE

cd /app
/app/init --env=$MODE --overwrite=y

echo $LINE
echo "Copy files"
echo $LINE
basecopy

echo $LINE
echo ""
