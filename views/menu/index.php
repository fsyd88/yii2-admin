<?php

use yii\helpers\Html;
use fsyd\admin\widgets\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel fsadmin\models\searchs\Menu */

$this->title = Yii::t('rbac-admin', 'Menus');
$this->params['breadcrumbs'][] = $this->title;
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
                <?php Pjax::begin(['id'=>'pjax-container']); ?>  
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\CheckboxColumn'],
                            'name',
                            [
                                'attribute' => 'menuParent.name',
                                'filter' => Html::activeTextInput($searchModel, 'parent_name', [
                                    'class' => 'form-control', 'id' => null
                                ]),
                                'label' => Yii::t('rbac-admin', 'Parent'),
                            ],
                            'route',
                            'order',
                            ['class' => 'fsyd\admin\widgets\ActionColumn'],
                        ],
                    ]);
                    ?>
                    <?php Pjax::end(); ?>
                </div>
            </div>                 
        </div>
    </div>
</div>





