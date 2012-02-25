#!/usr/bin/php
<?php

require 'judi.phar';

try {
	$judi = new \Judi\Judi();
	$judi->run(__DIR__ . '/config.yml');
} catch (\Exception $e) {
	echo "{$e->getMessage()}\n";
}