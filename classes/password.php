<?php
class password {
	
	public static function get_password($password,$mode = 3, $max_symbols = 18) {

		$return_password = $password;

		if($mode === 3) {
			$password = md5($password);
			$password = sha1($password);
			$password = md5($password);
			$password = trim($password);
			$password = substr($password, 0, $max_symbols);
		}elseif($mode === 2) {
			$password = sha1($password);
			$password = trim($password);
			$password = substr($password, 0, $max_symbols);
		}elseif($mode === 1) {
			$password = md5($password);
			$password = trim($password);
			$password = substr($password, 0, $max_symbols);
		}elseif($mode === 0) {
			$password = md5($password);
			$password = trim($password);
		}elseif($mode === 4) {
			$password = $return_password;
		}
		
		return $password;
	}
}