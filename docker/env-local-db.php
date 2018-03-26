<?php

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=luya_db;dbname=luya_kickstarter_101',
            'username' => 'luya',
            'password' => 'CHANGE_ME',
            'charset' => 'utf8',

            // in productive environments you can enable the schema caching
            // 'enableSchemaCache' => true,
            // 'schemaCacheDuration' => 43200,
        ]
    ]
];
