<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 05.10.2018
 * Time: 12:01
 */

class Custom_CustomApi_Block_Adminhtml_Support extends Mage_Adminhtml_Block_Widget_Form_Container
{
	public function __construct() {
		parent::__construct();

		$this->_blockGroup = 'customapi_support';
		$this->_controller = 'adminhtml';
		$this->_mode       = 'support';
		$this->updateButton('save', 'label', 'Send email');
	}

	public function getHeaderText()
	{
		return 'Contact support';
	}
}