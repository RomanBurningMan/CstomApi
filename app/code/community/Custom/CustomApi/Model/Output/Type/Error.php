<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 14.10.2018
 * Time: 00:07
 */

class Custom_CustomApi_Model_Output_Type_Error implements Custom_CustomApi_Model_Output_Type_BaseInterface {
	public $errorsArray = [];

	public function toArray()
	{
		return $this->errorsArray;
	}

	public function addError($error) {
		$this->errorsArray[] = $error;
	}
}