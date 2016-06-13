<?php
require_once('class-db.php');

if (!class_exists('QUERY')) {

    class QUERY {

        public function verify_user($userName, $password) {
            global $db;

            $table = 'profile';

            $query = "SELECT * FROM $table
                                            WHERE email = '$userName'";

            $user = $db->select($query);

            foreach ($user as $usr) {
                if ($usr->email != NULL) {
                    $user_names[] = $usr->email;
                    $user_names[] = $usr->password;
                    $user_names[] = $usr->profile_id;
                    $user_names[] = $usr->first_name;
                    $user_names[] = $usr->last_name;
                }
            }

            return $user_names;
        }

        public function get_friends_id($usr) {
            global $db;

            $table = 'friends';

            $query = "SELECT profile_id FROM $table
			WHERE user_name = '$usr'";

            $friends = $db->select($query);
			$max = count($friends);
			$friend_profile_ids = array();
			$i = 1;
			if($max == 1){
				
			}else{
				while($i < $max){
					$friend_profile_ids[$i-1] = $friends[$i]->profile_id;
					$i++;
				}
			}
			
            return $friend_profile_ids;
        }	
		
         public function get_friendsToAdd_id($usr) {
            global $db;
            global $query;

            $table = 'profile';

            $query = "SELECT profile_id FROM $table
			WHERE first_name = '$usr'";

            return $db->select($query);
         }
        
        public function get_search_result($friendName) {
            global $db;

            $table = 'profile';

            $query = "SELECT first_name FROM $table
			WHERE first_name = '$friendName' OR last_name = '$friendName'";

            $friends = $db->select($query);			
			$max = count($friends);
			$friend_names = array();
			$i = 1;
			
			if($max == 1){
			}else{
				while($i < $max){
					$friend_names[$i-1] = $friends[$i]->first_name;
					$i++;
				}
			}
            return $friend_names;
		}

        public function load_user_list($user_id) {
            global $db;

            $table = 'profile';

            $query = "SELECT * FROM $table
			WHERE profile_id = '$user_id'";

            $obj = $db->select($query);

            //if (!$obj) {
            //     return "No user found";
            // }

            return $obj[1];
        }

        public function load_search_list($frndName) {
            global $db;

            $table = 'profile';

            $query = "SELECT * FROM $table
			WHERE first_name = '$frndName' OR last_name = '$frndName'";


            $obj = $db->select($query);

            //if (!$obj) {
            //     return "No user found";
            // }

            return $obj[1];
        }

        public function get_friends_list($friends_array) {
			$friend_names= array();
			$friend_names_list = array();
            foreach ($friends_array as $friend_name) {
                $friend_names[] = $this->load_user_list($friend_name);
            }

            foreach ($friend_names as $frnd) {
                $friend_names_list[] = $frnd->first_name;
                echo $frnd->first_name;
                ?><br/><?php
            }
            return $friend_names_list;
        }

        public function get_image($usrName) {
            global $db;

            $table = 'profile_images';

            $query = "SELECT location FROM $table
			WHERE user_id = '$usrName'";


            return $db->select($query);

            //if (!$obj) {
            //     return "No user found";
            // }
            //return  $obj[1];
        }

        public function get_friends_fromProfile($friends_array) {
			$friends_names = array();
			$friend_names_list = array();
			
            foreach ($friends_array as $friend) {
                $friends_names[] = $this->load_search_list($friend);
            }
            foreach ($friends_names as $frnd) {
                $friend_names_list[] = $frnd->first_name;
  //            echo $frnd->first_name;
                  echo '<a href="addFriends.php?userToAdd='.$frnd->first_name.'">'.$frnd->first_name.'</a>';
              ?>
              <br/></hr>
                  <?php
            }
            return $friend_names_list;
        }

        function fetch_users() {
            $result = mysql_query('SELECT `profile_id` AS `id`, `email` AS `username` FROM `profile`');

            $users = array();

            while (($row = mysql_fetch_assoc($result)) !== false) {
                $users[] = $row;
            }

            return $users;
        }

        function fetch_user_info($uid) {
            $uid = (int) $uid;

            $sql = "SELECT
				*
				
			FROM `profile`
			WHERE `profile_id` = '$uid'";

            $result = mysql_query($sql);

            return mysql_fetch_assoc($result);
        }

        function set_profile_infor($email, $about, $location) {
            $email = mysql_real_escape_string(htmlentities($email));
            $about = mysql_real_escape_string(nl2br(htmlentities($about)));
            $location = mysql_real_escape_string($location);

            $sql = "UPDATE `profile` SET
				`email` = `{$email}`
				
			WHERE `profile_id` = {$_SESSION['uid']}";

            mysql_query($sql);
        }

        function retrieve_user_posts($userId) {
            global $db;
            $user = $_SESSION["user_id"];
            $sql = "SELECT content FROM post WHERE entity_id =  '$user' and poster_type_id = 1
                     order by  date_time desc";


            return $db->select($sql);
        }

        function retrieve_user_discussions($userID) {
            global $db;
            $user = $_SESSION["user_id"];
            $sql = "SELECT title, discussion_id FROM discussion WHERE entity_id =  '$user' and poster_type_id = 2
                         order by  date_time desc";


            return $db->select($sql);
        }

        function retrieve_discussions($userID) {
            global $db;
            $user = $_SESSION["user_id"];
            $sql = "SELECT * FROM discussion,profile WHERE poster_type_id = 2 and entity_id = profile_id
                         order by  date_time desc";


            return $db->select($sql);
        }

        function retrieve_discussion_posts($discussionId) {
            global $db;
            $sql = "select d.entity_id discussionOwner, p.*,dc.*,d.*,pr.* from post p, discussion_comment dc, discussion d, profile pr
where p.post_id = dc.comment_id
and p.poster_type_id = 3
and dc.discussion_id =  '$discussionId' "
                    . "and pr.profile_id = p.entity_id "
                    . "and dc.discussion_id = d.discussion_id"
                    . " order by p.date_time desc";
            return $db->select($sql);
        }
        
        function retrieve_events(){
            global  $db;
            $userId = $_SESSION["user_id"];
            $query = "select e.*, IFNULL((select distinct i.profile_id from invitation i where i.profile_id = e.Profile_id and i.event_id = e.Event_id and i.profile_id = '$userId'),0) attending from event e order by e.event_date desc";
            return $db->select($query);
        }
        
        function getEvent($eventId){
            global  $db;
            $query = "select * from event where event_id = '$eventId'";
            $event = $db->select($query);
            
            return $event;
        }
        
        function gerDiscussionOwner($discussionId){
            global  $db;
            $query = "select distinct entity_id from discussion where discussion_id = '$discussionId'";
            $event = $db->select($query);
            
            return $event;
        }
        }

}

$query = new QUERY;
?>

