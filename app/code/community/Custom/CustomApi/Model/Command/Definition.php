<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 14.10.2018
 * Time: 20:04
 */

class Custom_CustomApi_Model_Command_Definition extends Mage_Core_Model_Abstract {
	private $_definition = [];

	public function prepareData($apiData) {
		foreach ($apiData['commands'] as $command) {
			$this->_definition[$command]['validator'] = $apiData['validators'][$command];
		}
	}

	public function getDefinitions() {
		return $this->_definition;
	}
}