<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 05.10.2018
 * Time: 21:21
 */

class Custom_CustomApi_Helper_EmailSender extends Mage_Core_Helper_Abstract {
	const SENDER      = 'r.kushnir.ur@gmail.com';
	const USER_NAME   = 'User';
	const DESCRIPTION = 'I have some troubles';

	public function send() {
		// TODO: Ошибка pdo_mysql
		// письма отправляются через крон, а крон не работает из-за отсутствия pdo_mysql
		$mailer = Mage::getModel('core/email')
			->setTemplate('email/customapi_support.html')
			->setType('html')
			->setTemplateVar('user_name', self::USER_NAME)
			->setToName(self::USER_NAME)
			->setToEmail(self::SENDER);

		try {
			$this->sendLogger(self::USER_NAME, self::SENDER, self::DESCRIPTION);
			$mailer->send();
			Mage::getSingleton('core/session')->addSuccess('Your request has been sent');
		}
		catch (Exception $e) {
			Mage::getSingleton('core/session')->addError('Unable to send.');
		}
	}

	// TODO: подумать какие метаданные можно собрать
	public function sendLogger($user, $email, $description) {
		$logger = Mage::getModel('customapi_support/support_logger');

		$logger->setUserName($user)
			->setUserEmail($email)
			->setDescription($description)
			->setMetadata($logger->environmentInfoBuilder())
			->setTimestamp(date('Y-m-d H:i:s'))
			->save();
	}
}