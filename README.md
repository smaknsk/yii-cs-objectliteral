Yii ClientScript ObjectLiteral
================

Using objects for organize your client script code.
The implementation of the basic methods Object Literal for framework Yii CClientScript.

Read more about this: 
* [Markup-based unobtrusive comprehensive DOM-ready execution](http://paulirish.com/2009/markup-based-unobtrusive-comprehensive-dom-ready-execution/)
* [Show love to the object literal](http://christianheilmann.com/2006/02/16/show-love-to-the-object-literal/)
* [Использование объектов для красивой структуры кода в JavaScript](http://habrahabr.ru/post/111290/)

Installation
----------------
Copy this component to extensions/yii-csol or add as submodule:
~~~bash
git submodule add git://github.com/smaknsk/yii-csol.git extensions/yii-csobl
~~~

Add to protected/config/main.php
~~~php
	'components' => array(
		...
		'clientScript' => array(
			'class' => 'ext.yii-csol.YiiCSOL',
			'coreScriptPosition' => CClientScript::POS_END, // At will. Required Yii >= 1.1.11
			'defaultScriptFilePosition' => CClientScript::POS_END // At will. Required Yii >= 1.1.11
		),
	)
~~~

API
----------------
### YiiCSOL::registerScriptInit($module = null, $controller = null, $action = null, $position=self::POS_READY, $data = array())


~~~php

Yii::app()->clientScript->registerScriptInit();
~~~

### YiiCSOL::registerScriptData($name, $data)


~~~php

Yii::app()->clientScript->registerScriptData();
~~~

### YiiCSOL::registerCssFile($url, $media='')


~~~php

Yii::app()->clientScript->registerCssFile();
~~~

### YiiCSOL::registerScriptFile($url, $position = null, $isRevision = true)


~~~php

Yii::app()->clientScript->registerScriptFile();
~~~

### YiiCSOL::getRevision()


~~~php

Yii::app()->clientScript->getRevision();
~~~
