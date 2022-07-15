<?php
$url = $_SERVER['REQUEST_URI'];

if(count(explode('?', $url))) {
	$url = explode('?', $url)[0];
}

if(count(explode('/', $url)) > 2) {
	for($i = 0; $i < count(explode('/', $url));$i++) {
		if(array_key_exists(1,explode('/', $url))) {
			$languages =  select_one('languages',"title = '".explode('/', $url)[1]."' AND disabled = 0",0,__FILE__,__LINE__); 

			if($languages) {
				@define('LANG',$languages['title']);
			} else {
				$languages =  select_one('languages',"default_for_site = 1",0,__FILE__,__LINE__);
				@define('LANG', '');
				 
				get_to_default_url();
			}
		}

		if($i >= 1) {
			$b = $i - 2;
			@define('TEST_ALIAS_'.$b, explode('/', $url)[$i]);
		}
	}
} else {
	@define('LANG', '');
}

function alias($alias) {
	$result = false;
	
	if(defined('TEST_ALIAS_'.$alias)) {
		if($alias === 0) {
			if(TEST_ALIAS_0) {
				$result = true;
			}
		}
		
		if($alias === 1) {
			if(TEST_ALIAS_1) {
				$result = true;
			}
		}
		
		if($alias === 2) {
			if(TEST_ALIAS_2) {
				$result = true;
			}
		}
		
		if($alias === 3) {
			if(TEST_ALIAS_3) {
				$result = true;
			}
		}
		
		if($alias === 4) {
			if(TEST_ALIAS_4) {
				$result = true;
			}
		}
		
		return $result; 
	}
}

if(alias(0)) {
	define('ALIAS_0', urldecode(TEST_ALIAS_0));
} else {
	define('ALIAS_0', '');
}

if(alias(1)) {
	define('ALIAS_1', urldecode(TEST_ALIAS_1));
} else {
	define('ALIAS_1', '');
}

if(alias(2)) {
	define('ALIAS_2', urldecode(TEST_ALIAS_2));
} else {
	define('ALIAS_2', '');
}

if(alias(3)) {
	define('ALIAS_3', urldecode(TEST_ALIAS_3));
} else {
	define('ALIAS_3', '');
}

if(alias(4)) {
	define('ALIAS_4', urldecode(TEST_ALIAS_4));
} else {
	define('ALIAS_4', '');
}

$pages = select('pages','published = 1',0,__FILE__,__LINE__ );

if($pages) {
	foreach($pages as $pages) {
		if(!file_exists('pages/page_'.$pages['id'].'.php') && ALIAS_0 != 'admin') {
			$pages_fwrite = "<?php includes :: get_includes(D_R.'pages/page_".$pages['id'].".php'); ?>";
//			$handle = fopen('pages/page_'.$pages['id'].'.php', "w");
//			fwrite($handle, $pages_fwrite);
		}
	}
}

enable_def_url();

$file_exists = false;
$require_url = 'index.php';

//control_languages_columns();

if(ALIAS_0 && LANG) {
	$page =  select_one('pages',"alias_".LANG." = '".ALIAS_0."'",0,__FILE__,__LINE__);
	$module =  select_one('modules',"alias_".LANG." = '".ALIAS_0."'",0,__FILE__,__LINE__);

	if($page && !$module) {
		$require_url = D_R.'pages/'.ALIAS_0.'/'.ALIAS_0.'.php';

		if(file_exists($require_url)) {
			@define('PAGE_URL', $require_url);
		} else {
			@define('PAGE_URL', '');
		}
	} else if($module && !$page) {
		$require_url = D_R.'modules/'.$module['name'].'/basic.php';

		if(file_exists($require_url)) {
			@define('PAGE_URL', $require_url);
		} else {
			@define('PAGE_URL', '');
		}
	} else {
		@define('PAGE_URL', '');
		get_to_default_url();
	}
} else {
	define('PAGE_URL', '');
}


if(!empty($_SESSION['login_id'])) {
	$user =  select_one('users', 'id = '.$_SESSION['login_id'],0,__FILE__,__LINE__);
	if($user) {
		@define('LI', $user['id']);
		@define('LN', $user['name']);
		@define('LO', $user['otchestvo']);
		@define('LS', $user['surname']);
		@define('LE', $user['email']);
		@define('LP', $user['phone']);
		@define('LC', $user['country']);
		@define('LCI', $user['city']);
		@define('LY', $user['year']);
		@define('LM', $user['month']);
		@define('LD', $user['day']);
		@define('LR', $user['register_date']);
		@define('LIN', $user['info']);
	} else {
		@define('LI', false);
		@define('LN', false);
		@define('LO', false);
		@define('LS', false);
		@define('LE', false);
		@define('LP', false);
		@define('LC', false);
		@define('LCI', false);
		@define('LY', false);
		@define('LM', false);
		@define('LD', false);
		@define('LR', false);
		@define('LIN', false);
	}
} else {
	@define('LI', false);
	@define('LN', false);
	@define('LO', false);
	@define('LS', false);
	@define('LE', false);
	@define('LP', false);
	@define('LC', false);
	@define('LCI', false);
	@define('LY', false);
	@define('LM', false);
	@define('LD', false);
	@define('LR', false);
	@define('LIN', false);
}