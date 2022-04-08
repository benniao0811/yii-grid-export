<?php

namespace app\models;

use yii\base\Component;
use app\events\MsgEvent;

class Comment extends Component
{
    const EVENT_SEND_MESSAGE = 'send';

    //保存成功触发发送通知消息事件
    public function save()
    {
        echo 'comment save success';
        echo '<br />';

        $msgEvent = new MsgEvent();
        $msgEvent->dateTime = 'Test时间';
        $msgEvent->author = 'Test作者';
        $msgEvent->content = 'Test内容';

        $this->trigger(self::EVENT_SEND_MESSAGE,$msgEvent);
    }
}