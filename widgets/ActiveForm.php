<?php

namespace fsyd\admin\widgets;

class ActiveForm extends \yii\widgets\ActiveForm {

    public $options = ['class' => 'form-horizontal'];
    public $fieldConfig = [
        'template' => "{label}\n<div class=\"col-sm-8\">{input}\n{hint}\n{error}</div>\n",
        'labelOptions' => ['class' => 'col-sm-2 control-label'],
    ];

}
