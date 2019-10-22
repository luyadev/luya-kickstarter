<?php

use luya\Config;

$config = new Config('myproject', dirname(__DIR__), [
    'siteTitle' => 'My Project',
    'defaultRoute' => 'cms',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        /*
         * If you have other admin modules (e.g. cmsadmin) then you going to need the admin. The Admin module provides
         * a lot of functionality, like storage, user, permission, crud, etc.
         */
        'admin' => [
            'class' => 'luya\admin\Module',
            'secureLogin' => false, // when enabling secure login, the mail component must be proper configured otherwise the auth token mail will not send.
            'strongPasswordPolicy' => false, // If enabled, the admin user passwords require strength input with special chars, lower, upper, digits and numbers
            'interfaceLanguage' => 'en', // Admin interface default language. Currently supported: en, de, ru, es, fr, ua, it, el, vi, pt, fa
        ],
        // Frontend module for the `cms` module.
        'cms' => [
            'class' => 'luya\cms\frontend\Module',
            'contentCompression' => true, // compressing the cms output (removing white spaces and newlines)
        ],
        // Admin module for the `cms` module.
        'cmsadmin' => [
            'class' => 'luya\cms\admin\Module',
        ],
    ],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'charset' => 'utf8',
        ],
        /*
         * Add your smtp connection to the mail component to send mails (which is required for secure login), you can test your
         * mail component with the luya console command ./vendor/bin/luya health/mailer.
         */
        'mail' => [
            'isSMTP' => false,
            'from' => 'test@luya.io',
            'fromName' => 'test@luya.io',
        ],
        /*
         * The composition component handles your languages and they way your urls will look like. The composition components will
         * automatically add the language prefix which is defined in `default` to your url (the language part in the url  e.g. "yourdomain.com/en/homepage").
         *
         * hidden: (boolean) If this website is not multi lingual you can hide the composition, other whise you have to enable this.
         * default: (array) Contains the default setup for the current language, this must match your language system configuration.
         */
        'composition' => [
            'hidden' => true, // no languages in your url (most case for pages which are not multi lingual)
            'default' => ['langShortCode' => 'en'], // the default language for the composition should match your default language shortCode in the language table.
        ],
        /*
    	 * Translation component. If you don't have translations just remove this component and the folder `messages`.
    	 */
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                ],
            ],
        ],
    ]
]);

// database config for 
$config->component('db', [
    'dsn' => 'mysql:host=localhost;dbname=DB_NAME',
    // 'dsn' => 'mysql:host=localhost;dbname=DB_NAME;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock', // OSX MAMP
    // 'dsn' => 'mysql:host=localhost;dbname=DB_NAME;unix_socket=/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock', // OSX XAMPP
    'username' => '',
    'password' => '',
])->env(Config::ENV_LOCAL);

/*
// docker mysql config
$config->component('db', [
    'dsn' => 'mysql:host=luya_db;dbname=luya_kickstarter_101',
    'username' => 'luya',
    'password' => 'CHANGE_ME',
])->env(Config::ENV_LOCAL);
*/

$config->component('db', [
    'dsn' => 'mysql:host=localhost;dbname=DB_NAME',
    'username' => '',
    'password' => '',
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 0,
])->env(Config::ENV_PROD);

$config->component('cache', [
    'class' => 'yii\caching\FileCache'
])->env(Config::ENV_PROD);

// debug and gii on local env
$config->module('debug', [
    'class' => 'yii\debug\Module',
    'allowedIPs' => ['*'],
])->env(Config::ENV_LOCAL);
$config->module('gii', [
    'class' => 'yii\gii\Module',
    'allowedIPs' => ['*'],
])->env(Config::ENV_LOCAL);

$config->bootstrap(['debug', 'gii'])->env(Config::ENV_LOCAL);

return $config;
