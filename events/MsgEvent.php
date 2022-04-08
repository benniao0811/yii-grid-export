<?php

namespace app\events;

use yii\base\Event;

class MsgEvent extends Event

{

    public $dateTime;   // 时间

    public $author;     // 作者

    public $content;    // 内容


}