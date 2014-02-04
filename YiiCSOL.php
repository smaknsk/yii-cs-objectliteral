<?php

/**
 * Using Object Literal to organize your code for Yii
 * http://github.com/smaknsk/yii-csol
 */
class YiiCSOL extends CClientScript 
{
	/**
	 * @var string Number revisioin add to url (script.js?v=$revision)
	 */
	protected $revision = null;
	
	/**
	 * Add js code for run Controller
	 * 
	 * @param string || array $module
	 * @param string $controller
	 * @param string $action
	 * @param integer $position the position of the JavaScript code. Valid values include the following:
	 * <ul>
	 * <li>CClientScript::POS_HEAD : the script is inserted in the head section right before the title element.</li>
	 * <li>CClientScript::POS_BEGIN : the script is inserted at the beginning of the body section.</li>
	 * <li>CClientScript::POS_END : the script is inserted at the end of the body section.</li>
	 * <li>CClientScript::POS_LOAD : the script is inserted in the window.onload() function.</li>
	 * <li>CClientScript::POS_READY : the script is inserted in the jQuery's ready function.</li>
	 * </ul>
	 * @param array $data
	 * @return CClientScript the CClientScript object itself (to support method chaining, available since version 1.1.5).
	 */
	public function registerScriptInit($module = null, $controller = null, $action = null, $position=self::POS_READY, $data = array())
	{
		if (is_array($module)) {
			$data = $module;
			$module = null;
		}
		
		if (!$module && Yii::app()->getController()->module) {
			$module =  ucfirst(Yii::app()->getController()->module->id) . 'Module.';
		}
		
		if (!$controller) {
			$controller = ucfirst(Yii::app()->getController()->id) . 'Controller';
		}
		
		if (!$action) {
			$action = 'action' . ucfirst(Yii::app()->getController()->action->id);
		}

		$scriptId = $module . $controller . '.' . $action . '.init';
		$paramsJson = $data ? json_encode($data, JSON_FORCE_OBJECT) : '';
		
		$this->registerScript($scriptId, $scriptId . '(' . $paramsJson . ');', $position);
	}
	
	/**
	 * Get revision number from file application.runtime/clientscript.rev
	 * @return string
	 */
	public function getRevision() 
	{
		if ($this->revision !== null) {
			return $this->revision;
		}
		
		$this->revision = '';
		$path = Yii::getPathOfAlias('application.runtime') . '/clientscript.rev';
		if (file_exists($path)) {
			$this->revision = '?' . trim(file_get_contents($path));
		}
		
		return $this->revision;
	}
	
	/**
	 * Register CSS file and add revision to url
	 * 
	 * @param string $url
	 * @param type $media
	 * @return CClientScript
	 */
	public function registerCssFile($url, $media='')
	{		
		$url = $url . $this->getRevision();
		return parent::registerCssFile($url, $media);
	}
	
	/**
	 * Register JS file  and add revision to url
	 * 
	 * @param string $url
	 * @param type $position
	 * @param type $isRevision
	 * @return CClientScript
	 */
	public function registerScriptFile($url, $position = null, array $htmlOptions=array(), $isRevision = true)
	{
		if ($isRevision) {
			$url = $url . $this->getRevision();
		}
				
		return parent::registerScriptFile($url, $position, $htmlOptions);
	}
	
	/**
	 * Convert array to json and register as script
	 * 
	 * @param type $name
	 * @param type $data
	 * @return CClientScript
	 */
	public function registerScriptData($name, $data) 
	{
		return $this->registerScript($name, $name.' = '.json_encode($data).';');
	} 
}
