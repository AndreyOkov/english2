<?php

use yii\db\Migration;

/**
 * Handles the creation for table `attribute`.
 */
class m170326_162658_create_attribute_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%attribute}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);


        $this->createTable('{{%value}}', [
            'product_id' => $this->integer()->notNull(),
            'attribute_id' => $this->integer()->notNull(),
            'value' => $this->string()->notNull(),
        ]);


        $this->addPrimaryKey('pk-value', '{{%value}}', ['product_id', 'attribute_id']);

        $this->createIndex('idx-value-product_id', '{{%value}}', 'product_id');
        $this->createIndex('idx-value-attribute_id', '{{%value}}', 'attribute_id');

        $this->addForeignKey('fk-value-product', '{{%value}}', 'product_id', '{{%product}}', 'id', 'CASCADE','RESTRICT');
        $this->addForeignKey('fk-value-attribute', '{{%value}}', 'attribute_id', '{{%attribute}}', 'id', 'CASCADE','RESTRICT');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%value}}');
        $this->dropTable('{{%attribute}}');
    }
}
