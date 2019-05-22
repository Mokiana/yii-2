<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 19.05.2019
 * Time: 20:35
 */

namespace app\components;


interface Notification
{
public function sendActivityInfo($activities);
}