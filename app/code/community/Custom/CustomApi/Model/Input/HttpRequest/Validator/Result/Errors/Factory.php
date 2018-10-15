<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 13.10.2018
 * Time: 15:57
 */

class Custom_CustomApi_Model_Input_HttpRequest_Validator_Result_Errors_Factory extends Mage_Core_Model_Abstract {
	public function getErrors() {
		return Mage::getModel('customapi/input_httprequest_validator_result_errors');
	}
}