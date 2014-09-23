<?php

include_once('phpSafe.php');

$secure = new phpSafe;

p($secure->randomString(35));

?>