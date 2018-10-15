<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 05.10.2018
 * Time: 14:50
 */

class Custom_CustomApi_Block_Adminhtml_Support_Form extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{
		$form = new Varien_Data_Form(
			[
				'id'      => 'edit_form',
				'action'  => $this->getUrl('*/*/sent'),
				'method'  => 'post',
				'enctype' => 'multipart/form-data',
			]
		);

		$form->setUseContainer(true);

		$this->setForm($form);

		$fieldset = $form->addFieldset('support_form', ['legend' => 'Email request']);

		$fieldset->addField('user_name', 'text', [
			'name'     => 'user_name',
			'label'    => 'Name',
			'required' => true,
		]);
		$fieldset->addField('user_email', 'text', [
			'name'     => 'user_email',
			'label'    => 'Email',
			'required' => true,
		]);
		$fieldset->addField('content', 'textarea', [
			'name'     => 'content',
			'label'    => 'Description',
			'required' => true
		]);

		return parent::_prepareForm();
	}
}
