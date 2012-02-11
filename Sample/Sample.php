#!/usr/bin/php
<?php

require 'judi.phar';

$Judi = new \Judi\Judi(__DIR__ . '/config.yml');
$Judi->run();