<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Msg;
use app\events\MsgEvent;
class Event2Controller extends Controller
{
    const TEST_USER = 'email'; //发送邮件
    public function init()
    {
        parent::init();
        $msg = new Msg();
        $this->on(self::TEST_USER,[$msg,'Ontest'],'参数Test');
    }

    public function actionTest()
    {
        $msgEvent = new MsgEvent();
        $msgEvent->dateTime = 'Test时间';
        $msgEvent->author = 'Test作者';
        $msgEvent->content = 'Test内容';
        $this->trigger(self::TEST_USER,$msgEvent);
    }
}