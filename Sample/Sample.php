#!/usr/bin/php
<?php

require 'judi.phar';

try {
	$Judi = new \Judi\Judi(__DIR__ . '/config.yml');
	$Judi->run();
} catch (\Exception $e) {
	echo "{$e->getMessage()}\n";
}