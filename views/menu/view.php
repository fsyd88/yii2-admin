<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model fsadmin\models\Menu */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">
            <?= Html::a(Yii::t('rbac-admin', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
            <?=
            Html::a(Yii::t('rbac-admin', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-sm btn-danger',
                'data' => [
                    'confirm' => '确定要删除此项数据？',
                    'method' => 'post',
                ],
            ])
            ?>
        </h3>
        <div class="box-tools">
            <div class="btn-group pull-right">
                <?= Html::a('<i class="fa fa-list"></i>&nbsp;列表',['index'],['class'=>'btn btn-sm btn-default']) ?>
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
                'menuParent.name:text:Parent',
                'name',
                'route',
                'order',
            ],
        ])
        ?>
    </div>

</div>
