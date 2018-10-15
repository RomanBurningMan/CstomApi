<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 07.10.2018
 * Time: 22:01
 */

class Custom_CustomApi_Model_Input_HttpRequest_Factory extends Mage_Core_Model_Abstract {
	public function getRequest() {
		return Mage::getModel('customapi/input_httprequest');
	}
}