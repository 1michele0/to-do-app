<?php

 Interface IMemory {

    public function start_session();
    public function add_task($task);
    public function toggle_task($index);
    public function delete_task($deleteIndex);

 }


 Class SessionMemory implements Imemory {

    public function start_session() {
        session_start();
        if (!isset($_SESSION['tasks'])) {
            $_SESSION['tasks'] = [];
        }
    }

    public function add_task($task) {
        if ($task !== '') {
            $_SESSION['tasks'][] = [
                'text' => htmlspecialchars($task),
                'completed' => false
            ];
        }
    }

    public function toggle_task($index) {
        if (isset($_SESSION['tasks'][$index])) {
            $_SESSION['tasks'][$index]['completed'] =
                !$_SESSION['tasks'][$index]['completed'];
        }
    }

    public function delete_task($deleteIndex) {
        if (isset($_SESSION['tasks'][$deleteIndex])) {
            unset($_SESSION['tasks'][$deleteIndex]);
            $_SESSION['tasks'] = array_values($_SESSION['tasks']);
        }
    }

 }


Class FactoryMemory {

    protected static $instance = null;

    public static function createMemory(): IMemory {
        if (self::$instance === null) {
            self::$instance = new SessionMemory();
        }
        return self::$instance;
    }

 }