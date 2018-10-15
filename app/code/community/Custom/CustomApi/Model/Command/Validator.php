<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 14.10.2018
 * Time: 22:31
 */

class Custom_CustomApi_Model_Command_Validator extends Mage_Core_Model_Abstract {
	private $_data;

	public function setData($data) {
		$this->_data = $data;
	}
	public function hasParams() {
		if (empty($this->_data['params'])) {
			return false;
		}

		return true;
	}
}