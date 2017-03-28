<?php

use yii\db\Migration;

/**
 * Handles the creation for table `tags`.
 */
class m170321_013430_create_tags_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tags', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
        
        $this->createIndex('idx-tags-name', '{{%tags}}','name');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tags');
    }
}
