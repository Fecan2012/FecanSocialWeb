

<?php
session_start();
require_once './includes/class-query.php';
require_once ('./includes/class-insert.php');

?>  
<body>
    <?php
    require_once './includes/class-query.php';
    require_once ('./includes/class-insert.php');
    $result = $query->get_friendsToAdd_id($_GET["userToAdd"]);
    foreach ($result as $id) {
        //echo $id->profile_id;
        $insert->add_friends($_SESSION["user_name"], $id->profile_id);
    }
    ?>

</body>

