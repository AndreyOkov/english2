<?php

use yii\db\Migration;

/**
 * Handles the creation for table `category`.
 */
class m170326_141528_create_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'parent_id' => $this->integer(),
        ]);

        $this->createIndex('idx-category-parent_id', '{{%category}}', 'parent_id');
        $this->addForeignKey('fk-category-parent', '{{%category}}', 'parent_id', '{{%category}}', 'id','SET NULL','RESTRICT');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%category}}');
    }
}
