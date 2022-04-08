<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Comment;
use app\components\Dog;
use app\components\Developer;
use yii\base\Event;
use app\interfaces\DanceEventInterface;
use Yii;

class Event4Controller extends Controller
{

    public function actionTest()
    {

        $emailHandler = [new Dog(), 'meetBuddy'];
        $smsHandler = [new Developer(), 'testsPassed'];

        //注册两个事件
//        Event::on('app\interfaces\DanceEventInterface', DanceEventInterface::EVENT_DANCE, function ($event) {
//           echo Yii::trace(get_class($event->sender) . ' just danced'); // Will log that Dog or Developer danced
//        });

//        Event::on(DanceEventInterface::EVENT_DANCE, $emailHandler, 'for comment.');

//        $comment->on(Comment::EVENT_SEND_MESSAGE, $emailHandler, 'for comment.');
//        $comment->on(Comment::EVENT_SEND_MESSAGE, $smsHandler, 'for comment.');
//
//        //保存评论
//        $comment->save();

    }
}