<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
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
    ],
];
