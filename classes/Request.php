<?php

class Request
{
    public static function executeRequest()
    {
        self::addTask();
        self::toggleTask();
        self::deleteTask();
        self::showMainView();
    }


    public static function addTask()
    {
        Route::post('/', function () {
            if (isset($_POST['task'])) {
                $task = trim($_POST['task']);
                FactoryMemory::getMemory()->add_task($task);
                Route::redirect();
            }
        });
    }

    public static function toggleTask()
    {
        Route::post('/', function () {
            if (isset($_POST['toggle'])) {
                $index = (int) $_POST['toggle'];
                FactoryMemory::getMemory()->toggle_task($index);
                Route::redirect();
            }
        });
    }

    public static function deleteTask()
    {
        Route::get('/', function () {
            if (isset($_GET['delete'])) {
                $deleteIndex = (int) $_GET['delete'];
                FactoryMemory::getMemory()->delete_task($deleteIndex);
                Route::redirect();
            }
        });
    }

    public static function showMainView()
    {
        Route::get('/', function () {
            include 'view/Main.php';
        });
    }
}
