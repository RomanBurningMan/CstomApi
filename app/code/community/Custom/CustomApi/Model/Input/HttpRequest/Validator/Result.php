<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 10.10.2018
 * Time: 22:55
 */

class Custom_CustomApi_Model_Input_HttpRequest_Validator_Result extends Mage_Core_Model_Abstract {
	private $errors = [];

	public function addError($text) {
		$this->errors[] = "$text";
	}

	public function hasError() {
		if (empty($this->errors)) {
			return false;
		}

		return true;
	}

	public function getErrors() {
		return $this->errors;
	}
}