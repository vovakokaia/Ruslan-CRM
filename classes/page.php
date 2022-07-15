<?php
class page {
	public static function create_page($name, $dir = '', $styles = 0, $scripts = 0) {
		
		if($name) {
			if(!$dir) {
				$dir = $_SERVER['DOCUMENT_ROOT'].'/pages';
			}
			
			if(is_dir($dir)) {
				$basic_php_fwrite = "<?php includes :: get_includes(".$dir.'/'.$name.'/'.$name.'.php'."); ?>";										
				$type = 2;

				if(!is_dir($dir.'/'.$name)) {
					mkdir($dir.'/'.$name, 0777, true);
				}

				if(!file_exists($dir.'/'.$name.'/'.$name.'.php')) {
					
					$fopen = fopen($dir.'/'.$name.'/'.$name.'.php', "x+");
					
					fwrite($fopen, $basic_php_fwrite);
					fclose($fopen);

					chmod($dir.'/'.$name.'/'.$name.'.php', 0777);
				}

				if($scripts === 1) {
					if(!file_exists($dir.'/'.$name.'/scripts.js')) {
						fopen($dir.'/'.$name.'/scripts.js', "w");
						includes :: set_includes($dir.'/'.$name.'/'.$name.'.php', $dir.'/'.$name.'/scripts.js');
					}
				}

				if($styles === 1) {
					if(!file_exists($dir.'/'.$name.'/styles.css')) {
						fopen($dir.'/'.$name.'/styles.css', "w");
						includes :: set_includes($dir.'/'.$name.'/'.$name.'.php', $dir.'/'.$name.'/styles.css');
					}
				}
				
//				mysql :: insert('pages', '');
			}
		}
	}

	public static function delete_page ($name, $delete_database = 0, $dir = '') {
		
		if(!$dir) {
			$dir = D_R.'/pages/'.$name.'/';
		}

		$path = $dir.$name;

		if(is_dir($path) === true) {
			$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::CHILD_FIRST);

			foreach($files as $file) {

				if(in_array($file->getBasename(), array('.', '..')) !== true) {
					if ($file->isDir() === true) {
						rmdir($file->getPathName());
					} else if (($file->isFile() === true) || ($file->isLink() === true)) {
						unlink($file->getPathname());
					}
				}
			}

			if($delete_database === 1) {
				mysql :: delete_table($name);
			}

			return rmdir($path);
		}
	}
}