<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 21.04.2019
 * Time: 12:56
 */

namespace app\controllers\actions;

use app\components\DayComponent;
use app\models\Day;
use yii\base\Action;

class ActivityChoiceAction extends Action
{
       public function run()
    {
        $model = \Yii::$app->day->getModel();

        /**
         * @var DayComponent @comp
         */
        $comp=\Yii::createObject(['class'=>DayComponent::class, 'day_class'=>Day::class]);
        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
            if ($comp->choiceDay($model));
        }
        return $this->controller->render('choice', ['model' => $model]); // в активити не было слова контроллер
    }
}