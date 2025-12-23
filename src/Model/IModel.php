<?php

namespace Michele00\ToDoApp\Model;
interface IModel {
    public static function store($data);
    public function save();
    public function update($index);
    public function destroy($key, $index);
    public static function index($key);
    public static function getCurrentObject($index);  
}