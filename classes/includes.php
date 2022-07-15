<?php
class includes {
	public static function get_includes($request_path) {
		
		$request_path = str_replace("\\", '/', $request_path);
		$request_files = select('includes',"request_file = '".$request_path."' OR to_all = 1");

		if($request_files) { 
			foreach($request_files as $request_files) {
				if(file_exists($request_files['file'])) {
					if($request_files['format'] == 1) {
						require_once($request_files['file']);
					} else if($request_files['format'] == 2) {
?>
						<link rel="stylesheet" href="/<?= $request_files['file'] ?>">
<?php
					} else if($request_files['format'] == 3) {
?>
						<script src="/<?= $request_files['file'] ?>"></script>
<?php
					}
				} else {
					delete('includes','id = '.$request_files['id']);
//					echo 'File ('.$request_files['file'].') -> Not Exists (Request_File -> '.$request_path.')<br><br>';
				}
			}
		}
	}

	public static function set_includes($module_name,$request_file,$included_file,$to_all = 0) {
		$request_file = str_replace("\\", '/', $request_file);
		$included_file = str_replace("\\", '/', $included_file);

		if(file_exists($included_file) && file_exists($request_file)) {
			if(explode('.', $included_file)[1] == 'php') {
				$format = 1;
			} else if(explode('.', $included_file)[1] == 'css') {
				$format = 2;
			} else if(explode('.', $included_file)[1] == 'js') {
				$format = 3;
			}

			$check = select_one('includes',"file = '".D_R.'/'.$included_file."' AND request_file = '".$request_file."'");
			
			if(!$check) {
				
				if($to_all) {
					$to_all = 1;
				} 

				$result = insert('includes',
										  'file,request_file,format,sector,to_all,module_name',
										  "'".$included_file."', '".$request_file."', '".$format."', '".$format."', '".$to_all."', '".$module_name."'");
			}
		} else {
			
			if(!file_exists($included_file)) {
				echo '77 Included File ('.$included_file.') Is Not Exists<br><br>';
			}

			if(!file_exists($request_file)) {
				echo '81 Request File ('.$request_file.') Is Not Exists<br><br>';
			}
		} 
	}

	public static function get_file_icludes_count($id) {
		$count = select('includes',"");
	}
}