<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->searchModelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="modal fade" id="filter-modal">
    <div class="modal-dialog" style="width: 680px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">筛选</h4>
            </div>
            <div class="modal-body"> 

                <?= "<?php " ?>$form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
                <?php if ($generator->enablePjax): ?>
                    'options' => [
                    'data-pjax' => 1
                    ],
                <?php endif; ?>
                ]); ?>

                <?php
                $count = 0;
                foreach ($generator->getColumnNames() as $attribute) {
                    if (++$count < 6) {
                        echo "    <?= " . $generator->generateActiveSearchField($attribute) . " ?>\n\n";
                    } else {
                        echo "    <?php // echo " . $generator->generateActiveSearchField($attribute) . " ?>\n\n";
                    }
                }
                ?>
            </div>
            <div class="modal-footer">
                <?= "<?= " ?>Html::submitButton(<?= $generator->generateString('搜索') ?>, ['class' => 'btn btn-primary']) ?>
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>

            <?= "<?php " ?>ActiveForm::end(); ?>

        </div>
    </div>
</div>