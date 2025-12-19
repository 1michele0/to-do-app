<?php

namespace Michele00\ToDoApp\Memory;

class FactoryMemory
{

    protected static $instance = null;

    public static function getMemory(): IMemory
    {
        if (self::$instance === null) {
            self::$instance = new SessionMemory();
        }
        return self::$instance;
    }
}