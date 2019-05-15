<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 21.04.2019
 * Time: 11:07
 */
/**
 * @var $this \yii\web\View
 * @var $model \app\models\Day
 */
?>


<div class="row">
    <div class="col-md-12">
        <h3>День</h3>
        <?php $form=\yii\bootstrap\ActiveForm::begin([
        ]);?>
        <?=$form->field($model, 'weekday')->checkbox();?>
        <?=$form->field($model, 'weekend')->checkbox();?>
        <div class="form-group">
            <button class="btn btn-default" type="submit">Создать</button>
        </div>
        <?php \yii\bootstrap\ActiveForm::end();?>
    </div>
</div>