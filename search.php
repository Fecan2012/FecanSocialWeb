<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ('./includes/class-query.php');
require_once('./includes/class-insert.php');
	
	//$logged_user_email = "dpate334@my.centennialcollege.ca";
	if (isset($_POST['searchB'])){
		$searchName = $_POST['searchB'];
		//$friendsList = $query->get_friends_id($_SESSION["user_name"]);
		$friends = $query->get_search_result($searchName);
	}else{
		$searchName = '';
		$friends = $query->get_search_result($searchName);
	}
	
?>
﻿  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-ca" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Search Page</title>
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/search.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.auto-style1 {
	margin-left: 450px;
}
.auto-style2 {
	margin-top: 0px;
}
.auto-style3 {
	margin-left: 0px;
}
</style>
</head>
<?php
session_start();
include_once './includes/class-query.php';
?>
<body  background="images/networking.jpg">
		<div id="menu" style="width: 117%; height: 54px; background-color: #33CC33;">
				<p class="auto-style1">
				&nbsp;</p>
				<p class="auto-style1">
				&nbsp;<a href="profile.php">Profile</a>
				<a href="discussion_topic.php">Discussion</a>
                                <a href="search.php">Search </a>&nbsp
                                <a href="events.php">Events </a>
                                <a href="editProfile.php">Edit Profile</a>
				<a href="logout.php">LogOut</a>
				
			</p>
	
				<p class="auto-style1">
				&nbsp;</p>
				<p class="auto-style1">
				&nbsp;</p>
				<p class="auto-style1">
				&nbsp;</p>
				</div>

<div id="wrapper2" style="width: 791px">
	<br /><br /><br /><br /><br /><br />
        <form id="search" action="" method="post" style="width: 778px" class="auto-style3">
		<table>
		<tr>
		<td><input type="search" name="searchB" id="searchB" size="60" placeholder="Enter Search ..." style="height: 39px; margin-left:221px; width: 500px;" class="auto-style2"/></td>
		<td><input type="submit" name="search" value = "Search" style="color: white; background-color: #77AC40; height: 36px; margin-left:10px; width: 55px;" class="auto-style2"></td>
		</tr>
		</table>
        </form>
	<br />
        <div class="profilePosts">
            &nbsp;<h3>Search results</h3><br>
                <?php 
                require_once ('./includes/class-query.php');            
                require_once('./includes/class-insert.php');
                

            //$query->get_friends_list($friends);
            $query->get_friends_fromProfile($friends);
             //echo $frnd->first_name;
                ?>
                
                
        </div>
	<br /><br />&nbsp;<br/>
	<div class="textHeader">
	</div>
	<div class="textHeader">
		<?php echo $_SESSION["user_name"]; ?>'s Friends</div>
	<div class="profileLeftSideContent" style="background-color:#C9F1C9">
                        <?php 
                require_once ('./includes/class-query.php');            
                require_once('./includes/class-insert.php');
                $friendsList = $query->get_friends_id($_SESSION["user_name"]);
                       $query->get_friends_list($friendsList);
?>
</div>
		</div>
</body>

</html>


