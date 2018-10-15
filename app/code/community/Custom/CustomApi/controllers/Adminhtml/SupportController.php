<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 01.10.2018
 * Time: 21:24
 */

class Custom_CustomApi_Adminhtml_SupportController extends Mage_Adminhtml_Controller_Action {
	public function indexAction() {
		$this->loadLayout()
			 ->_setActiveMenu('sender_to_support')
			 ->_addContent($this->getLayout()->createBlock('customapi_support/adminhtml_support'))
			 ->renderLayout();
	}

	public function sentAction() {
		Mage::helper('customapi_support/emailsender')->send();

		$this->loadLayout()
			->_setActiveMenu('sender_to_support')
			->renderLayout();
	}
}
