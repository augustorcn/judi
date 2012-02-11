language: php

php:

	5.3
	5.4

before_script:
	wget -nc http://getcomposer.org/composer.phar
	php php composer.phar install
	php bin/run_phar

test: @cd tests;phpunit . 

  