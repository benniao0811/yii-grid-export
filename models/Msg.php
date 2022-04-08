<?php

namespace app\models;

use yii\db\ActiveRecord;

class Msg extends ActiveRecord
{
    public function onTest($event) //$event是yii\base\Event的对象
    {
        print_r($event->author);//输出'Test作者'
        print_r($event->dateTime);//输出'Test时间'
        print_r($event->content);//输出'Test内容'
        print_r($event->data);//输出'参数Test'

    }
}
