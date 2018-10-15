<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 07.10.2018
 * Time: 21:47
 */

class Custom_CustomApi_Model_Input_HttpRequest extends Mage_Core_Model_Abstract {
	public function getHost() {
		return Mage::app()->getRequest()->getHttpHost();
	}

	public function getMethod() {
		return Mage::app()->getRequest()->getMethod();
	}

	public function getUri() {
		return Mage::app()->getRequest()->getRequestUri();
	}

	public function getController() {
		$request    = Mage::app()->getRequest()->getRequestUri();
		$request    = trim($request,'/');
		$requestArr = explode('/', $request);

		if (isset($requestArr[1])) {
			return $requestArr[1];
		}

		return false;
	}

	public function getAction() {
		$request    = Mage::app()->getRequest()->getRequestUri();
		$request    = trim($request,'/');
		$requestArr = explode('/', $request);

		if (isset($requestArr[2])) {
			return $requestArr[2];
		}

		return false;
	}

	public function getParams() {
		return Mage::app()->getRequest()->getParams();
	}

	public function getToken() {
		$headers = getallheaders();

		if (!empty($headers['Authorization'])) {
			preg_match('/Token (.*)/', $headers['Authorization'],$match);

			if (!empty($match)) {
				return $match[1];
			}
		}

		return false;
	}

	public function getContentType() {
		$headers = getallheaders();

		if (!empty($headers['Content-Type'])) {
			return $headers['Content-Type'];
		}

		return false;
	}

	public function getBody() {
		return file_get_contents('php://input');
	}
}