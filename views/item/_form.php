<?php

use yii\helpers\Html;
use fsyd\admin\widgets\ActiveForm;
use fsyd\admin\components\RouteRule;
use fsyd\admin\AutocompleteAsset;
use yii\helpers\Json;
use fsyd\admin\components\Configs;

/* @var $this yii\web\View */
/* @var $model fsyd\admin\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
/* @var $context fsyd\admin\components\ItemController */

$context = $this->context;
$labels = $context->labels();
$rules = Configs::authManager()->getRules();
unset($rules[RouteRule::RULE_NAME]);
$source = Json::htmlEncode(array_keys($rules));

$js = <<<JS
    $('#rule_name').autocomplete({
        source: $source,
    });
JS;
AutocompleteAsset::register($this);
$this->registerJs($js);
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><?= $model->isNewRecord ? '创建' : '更新' ?></h3>
        <div class="box-tools">
            <div class="btn-group pull-right">
                <?= Html::a('<i class="fa fa-list"></i>&nbsp;列表', ['index'], ['class' => 'btn btn-sm btn-default']) ?>
            </div> <div class="btn-group pull-right" style="margin-right: 10px">
                <a href="javascript:history.back();" class="btn btn-sm btn-default form-history-back"><i class="fa fa-arrow-left"></i>&nbsp;返回</a>
            </div>
        </div>
    </div>
    <?php $form = ActiveForm::begin(['id' => 'item-form']); ?>
    <div class="box-body">
        <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

        <?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>

        <?= $form->field($model, 'ruleName')->textInput(['id' => 'rule_name']) ?>

        <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>
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
