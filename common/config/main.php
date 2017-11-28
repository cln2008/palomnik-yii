<?php
return [
    // 'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'vendorPath' => dirname(dirname(dirname(__DIR__))) . '/yii2/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'aliases' => [
        '@img' => '@common/images',
        '@mysite' => 'http://mysite.com'
    ],

];
