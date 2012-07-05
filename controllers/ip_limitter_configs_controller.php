<?php
App::import('Controller', 'Plugins');
class IpLimitterConfigsController extends PluginsController {
/**
 * コンポーネント
 * 
 * @var array
 * @access public
 */
	var $components = array('BcAuth', 'Cookie', 'BcAuthConfigure');	
	var $name = 'IpLimitterConfigs';
	var $uses = array('Plugin', 'IpLimitter.IpLimitterConfig');
	function admin_index() {
		if(!$this->data) {
			$this->data = array('IpLimitterConfig' => $this->IpLimitterConfig->findExpanded());
		} else {
			$this->IpLimitterConfig->set($this->data);
			if($this->IpLimitterConfig->validates()) {
				$this->IpLimitterConfig->saveKeyValue($this->data);
				$message = 'IPリミッターの設定を保存しました。';
				$this->Session->setFlash($message);
				$this->IpLimitterConfig->saveDbLog($message);
				$this->redirect(array('action','index'));
			}
		}
		$this->pageTitle = 'IPリミッター設定';
		$this->render('index');
	}
}