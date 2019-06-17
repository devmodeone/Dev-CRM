<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sale_user}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%sale}}`
 * - `{{%user}}`
 */
class m190527_073149_create_junction_table_for_sale_and_user_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sale_user}}', [
            'sale_id' => $this->integer(),
            'user_id' => $this->integer(),
            'owner' => $this->boolean()->defaultValue(0),
            'shared' => $this->boolean()->defaultValue(0),
            'PRIMARY KEY(sale_id, user_id)',
        ]);

        // creates index for column `sale_id`
        $this->createIndex(
            '{{%idx-sale_user-sale_id}}',
            '{{%sale_user}}',
            'sale_id'
        );

        // add foreign key for table `{{%sale}}`
        $this->addForeignKey(
            '{{%fk-sale_user-sale_id}}',
            '{{%sale_user}}',
            'sale_id',
            '{{%sale}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-sale_user-user_id}}',
            '{{%sale_user}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-sale_user-user_id}}',
            '{{%sale_user}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%sale}}`
        $this->dropForeignKey(
            '{{%fk-sale_user-sale_id}}',
            '{{%sale_user}}'
        );

        // drops index for column `sale_id`
        $this->dropIndex(
            '{{%idx-sale_user-sale_id}}',
            '{{%sale_user}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-sale_user-user_id}}',
            '{{%sale_user}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-sale_user-user_id}}',
            '{{%sale_user}}'
        );

        $this->dropTable('{{%sale_user}}');
    }
}
