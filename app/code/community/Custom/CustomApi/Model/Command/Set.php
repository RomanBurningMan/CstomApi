<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 14.10.2018
 * Time: 19:48
 */

class Custom_CustomApi_Model_Command_Set extends Mage_Core_Model_Abstract {
	private $_definitions;

	public function setDefinitions($definitions) {
		$this->_definitions = (array)$definitions;
	}

	public function search($command) {
		$keys = array_keys($this->_definitions);

		return in_array($command, $keys);
	}

	public function getDefinitions() {
		return $this->_definitions;
	}
}