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
 * コンポーネント
 * @var     array
 * @access  public
 */
	var $components = array('BcAuth','Cookie','BcAuthConfigure');
/**
 * ヘルパー
 * 
 * @var array
 * @access public
 */
	var $helpers = array(BC_FORM_HELPER);
/**
 * サブメニューエレメント
 *
 * @var array
 * @access public
 */
	var $subMenuElements = array();
/**
 * ぱんくずナビ
 *
 * @var string
 * @access public
 */
	var $crumbs = array(
		array('name' => 'プラグイン管理', 'url' => array('plugin' => '', 'controller' => 'plugins', 'action' => 'index')),
		array('name' => 'IPリミッター管理', 'url' => array('plugin' => 'ip_limitter', 'controller' => 'ip_limitter_configs', 'action' => 'index'))
	);
/**
 * beforeFilter
 * @return	void
 * @access	public
 */
	function beforeFilter(){
		
		parent::beforeFilter();

	}
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
		$this->help = 'ip_limitter_configs_index';
		$this->render('index');

	}

}
