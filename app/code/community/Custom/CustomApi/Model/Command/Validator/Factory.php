<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 14.10.2018
 * Time: 22:33
 */

class Custom_CustomApi_Model_Command_Validator_Factory extends Mage_Core_Model_Abstract {
	public function validate($params) {
		$validator = Mage::getModel('customapi/command_validator');
		echo "<pre>";
		print_r($params);
		echo "</pre>";

	}
}