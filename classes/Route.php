<?php

class Route
{
    protected static function route($method, $url, callable $callback)
    {
        if (Request::isMatch($method, $url)) {
            $callback();
        }
    }

    public static function crud($base_url, $controller)
    {
        self::post($base_url, [$controller, 'add']);
        self::post($base_url, [$controller, 'update']);
        self::get($base_url, [$controller, 'delete']);
        self::get($base_url, [$controller, 'index']);
    }


    public static function get($url, $callback)
    {
        self::route(Request::GET_METHOD, $url, $callback);
    }

    public static function post($url, $callback)
    {
        self::route(Request::POST_METHOD, $url, $callback);
    }

    public static function put($url, $callback)
    {
        self::route(Request::PUT_METHOD, $url, $callback);
    }

    public static function delete($url, $callback)
    {
        self::route(Request::DELETE_METHOD, $url, $callback);
    }

    public static function redirect($url='/')
    {
        header("Location: $url");
        exit;
    }
}
