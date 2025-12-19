<?php

namespace Michele00\ToDoApp\Controller;

use Michele00\ToDoApp\Memory\FactoryMemory;
use Michele00\ToDoApp\Core\Route;

class TaskController implements IController
{
    const STORAGE_KEY = 'tasks';

    public static function add()
    {
        if (isset($_POST['task'])) {
            $task = trim($_POST['task']);
            FactoryMemory::getMemory()->add_task($task);
            Route::redirect(self::STORAGE_KEY);
        }
    }

    public static function update()
    {
        if (isset($_POST['toggle'])) {
            $index = (int) $_POST['toggle'];
            FactoryMemory::getMemory()->toggle_task($index);
            Route::redirect(self::STORAGE_KEY);
        }
    }

    public static function delete()
    {
        if (isset($_GET['delete'])) {
            $deleteIndex = (int) $_GET['delete'];
            FactoryMemory::getMemory()->delete_task($deleteIndex);
            Route::redirect(self::STORAGE_KEY);
        }
    }

    public static function index()
    {
        include 'view/Main.php';
    }
}