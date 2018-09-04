<?php

use fsyd\admin\AnimateAsset;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $model fsyd\admin\models\Assignment */
/* @var $fullnameField string */

$userName = $model->{$usernameField};
if (!empty($fullnameField)) {
    $userName .= ' (' . ArrayHelper::getValue($model, $fullnameField) . ')';
}
$userName = Html::encode($userName);

$this->title = Yii::t('rbac-admin', 'Assignment') . ' : ' . $userName;

$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Assignments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $userName;

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
            <div class="btn-group" style="margin-right: 10px">
                <a href="javascript:history.back();" class="btn btn-sm btn-default form-history-back"><i class="fa fa-arrow-left"></i>&nbsp;返回</a>
            </div>

        </h3>
        <div class="box-tools">
            <div class="btn-group pull-right">
                <?= Html::a('<i class="fa fa-list"></i>&nbsp;列表', ['index'], ['class' => 'btn btn-sm btn-default']) ?>
            </div> 
        </div>
    </div>
    <div class="box-body">

        <div class="row">
            <div class="col-sm-5">
                <input class="form-control search" data-target="available"
                       placeholder="<?= Yii::t('rbac-admin', 'Search for available'); ?>">
                <select multiple size="20" class="form-control list" data-target="available">
                </select>
            </div>
            <div class="col-sm-1">
                <br><br>
                <?=
                Html::a('&gt;&gt;' . $animateIcon, ['assign', 'id' => (string) $model->id], [
                    'class' => 'btn btn-success btn-assign',
                    'data-target' => 'available',
                    'title' => Yii::t('rbac-admin', 'Assign'),
                ]);
                ?><br><br>
                <?=
                Html::a('&lt;&lt;' . $animateIcon, ['revoke', 'id' => (string) $model->id], [
                    'class' => 'btn btn-danger btn-assign',
                    'data-target' => 'assigned',
                    'title' => Yii::t('rbac-admin', 'Remove'),
                ]);
                ?>
            </div>
            <div class="col-sm-5">
                <input class="form-control search" data-target="assigned"
                       placeholder="<?= Yii::t('rbac-admin', 'Search for assigned'); ?>">
                <select multiple size="20" class="form-control list" data-target="assigned">
                </select>
            </div>
        </div>
    </div>
