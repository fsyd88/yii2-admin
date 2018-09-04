<?php

use yii\helpers\Html;
use fsyd\admin\widgets\GridView;
use fsyd\admin\components\RouteRule;
use fsyd\admin\components\Configs;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel fsyd\admin\models\searchs\AuthItem */
/* @var $context fsyd\admin\components\ItemController */

$context = $this->context;
$labels = $context->labels();
$this->title = Yii::t('rbac-admin', $labels['Items']);
$this->params['breadcrumbs'][] = $this->title;

$rules = array_keys(Configs::authManager()->getRules());
$rules = array_combine($rules, $rules);
unset($rules[RouteRule::RULE_NAME]);
?>
<div class="box">
    <div class="box-header with-border">
        <div class="btn-group" style="margin-right: 10px">           
            <a href="<?= Url::to(['create']) ?>" class="btn btn-sm btn-success">
                <i class="fa fa-plus"></i>新增
            </a>
        </div>

        <div class="btn-group pull-right">
            <button class="btn btn-sm btn-danger" to="<?= Url::to(['delete']) ?>" id="removeAll"><i class="fa fa-remove"></i>删除</button>
            <button class="btn btn-sm btn-primary" id="grid-refresh"><i class="fa fa-refresh"></i>刷新</button>
        </div>
    </div>
    <div class="box-body">
        <div class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-12">
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute' => 'name',
                                'label' => Yii::t('rbac-admin', 'Name'),
                            ],
                            [
                                'attribute' => 'ruleName',
                                'label' => Yii::t('rbac-admin', 'Rule Name'),
                                'filter' => $rules
                            ],
                            [
                                'attribute' => 'description',
                                'label' => Yii::t('rbac-admin', 'Description'),
                            ],
                            ['class' => 'fsyd\admin\widgets\ActionColumn'],
                        ],
                    ])
                    ?>
                </div>
            </div>                 
        </div>
    </div>
</div>


