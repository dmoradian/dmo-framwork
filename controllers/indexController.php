<?php

// use Illuminate\Database\Capsule\Manager as Capsule;
use eftec\bladeone\BladeOne;
require 'models\User.php';

/**
 * The home page controller
 */
class IndexController
{
    public function homePage()
    {
        //$user = Capsule::table('wp_users')->where('user_email', 'dd.moradian@gmail.com')->first();
        $user = User::where('user_email', 'dd.moradian@gmail.com')->first();

        $blade = new BladeOne(); // MODE_DEBUG allows to pinpoint troubles.
        echo $blade->run("hello", array("user" => $user)); // it calls /views/hello.blade.php
    }
}
