<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'language' => 'en-US',
    'id' => 'app-frontend',
    'layout'=>'main',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['languagepicker'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
              'languagepicker' => [
        'class' => 'lajax\languagepicker\Component',
        'languages' => ['en', 'de', 'fr', 'no','sv']                   // List of available languages (icons only)
    ],
            
   
	'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'user' => [

           'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_frontendUser', // unique for frontend
       ]
        ],
            'session' => [
            'name' => 'PHPFRONTSESSID',
            'savePath' => sys_get_temp_dir(),
        ],
            'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '[inttkCqVIPfLoUw9ThVq]',
            'csrfParam' => '_frontendCSRF',

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
         'i18n' => [
            'class' => 'yii\i18n\I18N',
            'translations' => [
                'yandex' => [
                    'class' => 'conquer\i18n\MessageSource',
                    'translator' => [
                        'class'=>'conquer\i18n\translators\YandexTranslator',
                        'apiKey' => 'trnsl.1.1.20160501T080136Z.457110417b5c1b90.7310ea2bff6b79c1e811c6767bc83e5b0fbb2ca9',
                    ],
                ],
            ],
        ],
//               'urlManager' => [
//            'enablePrettyUrl' => true,
//            'showScriptName' => false,
//            'rules' => [
//                '<controller:\w+>/<id:\d+>' => '<controller>/view',
//                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
//                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
//            ],
//        ],
    
        ],
    'params' => $params,
];
