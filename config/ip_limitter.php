<?php
/**
 * IP Limitter システムナビ
 *
 * @package ip_limitter.config
 */
	$config['BcApp.adminNavi.ip_limitter'] = array(
			'name'		=> 'IPリミッター プラグイン',
			'contents'	=> array(
				array('name' => '設定', 
					'url' => array('admin' => true, 'plugin' => 'ip_limitter', 'controller' => 'ip_limitter_configs', 'action' => 'index'))
		)
	);

?>