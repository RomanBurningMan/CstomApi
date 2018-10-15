<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 14.10.2018
 * Time: 01:51
 */

class Custom_CustomApi_Model_Output_Formatting_Flat implements Custom_CustomApi_Model_Output_Formatting_FormattingInterface {
	public function toString($errors)
	{
		$message = 'Error! Bad request: ';

		foreach ($errors as $error) {
			$message .= "$error; ";
		}

		return $message;
	}
}