<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 06.10.2018
 * Time: 21:28
 */

class Custom_CustomApi_Model_Resource_Support_Logger extends Mage_Core_Model_Resource_Db_Abstract {
	protected function _construct()
	{
		$this->_init('customapi_support/support_logger', 'id');
	}
}