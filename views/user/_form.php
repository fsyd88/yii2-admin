<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model fsyd\admin\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><?= $model->isNewRecord ? '创建' : '更新' ?></h3>
        <div class="box-tools">
            <div class="btn-group pull-right">
                <?= Html::a('<i class="fa fa-list"></i>&nbsp;列表',['index'],['class'=>'btn btn-sm btn-default']) ?>
            </div> <div class="btn-group pull-right" style="margin-right: 10px">
                <a href="javascript:history.back();" class="btn btn-sm btn-default form-history-back"><i class="fa fa-arrow-left"></i>&nbsp;返回</a>
            </div>
        </div>
    </div>
    <!-- /.box-header -->

    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body">
    <?= $form->field($model, 'status')->textInput() ?>

    </div>
    <div class="box-footer">
        <div class="col-sm-offset-2  col-sm-8">
            <?=
            Html::submitButton($model->isNewRecord ? Yii::t('rbac-admin', 'Create') : Yii::t('rbac-admin', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])
            ?>
            <button type="reset" class="btn btn-default pull-right">重置</button>                
        </div>
    </div>    
    <?php ActiveForm::end(); ?>
</div>