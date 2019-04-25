<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 21.04.2019
 * Time: 13:01
 */

namespace app\components;


use app\models\Day;
use yii\base\Component;

class DayComponent extends Component
{
    public $day_class;
    public function init(){
        parent::init();
        if(empty($this->day_class)){
            throw new \Exception('Need day_class param');
        }
    }
    /**
     * @return Day
     */
    public function getModel(){
        return new $this->day_class;
    }
    /**
     * @param $model Day
     * @return bool
     */
    public function choiceDay(&$model):bool{
        if (!$model->validate()){
            print_r($model->getErrors());
            return false;
        }
        return true;
    }
}
