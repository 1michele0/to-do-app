<?php

class Request
{
    public static function crud($base_url, $controller)
    {
        self::add($base_url, $controller);
        self::update($base_url, $controller);
        self::delete($base_url, $controller);
        self::index($base_url, $controller);
    }

    public static function add(string $base_url, string $controller)
    {
        Route::post($base_url, [$controller, 'add']);
    }

    public static function update(string $base_url, string $controller)
    {
        Route::post($base_url, [$controller, 'update']);
    }

    public static function delete(string $base_url, string $controller)
    {
        Route::get($base_url, [$controller, 'delete']);
    }

    public static function index(string $base_url, string $controller)
    {
        Route::get($base_url, "$controller::index");
    }
}
