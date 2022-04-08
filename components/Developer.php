<?php

namespace app\components;

use yii\base\Component;
use app\interfaces\DanceEventInterface;

class Developer extends Component implements DanceEventInterface
{
    public function testsPassed()
    {
        echo "Yay!";
        $this->trigger(DanceEventInterface::EVENT_DANCE);
    }
}