<?php
/* SVN FILE: $Id$ */
/**
 * [IpLimitter] 設定ページ
 *
 * PHP version 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2011 - 2012, Catchup, Inc.
 * @link			http://www.e-catchup.jp Catchup, Inc.
 * @package			ip_limitter.controllers
 * @since			Baser v 2.0.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			MIT lincense
 */
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