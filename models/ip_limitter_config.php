<?php
/**
 * IP Limitter
 *
 * @package ip_limitter.models
 */
class IpLimitterConfig extends AppModel {
/**
 * モデル名
 * @var string
 * @access public
 */
	var $name = 'IpLimitterConfig';
/**
 * プラグイン名
 * @var string
 * @access public
 */
	var $plugin = 'IpLimitter';
/**
 * DB設定
 * @var string
 * @access public
 */
	var $useDbConfig = 'plugin';
}