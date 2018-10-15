<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 09.10.2018
 * Time: 22:36
 */

class Custom_CustomApi_Model_Input_HttpRequest_Validator_Factory extends Mage_Core_Model_Abstract {
	public function validate(Custom_CustomApi_Model_Input_HttpRequest $request) {
		$validator = Mage::getModel('customapi/input_httprequest_validator');
		$validator->setRequest($request);

		return Mage::getModel('customapi/input_httprequest_validator_result_factory')->getResult($validator);
	}
}