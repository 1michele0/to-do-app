<?php

namespace Michele00\ToDoApp\Memory;

interface IMemory
{

    public function add($task, $object);
    public function update($index, $object);
    public function delete($deleteIndex, $object);
    public function is_empty($object);
    public function get_list($object);
}