<?php
class module {
	public static function set_module($name,
									  $dir = '',
									  $steps = 0,
									  $widget = 0,
									  $uploads = 1,
									  $styles = 1,
									  $scripts = 1,
									  $steps_styles = 0,
									  $steps_scripts = 0) {
									   
		if($name) {
			if(!$dir) {
				$dir = $_SERVER['DOCUMENT_ROOT'].'/modules';
			}
			
			if(is_dir($dir)) {
				$basic_php_fwrite = "<?php includes :: get_includes('modules/".$name."/basic.php'); ?>";										
				$type = 2;

				if(!file_exists($dir.'/'.$name)) {
					mkdir($dir.'/'.$name, 0777, true);
				}

				if(!file_exists($dir.'/'.$name.'/basic.php')) {
					
					$fopen = fopen($dir.'/'.$name.'/basic.php', "x+");
					
					fwrite($fopen, $basic_php_fwrite);
					fclose($fopen);

					chmod($dir.'/'.$name.'/basic.php', 0777);
				}

				if($scripts === 1) {
					if(!file_exists($dir.'/'.$name.'/scripts.js')) {
						fopen($dir.'/'.$name.'/scripts.js', "w");
						includes :: set_includes($name,'modules/'.$name.'/basic.php', 'modules/'.$name.'/scripts.js');
					}
				}

				if($styles === 1) {
					if(!file_exists($dir.'/'.$name.'/styles.css')) {
						fopen($dir.'/'.$name.'/styles.css', "w");
						includes :: set_includes($name,'modules/'.$name.'/basic.php', 'modules/'.$name.'/styles.css');
					}
				}

				if($uploads === 1) {
					if(!file_exists($dir.'/'.$name.'/uploads')) {
						mkdir($dir.'/'.$name.'/uploads', 0777, true);
					}
				}

				if($steps != 0) {
					if(!file_exists($dir.'/'.$name.'/includes')) {
						mkdir($dir.'/'.$name.'/includes', 0777, true);
					}

					for($i=0; $i < $steps ; $i++) { 
						if(!file_exists($dir.'/'.$name.'/includes/step_'.$i.'.php')) {
							$fopen = fopen($dir.'/'.$name.'/includes/step_'.$i.'.php', "w");
							fwrite($fopen, "<?php includes :: get_includes('modules/'".$name."'/includes/step_'".$i."'.php'); ?>");
						}
					}

					if($steps_scripts === 1) {
						if(!file_exists($dir.'/'.$name.'/includes/scripts')) {
							mkdir($dir.'/'.$name.'/includes/scripts', 0777, true);
						}

						for($k=0; $k < $steps; $k++) {
							if($steps_scripts <= $steps) {
								if(!file_exists($dir.'/'.$name.'/includes/scripts/step_'.$k.'.js')) {
									fopen($dir.'/'.$name.'/includes/scripts/step_'.$k.'.js', "w");
									includes :: set_includes($name,'modules/'.$name.'/includes/step_'.$k.'.php', 'modules/'.$name.'/includes/scripts/step_'.$k.'.js');
								}
							}
						}
					}

					if($steps_styles === 1) {
						if(!file_exists($dir.'/'.$name.'/includes/styles')) {
							mkdir($dir.'/'.$name.'/includes/styles', 0777, true);
						}

						for($j=0; $j < $steps ; $j++) {
							if($steps_styles <= $steps) {
								if(!file_exists($dir.'/'.$name.'/includes/styles/step_'.$j.'.css')) {
									fopen($dir.'/'.$name.'/includes/styles/step_'.$j.'.css', "w");
									includes :: set_includes($name,'modules/'.$name.'/includes/step_'.$j.'.php', 'modules/'.$name.'/includes/styles/step_'.$j.'.css');
								}
							}
						}
					}
				}

				$check_module = select_one('modules',"name = '".$name."'");

				if(!$check_module) {
					insert('modules', "name,type,steps,widget", "'".$name."', ".$type.", ".$steps.", ".$widget);

					$now_added_module = select_one('modules',
															"name = '".$name."' AND type = ".$type." AND steps = ".$steps);
					
					create_table($name,$steps,'',0,$now_added_module['id']);
					
					if($now_added_module) {
						for($m = 0; $m < $steps; $m++) {
							$name_for_insert = $name.'_step_'.$m;
							$insert_steps_data = insert('modules_steps', "module_id,db_table,step", $now_added_module['id'].", '".$name_for_insert."', ".$m);
							$module_step = select_one('modules_steps', "db_table = '".$name_for_insert."'", __FILE__, __LINE__);
							
							$module_columns_var = ['id'];
							
							if($m > 0) {
								array_push($module_columns_var, 'parent');
								array_push($module_columns_var, 'step');
							}
							
							foreach($module_columns_var as $var) {
								$length = 11;
								
								if($var == 'step') {
									$length = 1;
								}
								
								$insert_columns_data = insert('modules_columns', "module_id,db_table,step_id,column_name,column_type,column_length,column_default,column_charset,languages,lang", $now_added_module['id'].", '".$name_for_insert."', ".$module_step['id'].", '".$var."', 'INT', '".$length."', '0', '', '0', ''");
							}
							

							$name_for_insert = $name;
						}
					}
				}
			}
		}
	}

	public static function delete_module($name, $delete_database = 0, $dir = '', $steps = 0) {
		
		if(!$dir) {
			$dir = D_R;
		}

		$path = $dir.'modules/'.$name;

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

			if($delete_database == 1) {
				$module = select_one('modules', "name = '".$name."'");
				
				if($module) {
					delete_table($name,$steps);
					delete('modules_steps', "module_id = ".$module['id']);
					delete('modules_columns', "module_id = ".$module['id']);
					delete('includes', "module_name = '".$module['name']."'");
					delete('modules', "id = ".$module['id']);
				}
				
			}

			return rmdir($path);
		}
	}
}