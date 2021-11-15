<?php
use AuthorPress\Start;

/**
 * Register Autoloader
 */
spl_autoload_register(function ($class) {
	$prefix = 'AuthorPress\\';
	$base_dir = __DIR__ . '/classes/';
	$len = strlen($prefix);
	if (strncmp($prefix, $class, $len) !== 0) {
		return;
	}
	$relative_class = substr($class, $len);
	$file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
	if (file_exists($file)) {
		require $file;
	}
});

/**
 * Boot it
 */
add_action( 'init', function(){
	new Start();
}, 1 );
