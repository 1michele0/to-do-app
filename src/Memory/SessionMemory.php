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

    public function add($data, $key)
    {
        $_SESSION[$key][] = [$data];
    }

    public function toggle_task($index)
    {
        if (isset($_SESSION['tasks'][$index])) {
            $_SESSION['tasks'][$index]['completed'] =
                !$_SESSION['tasks'][$index]['completed'];
        }
    }

    public function delete($key, $deleteIndex)
    {
        if (isset($_SESSION[$key][$deleteIndex])) {
            unset($_SESSION[$key][$deleteIndex]);
            $_SESSION[$key] = array_values($_SESSION[$key]);
        }
    }

    public function is_empty($key)
    {
        return empty($_SESSION[$key]);
    }

    public function get_list($key)
    {
        return $_SESSION[$key];
    }
}
