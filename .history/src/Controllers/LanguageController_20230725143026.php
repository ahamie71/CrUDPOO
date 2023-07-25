<?php

namespace  CrudPOO\Controllers;
 
public function getComment()
{
    $commentRepo = new CommentRepository();
    $comments = $commentRepo->getComments($_GET['id']);
    require_once(dirname(__FILE__, 2) . '/View/Posts/DisplayOnePost.php');
}

