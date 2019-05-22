<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 18.05.2019
 * Time: 21:25
 */

namespace app\controllers;


use app\models\Activity;
use app\models\Users;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;

class RestController extends ActiveController
{
    public function behaviors()
    {
        return array_merge([
            ['class'=>HttpBearerAuth::class]
        ],parent::behaviors());
    }

    public $modelClass = Activity::class;
}