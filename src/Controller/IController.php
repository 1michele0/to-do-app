<?php

namespace Michele00\ToDoApp\Controller;

interface IController
{
    public static function store();
    public static function update();
    public static function destroy();
    public static function index();
}