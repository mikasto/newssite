<?php

$config = [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=mysql;dbname=news_db',
            'username' => 'news_db',
            'password' => 'secret',
            'charset' => 'utf8',
        ],
        'request' => [
            'cookieValidationKey' => 'SFGzblZ47q00GzlQU5sHL6ricq00zwrR',
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.*.*', '*']
    ];
}

return $config;
