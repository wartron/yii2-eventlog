<?php

namespace wartron\yii2eventlog\models;

use Exception;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "file".
 *
 * @property integer $id
 * @property string $type
 * @property string $name
 * @property string $data
 */
class EventlogItem extends \yii\db\ActiveRecord
{
    const TYPE_EVENT                = 1;
    const TYPE_OBJECT_CREATE        = 10;
    const TYPE_OBJECT_UPDATE        = 12;
    const TYPE_OBJECT_DELETE        = 14;

    const TYPE_USER_REGISTER        = 50;
    const TYPE_USER_PASSWORD_RESET  = 51;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'eventlog_item';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'updatedAtAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['type', 'read_at', 'created_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['data'], 'string', 'max' => 1024*10],
        ];
    }

    public function saveOrThrow()
    {
        if($this->save())
        {
            return;
        }
        else
        {
            throw new Exception("Error Saving Model ".json_encode($this->getErrors()), 1);
        }
    }

}