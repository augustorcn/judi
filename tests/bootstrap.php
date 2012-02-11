<?php

set_include_path(realpath(dirname(__FILE__) . '/../src') . PATH_SEPARATOR . realpath(dirname(__FILE__) . '../src') . PATH_SEPARATOR . realpath(dirname(__FILE__) . '/../') . PATH_SEPARATOR . get_include_path()
);

spl_autoload_register(function($className){		
	$className = explode('\\', ltrim($className, '\\'));
	
	if (true == strpos(end($className), '_'))
		array_splice($className, -1, 1, explode('_', current($className)));

	$className = implode(DIRECTORY_SEPARATOR, $className) . '.php';	
	foreach (explode(PATH_SEPARATOR, get_include_path()) as $path) {
		if (file_exists($path . DIRECTORY_SEPARATOR . $className))
			require $path . DIRECTORY_SEPARATOR . $className;	
	}	
});