<?php

namespace app\components;

use yii\base\Component;
use app\events\MessageEvent;

class Email extends Component
{

    public function send($event)
    {
//        var_dump($event->data);die;
//        print_r($event);die;
        echo 'email send '.$event->data;
        echo '<br />';
    }

//    const EVENT_MESSAGE_SENT = 'messageSent';
//    public function send($message)
//    {
//        // ...发送 $message 的逻辑...
//
//        $event = new MessageEvent;
//        $event->message = $message;
//        $this->trigger(self::EVENT_MESSAGE_SENT, $event);
//    }
}