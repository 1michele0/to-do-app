<?php

class TaskController implements IController
{
    public static function add()
    {
        if (isset($_POST['task'])) {
            $task = trim($_POST['task']);
            FactoryMemory::getMemory()->add_task($task);
            Route::redirect();
        }
    }

    public static function update()
    {
        if (isset($_POST['toggle'])) {
            $index = (int) $_POST['toggle'];
            FactoryMemory::getMemory()->toggle_task($index);
            Route::redirect();
        }
    }

    public static function delete()
    {
        if (isset($_GET['delete'])) {
            $deleteIndex = (int) $_GET['delete'];
            FactoryMemory::getMemory()->delete_task($deleteIndex);
            Route::redirect();
        }
    }

    public static function index()
    {
        include 'view/Main.php';
    }
}