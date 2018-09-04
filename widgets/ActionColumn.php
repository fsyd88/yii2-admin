<?php

namespace fsyd\admin\widgets;

use Yii;
use yii\helpers\Html;

class ActionColumn extends \yii\grid\ActionColumn {

    public $headerOptions = ['width' => '100'];
    public $header = '<a href="#">操作</a>';

    protected function initDefaultButtons() {
        $this->initDefaultButton('view', 'eye-open', ['class' => 'btn btn-default btn-xs']);
        $this->initDefaultButton('update', 'edit', ['class' => 'btn btn-info btn-xs']);
        $this->initDefaultButton('delete', 'remove', [
            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
            'data-method' => 'post',
            'class' => 'btn btn-danger btn-xs'
        ]);
    }

}
