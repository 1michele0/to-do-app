<?php

namespace Michele00\ToDoApp\Controller;
use Michele00\ToDoApp\Model\Task;
use Michele00\ToDoApp\Core\Route;

class TaskController implements IController
{
    const STORAGE_KEY = 'tasks';

    public static function store()
    {
        if (isset($_POST['task'])) {
            
            $text = trim($_POST['task']);
            Task::store($text);
            Route::redirect(TaskController::STORAGE_KEY);
        }
        
    }

    public static function update()
    {
        Task::update();
    }

    public static function destroy()
    {
        Task::destroy();
    }

    public static function index()
    {
        Task::index();
    }
}