<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    
    'version' => '1.0 preview',
    
    //List of components that should be run during the application bootstrapping process.
    'bootstrap' => ['log', 'debug'],
    
    'language' => 'ja-JP',
    
    'defaultRoute' => '/site/index',
    
    // maintenance mode temporarily
    // 'catchAll' => ['site/offline'],
    
    'components' => [
        // ...
        'urlManager' => [
            'showScriptName' => true,  // Disable index.php
            'enablePrettyUrl' => true,  // Disable r= routes
//            'suffix' => '.html',

            'rules' => [
                
                // URL规则有优先度，写在前面的优先匹配
                // 左边的URL，右边对应的Controller和Action
                'dashboard' => 'site/index',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<id:\w+>.<category>' => '<controller>/view',
            ],
        ],
        
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'm4zlSC4UkacWakQkrBTxuDhFv7bWchV9',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            // http://yii2-cookbook.readthedocs.org/cookies/
            
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                    'file' => [
                        'class' => 'yii\log\FileTarget',
//                        'levels' => ['trace', 'info', 'warning', 'error'],
                        'levels' => ['info', 'warning', 'error'],
//                        'categories' => ['app\controllers\SiteController'],
                        'logVars' => [],
                    ],
//                    'email' => [
//                        'class' => 'yii\log\EmailTarget',
//                        'levels' => ['error'],
//                        'categories' => ['yii\db\*'],
//                        'message' => [
//                           'from' => ['log@example.com'],
//                           'to' => ['admin@example.com', 'developer@example.com'],
//                           'subject' => 'Database errors at example.com',
//                        ],
//                    ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';
    
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*', '192.168.178.20'] // adjust this to your needs
        ];
}

return $config;
