<?php
/**
 * Created by PhpStorm.
 * User: Talisman
 * Date: 13.05.2019
 * Time: 19:07
 */

namespace app\commands;


use yii\console\Controller;

class NotificationController extends Controller
{
    public $first;

    public function options($actionID)
    {
        return ['first'];
    }

    public function optionAliases()
    {
        return ['f'=>'first'];
    }

    public function actionSend(){
            echo $this->first.PHP_EOL;
//        echo 'ok send '.implode(',',$args).PHP_EOL;
    }
}