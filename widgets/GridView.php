<?php

namespace fsyd\admin\widgets;

class GridView extends \yii\grid\GridView {

    public $layout = '{items}{pager}{summary}';
    public $template="{delete}";

}
