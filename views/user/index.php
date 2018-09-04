<?php

use yii\helpers\Html;
use yii\grid\GridView;
use fsyd\admin\components\Helper;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel fsyd\admin\models\searchs\User */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('rbac-admin', 'Users');
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
            <button class="btn btn-sm btn-primary" id="grid-refresh"><i class="fa fa-refresh"></i>刷新</button>
        </div>
    </div>
    <div class="box-body">
        <div class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-12">
                    <?php Pjax::begin(); ?>  
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'username',
                            'email:email',
                            'created_at:date',
                            [
                                'attribute' => 'status',
                                'value' => function($model) {
                                    return $model->status == 0 ? 'Inactive' : 'Active';
                                },
                                'filter' => [
                                    0 => 'Inactive',
                                    10 => 'Active'
                                ]
                            ],
                            [
                                'class' => 'fsyd\admin\widgets\ActionColumn',
                                'template' => Helper::filterActionColumn(['view', 'activate', 'delete']),
                                'buttons' => [
                                    'activate' => function($url, $model) {
                                        if ($model->status == 10) {
                                            return '';
                                        }
                                        $options = [
                                            'title' => Yii::t('rbac-admin', 'Activate'),
                                            'aria-label' => Yii::t('rbac-admin', 'Activate'),
                                            'data-confirm' => Yii::t('rbac-admin', 'Are you sure you want to activate this user?'),
                                            'data-method' => 'post',
                                            'data-pjax' => '0',
                                        ];
                                        return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, $options);
                                    }
                                        ]
                                    ],
                                ],
                            ]);
                            ?>
                            <?php Pjax::end(); ?>
                </div>
            </div>                 
        </div>
    </div>
</div>
