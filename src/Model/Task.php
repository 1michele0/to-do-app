<?php

namespace Michele00\ToDoApp\Model;

use Michele00\ToDoApp\Controller\TaskController;
use Michele00\ToDoApp\Core\Route;
use Michele00\ToDoApp\Memory\FactoryMemory;

class Task implements IModel
{
    public $text;
    public $completed;

    public function __construct($text, $completed = false)
    {
        $this->text = htmlspecialchars($text);
        $this->completed = $completed;
    }

    public static function store($data)
    {
        $task = new self($data);
        $task->save();

        return $task;
    }

    public function update()
    {
        if (isset($_POST['toggle'])) {
            $index = (int)$_POST['toggle'];
            FactoryMemory::getMemory()->update($index, TaskController::STORAGE_KEY);
            Route::redirect(TaskController::STORAGE_KEY);
        }
    }

    public function destroy()
    {
        if (isset($_GET['delete'])) {
            $deleteIndex = (int)$_GET['delete'];
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

    public function save()
    {
        FactoryMemory::getMemory()->add([
            "text" => $this->text,
            "completed" => $this->completed,
        ], TaskController::STORAGE_KEY);
    }
}