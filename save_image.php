<?php
session_start();
include_once './includes/class-query.php';

require_once ('./includes/class-insert.php');
if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
	}else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
			$temp = explode('.',$_FILES["image"]["name"]);
$newfilename = $_SESSION["user_id"] . '_Profile.' .end($temp);
//move_uploaded_file($_FILES["file"]["tmp_name"], "../img/imageDirectory/" . $newfilename;
			move_uploaded_file($_FILES["image"]["tmp_name"],"photos/" . $newfilename);
			
			$location="photos/" . $newfilename;
			$caption=$_POST['caption'];
			
            $insert->add_image($_SESSION["user_id"], $location, $caption);
			
                        //$save=mysql_query("INSERT INTO photos (location, caption) VALUES ('$location','$caption')");
                        //$save=$save=mysql_query("INSERT INTO profile_images (image, first_name) VALUES ('$location','$caption')");
			//header("location: profile.php");
                        echo 'Image uploaded succesfully. Close the window.';
			exit();					
	}

