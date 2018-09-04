<?php

namespace fsyd\admin;

use yii\web\AssetBundle;

/**
 * Description of AnimateAsset
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 2.5
 */
class AnimateAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@fsyd/admin/assets';
    /**
     * @inheritdoc
     */
    public $css = [
        'animate.css',
    ];

}
