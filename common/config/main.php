<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
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
    ],
];
