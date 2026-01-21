<?php

namespace Michele00\ToDoApp\Controller;

use Michele00\ToDoApp\Core\Request;
use Michele00\ToDoApp\Model\Task;

class ApiTaskController implements IController
{
    const STORAGE_KEY = 'api-tasks';

    public static function add()
    {
        if (Request::hasKey('task')) {
            $data = trim(Request::getData('task'));
            if ($data !== '') {
                echo json_encode(Task::store($data));
            }
            die();
        }
    }

    public static function update()
    {
        if (Request::hasKey('toggle')) {
            $index = (int)Request::getData('toggle');
            $task = Task::getCurrentObject($index);
            $task->update($index);
            echo json_encode($task);
            die();
        }
    }

    public static function delete()
    {
        if (Request::hasKey('delete')) {
            $deleteIndex = (int)Request::getData('delete');
            $task = Task::getCurrentObject($deleteIndex, Task::$table);
            $task->destroy(Task::$table, $deleteIndex);
            die();
        }
    }

    public static function index()
    {
        $tasks = Task::index(Task::$table);
        echo json_encode($tasks);
    }
}