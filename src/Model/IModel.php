<?php

namespace Michele00\ToDoApp\Model;
interface IModel {
    public static function store($data);
    public function save();
    public function update();
    public function destroy();
    public static function index();
}