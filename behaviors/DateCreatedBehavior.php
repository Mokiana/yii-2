<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 11.05.2019
 * Time: 21:58
 */

namespace app\behaviors;


use yii\base\Behavior;

class DateCreatedBehavior extends Behavior
{

    public $date_created_attribute;

    public function getDateAt(){
        $owner=$this->owner;

        return $owner->{$this->date_created_attribute}.' t';
    }
}