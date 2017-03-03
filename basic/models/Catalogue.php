<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "catalogue".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $done
 * @property integer $created_at
 * @property integer $updated_at
 */
class Catalogue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalogue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['description'], 'string'],
            [['done', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'done' => '',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /* Время создания задания */
    public function behaviors()
    {
        return [
            TimestampBehavior::className() //заполняет значение текущего времени
        ];
    }

    /*выбрать все данные*/
    public static function getAll()
    {
        $data = self::find()->all();
        
        return $data;
    }

    /*выбрать одно задание по id*/
    public static function getOne($id)
    {
        $data = self::find()->where(['id' => $id])->one();

        return $data;
    }
}
