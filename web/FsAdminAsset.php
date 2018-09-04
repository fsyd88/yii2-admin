<?php

namespace fsyd\admin\web;

use yii\base\Exception;
use yii\web\AssetBundle as BaseAdminLteAsset;

/**
 * AdminLte AssetBundle
 * @since 0.1
 */
class FsAdminAsset extends BaseAdminLteAsset {

    public $sourcePath = '@fsyd/admin/assets';
    
    public $css = [
        'lib/toastr/toastr.min.css',
        'fs-admin.css'
    ];
    
    public $js = [
        'lib/toastr/toastr.min.js',
        'fs-admin.js'
    ];
    
    public $depends = [
        'fsyd\admin\web\AdminLteAsset',
    ];

}
