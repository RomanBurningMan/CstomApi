<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 14.10.2018
 * Time: 12:01
 */

class Custom_CustomApi_Model_Authentication_Token extends Mage_Core_Model_Abstract {
	protected function _construct() {
		$this->_init('customapi_authentication/token');
	}

	public function check($userToken) {
		$tokensCollection = $this->getCollection();

		foreach ($tokensCollection as $tokenCollection) {
			if ($tokenCollection->getToken() === $userToken) {
				return true;
			};
		}
		
		return false;
	}
}