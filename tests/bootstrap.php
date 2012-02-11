<?php
require '../vendor/.composer/autoload.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespace('Judi', '../src');
$loader->register();