<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once ('./includes/class-insert.php');

session_start();

//Login Script
if (isset($_POST['send_content'])) {
    
    $user_id = $_SESSION['user_id'];
    $message = $_POST['postcontent'];
    //echo $user_id;
    //echo $_POST['post'];
    $result = $insert->new_content($user_id, $message,1); // query the person

    
        header("Location: profile.php");

}
