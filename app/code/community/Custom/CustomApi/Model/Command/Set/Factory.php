<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 14.10.2018
 * Time: 19:48
 */

class Custom_CustomApi_Model_Command_Set_Factory extends Mage_Core_Model_Abstract {
	public function getVersionDefinition($version) {
		$set        = Mage::getModel('customapi/command_set');
		$apiConfigs = Mage::getConfig()->getNode('default/cusotomapi_data')->asArray();
		$versions   = array_keys($apiConfigs);

		if (!in_array($version, $versions)) {
			throw new \Exception("not found Api version - [$version]");
		}

		$definition = Mage::getModel('customapi/command_definition_factory')
			->buildDefinition($apiConfigs[$version]);

		$set->setDefinitions($definition->getDefinitions());

		return $set;
	}
}