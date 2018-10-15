<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 14.10.2018
 * Time: 20:04
 */

class Custom_CustomApi_Model_Command_Definition_Factory extends Mage_Core_Model_Abstract {
	public function buildDefinition($apiData) {
		$definition = Mage::getModel('customapi/command_definition');

		$definition->prepareData($apiData);

		return $definition;
	}
}