<?php

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [

        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => getenv('DB_DSN'),
            'username' => getenv('DB_USER'),
            'password' => getenv('DB_PASSWORD'),
            'charset' => 'utf8',
            'tablePrefix' => '',

//            'enableSchemaCache' => true,
//            // Duration of schema cac he.
//            'schemaCacheDuration' => 3600,
//            // Name of the cache component used to store schema information
//            'schemaCache' => 'cache',

            'attributes'=>[
                PDO::ATTR_PERSISTENT => true
            ]
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
            'cookieValidationKey' => getenv('COOKIE_VALIDATION_KEY'),
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => '' . getenv('DB_TYPE') . ':host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_NAME') . '',
            'username'    => getenv('DB_USER_NAME'),
            'password'    => getenv('DB_USER_PASSWORD'),
            'charset' => 'utf8mb4',

            'enableSchemaCache'   => true,
            'schemaCacheDuration' => 3600,
            'schemaCache'         => 'cache',

            'attributes' => [
                PDO::ATTR_PERSISTENT => true,
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
    'params' => [
        'adminEmail' => 'admin@example.com',
    ],
];
