<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 14.10.2018
 * Time: 12:12
 */

class Custom_CustomApi_Model_Authentication_Resource_Token extends Mage_Core_Model_Resource_Db_Abstract {
	protected function _construct()
	{
		$this->_init('customapi_authentication/tokens', 'id');
	}
}