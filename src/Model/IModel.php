<?php

namespace Michele00\ToDoApp\Model;
interface IModel {
    public static function store($data);
    public static function update();
    public static function destroy();
    public static function index();
}