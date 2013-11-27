<?php
class IpLimitterControllerEventListener extends BcControllerEventListener {
	
	public $events = array('startup');
	
	public function startup(CakeEvent $event) {
		
		$Controller = $event->subject();
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
				if(preg_match('/'.$pattern.'/', $Controller->RequestHandler->getClientIp())) {
					return;
				}
			}
			if(empty($datas['limit_folders'])) {
				if(empty($Controller->request->params['requested'])) {
					$Controller->notFound();
				}
			} elseif(!empty($Controller->request->url)) {

				$limitFolders = explode(',', $datas['limit_folders']);
				$folder = explode('/', $Controller->request->url);
				if(!empty($folder[0])) {
					$folder = $folder[0];
					if(in_array($folder, $limitFolders)) {
						if(empty($datas['redirect_url'])) {
							if(empty($Controller->request->params['requested'])) {
								$Controller->notFound();
							}
						} else {
							$Controller->redirect($datas['redirect_url']);
						}
					}
				}

			}
		}
	}
	
}