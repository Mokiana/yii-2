<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 11.05.2019
 * Time: 16:54
 */

namespace app\models;

use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;

class ActivitySearch extends Activity
{
    public function search($params){
        $model=new Activity();

        $query=$model::find();
        $query->with('user');

        $this->load($params);

        $provider=new ActiveDataProvider(
            [
                'query' => $query,
                'pagination' =>[
                    'pageSize'=>5
                ],
                'sort'=>[
                    'defaultOrder'=>['dateStart'=>SORT_DESC]
                ]
            ]
        );


//        $provider->get

        $query->andFilterWhere(['like','title',$this->title]);

        $query->andFilterWhere(['id'=>$this->id]);

        return $provider;
    }
}