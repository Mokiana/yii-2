<?php

/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 05.05.2019
 * Time: 14:27
 */


/* @var $this \yii\web\View */
/* @var $model \app\models\Users */
?>
<div class="row">
    <div class="col-md-6">
        <?php $form=\yii\bootstrap\ActiveForm::begin([
            'method' => 'POST'
        ]); ?>
        <?=$form->field($model,'email');?>
        <?=$form->field($model,'password')->passwordInput()?>

        <div class="form-group">
            <button type="submit">Авторизация</button>
        </div>
        <?php \yii\bootstrap\ActiveForm::end(); ?>
    </div>
</div>