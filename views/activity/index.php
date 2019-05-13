<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 11.05.2019
 * Time: 17:04
 */

/* @var $this \yii\web\View */
/* @var $model \app\models\ActivitySearch */
/* @var $provider \yii\data\ActiveDataProvider */

?>

<?php if($this->beginCache('page1',['duration'=>15])):?>
<?=\yii\grid\GridView::widget([
    'dataProvider' => $provider,
    'filterModel' => $model,
    'tableOptions' => [
        'class'=>'table table-hover table-bordered'
    ],
    'rowOptions' => function($model,$key,$index,$grid){
        $class=$index%2?'odd':'even';
        return[
            'class'=>$class
        ];
    },
    'layout' => "{summary}\n{pager}\n{items}\n{pager}",
    'columns' => [
        ['class'=>\yii\grid\SerialColumn::class],
        'id',
        [
            'attribute' => 'title',
            'value' => function($model){
                return \yii\helpers\Html::a(\yii\helpers\Html::encode($model->title),['/activity/detail','id'=>$model->id]);
            },
            'format' => 'html'
        ],
        [
            'attribute' => 'user.email',
            'label' => 'Пользователь'
        ],
        [
            'attribute' => 'date_created',
            'value'=>function($model){
                return $model->getDateAt();
            }
        ]
    ]
]);?>
<?php $this->endCache();?>
<?php endif;?>
