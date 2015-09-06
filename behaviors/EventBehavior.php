<?php

namespace wartron\yii2eventlog\behaviors;

use yii\base\Behavior;
use wartron\yii2eventlog\models\EventlogItem;

class EventBehavior extends Behavior
{
    public function events()
    {
        return[
            \yii\db\ActiveRecord::EVENT_AFTER_INSERT    =>  'afterInsert',
            \yii\db\ActiveRecord::EVENT_AFTER_UPDATE    =>  'afterUpdate',
            \yii\db\ActiveRecord::EVENT_AFTER_DELETE    =>  'afterDelete',
        ];
    }

    public function afterInsert()
    {
        $eli = new EventlogItem();
        $eli->name = "TYPE_OBJECT_CREATE";
        $eli->type = EventlogItem::TYPE_OBJECT_CREATE;
        $eli->saveOrThrow();
    }

    public function afterUpdate()
    {
        $eli = new EventlogItem();
        $eli->name = "TYPE_OBJECT_UPDATE";
        $eli->type = EventlogItem::TYPE_OBJECT_UPDATE;
        $eli->saveOrThrow();
    }

    public function afterDelete()
    {
        $eli = new EventlogItem();
        $eli->name = "TYPE_OBJECT_DELETE";
        $eli->type = EventlogItem::TYPE_OBJECT_DELETE;
        $eli->saveOrThrow();
    }

}