<?php
/**
 * IP Limitter設定コントローラー
 *
 * @package ip_limitter.controllers
 */
class IpLimitterConfigsController extends AppController {
/**
 * コントローラー名
 * @var string
 * @access public
 */
	var $name = 'IpLimitterConfigs';
/**
 * モデル
 * @var array
 * @access public
 */
	var $uses = array('Plugin', 'IpLimitter.IpLimitterConfig');
/**
 * IP Limitter設定
 * @return void
 * @access public
 */
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