<?php

class xRoutes {

  function __construct()
  {
    $route = new stdClass;
    $route->controller = 'index';
    $route->action = 'index';
    $route->param = false;

    if ( isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] != '' ) {
      $path_info = explode('/', preg_replace('/^(\/)|(\/)$/', '', $_SERVER['PATH_INFO']));
      $route->controller = $path_info[0];
      $route->action = isset($path_info[1]) ? $path_info[1] : $route->action;
      $route->param = isset($path_info[2]) ? $path_info[2] : $route->param;
    }
    // Checking if controller exists
    $notfound = true;
    $controller = CONTROLLERS.$route->controller.'.php';
    if ( file_exists($controller) ) {
      $view = VIEWS.$route->controller.DIRECTORY_SEPARATOR.$route->action.'.phtml';
      if ( file_exists($view) ) {
        $notfound = false;
      }
    }
    if ( $notfound ) die('404 controller or action not found');
    require_once $controller;
    require_once $view;
  }
}
