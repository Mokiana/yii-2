<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 20.04.2019
 * Time: 18:25
 */
/**
 * @var $this \yii\web\View
 * @var $model \app\models\Activity
 */
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
?>
<div class="row">
    <div class="col-md-12">
        <h3>Добавить событие</h3>
        <!--        <p>--><? //=$name;?><!--</p>-->
        <!--        <p>--><? //=Yii::getAlias('@app');?><!--</p>-->
        <!--        <p>--><? //=Yii::getAlias('@app'.DIRECTORY_SEPARATOR.'files');?><!--</p>-->
        <!--        <p>--><? //=Yii::getAlias('@webroot');?><!--</p>-->
        <!--        <p>--><? //=Yii::getAlias('@my');?><!--</p>-->
        <!--        <p>--><? //=Yii::getAlias('@new');?><!--</p>-->
<!--        <h4>Предыдущая страница</h4>-->
<!--        <p>--><?php //echo \Yii::$app->session->get('page_url', 'no pages') . PHP_EOL; ?><!--</p>-->
        <?php $form = \yii\bootstrap\ActiveForm::begin([
        ]); ?>
        <?= $form->field($model, 'title'); ?>
<!--        $form->field($model, 'description')->textarea(['data-attr' => 2])-->
        <?= $form->field($model, 'description')->textarea(['row' => '3']); ?>
        <?= $form->field($model, 'dateStart')->input('date'); ?>
        <?= $form->field($model, 'dateEnd')->input('date'); ?>
        <?=$form->field($model,'useNotification')->checkbox();?>
        <?=$form->field($model,'email',
            ['enableClientValidation'=>false,
                'enableAjaxValidation'=>true]
        );?>
<!--        $form->field($model,'emailRepeat');-->
        <?= $form->field($model, 'isBlocked')->checkbox(); ?>
<!--        $form->field($model, 'repeat')->checkbox(); -->
        <?=$form->field($model,'repeatCount')
            ->dropDownList($model->getRepeatCountList())?>
        <?=$form->field($model,'repeatInterval')->input('number',['value'=>'0']);?>

        <?=$form->field($model,'file')->fileInput()?>
        <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true]) ?>
        <div class="form-group">
            <button class="btn btn-default" type="submit">Создать</button>
        </div>
        <?php \yii\bootstrap\ActiveForm::end(); ?>
    </div>
</div>
<?php
//$arr=['onw'=>'tow','two'=>['tree'=>4]];
//
////            $val=ArrayHelper::getValue($arr,'osnw');
//$val=ArrayHelper::getValue($arr,'two.tree');
//print_r($val);
//
//$db=[['id'=>5,'name'=>'Pavel','surname'=>'IVanov'],['id'=>2,'name'=>'Artem','surname'=>'Sidorov']];
//
//$list=ArrayHelper::map($db,'id',function ($record){
//    return ArrayHelper::getValue($record,'name').' '.
//        ArrayHelper::getValue($record,'surname');
//});
//
//print_r($list);
//
//

//=Html::input('text',Html::getInputName($model,'title'),123,['class'=>'sdf']);
