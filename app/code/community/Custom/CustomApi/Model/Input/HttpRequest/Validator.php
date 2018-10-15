<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 09.10.2018
 * Time: 20:48
 */

class Custom_CustomApi_Model_Input_HttpRequest_Validator extends Mage_Core_Model_Abstract {
	const ALLOWED_REQUEST_METHOD = 'POST';
	const ALLOWED_CONTENT_TYPE   = ['application/xml', 'application/json'];

	public $request;

	public function setRequest($request) {
		$this->request = $request;
	}

	public function checkRequestMethod() {
		return ($this->request->getMethod() === self::ALLOWED_REQUEST_METHOD);
	}

	public function checkVersion() {
		preg_match('/^v[1-9]*/', $this->request->getController(),$matches);

		return !empty($matches);
	}

	public function checkAction() {
		return !empty($this->request->getAction());
	}

	public function checkToken() {
		return !empty($this->request->getToken());
	}

	public function checkContentType() {
		if (!in_array($this->request->getContentType(), self::ALLOWED_CONTENT_TYPE)) {
			return false;
		}
		if ($this->request->getContentType() === 'application/xml') {
			$decode_xml = simplexml_load_string($this->request->getBody());

			if ($decode_xml === false) {
				return false;
			}
		} elseif ($this->request->getContentType() === 'application/json') {
			$decode_json = json_decode($this->request->getBody());

			if (empty($decode_json)) {
				return false;
			}
		}

		return true;
	}
}