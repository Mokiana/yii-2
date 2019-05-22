<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 19.05.2019
 * Time: 19:22
 */

namespace app\widgets\activitytable\assets;


use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class ActivityWidgetAsset extends AssetBundle
{
    public $sourcePath = '@app/widgets/activitytable';

    public $js = [
        'js/widget.js'
    ];
    public $depends=[
      JqueryAsset::class
    ];
}