<?php
$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/test_db.php';

/**
 * Application configuration shared by all test types
 */
return [
    'id' => 'Effect24 CRM (Test)',
    'language' => 'ru-RU',
    'basePath' => dirname(__DIR__),
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'db' => $db,
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'assetManager' => [
            'basePath' => __DIR__ . '/../web/assets',
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
        'user' => [
            'identityClass' => 'app\models\Identity',
            'enableAutoLogin' => true,
        ],
        'session' =>  [
            'class' => 'yii\web\DbSession',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'request' => [
            'cookieValidationKey' => 'test',
            'enableCsrfValidation' => true,
            'csrfParam' => '_csrf-token',
            // but if you absolutely need it set cookie domain to localhost
            'csrfCookie' => [
                'domain' => 'localhost',
            ],
        ],
        'defaultRoute' => 'main',
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                '<action:(|login|logout)>' => 'main/<action>',
                '<controller>' => '<controller>/index',
                '<controller>/<action>' => '<controller>/<action>',
                '<controller>/<action>/<id:\d+>' => '<controller>/<action>',
                '<module>/<controller>/<action>' => '<module>/<controller>/<action>',
            ],
        ],
    ],
    'params' => $params,
];
