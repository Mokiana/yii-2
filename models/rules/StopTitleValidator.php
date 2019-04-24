<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 24.04.2019
 * Time: 20:44
 */

namespace app\models\rules;

use yii\validators\Validator;

class StopTitleValidator extends Validator
{
    public $letters=[];

    public function validateAttribute($model, $attribute)
    {
        if($model->$attribute=='admin'){
            $model->addError($attribute,'Выберите другой заголовок');
        }
    }
}