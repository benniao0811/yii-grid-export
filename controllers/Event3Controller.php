<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Comment;
use app\components\Email;
use app\components\ShortMessage;

class Event3Controller extends Controller
{

    public function actionTest()
    {
        $comment = new Comment();
        $emailHandler = [new Email(), 'send'];
        $smsHandler = [new ShortMessage(), 'send'];
        //注册两个事件
        $comment->on(Comment::EVENT_SEND_MESSAGE, $emailHandler, 'for comment.');
        $comment->on(Comment::EVENT_SEND_MESSAGE, $smsHandler, 'for comment.');

        //保存评论
        $comment->save();

    }
}