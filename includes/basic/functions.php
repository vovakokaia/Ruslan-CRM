<?php
function refresh($url = '', $time = 0) {
?>
	<meta http-equiv="Refresh" content="<?= $time.';'.$url ?>">
<?php
}

function c_s($title = '', $text = '', $success = 'error') {
?>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

	<script>
		let title = '<?= $title ?>';
		let text = '<?= $text ?>';
		let success = '<?= $success ?>';

		Swal.fire(title,text,success)
	</script>
<?php
}

function send_sms($to,$text,$from = 'smsoffice') {
	$data = 'key=' . urlencode('b564b478081940439f445f00bee3919a') . '&destination=' . urlencode($to) . '&sender=' . urlencode($from). '&content=' . urlencode($text);
	$url = "http://smsoffice.ge/api/v2/send?".$data;

	$response = file_get_contents($url);
}

function parse($url) {
	echo $url;
	$ch = curl_init();
	$user_agent = 'Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0';

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_AUTOREFERER, false);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSLVERSION,CURL_SSLVERSION_DEFAULT);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, array(
	  'Page'=>'PasswordSeparationSignIn',
	  'gfx:login'=>'AFoagUXGBZfur8Y3qQEFTTFo4TgcPgG39w:1614353146831',
	  'continue'=>'https://ads.google.com/nav/login?dst=/aw/browser_not_supported?ocid%3D617978871%26euid%3D498103410%26__u%3D5849845090%26uscid%3D617978871%26__c%3D2721716479%26authuser%3D0%26predefinedReportId%3D8%26fwdpath%3D/aw/reporting/reporteditor/view',
	  'followup'=>'https://ads.google.com/nav/login?dst=/aw/browser_not_supported?ocid%3D617978871%26euid%3D498103410%26__u%3D5849845090%26uscid%3D617978871%26__c%3D2721716479%26authuser%3D0%26predefinedReportId%3D8%26fwdpath%3D/aw/reporting/reporteditor/view',
	  'service'=>'adwords',
	  'skipvpage'=>true,
	  'ltmpl'=>'signin',
	  'osid'=>1,
	  'ProfileInformation'=>'',
	  'SessionState'=>'AEThLlx2ArrgtaYyt-ja3vGPR_mn5oqulIkMI0TwCqBZtUpGbq9dsGYEmOE_7ggVNScux8JeXHPNZKtljlFeL_Dn3OYKgHqk7E77XBUEOkeZ0ktM_WLWQmhIQJQ3qZhe5cI_duaNhtL_lDioQ8GMRsJfaLWvBs2oSZ51lckLytliEUt8UtFQ5Q5MlhEjZOOScFgutRNA2mmV
flowName: GlifWebSignIn',
	  'flowName'=>'GlifWebSignIn',
	  '_utf8'=>'☃',
	  'bgresponse'=>'!4uGl4aPNAAUu6MihLkLRw1ZUSjWkUTsAKQAjCPxG8-Fmjg6TMHKTvZxkbrH9EoPHfp4ZLZj1m4yyQAXEEY3KR_2mDwAEFRQ5_2gBBwoBz401EHODAK8rotdu5roGvkh3emAHRwB36cOEWjWWZ_SwsuUd2Oj0N2qNIldhak5cSOvUHBQxgA2ziiMI7D0FAcsfBo9nLJIlxjw6kf5ZeONFrYiVdBKoi1NOz9EycLhHIGOw1nfQvKgCvfM9z_PxGzXV0lG_P1qwHzRfyozn7aLb8Hc2L0_5MjBmhZ9crLg0sI1jcidGtTTAGuL0seUMC6QejKihTTkg6N5SdpxsbAvCpE7QgZbKuBKy3rY-RYcxShmTI2pQCGCP5kNdQbev6f7-249DO51WKUQ130jZ8sbEm-AAPMGJEUhBfuPwlKg64ip_rvpVEtJQBWvK75CeCfydpRr08ys-xIugB1uU-E6ch4pTLOyn8J9__pED-HEld10XpXifJ8gHUTIofHqpgKkATpdMSHrLVJixFa7Xq6qWqtD8xFw32Pepo91D_XQiH9ZKpgib69yJ1jafdGNiqu4hNYg_DOOcSXkdSupI4YpnTM6vT91iPcoF9IlzGhxQd00cJe_8Kjny3-V4x18OVFl3MsbQy2PXc3yeWFXDU5JFAoiq982rnL_rwj6koC9tGkLLLezGf2DBBfbqkTSNggqHUtJ-7EsLV85q70skCVeZAJKGcAi9gJXCDmDtUdONFlBOomKYO6L8HfNhVD8BUt8PzL8tAwir593gZE4l2a67QgXM1-WoyZyG4PNCVwVma-MLOXGD-_yRhRWgQzKf7ISL9mNlWUPcf9K7hT3y7a-h_LBmjDSb9ZQfg6JKB-fIWhpRgcbEHN-leBE7WcQrBpTxYZ6x3KkFCkZD3RpOstd7QyGa8g',
	  'pstMsg'=>1,
	  'checkConnection'=>'',
	  'checkedDomains'=>'youtube',
	  'Email'=>'vovakokaia',
	  'signIn'=>'Next'
	));

//	curl_setopt($ch, CURLOPT_POSTFIELDS, array(
//	  'Page'=>'PasswordSeparationSignIn',
//	  'gfx:login'=>'AFoagUVD_qFRj-i3nEMM2fi27LSnoj9kmg:1614328463340',
//	  'continue'=>'https://ads.google.com/nav/login?dst=/aw/browser_not_supported?ocid%3D617978871%26euid%3D498103410%26__u%3D5849845090%26uscid%3D617978871%26__c%3D2721716479%26authuser%3D0%26predefinedReportId%3D8%26fwdpath%3D/aw/reporting/reporteditor/view',
//	  'followup'=>'https://ads.google.com/nav/login?dst=/aw/browser_not_supported?ocid%3D617978871%26euid%3D498103410%26__u%3D5849845090%26uscid%3D617978871%26__c%3D2721716479%26authuser%3D0%26predefinedReportId%3D8%26fwdpath%3D/aw/reporting/reporteditor/view',
//	  'service'=>'adwords',
//	  'skipvpage'=>true,
//	  'ltmpl'=>'signin',
//	  'osid'=>1,
//	  'ProfileInformation'=>'',
//	  'SessionState'=>'AEThLlw8TTog8gEhdpGADSce2RTjN-l7GCDal4B0c3f0U5br-tBUYa0dn42bR07yf1XgqqGeXyARk-JnWrJdixmUgsZSzFMDM78ZJqgvFszw3CD9zbEYI0UrkMGcZfaVs9uOvU7eiKEuW1HzlrHkrp-AxnDKqtFa8CObqlz0NEXU1LrZhQET1EdRY9ap6GN7kx1FqgBmRrJT',
//	  'flowName'=>'GlifWebSignIn',
//	  '_utf8'=>'☃',
//	  'bgresponse'=>'!n5ylnN7NAAXB_3NtwUKyGZLUY-RF0TsAKQAjCPxGZ017BYQIvz-TU0p6G5w8aHTQN326DDHwv5i-uMQkYrvlt1_RDwAEFQfAYWgBB5kHN9zz11kBSoF5fhs7Q3K-XZ85nBZjGj0Psoe8dd6u0j7uNeUydOIYMzWSlNAuB2ouZWTAYSFPkdTz2jqd2zdi-Y1FSEObb9hNJfQuFvgr-ImsPjN9BiYQ8elce1z8HTfK3JyeYhArh0JxXT49saK0gdtk7WFB2pqNxL7oBPa5Kf6q0nCVFTMqA5ZAeuUAyLpwNmFzPlfPJzTDYp5YBx_aZRKCrNpIJHOFUp2_pgoprG9w8gPVQkZP-80CPfoCCkDZ7EXlr4daWBLdXgJAvO5rlobJB0ovfV-MLjynE9OAtRuE-F1PyEPF28nelwWnmXCqeUweYdN0I3t1cB-I0rAFXH0yjvJSPIxclnssBMFppbyKCE5yxgQJPJ1G5zjFClzAYEuiwmlEG6C24t6JBkJUBTevEI5c5V-vQJph-Z0hsJrTsLEoUeZE8bHOSihjCJfVB7ewkkVrNl1BXI9iG2PpURTGT0oeaUSKkbQpd_D6w39cOC4dx7af0-Nx_cYU-Ta42yfG4B9Mz35KtS65zDGNU1aXAouWVD2ln7OhcQJ1MXfhI3dVXULzinB_c3LFEzElO0qGY-QhHbHb2zvVg2CXn6YFo6m9QXiL-rmkgcEZ8939scafIvNHMxnK3lYARjUhISqbM_xRgZ8XRSKMaH-Lu42pjojUeUEhRlp0VmEtrGGr-y-NT2vKJeo3Mk88IlfiHv31KygsHtfx0QuEhJHaB5wG6LaJf9upU2Dyu50A78eDLr3WP1dmOX0dxTb_bfSqMGUcLQiGwFk1citRT4kM3n0dYl_DIN9ygdzgDZ_JDnkZLa10akJsvGxByRr5__Xn7lmFh6YYAmwbRi0sTfaAlknuaEUr72HOvbzhuMzCTNg8DM2ZTjuglAdgWYSN_aEcjvEh78mDaGMHJGKhITPyIQAWtFtj0v9NRbT7n_xdz-woLAfTOz-KMdHoQIVTml733MiLNJo5qmjFixQ8CHsuhgQZbeZaIg_jd7kocrY6KsspqkVGGqr3gUPT4G7q5HRZZFR_U7KIYPGIhaGy6OyQF22tA78kPsokY5jNJan3RQJQc7bUJMQImqUbkfuCAqcC6fpLOrfo_ICJE1kwNIkBWIhDF1Ft-W6x8wK3ZGD5JQKbwAfCeOWtU3-DWmgc2TaLdzZOyByR3dx23i-r0EcQuom8la1lfQUCvJIjufF4BgAcrQz_XAMHnNolYl6w47AW4z4_t1lvpsVLt-dZXep4KUGD2vPfiI-61PGHrjBicWFdS1qnL1jk6-5rAdcCabw4E_uCxCM0V2LCq6esJcKBzhovL4QtUejnDc07hMVPQq508_1jmCQ0tlu_ikyDmqg5eb1s8lP2hJMSw4WHY7DOAwleeTJ60gMGNOcPp9BKtwC9i5u3xpi5bt8Qw2qCwtPcPWm12JvW-XrE2hT0Kb2KzogVl2lyvuD-xQgjp-Wia0n681F4jNaUj9EPDILmzkL3JSlaplkrM7nIMBxtDBkbvPr3SeQaUr7aajlDtei5qTphzCeuW2m2n7b8iN67TFsRTAjlLn1-E4b3CUisvNgzNoS5ENzwtaLtv0kpKDchu2QczXktHBCBKdi3S_52yFXg2pY-uBPIbrtNbZWUjsu2q_IeQHx_Zobyviy4rPAg-HKIBWLUjmVIGX0PR4WdigzoyUmM9ZimOu8R5j_VIEwRYgyHs4RP6q2cvLcRyeA4Ao1oMnQfalMlBLOWCimzbrS4ozTjam6l0TohRqmFmDkwQILgOV9Ph6HI32_AJno0BXwtReAxB_JvEkbhEV8MCWymsmirUhrgHI95lfQWJayHUoFdYfpvna4NzeHiPhxl79BlvX2lJZ1XDH1_1pTejLpiEFvFqAE3ZjyDQDlVEn2yL2z9XjhY7v-xOjJjmmHhZAeAOY6a5GwxIOPF7K568_ACpK8UyrECktFxxhPGwXnwzg-0WasEve38DbTwEXiWYPcVCbtyFcocNCs_9VR5Z9TEu35xo3MidqrABRF1bvZxWtmP0NvhuSMmJamwSveftad_uHmH_wfYoCz-vlQGMZF5DqHp5NXaOa3_IXGAZeBOZ0DiCSvGEkUXSgkgFlvQIUAV4vtXcOHy6u1eoWQ4brNhnSdBARRPnL9oYhUnZ05o7He2JHFyyUKJd46SL8aKryxLEKI62CWB3LYvtffJuEsw9qm40wM_JdXKM3b1TgGQeJK2F0lZbzomW_IhrwJieBGwDmN6qPzOnOMYQu_QBjMleJLTlJ5-ExRWP8Oad5x1XztRKuLO_oPl9SHfHhbss3o0oEwFbvU3CDm7_x8JyO4sGoSYBa3S7OxuBqW0c3dMCL8hcwZwgs5JI2Z5wbRM84zyqAjNPO8-yyeNE6Zk6AiWgKzHT1boFNR006xUO7So097RtyqdbjJx6Lva4TJa2EQPJ_jGLtTq6KpN8pUwlSmKK71GGMTXpaHBh34RPKwWtl743yFR5hcS',
//	  'pstMsg'=>1,
//	  'checkConnection'=>'',
//	  'checkedDomains'=>'youtube',
//	  'Email'=>'vovakokaia',
//	  'signIn'=>'Next',
//	'TL'=>'AM3QAYZweChoGNMXQbq-XeQAvDymdB-M0SNPzUC0bXSAzpgm-1FJX91cRMivFQ25',
//		'f.req'=>'["AEThLlxnord6ldvH08BMu0GtEsW501Fa9ypHdm1BDc4yLk1eY2VEcJSa2y5C54HapoRJoKJvwj6S3mV1XOf_mLSmplmaJSs2Yoza0OkJY7iMUgmiw4GPE3MC6l3Kl-ZPsdjwTHhP5ndARO_4xYDLXjOIt8DJK0nktLtYn-_ALXwdMfPdhkBuYQzsYRyQZBfLV6HohNeeEJ3iize3ZCcKa3wfoIdCuEDK7w6Iv7MdjZTEcdj_1lLQ0lfeVQKfIeKTDSISCvZo8_sxG9wT52uiRAVJY2yD5ZXKzOn0q2u1O3X6Tc4QLzyExwwkyf_QK5UyN_iqptZLREfWMMv3pCmBj7OqFumF9V1LH8wuAwmdUv3QUYdFw51FNFIAj4rqM-B6FWC_6m3yJwFzbOEF-yBTXgKNNYRw96PFFUZYqL90-n5g0j99uI60JcaL3fj90kV2mQABwgIVU1m-6ugozOCsimW3RWfc6OTnpTKZi8Zwyy48WnYanOg-Tf1fu_EJEKApuZZnXLGf1p05F48DuXEXr5WJkJAEQPPUtVh3DGj1k0m2RZmsdQ6l5MWQ-eEAj1ISD-8WNuP_x471",null,1,null,[1,null,null,null,["za39zemel2",null,true]]]',
//		'bgRequest'=>'["identifier","!SkmlSQXNAAVFbllORUKlTXhDf8ZRLjsAKQAjCPxGm7e02GZ5bqgIOBnavtnwy7R-OO5A5Wo1yfr6JtLNlhaP8TCWAgAAAJFSAAAAO2gBB5kEDMuONK7ruS7-aDmNFeeD7yU-R47LRt8HsGWj8wNnf8qNtz7XmqHUqAxGKqnVefktk5zpHGRMN1_wcd41NM2eFiTjdcoPtqjGkvzmC8KyZKyT4HB5ookZLNce9NP3oyWLZPYnYqGGvA37NDovAiYUlRYFQEW8u0K4teD0MUg8u6ZLsC0tZ0ww4Ag8iNpwO74dDN-cpMSBCdg8DATmvO6q6KOu--8BUiVEkzOoRh2HTqXOblAJRAwwa9SniGbNUjKFw3yxv2HKrOe84Flnp4zUggudEDuY6iff0HbfwgGfb_nqBsKnEEnlYQWqZLwDQWmE0tJSZ2rnPwzPOOagnlcqyIrau_pphIOjcRhjYjexTc7xKjZj4m2RA1-jNWETRBtYoJXLn2bSogn--DQDjdtIuK1kxiYgG29tFKg1InwkW4q7f06wGo-M308WAtbB_Be6eE6t7ha6fSxvgG5-NXyO6vrjBJ3guhsQkLf3EKdg1FJv_V9RZLEn4yS2keX7s8tVbArKjUESEWFhCikUB45HtXJl7Mu2MgVZh61OVF9dk3A3338XL0L6pvfEocTouOYpadxvHfHuytbePTD-DHJNKF2ukYW8DpB-fKBfkY2yGjXeB1mJ66v3lFpswKWpMsAr1YEd02RqbhaStc9h30qTeXdzEn3BzGlCvUjglCYpfBa9LwQPA8uptrhDKTTZf8wy_nmuRiTmoImjPHTzxlnadefWVYTGM7tKjEKzLYD6v2OAN-ckmS9gMkZDg7zPXUY7EskzcEbVcmDvNwHachtihO1AW6-FDYLG4KIa0iekAqgP-zEpZrkmJXKIkSGmNqXX8PnlNgGwCkc86tlgirTa88NG1SfZv6MTazwRV6li_6vRcIw65X-6auLdAXmoGbycv4URBgmVm31F4OuY-vdX5Nkkn37KN87GUMW5UPBdTkjwURngU5lwYMSyXhyRtSWXbtOZd5IoUE5v-i52tkK0RYpYTYzA3yp_9wK5Kedim5gsVXJ7kj0nPULSN9jD0trUo1HKHJf9hpf8E8XUVOItoNaC26CliP6dwWKJwt9wMH86BQnGBvSwQoN3g0Y2_vMyusSj81dHxs308OaBpmdWU40Enb8vriBiFab6Zvbl-myTqUaIKKjcRa7dpVvpwqJJvBd4AiprYuwKpdmRZnYpQaGs2aq51ieuqbbINChq2rimBU5IvVKGREZHQpLnnYBVC9IVbVRE-gmpr_awYgDDYDqUt7_HAax_-Plqx1QGFbYOShez5XqSUSXHoPV8TNdQ_093PB7HfGEDAvvQx98NexKkKY0jAcPBvJ-tOD_cPmNpMEDSdZiRgAeH-uwGFMUMZqoEgG6Cb_I9LJFrNeS6Fu7URL1k3ylK28ob_L0"]',
//		'bghash'=>'f8NIgaDPeg8Osj9-OZifW367PibtBMu_GYv7PXZG0wo',
//		'at'=>'AFoagUUIF0lGjzLP7bZusNJu8ZCZZDpOUw:1614333535651',
//		'azt'=>'AFoagUV1C9BPpVzIAbbHdv90ZSqhUlkWtA:1614333535651',
//		'cookiesDisabled'=>false,
//		'deviceinfo'=>[null,null,null,[],null,"GE",null,null,[],"GlifWebSignIn",null,[null,null,[],null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,[],null,null,null,[],[]],null,null,null,null,2,null,false],
//		'gmscoreversion'=>'undefined'
//	));
	
	$webcontent = curl_exec ($ch);
	$error = curl_error($ch); 

	curl_close ($ch);

	if($webcontent) {
		echo $webcontent;
		return($webcontent);
	}
}

function get_module_url($name) {
	$url = '';
	$modules =  select_one('modules', "name = '".$name."'", 0, __FILE__,__LINE__);
	
	if($modules) {
		$url = '/'.LANG.'/'.$modules['alias_'.LANG];
	}
	
	return($url);
}

function get_default_module_url($name) {
	$url = '';
	$modules =  select_one('modules', "default_module = 1", 0, __FILE__,__LINE__);
	
	if($modules) {
		$url = '/'.LANG.'/'.$modules['alias_'.LANG];
	}
	
	return($url);
}

function get_alias($alias) {
	$alias = strtolower($alias);
	$alias = str_replace('?', '', $alias);
	$alias = str_replace('_', '', $alias);
	$alias = str_replace('^', '', $alias);
	$alias = str_replace('/', '', $alias);
	$alias = str_replace(')', '', $alias);
	$alias = str_replace('(', '', $alias);
	$alias = str_replace('*', '', $alias);
	$alias = str_replace(' & ', '-and-', $alias);
	$alias = str_replace('&', '-and-', $alias);
	$alias = str_replace('%', '', $alias);
	$alias = str_replace('$', '', $alias);
	$alias = str_replace('#', '', $alias);
	$alias = str_replace('@', '', $alias);
	$alias = str_replace('|', '', $alias);
	$alias = str_replace("'", '', $alias);
	$alias = str_replace('"', '', $alias);
	$alias = str_replace(']', '', $alias);
	$alias = str_replace('[', '', $alias);
	$alias = str_replace('}', '', $alias);
	$alias = str_replace('{', '', $alias);
	$alias = str_replace(':', '', $alias);
	$alias = str_replace(';', '', $alias);
	$alias = str_replace(' ', '-', $alias);
	
	return($alias);
}

function control_languages_columns() {
	if(get_langs()) {
		$tables = ['bsw','msw','modules','modules_steps','pages'];
		$columns = [];
		$modules_and_pages =  select('modules,pages', "db_table != ''", '', 0, __FILE__,__LINE__);
		
		if($modules_and_pages) {
			foreach($modules_and_pages as $table) {
				array_push($tables, $table);
			}	
		}
		
		$columns_select_condition = '';
		
		foreach(get_langs() as $lang) {
			foreach($tables as $table) {
				if(!is_array($table)) {
					$checked_table = $table;
				} else {
					$checked_table = $table['db_table'];
				}
				
				$columns =  select('modules_columns', "languages = 1 AND db_table = '".$checked_table."'", '', 0, __FILE__,__LINE__);
				
				foreach($columns as $column) {
					if(! check_column($checked_table, $column['column_name'])) {
						 alter_table($checked_table, $column['column_name'],'VARCHAR','255');
					}
				}
				$columns_select_condition .= "lang != '".$lang['title']."' AND ";
			}
		}
		
		$columns_select_condition = substr($columns_select_condition, 0, -4);
		
		$modules_columns =  select('modules_columns', "languages = 1 AND ".$columns_select_condition, '', 0, __FILE__,__LINE__);
		
		foreach($modules_columns as $module_column) {
			if( check_column($module_column['db_table'], $module_column['column_name'])) {
				if( delete_column($module_column['db_table'],$module_column['column_name'])) {
					 delete('modules_columns', "id = ".$module_column['id']);
				}
			}
		}
	}
}

function get_langs($condition = 'disabled = 0') {
	$languages =  select('languages',$condition,'',0,__FILE__,__LINE__);

	if($languages) {
		return $languages;
	} else {
		return false;
	}
}

function get_to_default_url() {
	$module =  select_one('modules',"default_module = 1", 0, __FILE__,__LINE__ );
								  
	$lang =  select_one('languages',"default_for_site = 1",0,__FILE__,__LINE__ );				 

	refresh('/'.$lang['title'].'/'.$module['alias_'.$lang['title']]);
}

function enable_def_url() {
	$result = false;

	if(!LANG || !ALIAS_0) {
		$result = true;
	}

	if(LANG) {
		$lang =  select_one('languages',"disabled = 0 AND title = '".LANG."'",0,__FILE__,__LINE__ );
		
		if(!$lang) {
			$result = true;
		}
	}

	if(ALIAS_0 && LANG) {
		$pages =  select_one('pages',"alias_".LANG." = '".ALIAS_0."'",0,__FILE__,__LINE__ );
		
		$modules =  select_one('modules',"alias_".LANG." = '".ALIAS_0."'",0,__FILE__,__LINE__ );
									   
		if(!$pages && !$modules) {
			$result = true;
		}
	}

	if($result) {
		get_to_default_url();
	}
}
