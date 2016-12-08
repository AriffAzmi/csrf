<?php 


require 'vendor/autoload.php';


use CSRF\Csrf as CSRF;

$csrf = new CSRF();

echo "<pre>";
print_r($csrf->getToken());