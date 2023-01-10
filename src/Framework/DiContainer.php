<?php

namespace Alfred\TodoWithDataBase\Framework;

use Alfred\TodoWithDataBase\Controller\PageNotFoundController;
use Alfred\TodoWithDataBase\Controller\ToDoController;
use Alfred\TodoWithDataBase\Repository\TaskRepository;
use RuntimeException;

class DiContainer
{
  private array $entries = [];

  public function get(string $id)
  {
    if (!$this->has($id)) {
      throw new RuntimeException('Class ' . $id . 'not found in container.');
    }
    $entry = $this->entries[$id];

    return $entry($this);
  }

  public function has(string $id): bool
  {
    return isset($this->entries[$id]);
  }

  public function set(string $id, callable $callable): void
  {
    $this->entries[$id] = $callable;
  }

  public function loadDependencies()
  {
    $this->set(
      Router::class,
      function (DiContainer $container) {
        return new Router(
          $container->get(PageNotFoundController::class),
          $container->get(ToDoController::class)
        );
      }
    );

    $this->set(
      PageNotFoundController::class,
      function (DiContainer $container) {
        return new PageNotFoundController();
      }
    );

    $this->set(
      ToDoController::class,
      function (DiContainer $container) {
        return new ToDoController(
          $container->get(TaskRepository::class)
        );
      }
    );

    $this->set(
      TaskRepository::class,
      function (DiContainer $container) {
        return new TaskRepository();
      }
    );
  }
}
