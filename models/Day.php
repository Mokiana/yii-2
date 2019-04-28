<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 21.04.2019
 * Time: 9:43
 */

namespace app\models;


use yii\base\Model;

class Day extends Model
{
    public $weekday;
    public $weekend;

    public function attributeLabels() {
        return [
            'weekday'=>'Будний день',
            'weekend'=>'Выходной',
         ];
    }
}