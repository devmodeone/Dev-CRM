<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%report}}`.
 */
class m190528_011421_create_report_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%report}}', [
            'id' => $this->primaryKey(),
            'report_type' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'end_at' => $this->integer()->notNull(),
            'description' => $this->text()->defaultValue(null),
        ]);

        $this->createIndex(
            'idx-report-user_id',
            '{{%report}}',
            'user_id'
        );

        $this->addForeignKey(
            'fk-report-user_id',
            '{{%report}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-report-report_type',
            '{{%report}}',
            'report_type'
        );

        $this->addForeignKey(
            'fk-report-report_type',
            '{{%report}}',
            'report_type',
            '{{%report_type}}',
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
            'fk-report-user_id',
            '{{%report}}'
        );

        $this->dropIndex(
            'idx-report-user_id',
            '{{%report}}'
        );

        $this->dropForeignKey(
            'fk-report-report_type',
            '{{%report}}'
        );

        $this->dropIndex(
            'idx-report-report_type',
            '{{%report}}'
        );
        $this->dropTable('{{%report}}');
    }
}
