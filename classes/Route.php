<?php

class Route
{
    protected static function route($method, $url, callable $callback)
    {
        if ($_SERVER['REQUEST_METHOD'] === $method) {
            // Strip query string from URI
            $requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            if ($requestPath === $url) {
                $callback();
            }
        }
    }


    public static function get($url, $callback)
    {
        self::route('GET', $url, $callback);
    }

    public static function post($url, $callback)
    {
        self::route('POST', $url, $callback);
    }

    public static function put($url, $callback)
    {
        self::route('PUT', $url, $callback);
    }

    public static function delete($url, $callback)
    {
        self::route('DELETE', $url, $callback);
    }

    public static function redirect()
    {
        header("Location: /");
        exit;
    }
}
