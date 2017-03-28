<?php

use yii\db\Migration;

/**
 * Handles the creation for table `words`.
 */
class m170321_013352_create_words_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('words', [
            'id' => $this->primaryKey(),
            'enword' => $this->string(),
            'ruword' => $this->string(),
            'transcription' => $this->string(),
            'image' => $this->string(),
            'image2' => $this->string(),
            'description'=>$this->text(),
            'rate' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('words');
    }
}
