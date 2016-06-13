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
    include_once './includes/class-insert.php';
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
                <a href="#">Edit Profile</a>
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
                            <?php
                            $eventId = $insert->createEvent($_POST['eventName']);
                            $event = $query->getEvent($eventId);
                            if ($event != NULL) {
                                echo $event[1]->event_name;
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style=" background-color: #F3F6F9;">	
                                <form action="create_event_handler.php" id="create_event" method="post">
                                    <table style="width: 100%;height:50px;">
                                        <tr>

                                            <td style="width: 178px" class="auto-style2">New Event Details:</td>
                                            <td class="auto-style3">
                                                <table>
                                                    <tr>
                                                        <td>
                                                        Event Description </td><td><input type="text" name="description" id="description"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Event Location </td><td><input type="text" name="location" id="location"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Event Date </td><td><input type="date" name="date" id="date" /></td>
                                                    </tr>                                    </table>


                                                <input type="hidden" name="eventId" id="eventId" value="<?php echo $event[1]->Event_id; ?>"/>
                                            </td>
                                        </tr>
                                    </table>

                                    <input type="submit" name="create_event" style="margin-left:530px;" value="Create Event" /><br />
                                </form>
                            </div>
                        </td>
                    </tr>

                </table>


            </div>
    </body>

</html>
