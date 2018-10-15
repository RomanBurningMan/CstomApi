<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 13.10.2018
 * Time: 15:58
 */

class Custom_CustomApi_Model_Input_HttpRequest_Validator_Result_Errors extends Mage_Core_Model_Abstract {
	public function requestMethod() {
		return 'request method must be only POST';
	}
	public function version() {
		return 'not found API version (pattern v[1-9])';
	}
	public function action() {
		return 'not fount action method';
	}
	public function token() {
		return 'not found token. Send token in header Authorization: Token XXXXXXXXXXXXXXX';
	}
	public function contentType() {
		return 'content type in header not match with content type in body, use allowed content type - application/xml, application/json';
	}
}