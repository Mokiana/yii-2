<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 05.05.2019
 * Time: 15:19
 */

namespace app\controllers;


use app\components\RbacComponent;
use yii\web\Controller;

class RbacController extends Controller
{
    public function actionGen(){
        /** @var RbacComponent $rbac */
        $rbac=\Yii::$app->rbac;

        $rbac->generateRbac();
    }
}