<?php
return [
    'name' => 'TradeStock - M102',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'session' => [
            'class' => 'yii\web\DbSession',
            'timeout' => 60*60*24*14, // 2 weeks
            // Store user_id also
            'writeCallback' => function($session) {
                return [
                    'user_id' => Yii::$app->user->id,
                ];
            }
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/translations',
                    'sourceLanguage' => 'en-US',
                    'forceTranslation' => true,
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/buttons' => 'buttons.php',
                        'app/models' => 'models.php',
                        'app/menu' => 'menu.php',
                        'app/labels' => 'labels.php',
                        'app/page_titles' => 'page_titles.php',
                    ],
                ],
                'yii' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/translations',
                    'sourceLanguage' => 'en-US',
                    'forceTranslation' => true,
                ],
            ],
        ],
    ],
];
