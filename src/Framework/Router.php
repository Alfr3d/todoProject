<?php

namespace Alfred\TodoWithDataBase\Framework;

use Alfred\TodoWithDataBase\Controller\PageNotFoundController;
use Alfred\TodoWithDataBase\Controller\ToDoController;

class Router
{
  private PageNotFoundController $pageNotFoundController;
  private ToDoController $toDoController;

  public function __construct(
    PageNotFoundController $pageNotFoundController,
    ToDoController $toDoController
  ) {
    $this->pageNotFoundController = $pageNotFoundController;
    $this->toDoController = $toDoController;
  }

  public function process(string $route, array $request = null)
  {
    switch ($route) {
      case '/':
        $this->toDoController->list();
        break;
      case '/list':
        die('list');
        break;
      case '/create':
        die('create new todo');
        break;
      default:
        $this->pageNotFoundController->display();
        break;
    }
  }
}
