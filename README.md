Yii ClientScript
================

Расширение класса CClientScript фреймворка Yii

##Установка

	git submodule add git://github.com/smaknsk/yii-clientscript.git extensions/yii-clientscript
	
Добавляем в конфиг
~~~php
	'components' => array(
		...
		'clientScript' => array(
			'class' => 'ext.yii-clientscript.YiiClientScript',
			'coreScriptPosition' => CClientScript::POS_END, // По желанию. Требуется Yii 1.1.11
			'defaultScriptFilePosition' => CClientScript::POS_END // По желанию. Требуется Yii 1.1.11
		),
	)
~~~