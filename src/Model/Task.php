<?php

namespace Michele00\ToDoApp\Model;

use Michele00\ToDoApp\Controller\TaskController;
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

    public function save()
    {
        FactoryMemory::getMemory()->add([
            "text" => $this->text,
            "completed" => $this->completed,
        ], TaskController::STORAGE_KEY);
    }

    public function update()
    {
        throw new \Exception('Not implemented');
    }

    public static function destroy($key, $index)
    {
        FactoryMemory::getMemory()->delete($key, $index);
    }

    public static function index($key)
    {
        $is_empty = FactoryMemory::getMemory()->is_empty($key);
        $tasks = FactoryMemory::getMemory()->get_list($key);
        include 'view/Main.php';
    }

}