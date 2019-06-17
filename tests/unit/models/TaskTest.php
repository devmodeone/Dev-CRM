<?php

namespace tests\unit\models;

use app\models\Task;

class TaskTest extends \Codeception\Test\Unit
{
    public function testFindTaskById()
    {
        expect_that($task = Task::findOne(1));
        expect($task->name)->equals('Task #1');

        expect_not(Task::findOne(10000));
    }

    public function testCreateTask()
    {
        $name = 'Task (test)';
        $task = new Task([
            'name' => $name,
            'description' => 'Lorem ipsum',
            'created_at' => time(),
            'start_at' => time(),
            'end_at' => time() + 3600 * 60 * 60,
            'close_at' => 0,
        ]);

        expect_that($task->save());

        return $task;
    }

    /**
     * @depends testCreateTask
     */
    public function testUpdateTaskDescription(Task $task)
    {
        $task->description = 'Lorem ipsul dolor sit amet';
        expect_that($task->save());
    }

    /**
     * @depends testCreateTask
     */
    public function testDeleteTask(Task $task)
    {
        $id = $task->id;
        $task->delete();

        expect_not(Task::findOne($id));
    }
}
