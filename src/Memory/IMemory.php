<?php

namespace Michele00\ToDoApp\Memory;

interface IMemory
{

    public function add_task($task);
    public function toggle_task($index);
    public function delete_task($deleteIndex);
    public function is_empty();
    public function get_list();
}