<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 20.04.2019
 * Time: 21:31
 */

namespace app\controllers\actions;

use app\components\ActivityComponent;
use app\models\Activity;
use yii\base\Action;

class ActivityCreateAction extends Action
{
    public $name;
    public function run()
        {
            $model = \Yii::$app->activity->getModel();

            /**
             * @var ActivityComponent @comp
             */
            $comp=\Yii::createObject(['class'=>ActivityComponent::class, 'activity_class'=>Activity::class]);
            if (\Yii::$app->request->isPost) {
                $model->load(\Yii::$app->request->post());
//            print_r($model->getAttributes());
//                $model->title=null;
//                if (!$model->validate()){
////                    print_r($model->getErrors());
////                }
////                exit;
                if ($comp->createActivity($model));
            }
            return $this->controller->render('create', ['model' => $model, 'name' =>$this->name]); // в активити не было слова контроллер
    }
}