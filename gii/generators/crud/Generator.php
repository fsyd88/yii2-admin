<?php

namespace fsyd\admin\gii\generators\crud;

use Yii;
use yii\db\ActiveRecord;
use yii\db\BaseActiveRecord;
use yii\db\Schema;
use yii\gii\CodeFile;
use yii\helpers\Inflector;
use yii\helpers\VarDumper;
use yii\web\Controller;
/**
 * 
 */
class Generator extends \yii\gii\generators\crud\Generator {

    public $modelClass = 'common\models\Xxx';
    public $searchModelClass = 'backend\models\XxxSearch';
    public $controllerClass = 'backend\controllers\XxxController';
    public $baseControllerClass = 'backend\controllers\CommonController';
    public $enablePjax = true;
    
}
