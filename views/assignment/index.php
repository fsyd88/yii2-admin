<?php

use yii\helpers\Html;
use fsyd\admin\widgets\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel fsyd\admin\models\searchs\Assignment */
/* @var $usernameField string */
/* @var $extraColumns string[] */

$this->title = Yii::t('rbac-admin', 'Assignments');
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    ['class' => 'yii\grid\SerialColumn'],
    $usernameField,
];
if (!empty($extraColumns)) {
    $columns = array_merge($columns, $extraColumns);
}
$columns[] = [
    'class' => 'fsyd\admin\widgets\ActionColumn',
    'template' => '{view}'
];
?>
<div class="box">
    <div class="box-header with-border">
        <div class="btn-group">

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
                        'columns' => $columns,
                    ]);
                    ?>
                    <?php Pjax::end(); ?>
                </div>
            </div>                 
        </div>
    </div>
</div>

