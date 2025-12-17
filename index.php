<?php
include_once 'classes/Memory.php';
include 'classes/Route.php';

$memory = FactoryMemory::getMemory();

// Handle adding a new task
Route::post('/', function () use ($memory) {
    if (isset($_POST['task'])) {
        $task = trim($_POST['task']);
        $memory->add_task($task);
        Route::redirect();
    }   
});

// Handle toggling task completion
Route::post('/', function() use ($memory) {
    if (isset($_POST['toggle'])) {
        $index = (int) $_POST['toggle'];
        $memory->toggle_task($index);
        Route::redirect();
    }
});

// Handle deleting a task
Route::get('/', function() use ($memory) {
    if (isset($_GET['delete'])) {
            $deleteIndex = (int) $_GET['delete'];
            $memory->delete_task($deleteIndex);
            Route::redirect();
        }
    });

Route::get('/', function() {
    include 'view/Main.php';
});