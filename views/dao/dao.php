<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 28.04.2019
 * Time: 14:35
 */ ?>
    <div class="row">
        <div class="col-md-6">
            <pre>
            <?=print_r($users)?>
            </pre>
        </div>
        <div class="col-md-6">
            <pre>
            <?=print_r($activityUser)?>
            </pre>
        </div>
        <div class="col-md-6">
            <pre>
            <?=print_r($activityNotification)?>
            </pre>
        </div>
        <div class="col-md-6">
            <pre>
            <?=print_r($firstActivity)?>
            </pre>
        </div>
        <div class="col-md-6">
            <pre>
            <?php echo ($countActivity)?>
            </pre>
        </div>
    </div>
<?php
///**
// * @var $this  \yii\web\View
// * @var $arColumns array
// * @var $arRows array
// * @var $arLinkFields array
// * @var $linkTemplate string
// * @var $param string
// */

//use yii\helpers\Url;
//?>
<!--<div class="row">-->
<!--    <div class="col-md-6">-->
<!--        --><?//=\app\widgets\activitytable\ActivityTableWidget::widget(['arColumns' => $arColumns,
//            'arRows' => $arRows,'arLinkFields' => $arLinkFields,'linkTemplate' => $linkTemplate,
//            'param' => $param]);?>
<!--    </div>-->
<!--</div>-->