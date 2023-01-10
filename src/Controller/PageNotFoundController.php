<?php

namespace Alfred\TodoWithDataBase\Controller;

class PageNotFoundController
{
  public function display()
  {
    $smarty = new \Smarty();
    $smarty->display(__DIR__ . '/../View/page_not_found.tpl');
  }
}
