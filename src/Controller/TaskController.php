<?php

namespace Michele00\ToDoApp\Controller;
use Michele00\ToDoApp\Core\Request;
use Michele00\ToDoApp\Model\Task;
use Michele00\ToDoApp\Core\Route;

class TaskController implements IController
{
    const STORAGE_KEY = 'tasks';

    public static function store()
    {
        if (Request::hasKey(self::STORAGE_KEY)) {
            $data = trim(Request::getData(self::STORAGE_KEY));
            if($data !== ""){
                Task::store($data);
            }
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