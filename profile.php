<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-ca" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Profile Page</title>
<link href="css/index.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.auto-style1 {
	margin-left:450px;
}
</style>
</head>
<?php
session_start();
include_once './includes/class-query.php';
?>
<body>
<div id="menu" style="width: 117%; height: 54px; background-color: #33CC33;">
				<p class="auto-style1">
				&nbsp;</p>
				<p class="auto-style1">
                                    &nbsp;<a href="profile.php">Profile</a>
				<a href="discussion_topic.php">Discussion</a>
				<a href="search.php">Search </a>&nbsp;
                                <a href="events.php">Events </a>
                                <a href="editProfile.php">Edit Profile</a>
				<a href="logout.php">LogOut</a>
				
			</p>
			</div>

<div id="wrapper2" style="width: 791px">
	<br />
	<br /><br /><br /><br /><br />
<div class="postForm">
    <form action="post_content.php" id="post_content" method="post">
<textarea id="postcontent" name="postcontent" rows="5"cols="70"></textarea>
<input type="submit" name="send_content" style="float:right;border:1px solid #666; height: 28px; width:95px;" value="Post" /><br />
	<br />
	<br />
	</form>
</div>
<div class="profilePosts"><?php 
$posts = $query->retrieve_user_posts($_SESSION["user_id"]);
$max = count($posts);
$i = 1;
if($max == 1){
    echo 'Your post will go here....';  
}else{
	while($i < $max){
		echo $posts[$i]->content;
		echo '<br/><hr><br/>';
		$i++;
	}
}
?>
</div>
        <form<a href="add_image.php">
        <?php
$imgResult = $query->get_image($_SESSION["user_id"]);
if($imgResult[1] == NULL){
    ?>
     <img src="./images/default_profile.jpg" height="250" width="200" alt="" title="Add Picture" onclick="target_popup(this)"/>   
     <?php
}else{?>
     <?php
     $imageResult = $imgResult[1]->location;
     echo '<img src="./'.$imageResult. '" height="250" width="200" alt="" title="Add Picture" onclick="target_popup(this)"/>';
                     }
?>
        </a></form>
<br/>
 <div class="textHeader"><?php echo $_SESSION["user_name"]; ?>'s Profile</div>
<div class="profileLeftSideContent">Personal Content..</div>
<div class="textHeader"><?php echo $_SESSION["user_name"]; ?>'s Friends</div>
<div class="profileLeftSideContent">
                            <?php 
                require_once ('./includes/class-query.php');            
                require_once('./includes/class-insert.php');
                $friendsList = $query->get_friends_id($_SESSION["user_name"]);
                       $query->get_friends_list($friendsList);
?>
</div></div>
</body>
<script type="text/javascript">
function target_popup(form) {
    window.open('add_image.php', 'formpopup', 'width=300,height=250,resizeable,scrollbars');
    form.target = 'formpopup';
}
</script>
</html>
