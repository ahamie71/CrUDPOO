<?php

namespace  CrudPOO\Controllers;
 
  public function getComment()
{
    $commentRep = new CommentRepository();
    $comments = $commentRepo->getComments($_GET['id']);
    require_once(dirname(__FILE__, 2) . '/View/Posts/DisplayOnePost.php');
}

