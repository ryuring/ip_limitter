<?php 
/* SVN FILE: $Id: ip_limitter_configs.php 192 2011-06-04 15:53:54Z ryuring $ */
/* IpLimitterConfigs schema generated on: 2011-06-03 23:06:38 : 1307112218*/
class IpLimitterConfigsSchema extends CakeSchema {
	public $name = 'IpLimitterConfigs';

	public $file = 'ip_limitter_configs.php';

	public $connection = 'plugin';

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $ip_limitter_configs = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'value' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
}
?>