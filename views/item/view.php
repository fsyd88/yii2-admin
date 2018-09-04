<?php

use fsyd\admin\AnimateAsset;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model fsyd\admin\models\AuthItem */
/* @var $context fsyd\admin\components\ItemController */

$context = $this->context;
$labels = $context->labels();
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

AnimateAsset::register($this);
YiiAsset::register($this);
$opts = Json::htmlEncode([
            'items' => $model->getItems(),
        ]);
$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('_script.js'));
$animateIcon = ' <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i>';
?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">
            <?= Html::a(Yii::t('rbac-admin', 'Update'), ['update', 'id' => $model->name], ['class' => 'btn btn-sm btn-primary']); ?>
            <?=
            Html::a(Yii::t('rbac-admin', 'Delete'), ['delete', 'id' => $model->name], [
                'class' => 'btn btn-sm btn-danger',
                'data-confirm' => Yii::t('rbac-admin', 'Are you sure to delete this item?'),
                'data-method' => 'post',
            ]);
            ?>
            <?= Html::a(Yii::t('rbac-admin', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success']); ?>
        </h3>
        <div class="box-tools">
            <div class="btn-group pull-right">
                <?= Html::a('<i class="fa fa-list"></i>&nbsp;列表', ['index'], ['class' => 'btn btn-sm btn-default']) ?>
            </div> <div class="btn-group pull-right" style="margin-right: 10px">
                <a href="javascript:history.back();" class="btn btn-sm btn-default form-history-back"><i class="fa fa-arrow-left"></i>&nbsp;返回</a>
            </div>
        </div>
    </div>
    <div class="box-body">
        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                'name',
                'description:ntext',
                'ruleName',
                'data:ntext',
            ],
            'template' => '<tr><th style="width:25%">{label}</th><td>{value}</td></tr>',
        ]);
        ?>

        <div class="row">
            <div class="col-sm-5">
                <input class="form-control search" data-target="available"
                       placeholder="<?= Yii::t('rbac-admin', 'Search for available'); ?>">
                <select multiple size="20" class="form-control list" data-target="available"></select>
            </div>
            <div class="col-sm-1">
                <br><br>
                <?=
                Html::a('&gt;&gt;' . $animateIcon, ['assign', 'id' => $model->name], [
                    'class' => 'btn btn-success  btn-assign',
                    'data-target' => 'available',
                    'title' => Yii::t('rbac-admin', 'Assign'),
                ]);
                ?><br><br>
                <?=
                Html::a('&lt;&lt;' . $animateIcon, ['remove', 'id' => $model->name], [
                    'class' => 'btn btn-danger btn-assign',
                    'data-target' => 'assigned',
                    'title' => Yii::t('rbac-admin', 'Remove'),
                ]);
                ?>
            </div>
            <div class="col-sm-5">
                <input class="form-control search" data-target="assigned"
                       placeholder="<?= Yii::t('rbac-admin', 'Search for assigned'); ?>">
                <select multiple size="20" class="form-control list" data-target="assigned"></select>
            </div>
        </div>
    </div>
</div>
