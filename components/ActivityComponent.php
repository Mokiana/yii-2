<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 20.04.2019
 * Time: 22:25
 */

namespace app\components;


use app\models\Activity;
use yii\base\Component;

class ActivityComponent extends Component
{
    public $activity_class;

    public function init(){
        parent::init();
        if(empty($this->activity_class)){
            throw new \Exception('Need activity_class param');
        }
    }

    /**
     * @return Activity
     */
    public function getModel(){
        return new $this->activity_class;
    }

    /**
     * @param $model Activity
     * @return bool
     */
    public function createActivity(&$model):bool{
        if (!$model->validate()){
            print_r($model->getErrors());
            return false;
        }
        return true;
    }
}