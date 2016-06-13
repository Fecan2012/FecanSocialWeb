<?php
include('./includes/class-query.php');
session_start();
if (isset($_POST['email'], $_POST['location'], $_POST['about'])) {
    $errors = array();

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
        $errors[] = 'The email address you entered is not valid.';
    }

    if (preg_match('#^[a-z0-9 ]+$#i', $_POST['location']) === 0) {
        $errors[] = 'Your location must only contain a-z, 0-9 and spaces.';
    }

    if (empty($errors)) {
        set_profile_info($_POST['email'], $_POST['about'], $_POST['location']);
    }

    $user_info = array(
        'email' => htmlentites($_POST['email']),
        'about' => htmlentites($_POST['about']),
        'location' => htmlentites($_POST['location'])
    );
} else {

    $user_info = $query->fetch_user_info($_SESSION["user_id"]);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <style type="text/css">
            form { margin:10px 0px 0px 0px; }
            form div { float:left; clear:both; margin:0px 0px 4px 0px; }
            label { float:left; width:100px; }
            input[type="text"], textarea { float:left; width:400px; }
            input[type="submit"] { margin:10px 0px 0px 100px; }
        </style>
        <title>Edit Your Profile</title>
    </head>
    <body>
        <div>
            <?php
            if (isset($errors) === false) {
                echo 'Click update to edit your profiel.';
            } else if (empty($errors)) {
                echo 'Your profile has been updated';
            } else {
                echo '<ul><li>', implode('</li><li>', $errors), '</li></ul>';
            }
            ?>
        </div>
        <form action="" method="post">
            <div>
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" value="<?php echo $user_info['email']; ?>"/>
            </div>
            <div>
                <label for="email">Location:</label>
                <input type="text" name="location" id="location" value="<?php echo $user_info['location']; ?>"/>
            </div>
            <div>
                <label for="email">About Me:</label>
                <textarea name="about" id="about" row="14" cols="50"><?php echo strip_tags($user_info['about']); ?><textarea>
        </div>
        <div>
            <input type="submit" value="Update" />
        </div>
    </form>
</body>
</html>
