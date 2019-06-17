<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%partner}}`.
 */
class m190527_072752_create_partner_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%partner}}', [
            'id' => $this->primaryKey(),
            'type' => $this->smallInteger()->notNull()->defaultValue(0),
            'name' => $this->string()->notNull(),
            'specialization' => $this->string()->defaultValue(null),
            'person' => $this->string()->defaultValue(null),
            'phone' => $this->string()->defaultValue(null),
            'email' => $this->string()->defaultValue(null),
            'address' => $this->string()->defaultValue(null),
            'www' => $this->string()->defaultValue(null),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%partner}}');
    }
}
