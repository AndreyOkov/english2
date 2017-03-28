<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "words".
 *
 * @property integer $id
 * @property string $enword
 * @property string $ruword
 */
class Words extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'words';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enword', 'ruword'], 'required'],
            [['enword', 'ruword', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'enword' => 'Enword',
            'ruword' => 'Ruword',
            'image' => 'Image',
        ];
    }

    public function saveImage($image)
    {
        $this->image = $image;
        $this->save(false);
    }

    public function getImage()
    {
        return ($this->image) ? '/images/' . $this->image : '/no-image.png';
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWordsTags()
    {
        return $this->hasMany(WordsTags::className(), ['words_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tags::className(), ['id' => 'tags_id'])->viaTable('words_tags', ['words_id' => 'id']);
    }
}
