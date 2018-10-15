<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 06.10.2018
 * Time: 21:22
 */

class Custom_CustomApi_Model_Support_Logger extends Mage_Core_Model_Abstract {
	protected function _construct() {
		$this->_init('customapi_support/support_logger');
	}

	public function environmentInfoBuilder() {
		$server = $_SERVER;

		return $this->_dataConcatenate($server);
	}

	private function _dataConcatenate($data) {
		$concatenateString = '';

		foreach ($data as $key => $value) {
			if (gettype($value) === 'array') {
				$concatenateString .= $this->_dataConcatenate($value);
			}
			else {
				$concatenateString .= "${key}: ${value}; ";
			}
		}

		return $concatenateString;
	}
}