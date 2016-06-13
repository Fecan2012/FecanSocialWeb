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
            <br />
            <br/>	

            <div class="profilePosts" style="width:780px;">
                <table style="width: 100%; ">
                    <tr>
                        <td>
                            <table style="width: 100%;">
                        <?php
                        $discussions = $query->retrieve_discussion_posts($_GET["id"]);

                        if ($discussions == NULL) {
                            
                            echo '<td>List of Discusstions Topics....</td>';
                        } else  {
                            foreach ($discussions as $discussion) {
                               if($discussion->content != ''){ ?>
                                <tr>
                                <td style="border: 1px solid black; width: 70%">
                                    <?php
                                    echo $discussion->content;
                                    ?>
                                </td>
                                <td style="border: 1px solid black; width: 20%">
                                    <?php echo $discussion->first_name." ". $discussion->last_name?>
                                </td>
                                    <td style="border: 1px solid black; width: 10%">
                                    <?php echo  $discussion->date_time?>
                                </td>
                                </tr>
                                <?php
                               }
                            }
                        }
                        ?>
                                </table>
</td>
                    </tr>
                    <tr>
                        <td>
                            <div style=" background-color: #F3F6F9;">	
                                <form action="post_comment_discussion.php" id="post_discussion_comment" method="post">
                                    <table style="width: 100%;height:50px;">
                                        <tr>

                                            <td style="width: 178px" class="auto-style2">New discussion 
                                                comment:</td>
                                            <td class="auto-style3">
                                                <input id="postdiscussion" name="postdiscussion" style="width: 480px; height: 28px" type="text" />&nbsp;
                                            </td>
                                        </tr>
                                    </table>
                                    <input type="hidden" value="<?php echo $_GET["id"] ?>" name="discussion_id" id="discussion_id"/>
                                    <input type="submit" name="send_discussion_comment" style="margin-left:530px;" value="Comment Discussion" /><br />
                                    </form>
                                    <?php
                                    $discussionOwner = $query->gerDiscussionOwner($_GET["id"]);
                                    if($discussionOwner[1]->entity_id == $_SESSION["user_id"]){
                                    ?>
                                <form name="delete_discussion" id="deleteDiscussion" action="delete_discussion_handler.php" method="post"/>
                                <input type="hidden" name="discussionId" id="discussionId" value="<?php echo $_GET["id"] ?>"/>
                                     <input type="submit" name="delete_discussion" style="margin-left:530px;" value="Delete Discussion" />
                                </form>
                                    <?php } ?>
                            </div>
                        </td>
                    </tr>
                </table>


            </div>
    </body>

</html>
