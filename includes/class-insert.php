<?php

require_once('class-db.php');
require_once ('class-query.php');
if (!class_exists('INSERT')) {

    class INSERT {

        public function new_user($userName, $firstName, $LastName, $password, $programName, $CampusName) {
            global $db;

            $query = "INSERT INTO profile (email, first_name, last_name, password, program_name, campus_name, role_id, sign_up_date)
			VALUES ('$userName', '$firstName', '$LastName', '$password', '$programName', '$CampusName', 1, SYSDATE())";

            return $db->insert($query);
        }

        public function add_image($userName, $location, $caption) {
            global $db;
            global $query;

            //check is exist record of image
            $exists = $query->get_image($userName);
            if ($exists[1] == NULL) {
                $query_insert = "INSERT INTO profile_images (user_id, submission_date, location, caption)
			VALUES ('$userName', SYSDATE(), '$location', '$caption')";
                return $db->insert($query_insert);
            } else {
                return $exists;
            }
        }
        
        public function add_friends($currentUser, $userToAddId){
            global $db;
            
            $query = "INSERT INTO friends (user_name, profile_id)
			VALUES ('$currentUser', '$userToAddId')";

            return $db->insert($query);

        }

        public function new_content($user_id, $message, $contentType) {
            global $db;

            $query = "INSERT INTO post (poster_type_id, content, date_time, entity_id)
			VALUES ('$contentType', '$message', SYSDATE(), '$user_id')";

            return $db->insert($query);
        }

        public function new_discussion($user_id, $message, $contentType) {
            global $db;

            $query = "INSERT INTO discussion (poster_type_id, title, date_time, entity_id)
			    VALUES ('$contentType', '$message', SYSDATE(), '$user_id')";

            return $db->insert($query);
        }

        public function new_discussionComment($user_id, $message, $discussionId, $contentType) {
            global $db;

            $query = "INSERT INTO post (poster_type_id, content, date_time, entity_id)
			    VALUES ('$contentType', '$message', SYSDATE(), '$user_id')";
            $result = $db->insert($query);
            $query2 = "INSERT INTO DISCUSSION_COMMENT (COMMENT_ID,DISCUSSION_ID) VALUES ('$result','$discussionId')";
            $result2 = $db->insert($query2);
            return $result2;
        }

        public function createEvent($eventName) {
            global $db;
            session_start();
            $userId = $_SESSION["user_id"];
            $query = "INSERT INTO EVENT (EVENT_NAME, PROFILE_ID) VALUES ('$eventName','$userId')";
            return $db->insert($query);
        }
        
        public function updateEvent($eventDate, $eventDescription, $eventLocation,$eventId) {
            global $db;
            session_start();
            $userId = $_SESSION["user_id"];
            $query = "UPDATE EVENT SET DESCRIPTION='$eventDescription',EVENT_DATE='$eventDate',LOCATION ='$eventLocation'"
                    . "where event_id = ".$eventId;
            return $db->insert($query);
        }
        
        public function attendEvent($eventId){
            global $db;
            session_start();
            $userId = $_SESSION["user_id"];
            $query = "INSERT INTO INVITATION (EVENT_ID, PROFILE_ID) VALUES ('$eventId','$userId')";
            return $db->insert($query);
        }
        
        public function deleteEvent($eventId){
            global $db;
            session_start();
            $userId = $_SESSION["user_id"];
            $query = "DELETE FROM INVITATION WHERE EVENT_ID ='$eventId'";
            $db->insert($query);
            $query2 = "DELETE FROM EVENT WHERE EVENT_ID = '$eventId'";
            $db->insert($query2);
        }
        
        public function deleteDiscussion($discussionId){
            global $db;
            session_start();
            $userId = $_SESSION["user_id"];
            $postList = $db->select("select comment_id from discussion_comment where discussion_id = '$discussionId'");
            $stringIds;
            
            $query1 = "DELETE from discussion_comment where discussion_id = ".$discussionId;
             $result1 = $db->insert($query1);
            foreach ($postList as $id){
              $query = "DELETE FROM post WHERE post_ID in ($id->comment_id)";  
             
            $result2 = $db->insert($query);
            }
            
            
            $query2 = "DELETE FROM discussion WHERE discussion_id = '$discussionId'";
            $result3 = $db->insert($query2);
        }
        
        
    }

}

$insert = new INSERT;
?>
