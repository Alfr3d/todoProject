<?php

namespace Alfred\TodoWithDataBase\Repository;

use Alfred\TodoWithDataBase\Framework\DbConnection;

class TaskRepository
{
  private function db()
  {
    $instance = DbConnection::getInstance();
    return $instance->getConnection();
  }

  public function getAllTasks(): array
  {
    $conn = $this->db();
    $statement = $conn->prepare('SELECT * FROM task');
    $statement->execute();

    return $statement->fetchAll(\PDO::FETCH_ASSOC);
  }
}
