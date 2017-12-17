<?php

use Illuminate\Database\Capsule\Manager as Capsule;

	require '../vendor/autoload.php';



$capsule = new Capsule;
$capsule->addConnection(require '../config/db.php');


// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

require '../config/routes.php';