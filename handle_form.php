<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('./includes/class-insert.php');
require_once './includes/class-query.php';

if (isset($_POST['submit']) && $_POST['agreeCheckbox'] == TRUE) {
    $un = $_POST['userName'];
    $fn = $_POST['firstName'];
    $ln = $_POST['lastName'];
    $pswd = $_POST['password'];
    $pswd2 = $_POST['confPassword'];
    $pn = $_POST['programName'];
    $cn = $_POST['campusName'];
	
	$con=mysqli_connect("us-cdbr-iron-east-04.cleardb.net","b50d8c2726eda5","4a9690b1","heroku_cdb11dd97f00e5b");
	
	$check = 0;

//Check whether username already exists in the database
$e_check = mysqli_query($con, "SELECT email FROM profile WHERE email='$un'");
//Count the number of rows returned
    $email_check = mysqli_num_rows($e_check);
    if ($check == 0) {
        if ($email_check == 0) {
//check all of the fields have been filed in
            if ($fn && $ln && $un && $pswd && $pswd2 && $pn && $cn) {
// check that passwords match
                if ($pswd == $pswd2) {
// check the maximum length of username/first name/last name does not exceed 25 characters
                    if (strlen($un) > 100 || strlen($fn) > 30 || strlen($ln) > 30) {
                        echo "The maximum limit for username/first name/last name is 100/30/30 characters!";
                    } else {
// check the maximum length of password does not exceed 25 characters and is not less than 5 characters
                        if (strlen($pswd) > 30 || strlen($pswd) < 5) {
                            echo "Your password must be between 5 and 30 characters long!";
                        } else {
//encrypt password and password 2 using md5 before sending to database
                            $pswd = md5($pswd);
                            
                            $new_user = $insert->new_user($un, $fn, $ln, $pswd, $pn, $cn);
                            $result = $query->verify_user($un, $pswd); // query the person
session_destroy();
//session_reset();
                
// Start the session
        session_start();
        // Set session variables
        $_SESSION["user_id"] = $result[2];
        $_SESSION["user_name"] = $result[3];
                            //die("<h2>Welcome to CLINK</h2>Login to your account to get started ...");
                            header("Location: profile.php");
                        }
                    }
                } else {
                    echo "Your passwords doesn't match!";
                }
            } else {
                echo "Please fill in all of the fields";
            }
        } else {
            echo "Sorry, but it looks like someone has already used that email!";
        }
		mysqli_close($con);
    } else {
        echo "Username already taken ...";
    }
} else {
    echo "Please, read and agree tobthe Terms of Service";
}