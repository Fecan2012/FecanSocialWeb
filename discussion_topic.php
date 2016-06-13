<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-ca" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Discussion Page</title>
<link href="css/index.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.auto-style1 {
	margin-left: 450px;
}
.auto-style2 {
	text-align: right;
}
.auto-style3 {
	text-align: left;
}
.auto-style4 {
	margin-left: 40px;
}
</style>
</head>
<?php
session_start();
include_once './includes/class-query.php';
?>
<body background="images/networking.jpg">
<div id="menu" style="width: 117%; height: 54px; background-color: #33CC33;">
				<p class="auto-style1">&nbsp;
				</p>
				<p class="auto-style1">
				&nbsp;<a href="profile.php">Profile</a>
				<a href="discussion_topic.php">Discussion</a>
				<a href="search.php">Search </a>&nbsp;
                                <a href="events.php">Events </a>
                                <a href="editProfile.php">Edit Profile</a>
				<a href="logout.php">LogOut</a>
				
			</p>
	
				<p class="auto-style1">&nbsp;
				</p>
				<p class="auto-style1">&nbsp;
				</p>
				<p class="auto-style1">&nbsp;
				</p>
			</div>

<div id="wrapper2" style="width: 791px">
<br/>	
<br/>
<div id="createDiscussion">	
    <form action="post_discussion.php" id="post_discussion" method="post"></br> </br></br>
	<table style="width: 100%;height:50px;">
		<tr>
			<td style="width: 178px" class="auto-style2">New discussion 
			topic:</td>
			<td class="auto-style3">
			<input id="postdiscussion" name="postdiscussion" style="width: 480px; height: 28px" type="text" />&nbsp;
			</td>
			<td><input type="submit" name="send_discussion" style="margin-left:10px;" value="Create Discussion" /></td>
		</tr>
        </table>
			
	</form>
</div>
<div class="profilePosts" style="width:780px;"><br><br><br><?php 

$discussions = $query->retrieve_discussions($_SESSION["user_id"]);
$max = count($discussions);
$i = 1;

if($max == 1){
		echo 'List of Discusstions Topics....';  
	}else{
		while($i < $max){
			echo '<a href="discussion.php?id='.$discussions[$i]->discussion_id.'">'.$discussions[$i]->title.'</a>';
			echo '<br/><hr><br/>';
			$i++;
		}
}
?></div>
	<p class="auto-style4"></p>
	<p class="auto-style4"></p>
	<p class="auto-style4"></p>
	<p class="auto-style4">&nbsp;<br/>
	</p>
</div>
</body>

</html>