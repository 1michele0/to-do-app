<?php
require __DIR__ . '/vendor/autoload.php';

use Michele00\ToDoApp\Core\Route;
use Michele00\ToDoApp\Controller\TaskController;

Route::crud(TaskController::STORAGE_KEY, TaskController::class);