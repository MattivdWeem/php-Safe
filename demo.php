<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once('phpSafe.php');

// Make the world a better place.
function p($v){echo'<pre>';print_r($v);echo'</pre>';}

// demo token = 4qXP4JidW5Y8s7zVZxTewXWdvwrbbot5FfK
$keys = array('My Secret Hash','Your secret hash','Our secret Hash');
// start a new phpSafe instance, with security token already set.
$secure = new phpSafe('4qXP4JidW5Y8s7zVZxTewXWdvwrbbot5FfK');





p($secure->randomString(35));
// $secure->randomString(35)
// will output something like : 4qXP4JidW5Y8s7zVZxTewXWdvwrbbot5FfK



p($secure->hash('Safe And Secure'));
// $secure->hash('Safe And Secure')
// will output something like (You can parse arrays, but those will be serialized to a string) : 63c4901e6c9b40c257924a7639a9e433366c99b137b4aedd47a7f95d755c587f9b81d280297510e696bfe506e9ec1505043f6aedb941c9ad134472cb5ec4826f


$settings = array('specials' => '1.2');
p($secure->strenght('W8cHtWo0rD0$!', $settings));
p($secure->strenght('W8cHtWo0rD0$!'));
//p($secure->strenght($secure->randomString(35)));



// keys may be an array, or an string / int

p( $test = $secure->sCrypt('My Secret Line Of code',$keys));
p($secure->sDecrypt($test,$keys));


$secure->lockFile('demos/file-locker-normal.php', $keys, true); // creates a the .lock file
$secure->unlockFile('demos/file-locker-normal.php.lock', $keys, true); // opens the lock files creates a normal file
?>