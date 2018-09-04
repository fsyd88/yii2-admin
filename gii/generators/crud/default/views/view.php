<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">

            <?= "<?= " ?>Html::a(<?= $generator->generateString('更新') ?>, ['update', <?= $urlParams ?>], ['class' => 'btn btn-sm btn-primary']) ?>
            <?= "<?= " ?>Html::a(<?= $generator->generateString('删除') ?>, ['delete', <?= $urlParams ?>], [
            'class' => 'btn btn-sm btn-danger',
            'data' => [
            'confirm' => <?= $generator->generateString('确定要删除此条数据吗?') ?>,
            'method' => 'post',
            ],
            ]) ?>

        </h3>
        <div class="box-tools">
            <div class="btn-group pull-right">
                <?= "<?= " ?>Html::a('<i class="fa fa-list"></i>&nbsp;列表', ['index'], ['class' => 'btn btn-sm btn-default']) ?>
            </div> 
            <div class="btn-group pull-right" style="margin-right: 10px">
                <a href="javascript:history.back();" class="btn btn-sm btn-default form-history-back"><i class="fa fa-arrow-left"></i>&nbsp;返回</a>
            </div>
        </div>
    </div>
    <div class="box-body">
        <?= "<?= " ?>DetailView::widget([
        'model' => $model,
        'attributes' => [
        <?php
        if (($tableSchema = $generator->getTableSchema()) === false) {
            foreach ($generator->getColumnNames() as $name) {
                echo "            '" . $name . "',\n";
            }
        } else {
            foreach ($generator->getTableSchema()->columns as $column) {
                $format = $generator->generateColumnFormat($column);
                echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
            }
        }
        ?>
        ],
        ]) ?>

    </div>
</div>
