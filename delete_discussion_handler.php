<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once './includes/class-insert.php';

$discussionId = $_POST["discussionId"];

$insert->deleteDiscussion($discussionId);
header("Location: discussion_topic.php");
