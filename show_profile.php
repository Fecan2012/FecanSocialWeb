<?php
	include('./includes/class-query.php');
	$user_info = fetch_user_info($_GET['uid']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $user_info['username']; ?>'s Profile</title>
</head>
<div>
<?php
if ($user_info === false) {
	echo 'That user does not exist.';
}else{
?>
<h1><?php echo $user_info['firstname']; ?> <?php echo $user_info['lastname']; ?></h1>
<p>Username: <?php echo $user_info['username']; ?></p>
<p>Gender: <?php echo ($user_info['gender']==1) ? 'Male' : 'Female'; ?></p>
<p>Email: <?php echo $user_info['email']; ?></p></p>
<p>Location: <?php echo $user_info['location']; ?></p></p>
<p><?php echo $user_info['about']; ?></p>
<?php
}
?>
</div>
<body>
</body>
</html>
