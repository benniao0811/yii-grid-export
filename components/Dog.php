<?php

namespace app\components;

use yii\base\BaseObject;
use yii\base\Component;
use app\interfaces\DanceEventInterface;
use app\events\MsgEvent;

class Dog extends Component implements DanceEventInterface
{
    public function meetBuddy()
    {
        echo "Woof!";

//        $msgEvent = new MsgEvent();
//        $msgEvent->dateTime = 'Test时间';
//        $msgEvent->author = 'Test作者';
//        $msgEvent->content = 'Test内容';

        $this->trigger(DanceEventInterface::EVENT_DANCE,$msgEvent);
    }
}