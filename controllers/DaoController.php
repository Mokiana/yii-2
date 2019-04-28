<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 28.04.2019
 * Time: 14:34
 */

namespace app\controllers;

use app\base\BaseController;
use app\components\DaoComponent;
class DaoController extends BaseController
{
    public function actionDao(){
        /** @var DaoComponent $comp */
        $comp=\Yii::createObject(['class'=>DaoComponent::class,
            'connection' =>\Yii::$app->db]);

        $comp->testInsert();

        $users=$comp->getAllUsers();

        $activityUser=$comp->getActivityUser(\Yii::$app->request->get('user',1));

        $activityNotification=$comp->getActivityNotification();

        $firstActivity=$comp->getFirstActivity();



        $countActivity=$comp->getCountActivity();
        return $this->render('dao',['users'=>$users,
            'activityNotification'=>$activityNotification,
            'activityUser'=>$activityUser,
            'firstActivity'=>$firstActivity,
            'countActivity'=>$countActivity]);
    }
}