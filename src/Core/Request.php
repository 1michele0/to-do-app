<?php

namespace Michele00\ToDoApp\Core;

class Request
{
    const GET_METHOD = 'GET';
    const POST_METHOD = 'POST';
    const DELETE_METHOD = 'DELETE';
    const PUT_METHOD = 'PUT';


    public static function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function getPath()
    {
        return $_GET['path'];
    }

    public static function isMatch($method, $url)
    {
        return self::getMethod() === $method && self::getPath() === $url;
    }

    public static function getData($key=null)
    {
        if($key !== null){
            return $_REQUEST[$key];
        }

        return $_REQUEST;
    }

    public static function hasKey($key)
    {
        return isset($_REQUEST[$key]);
    }
}
