<?php

use Illuminate\Database\Capsule\Manager as Capsule;

require '../vendor/autoload.php';


// VIEW_BASE_PATH
define('VIEW_BASE_PATH', '../app/View/');


$capsule = new Capsule;
$capsule->addConnection(require '../config/db.php');


// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();
class_alias('View','WebView');

require '../config/routes.php';