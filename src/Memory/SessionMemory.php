<?php

namespace Michele00\ToDoApp\Memory;

class SessionMemory implements IMemory
{

    public function __construct()
    {
        session_start();
        if (!isset($_SESSION['tasks'])) {
            $_SESSION['tasks'] = 'tasks';
        }
    }
    

    public function add($data, $key)
    {
    
        $_SESSION[$key][] = [$data];
    
    }

    public function update($index, $key)
    {
        if (isset($_SESSION[$key][$index])) {
            $_SESSION[$key][$index]['completed'] =
                !$_SESSION[$key][$index]['completed'];
        }
    }

    public function delete($deleteIndex, $key)
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
