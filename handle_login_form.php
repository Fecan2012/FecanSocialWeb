<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ('./includes/class-query.php');

//Login Script
if (isset($_POST['loginSubmit'])) {
    $md5password_login = md5($_POST['loginPassword']);
    $user_login = $_POST['loginUserName'];

    $result = $query->verify_user($user_login, $md5password_login); // query the person
session_destroy();
//session_reset();
    if ($result[0] == $user_login && $result[1] == $md5password_login) {
                
// Start the session
        session_start();
        // Set session variables
        $_SESSION["user_id"] = $result[2];
        $_SESSION["user_name"] = $result[3];
        header("Location: profile.php");
    } else {
        header("Location: index.php");
    }
}