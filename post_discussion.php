<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once ('./includes/class-insert.php');

session_start();

//Login Script
if (isset($_POST['send_discussion'])) {
    
    $user_id = $_SESSION['user_id'];
    $message = $_POST['postdiscussion'];
    // echo $user_id;
    // echo $message;
    $result = $insert->new_discussion($user_id, $message, 2); // query the person 	
    // echo $user_id;
        header("Location: discussion_topic.php");

}
