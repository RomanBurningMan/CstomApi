<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 14.10.2018
 * Time: 18:24
 */

class Custom_CustomApi_Model_Package extends Mage_Core_Model_Abstract {
	protected $_version;
	protected $_command;
	protected $_body;

	public function bodyToArray($body, $contentType) {
		if ($contentType === 'application/xml') {
			$xmlString = simplexml_load_string($body);

			return $this->XmlToArray($xmlString);
		} elseif ($contentType === 'application/json') {
			return $this->JsonToArray($body);
		}

		return false;
	}

	private function JsonToArray($body) {
		return json_decode($body, true);
	}

	private function XmlToArray($parent) {
		$array = array();

		foreach ($parent as $name => $element) {
			($node = &$array[$name])
			&& (1 === count($node) ? $node = array($node) : 1)
			&& $node = &$node[];

			$node = $element->count() ? $this->XmlToArray($element) : trim($element);
		}

		return $array;
	}

	public function setVersion($version) {
		$this->_version = $version;

		return true;
	}

	public function setCommand($command) {
		$this->_command = $command;

		return true;
	}

	public function setBody($body) {
		$this->_body = $body;

		return true;
	}

	public function getVersion() {
		return $this->_version;
	}

	public function getCommand() {
		return $this->_command;
	}

	public function getBody() {
		return $this->_body;
	}
}