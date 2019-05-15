<?php
///**
// * Created by PhpStorm.
// * User: Moka-tian
// * Date: 11.05.2019
// * Time: 14:19
// */
//
//use yii\helpers\Url;
//
//
//
///* @var $this \yii\web\View */
///* @var $data*/
//?>
<!--<table class="tabledao">-->
<!--    <tr>-->
<!--        --><?php //foreach ($data[0] as $k => $v): ?>
<!--            <td>--><?//= \yii\bootstrap\Html::encode($k) ?><!--</td>-->
<!--        --><?php //endforeach; ?>
<!--    </tr>-->
<!--    --><?php //foreach ($v as $_v): ?>
<!--        <tr>-->
<!--            --><?php //foreach ($v as $_v): ?>
<!--                <td>--><?//= \yii\bootstrap\Html::encode($_v) ?><!--</td>-->
<!--            --><?php //endforeach; ?>
<!--        </tr>-->
<!--    --><?php //endforeach; ?>
<!---->
<!--</table>-->
<?php
use yii\helpers\Url;



/* @var $this \yii\web\View */
/* @var $arColumns  */
/* @var $arRows  */
/* @var $arLinkFields  */
/* @var $linkTemplate  */
/* @var $param  */
?>
<table class="table">
    <tr>
        <?php foreach ($arColumns as $code => $title):?>
            <th><?=$title?></th>
        <?php endforeach;?>
    </tr>
    <?php foreach ($arRows as $arRow):?>
        <tr>
            <?php foreach ($arColumns as $code => $title):?>
                <?php if(in_array($code, $arLinkFields)):?>
                    <td>
                        <a href="<?=Url::to([$linkTemplate, $param => $arRow[$param]])?>"><?=$arRow[$code]?></a>
                    </td>
                <?php else:?>
                    <td><?=$arRow[$code]?></td>
                <?php endif;?>
            <?php endforeach;?>
        </tr>
    <?php endforeach;?>
</table>