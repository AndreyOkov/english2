<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tags".
 *
 * @property integer $id
 * @property string $name
 *
 * @property WordsTags[] $wordsTags
 * @property Words[] $words
 */
class Tags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWordsTags()
    {
        return $this->hasMany(WordsTags::className(), ['tags_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWords()
    {
        return $this->hasMany(Words::className(), ['id' => 'words_id'])->viaTable('words_tags', ['tags_id' => 'id']);
    }
}
