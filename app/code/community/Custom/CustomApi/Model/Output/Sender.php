<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 13.10.2018
 * Time: 21:14
 */

class Custom_CustomApi_Model_Output_Sender {
	private $format;

	public function __construct($format)
	{
		$this->format = $format;
	}

	public function send(Custom_CustomApi_Model_Output_Type_BaseInterface $typeInstance) {
		$errors = $typeInstance->toArray();

		if (empty($errors)) {
			throw new \Exception('Errors is empty!');
		}

		$formatting = Mage::getModel('customapi/output_formatting_'.$this->format);

		ob_get_clean();
		Mage::app()->getResponse()->setBody($formatting->toString($errors));
	}
}