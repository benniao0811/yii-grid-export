<?php

namespace app\controllers;

use yii\web\Controller;

class EventController extends Controller
{
    const TEST_EVENT = 'event';

    public function init()
    {
        parent::init();
        $this->on(self::TEST_EVENT, [$this, 'onTest']);
    }


    public function onTest()
    {
        echo '这个一个事件测试。。。';
    }

    public function actionIndex()
    {
        echo 111;
        $this->trigger(self::TEST_EVENT);
    }
}