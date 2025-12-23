<?php

namespace Michele00\ToDoApp\Memory;

interface IMemory
{

    public function add($data, $key);
    public function toggle_task($index);
    public function delete($key, $index);
    public function is_empty($key);
    public function get_list($key);
}