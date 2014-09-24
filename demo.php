<?php

include_once('phpSafe.php');

// demo token = 4qXP4JidW5Y8s7zVZxTewXWdvwrbbot5FfK

// start a new phpSafe instance, with security token already set.
$secure = new phpSafe('4qXP4JidW5Y8s7zVZxTewXWdvwrbbot5FfK');





p($secure->randomString(35));
// $secure->randomString(35)
// will output something like : 4qXP4JidW5Y8s7zVZxTewXWdvwrbbot5FfK



p($secure->hash('Safe And Secure'));
p($secure->hash(array('i am',' testing ', 'ArRaYsz')));
// $secure->hash('Safe And Secure')
// will output something like (You can parse arrays, but those will be serialized to a string) : 63c4901e6c9b40c257924a7639a9e433366c99b137b4aedd47a7f95d755c587f9b81d280297510e696bfe506e9ec1505043f6aedb941c9ad134472cb5ec4826f


$settings = array('specials' => '1.2');
p($secure->strenght('W8cHtWo0rD0$!', $settings));
p($secure->strenght('W8cHtWo0rD0$!'));
p($secure->strenght($secure->randomString(35)));
// same input, different settings


// keys may be an array, or an string / int
$keys = array('one','different','key');
p( $test = $secure->sCrypt('My Secret Line Of code',$keys));
p($secure->sDecrypt($test,$keys));



?>