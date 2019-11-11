<?php
$loader = require_once __DIR__.'/vendor/autoload.php';

$loader->addPsr4('App\\', __DIR__.'/classes/App');
$loader->addPsr4('Controllers\\', __DIR__.'/classes/Controllers');
$loader->addPsr4('Models\\', __DIR__.'/classes/Models');
$loader->addPsr4('Views\\', __DIR__.'/classes/Views');

use App\App; 

$app = new App();
