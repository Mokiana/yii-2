<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 21.04.2019
 * Time: 12:57
 */

namespace app\controllers;

use app\base\BaseController;
use app\controllers\actions\ActivityChoiceAction;

class DayController extends BaseController
{
    public function actions()
    {
        return [
            'choice'=>['class'=>ActivityChoiceAction::class]
        ];
    }
}