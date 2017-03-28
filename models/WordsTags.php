<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "words_tags".
 *
 * @property integer $words_id
 * @property integer $tags_id
 *
 * @property Tags $tags
 * @property Words $words
 */
class WordsTags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'words_tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['words_id', 'tags_id'], 'required'],
            [['words_id', 'tags_id'], 'integer'],
            [['tags_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tags::className(), 'targetAttribute' => ['tags_id' => 'id']],
            [['words_id'], 'exist', 'skipOnError' => true, 'targetClass' => Words::className(), 'targetAttribute' => ['words_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'words_id' => 'Words ID',
            'tags_id' => 'Tags ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasOne(Tags::className(), ['id' => 'tags_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWords()
    {
        return $this->hasOne(Words::className(), ['id' => 'words_id']);
    }
}
