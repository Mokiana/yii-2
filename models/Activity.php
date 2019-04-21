<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 20.04.2019
 * Time: 20:36
 */

namespace app\models;


use yii\base\Model;

class Activity extends Model
{
    public $title;
    public $description;
    public $date_start;
    public $is_blocked;
    public $repeat;
    public function rules() {
        return [
            ['title', 'required'],
            ['description', 'string', 'min' => 10],
            ['date_start', 'string'],
            ['is_blocked', 'boolean'],
            ['repeat', 'boolean']
        ];
    }
    public function attributeLabels() {
        return [
            'title'=>'Заголовок',
            'description'=>'Описание',
            'date_start'=>'Дата начала',
            'is_blocked'=>'Блокирующее событие',
            'repeat'=>'Повторение'
        ];
    }
}