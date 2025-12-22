<?php

namespace Michele00\ToDoApp\Model;

use Michele00\ToDoApp\Controller\TaskController;
use Michele00\ToDoApp\Memory\FactoryMemory;
use Michele00\ToDoApp\Core\Route;

class Task implements IModel
{
    public $text;
    public $completed;

    public function __construct($text, $completed = false)
    {
        $this->text = htmlspecialchars($text);
        $this->completed = $completed;
    }

    public static function store($text)
    {
        $task = new Task($text);
        FactoryMemory::getMemory()->add($task, TaskController::STORAGE_KEY);
    }

    public static function update()
    {
        if (isset($_POST['toggle'])) {
            $index = (int) $_POST['toggle'];
            FactoryMemory::getMemory()->update($index, TaskController::STORAGE_KEY);
            Route::redirect(TaskController::STORAGE_KEY);
        }
    }

    public static function destroy()
    {
        if (isset($_GET['delete'])) {
            $deleteIndex = (int) $_GET['delete'];
            FactoryMemory::getMemory()->delete($deleteIndex, TaskController::STORAGE_KEY);
            Route::redirect(TaskController::STORAGE_KEY);
        }
    }

    public static function index()
    {
        $is_empty = FactoryMemory::getMemory()->is_empty(TaskController::STORAGE_KEY);
        $tasks = FactoryMemory::getMemory()->get_list(TaskController::STORAGE_KEY);
        include 'view/Main.php';
    }
}