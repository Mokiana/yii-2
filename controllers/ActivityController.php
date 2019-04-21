<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 20.04.2019
 * Time: 18:18
 */

namespace app\controllers;

use app\controllers\actions\ActivityCreateAction;
use app\base\BaseController;

class ActivityController extends BaseController
{
    public function actions()
    {
        return [
            'create'=>['class'=>ActivityCreateAction::class, 'name' => 'one'],
            'new'=>['class'=>ActivityCreateAction::class, 'name' => 'two']

        ];
    }
}