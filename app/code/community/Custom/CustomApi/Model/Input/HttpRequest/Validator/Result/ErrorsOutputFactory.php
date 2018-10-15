<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 13.10.2018
 * Time: 15:58
 */

class Custom_CustomApi_Model_Input_HttpRequest_Validator_Result_ErrorsOutputFactory extends Mage_Core_Model_Abstract {
	public function errorsOutput() {
		return new Custom_CustomApi_Model_Output_Sender('flat');
	}
}