<?php

namespace Alfred\TodoWithDataBase\Controller;

use Alfred\TodoWithDataBase\Repository\TaskRepository;

class ToDoController
{
  private TaskRepository $taskRepository;

  public function __construct(TaskRepository $taskRepository)
  {
    $this->taskRepository = $taskRepository;
  }

  public function list()
  {
    $tasks = $this->taskRepository->getAllTasks();

    $smarty = new \Smarty();
    $smarty->assign(['tasks' => $tasks]);
    $smarty->display(__DIR__ . '/../View/home_page.tpl');
  }
}
