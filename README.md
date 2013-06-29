Yii ClientScript Object Literal
================

The implementation of the basic methods ObjectLiteral of pattern for framework Yii CClientScript
Read more about this pattern: 
* [Markup-based unobtrusive comprehensive DOM-ready execution](http://paulirish.com/2009/markup-based-unobtrusive-comprehensive-dom-ready-execution/)
* [Show love to the object literal](http://christianheilmann.com/2006/02/16/show-love-to-the-object-literal/)
* [Использование объектов для красивой структуры кода в JavaScript](http://habrahabr.ru/post/111290/)

Installation
----------------
Copy this component to extensions/yii-cs-objectliteral or add as submodule:
git submodule add git://github.com/smaknsk/yii-cs-objectliteral.git extensions/yii-cs-objectliteral

Add to protected/config/main.php
~~~php
	'components' => array(
		...
		'clientScript' => array(
			'class' => 'ext.yii-cs-objectliteral.YiiCSObjectLiteral',
			'coreScriptPosition' => CClientScript::POS_END, // At will. Required Yii >= 1.1.11
			'defaultScriptFilePosition' => CClientScript::POS_END // At will. Required Yii >= 1.1.11
		),
	)
~~~

API
----------------
### YiiCSObjectLiteral::registerScriptInit($module = null, $controller = null, $action = null, $position=self::POS_READY, $data = array())


~~~php

Yii::app()->clientScript->registerScriptInit();
~~~

### YiiCSObjectLiteral::registerScriptData($name, $data)


~~~php

Yii::app()->clientScript->registerScriptData();
~~~

### YiiCSObjectLiteral::registerCssFile($url, $media='')


~~~php

Yii::app()->clientScript->registerCssFile();
~~~

### YiiCSObjectLiteral::registerScriptFile($url, $position = null, $isRevision = true)


~~~php

Yii::app()->clientScript->registerScriptFile();
~~~

### YiiCSObjectLiteral::getRevision()


~~~php

Yii::app()->clientScript->getRevision();
~~~
