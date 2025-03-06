<?php

use Cipher\CipherFactory;

require_once __DIR__ . '/Cipher/CipherFactory.php';

$factory = new CipherFactory();
$athbash = $factory->create('atbash');
$baconian = $factory->create('baconian');
$caesar = $factory->create('caesar');

echo $athbash->encrypt('Hello World') . "\n";
echo $baconian->encrypt('Hello World') . "\n";
echo $caesar->encrypt('Hello World') . "\n";