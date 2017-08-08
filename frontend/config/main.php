<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'name' => 'KC-ePMS',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module',
        ],
        'datecontrol' =>  [
            'class' => '\kartik\datecontrol\Module',
        ]
    ],
    'components' => [
        'request' => [
            //'csrfParam' => '_csrf-frontend',
            'cookieValidationKey' => '2821868438',
            'csrfParam' => '_frontendCSRF',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
            'authTimeout' => 60,
            'enableSession' => true,
            'autoRenewCookie' => true,
            'identityCookie' => [
                //'name' => '_identity-frontend', 
                'name' => 'PHPFRONTSESSID', 
                'httpOnly' => true
            ],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            //'name' => 'advanced-frontend',
            'timeout' => 60,
            'name' => 'PHPFRONTSESSID',
            'savePath' => sys_get_temp_dir(),
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
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'nullDisplay' => '',
            'dateFormat' => 'yyyy-M-d',
            'datetimeFormat' => 'd-M-Y H:i:s',
            'timeFormat' => 'H:i:s',
            'thousandSeparator' => ',',
            'decimalSeparator' => '.',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'urlManagerBackend' => [
            'class' => 'yii\web\urlManager',
            /*'baseUrl' => '/orgchart-profile/backend/web',
            'enablePrettyUrl' => true,
            'showScriptName' => false,*/
        ],
    ],
    'params' => $params,
];
