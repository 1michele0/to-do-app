<?php

namespace Michele00\ToDoApp\Controller;

use Michele00\ToDoApp\Core\Route;
use Michele00\ToDoApp\Core\Request;
use Michele00\ToDoApp\Model\Task;

class TaskController implements IController
{
    const STORAGE_KEY = 'tasks';

    public static function add()
    {
        if (Request::hasKey('task')) {
            $data = trim(Request::getData('task'));
            if ($data !== ''){
                Task::store($data);
                Route::redirect(self::STORAGE_KEY);
            }
        }
    }

    public static function update()
    {
        if (Request::hasKey('toggle')) {
            $index = (int) Request::getData('toggle');
            $task = Task::getCurrentObject($index);
            $task->update($index);
            Route::redirect(self::STORAGE_KEY);
        }
    }

    public static function delete()
    {
        if (Request::hasKey('delete')) {
            $deleteIndex = (int) Request::getData('delete');
            $task = Task::getCurrentObject($deleteIndex);
            $task->destroy(self::STORAGE_KEY, $deleteIndex);
            Route::redirect(self::STORAGE_KEY);
        }
    }

    public static function index()
    {
        $tasks = Task::index(self::STORAGE_KEY);
        $is_empty = count($tasks) <= 0;
        include 'view/Main.php';
    }
}