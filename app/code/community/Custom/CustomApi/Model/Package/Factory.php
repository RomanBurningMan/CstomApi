<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 14.10.2018
 * Time: 18:27
 */

class Custom_CustomApi_Model_Package_Factory extends Mage_Core_Model_Abstract {
	public function packagePreparing($version, $command, $body, $contentType) {
		$package = Mage::getModel('customapi/package');

		$package->setVersion($version);
		$package->setCommand($command);

		$arrayBody = $package->bodyToArray($body, $contentType);
		$package->setBody($arrayBody);

		return $package;
	}
}