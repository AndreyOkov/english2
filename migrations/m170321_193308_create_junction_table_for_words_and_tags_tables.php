<?php

use yii\db\Migration;

/**
 * Handles the creation for table `words_tags`.
 * Has foreign keys to the tables:
 *
 * - `words`
 * - `tags`
 */
class m170321_193308_create_junction_table_for_words_and_tags_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('words_tags', [
            'words_id' => $this->integer(),
            'tags_id' => $this->integer(),
            'PRIMARY KEY(words_id, tags_id)',
        ]);

        // creates index for column `words_id`
        $this->createIndex(
            'idx-words_tags-words_id',
            'words_tags',
            'words_id'
        );

        // add foreign key for table `words`
        $this->addForeignKey(
            'fk-words_tags-words_id',
            'words_tags',
            'words_id',
            'words',
            'id',
            'CASCADE'
        );

        // creates index for column `tags_id`
        $this->createIndex(
            'idx-words_tags-tags_id',
            'words_tags',
            'tags_id'
        );

        // add foreign key for table `tags`
        $this->addForeignKey(
            'fk-words_tags-tags_id',
            'words_tags',
            'tags_id',
            'tags',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `words`
        $this->dropForeignKey(
            'fk-words_tags-words_id',
            'words_tags'
        );

        // drops index for column `words_id`
        $this->dropIndex(
            'idx-words_tags-words_id',
            'words_tags'
        );

        // drops foreign key for table `tags`
        $this->dropForeignKey(
            'fk-words_tags-tags_id',
            'words_tags'
        );

        // drops index for column `tags_id`
        $this->dropIndex(
            'idx-words_tags-tags_id',
            'words_tags'
        );

        $this->dropTable('words_tags');
    }
}
