<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 07.10.2018
 * Time: 21:40
 */

class Custom_CustomApi_Controller_Router extends Mage_Core_Controller_Varien_Router_Standard {
	CONST CONTROLLER_NAME = 'index';
	CONST ACTION_NAME     = 'index';

	public function match(Zend_Controller_Request_Http $request)
	{
		//checking before even try to find out that current module
		//should use this router
		if (!$this->_beforeModuleMatch()) {
			return false;
		}

		$this->fetchDefault();

		$front = $this->getFront();
		$path = trim($request->getPathInfo(), '/');

		$p = explode('/', $path);

		// get module name
		$module = $p[0];

		/**
		 * Searching router args by module name from route using it as key
		 */
		$modules = $this->getModuleByFrontName($module);

		foreach ($modules as $realModule) {
			$request->setRouteName($this->getRouteByFrontName($module));

			// get controller name
			$controller = self::CONTROLLER_NAME;

			// get action name
			$action = self::ACTION_NAME;

			//checking if this place should be secure
			$this->_checkShouldBeSecure($request, '/'.$module.'/'.$controller.'/'.$action);

			$controllerClassName = $this->_validateControllerClassName($realModule, $controller);

			if (!$controllerClassName) {
				continue;
			}

			// instantiate controller class
			$controllerInstance = Mage::getControllerInstance($controllerClassName, $request, $front->getResponse());

			if (!$this->_validateControllerInstance($controllerInstance)) {
				continue;
			}

			if (!$controllerInstance->hasAction($action)) {
				continue;
			}

			break;
		}

		// set values only after all the checks are done
		$request->setModuleName($module);
		$request->setControllerName($controller);
		$request->setActionName($action);
		$request->setControllerModule($realModule);

		// set parameters from pathinfo
		for ($i = 3, $l = sizeof($p); $i < $l; $i += 2) {
			$request->setParam($p[$i], isset($p[$i+1]) ? urldecode($p[$i+1]) : '');
		}

		// dispatch action
		$request->setDispatched(true);
		$controllerInstance->dispatch($action);

		return true;
	}
}