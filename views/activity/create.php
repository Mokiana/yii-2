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
?>
<div class="row">
    <div class="col-md-12">
        <h3>Добавляем событие</h3>
        <p><?=$name;?></p>
<!--        <p>--><?//=Yii::getAlias('@app');?><!--</p>-->
<!--        <p>--><?//=Yii::getAlias('@app'.DIRECTORY_SEPARATOR.'files');?><!--</p>-->
<!--        <p>--><?//=Yii::getAlias('@webroot');?><!--</p>-->
<!--        <p>--><?//=Yii::getAlias('@my');?><!--</p>-->
<!--        <p>--><?//=Yii::getAlias('@new');?><!--</p>-->
        <?php $form=\yii\bootstrap\ActiveForm::begin([
        ]);?>
            <?=$form->field($model, 'title');?>
            <?=$form->field($model, 'description')->textarea(['data-attr'=>2]);?>
            <?=$form->field($model, 'date_start')->input('date');?>
            <?=$form->field($model, 'is_blocked')->checkbox();?>
            <?=$form->field($model, 'repeat')->checkbox();?>
        <div class="form-group">
            <button class="btn btn-default" type="submit">Создать</button>
        </div>
        <?php \yii\bootstrap\ActiveForm::end();?>
    </div>
</div>
