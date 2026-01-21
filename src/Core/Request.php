<?php

namespace Michele00\ToDoApp\Core;

class Request
{
    const GET_METHOD = 'GET';
    const POST_METHOD = 'POST';
    const DELETE_METHOD = 'DELETE';
    const PUT_METHOD = 'PUT';

    public static function isMatch($method, $url)
    {
        return self::getMethod() === $method && self::getPath() === $url;
    }

    public static function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function getPath()
    {
        return $_GET['path'];
    }

    public static function hasKey($key)
    {
        $data = self::getData();
        return isset($data[$key]);
    }

    public static function getData($key = null)
    {
        $all_data = array_merge($_REQUEST, self::getJsonInput());
        if ($key !== null) {
            return array_key_exists($key, $all_data) ? $all_data[$key] : null;
        }

        return $all_data;
    }

    public static function getJsonInput()
    {
        $post_json = file_get_contents('php://input');

        return json_decode($post_json ?: "{}", true) ?? [];
    }
}
