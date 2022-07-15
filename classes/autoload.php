<?php
$classes_array = scandir(D_R.'classes');

foreach($classes_array as $class) {
	if($class != 'autoload.php') {
		if(strlen($class) > 2) {
			if(file_exists(D_R.'classes/'.$class)) {
				require_once D_R.'classes/'.$class; 
			}
		}
	}
}