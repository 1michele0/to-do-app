<?php

namespace Michele00\ToDoApp\Memory;

class SessionMemory implements IMemory
{

    public function add($data, $key)
    {
        $this->checkSession($key);
        $_SESSION[$key][] = $data;
    }

    public function update($key, $index, $data)
    {
        $this->checkSession($key);
        $_SESSION[$key][$index] = $data;
    }

    public function delete($key, $deleteIndex)
    {
        $this->checkSession($key);
        if (isset($_SESSION[$key][$deleteIndex])) {
            unset($_SESSION[$key][$deleteIndex]);
            $_SESSION[$key] = array_values($_SESSION[$key]);
        }
    }

    public function is_empty($key)
    {
        $this->checkSession($key);
        return empty($_SESSION[$key]);
    }

    public function get_list($key)
    {
        $this->checkSession($key);
        return $_SESSION[$key];
    }

    public function checkSession($key)
    {
       if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION[$key])) {
            $_SESSION[$key] = [];
        } 
    }
}
