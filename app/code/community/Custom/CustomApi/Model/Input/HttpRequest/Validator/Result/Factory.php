<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 13.10.2018
 * Time: 15:56
 */

class Custom_CustomApi_Model_Input_HttpRequest_Validator_Result_Factory extends Mage_Core_Model_Abstract {
	public function getResult(Custom_CustomApi_Model_Input_HttpRequest_Validator $validator) {
		$result = Mage::getModel('customapi/input_httprequest_validator_result');
		$errors = Mage::getModel('customapi/input_httprequest_validator_result_errors_factory')->getErrors();

		if ($validator->checkRequestMethod() !== true) {
			$result->addError($errors->requestMethod());
		}

		if ($validator->checkVersion() !== true) {
			$result->addError($errors->version());
		}

		if ($validator->checkAction() !== true) {
			$result->addError($errors->action());
		}

		if ($validator->checkToken() !== true) {
			$result->addError($errors->token());
		}

		if ($validator->checkContentType() !== true) {
			$result->addError($errors->contentType());
		}

		return $result;
	}
}