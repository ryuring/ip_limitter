<?php 
/* SVN FILE: $Id: ip_limitter_configs.php 192 2011-06-04 15:53:54Z ryuring $ */
/* IpLimitterConfigs schema generated on: 2011-06-03 23:06:38 : 1307112218*/
class IpLimitterConfigsSchema extends CakeSchema {
	var $name = 'IpLimitterConfigs';

	var $file = 'ip_limitter_configs.php';

	var $connection = 'plugin';

	function before($event = array()) {
		return true;
	}

	function after($event = array()) {
	}

	var $ip_limitter_configs = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'value' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
}
?>