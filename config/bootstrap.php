<?php
if(!function_exists('getClientIP')){
	function getClientIP($safe = true) {
		if (!$safe && env('HTTP_X_FORWARDED_FOR') != null) {
			$ipaddr = preg_replace('/(?:,.*)/', '', env('HTTP_X_FORWARDED_FOR'));
		} else {
			if (env('HTTP_CLIENT_IP') != null) {
				$ipaddr = env('HTTP_CLIENT_IP');
			} else {
				$ipaddr = env('REMOTE_ADDR');
			}
		}

		if (env('HTTP_CLIENTADDRESS') != null) {
			$tmpipaddr = env('HTTP_CLIENTADDRESS');

			if (!empty($tmpipaddr)) {
				$ipaddr = preg_replace('/(?:,.*)/', '', $tmpipaddr);
			}
		}
		return trim($ipaddr);
	}
}

$IpLimitterConfig = ClassRegistry::init('IpLimitter.IpLimitterConfig');
$datas = $IpLimitterConfig->findExpanded();
if($datas) {
	if(empty($datas['allowed_ip'])) {
		return;
	}
	$allowedIp = preg_quote($datas['allowed_ip']);
	$patterns = str_replace("\*", '.+?', $allowedIp);
	$patterns = explode(',', $patterns);
	foreach($patterns as $pattern) {
		if(preg_match('/'.$pattern.'/', getClientIp())) {
			return;
		}
	}
	
	if(empty($datas['limit_folders'])) {
		header("HTTP/1.0 404 Not Found");
	} else {
		$limitFolders = explode(',', $datas['limit_folders']);
		$folder = explode('/', getUrlParamFromEnv());
		if(!empty($folder[0])) {
			$folder = $folder[0];
			if(in_array($folder, $limitFolders)) {
				if(empty($datas['redirect_url'])) {
					header("HTTP/1.0 404 Not Found");
				} else {
					header("Location: ".$datas['redirect_url']);
				}
			}
		}
	}
}
?>