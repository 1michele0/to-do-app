<?php
include_once 'classes/Memory.php';
include 'classes/Route.php';
include 'classes/Request.php';
include 'classes/IController.php';
include 'classes/TaskController.php';

Request::crud(base_url: '/', controller: 'TaskController');