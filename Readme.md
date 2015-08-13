# Yii2-Eventlog



## Installation

Add to the modules in config/main.php

You can override the default layout as well.

    'modules'    => [
        'eventlog'  =>  [
            'class'     =>  'wartron\yii2eventlog\Module',
        ],
    ],

Run the migrations

   ./yii migrate/up --migrationPath=/vendor/wartron/yii2eventlog/migrations