<?php

use yii\helpers\Html;
use fsyd\admin\widgets\ActiveForm;
use fsyd\admin\models\Menu;
use yii\helpers\Json;
use fsyd\admin\AutocompleteAsset;

/* @var $this yii\web\View */
/* @var $model fsyd\admin\models\Menu */
/* @var $form yii\widgets\ActiveForm */
AutocompleteAsset::register($this);
$opts = Json::htmlEncode([
            'menus' => Menu::getMenuSource(),
            'routes' => Menu::getSavedRoutes(),
        ]);
$this->registerJs("var _opts = $opts;");
$this->registerJs($this->render('_script.js'));
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
    <!-- form start -->
    <?php $form = ActiveForm::begin(); ?>
    <?= Html::activeHiddenInput($model, 'parent', ['id' => 'parent_id']); ?>
    <div class="box-body">
        <?= $form->field($model, 'name')->textInput(['maxlength' => 128])->hint('这是提示内容') ?>

        <?= $form->field($model, 'parent_name')->textInput(['id' => 'parent_name']) ?>

        <?= $form->field($model, 'route')->textInput(['id' => 'route']) ?>

        <?= $form->field($model, 'order')->input('number') ?>

        <?= $form->field($model, 'data')->textarea(['rows' => 4]) ?>   
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