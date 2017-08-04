<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=kc_epms',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'db_libraries' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=libraries',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'db_infimos' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=infimos_2017',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'db_supply' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=supply_procurement_system',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'kccaraga.epms@gmail.com',
                'password' => 'kccaragaepms',
                'port' => '587',
                'encryption' => 'tls',
            ],
            'useFileTransport' => false,
        ],
    ],
];
