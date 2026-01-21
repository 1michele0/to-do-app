<?php

namespace Michele00\ToDoApp\Model;

use Michele00\ToDoApp\Controller\TaskController;
use Michele00\ToDoApp\Memory\FactoryMemory;

class Task implements IModel
{
    public $text;
    public $completed;
    public static $table = "tasks";

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
        ], self::$table);
    }

    public static function index($key)
    {
        $tasks = FactoryMemory::getMemory()->get_list($key);
        return $tasks;
    }

    public static function getCurrentObject($id, $index = null)
    {
        $tasks = FactoryMemory::getMemory()->get_list($index ?? TaskController::STORAGE_KEY);
        $taskData = $tasks[$id];
        $task = new Task($taskData["text"], $taskData["completed"]);

        return $task;
    }

    public function update($index)
    {
        $this->completed = !$this->completed;
        FactoryMemory::getMemory()->update(
            self::$table,
            $index,
            [
                "text" => $this->text,
                "completed" => $this->completed
            ]);
    }

    public function destroy($key, $index)
    {
        FactoryMemory::getMemory()->delete($key, $index);
    }
}
