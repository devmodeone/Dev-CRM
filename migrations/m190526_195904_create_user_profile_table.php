<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_profile}}`.
 */
class m190526_195904_create_user_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%profile}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'firstname' => $this->string()->defaultValue(null),
            'lastname' => $this->string()->defaultValue(null),
            'middlename' => $this->string()->defaultValue(null),
            'birth_date' => $this->integer()->defaultValue(null),
            'about' => $this->text()->defaultValue(null),
        ], $tableOptions);

        $this->createIndex(
            'idx-profile-user_id',
            '{{%profile}}',
            'user_id'
        );

        $this->addForeignKey(
            'fk-profile-user_id',
            '{{%profile}}',
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
        $this->dropForeignKey(
            'fk-profile-user_id',
            '{{%profile}}'
        );

        $this->dropIndex(
            'idx-profile-user_id',
            '{{%profile}}'
        );

        $this->dropTable('{{%profile}}');
    }
}
