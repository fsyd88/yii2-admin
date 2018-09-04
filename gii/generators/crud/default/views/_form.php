<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use yii\helpers\Html;
use fsyd\admin\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
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
    <!-- /.box-header -->
    <!-- form start -->

    <?= "<?php " ?>$form = ActiveForm::begin(); ?>
    <div class="box-body">
        <?php
        foreach ($generator->getColumnNames() as $attribute) {
            if (in_array($attribute, $safeAttributes)) {
                echo "    <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
            }
        }
        ?>
    </div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-8">
            <?= "<?= " ?>Html::submitButton(<?= $generator->generateString('保存') ?>, ['class' => 'btn btn-success']) ?>
            <button type="reset" class="btn btn-default pull-right">重置</button>         
        </div>
    </div>
    <?= "<?php " ?>ActiveForm::end(); ?>
</div>
