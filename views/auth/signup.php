<?php

/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 05.05.2019
 * Time: 12:58
 */

/* @var $this \yii\web\View */?>
<div class="row">
    <div class="col-md-6">
        <?php $form=\yii\bootstrap\ActiveForm::begin([
            'method' => 'POST'
        ]); ?>
        <?=$form->field($model,'name');?>
        <?=$form->field($model,'login');?>
        <?=$form->field($model,'email');?>
        <?=$form->field($model,'password')->passwordInput()?>

        <div class="form-group">
            <button type="submit">Регистрация</button>
        </div>
        <?php \yii\bootstrap\ActiveForm::end(); ?>
    </div>
</div>
