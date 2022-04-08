<?php

namespace app\components;

use yii\base\Component;
use app\events\MessageEvent;

class ShortMessage extends Component
{

    public function send($event)
    {
        echo 'short message send '.$event->data;;
        echo '<br />';
    }

}