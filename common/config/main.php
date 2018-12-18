<?php
return [
    'name' => 'TradeStock - M102',
    'language' => 'en-US',
    'sourceLanguage' => 'en-US',
    'bootstrap' => ['log'],
    'modules' => [],
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
        'assetManager' => [
            // The asset manager will create a symbolic link to the source path of an asset bundle when it is being published
            'linkAssets' => true,
            // Cache Busting
            'appendTimestamp' => true,
            // Instead of harcoding the true/false, use YII_DEBUG constant, so it is turned off in production
            'forceCopy' => YII_DEBUG,
            // override bundles to use CDN :
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => null,
                    'baseUrl' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7',
                    'css' => [
                        'css/bootstrap.min.css'
                    ],
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'sourcePath' => null,
                    'baseUrl' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7',
                    'js' => [
                        'js/bootstrap.min.js'
                    ],
                ],
                'yii\bootstrap\BootstrapThemeAsset' => [
                    'sourcePath' => null,
                    'baseUrl' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7',
                    'css' => [
                        'css/bootstrap-theme.min.css'
                    ]
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'urlManagerBackend' => [
                'class' => 'yii\web\urlManager',
                'baseUrl' => '@appRoot/backend', //i.e. $_SERVER['DOCUMENT_ROOT'] . '/yiiapp/web/'
                'enablePrettyUrl' => true,
                'showScriptName' => false,
        ],
        'urlManagerFrontend' => [
                'class' => 'yii\web\urlManager',
                'baseUrl' => '@appRoot/frontend', //i.e. $_SERVER['DOCUMENT_ROOT'] . '/yiiapp/web/'
                'enablePrettyUrl' => true,
                'showScriptName' => false,
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
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'Y-m-d',
            'datetimeFormat' => 'Y-m-d H:i:s',
            'timeFormat' => 'H:i:s',
            'locale' => 'en-us', // Language locale
            'defaultTimeZone' => 'Europe/Athens', // Timezone
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
    ],
];
