<?php

namespace Michele00\ToDoApp\Memory;

class SessionMemory implements IMemory
{

    public function __construct()
    {
        session_start();
        if (!isset($_SESSION['tasks'])) {
            $_SESSION['tasks'] = [];
        }
    }

    public function add_task($task)
    {
        if ($task !== '') {
            $_SESSION['tasks'][] = [
                'text' => htmlspecialchars($task),
                'completed' => false
            ];
        }
    }

    public function toggle_task($index)
    {
        if (isset($_SESSION['tasks'][$index])) {
            $_SESSION['tasks'][$index]['completed'] =
                !$_SESSION['tasks'][$index]['completed'];
        }
    }

    public function delete_task($deleteIndex)
    {
        if (isset($_SESSION['tasks'][$deleteIndex])) {
            unset($_SESSION['tasks'][$deleteIndex]);
            $_SESSION['tasks'] = array_values($_SESSION['tasks']);
        }
    }

    public function is_empty()
    {
        return empty($_SESSION['tasks']);
    }

    public function get_list()
    {
        return $_SESSION['tasks'];
    }
}
