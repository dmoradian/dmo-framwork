<?php
use Illuminate\Database\Capsule\Manager as Capsule;
 
$capsule = new Capsule;
 
$capsule->addConnection([
'driver'   => 'mysql',
'host'     => 'localhost',
'database' => '',
'username' => '',
'password' => '',
'charset'   => 'utf8',
'collation' => 'utf8_unicode_ci',
'prefix'   => '',
]);
 
 
// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
 
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();






// $dbHost = "localhost";
// $dbName = "wordpress_db";
// $dbUser = "root";      //by default root is user name.  
// $dbPassword = "";     //password is blank by default 
// $db;
// try {
//     $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
// } catch (Exception $e) {
//     echo "Connection failed" . $e->getMessage();
// }
