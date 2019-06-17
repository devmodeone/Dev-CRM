<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sale}}`.
 */
class m190527_073117_create_sale_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%sale}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'start_at' => $this->integer()->notNull(),
            'end_at' => $this->integer()->notNull(),
            'close_at' => $this->integer()->notNull(),
            'number' => $this->string()->defaultValue(null),
            'company' => $this->string()->defaultValue(null),
            'partner_id' => $this->integer()->defaultValue(null),
            'budget' => $this->float()->defaultValue(0),
            'spend' => $this->float()->defaultValue(0),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
        ], $tableOptions);

        $this->createIndex(
            'idx-sale-partner_id',
            '{{%sale}}',
            'partner_id'
        );

        $this->addForeignKey(
            'fk-sale-partner_id',
            '{{%sale}}',
            'partner_id',
            '{{%partner}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-sale-partner_id',
            '{{%sale}}'
        );

        $this->dropIndex(
            'idx-sale-partner_id',
            '{{%sale}}'
        );

        $this->dropTable('{{%sale}}');
    }
}
