Yii ClientScript
================

Расширение класса CClientScript фреймворка Yii

Установка

	`git clone git://github.com/smaknsk/yii-clientscript.git extension/yii-clientscript`
	
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