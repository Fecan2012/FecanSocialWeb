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
                            <div style=" background-color: #F3F6F9;">	
                                <form action="create_event.php" id="create_event" method="post">
                                    <table style="width: 100%;height:50px;">
                                        <tr>

                                            <td style="width: 178px" class="auto-style2">New Event:</td>
                                            <td class="auto-style3">
                                                <input id="eventName" name="eventName" style="width: 480px; height: 28px" type="text" />&nbsp;
                                            </td>
                                        </tr>
                                    </table>

                                    <input type="submit" name="create_event" style="margin-left:530px;" value="Create Event" /><br />
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="width: 100%;">
                                <?php
                                $events = $query->retrieve_events();
								$max = count($events);
								$i = 1;

                                if ($max == 1) {
                                    echo '<td>No events....</td>';
                                } else {
									while($i < $max){
										if ($events[$i]->event_name != '') {
                                            ?>
                                            <tr>
                                                <td style="border: 1px solid black; width: 70%">
                                                    <a href="event_detail.php?id=<?php echo $events[$i]->Event_id.'&att='.$events[$i]->attending; ?>">                <?php
                                                        echo $events[$i]->event_name;
                                                        ?>
                                                    </a>
                                                </td>
                                                <td style="border: 1px solid black; width: 20%">
                                                    <a href="event_detail.php?id=<?php echo $events[$i]->Event_id.'&att='.$events[$i]->attending; ?>">
                                                        <?php echo $events[$i]->event_date; ?>
                                                    </a>
                                                </td>
                                                <td style="border: 1px solid black; width: 10%">
                                                    <a href="event_detail.php?id=<?php echo $events[$i]->Event_id.'&att='.$events[$i]->attending; ?>">
                                                        <?php if($events[$i]->attending !=0) 
                                                        echo 'Attending'; ?>
                                                    </a>
                                                </td>

                                            </tr>
                                            <?php
                                        }
										$i++;
									}
								}
                                ?>
                            </table>
                        </td>
                    </tr>

                </table>


            </div>
    </body>

</html>
