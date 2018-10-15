<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 10.09.2018
 * Time: 21:56
 */

class Custom_CustomApi_IndexController extends Mage_Core_Controller_Front_Action {
	public function indexAction() {
		// HTTP VALIDATION ----------------------
		$request        = Mage::getModel('customapi/input_httprequest_factory')->getRequest();
		$validateResult = Mage::getModel('customapi/input_httprequest_validator_factory')->validate($request);

		if ($validateResult->hasError()) {
			$output = Mage::getModel('customapi/input_httprequest_validator_result_errorsoutputfactory')
				->errorsOutput();

			$errors     = $validateResult->getErrors();
			$outputType = Mage::getModel('customapi/output_type_error');

			foreach ($errors as $error) {
				$outputType->addError($error);
			}

			$output->send($outputType);

			return false;
		}

		// AUTHENTICATION ----------------------
		$isAuth = Mage::getModel('customapi_authentication/token')->check($request->getToken());

		if ($isAuth !== true) {
			$output = new Custom_CustomApi_Model_Output_Sender('flat');

			$outputType = Mage::getModel('customapi/output_type_error');
			$outputType->addError('not authorized');

			$output->send($outputType);

			return false;
		}

		// PACKAGE --------------------------
		$version     = $request->getController();
		$action      = $request->getAction();
		$params      = array_keys($request->getParams())[0];
		$command     = $action.'_'.$params;
		$body        = $request->getBody();
		$contentType = $request->getContentType();
		
		$package = Mage::getModel('customapi/package_factory')
			->packagePreparing($version, $command, $body, $contentType);

		// CHECK COMMAND ---------------------
		$set = Mage::getModel('customapi/command_set_factory')
			->getVersionDefinition($package->getVersion());

		if ($set->search($command) === false) {
			$output = new Custom_CustomApi_Model_Output_Sender('flat');

			$outputType = Mage::getModel('customapi/output_type_error');
			$outputType->addError('not found command');

			$output->send($outputType);

			return false;
		}

		// PACKAGE VALIDATOR ----------------------
		$validator = Mage::getModel('customapi/command_validator_factory')
			->validate($package->getBody(), $set->getDefinitions());

		return $this->getResponse()->setBody('Validate success!');
	}

	public function dispatch($action) {
		try {
			parent::dispatch($action);
		} catch(\Exception $e) {
			// TODO: Удалить в конце
//			$this->getResponse()->setBody('Error: '.$e->getMessage());
			$this->getResponse()->setBody($e);
			return true;

			$output = new Custom_CustomApi_Model_Output_Sender('flat');

			$outputType = Mage::getModel('customapi/output_type_error');
			$outputType->addError('internal error');

			$output->send($outputType);
		}
	}
}