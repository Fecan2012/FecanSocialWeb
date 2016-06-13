<?php

if (!class_exists('DB')) {

    class DB {

        public function __construct() {
            //new mysqli('localhost', 'USERNAME', 'PASSWORD', 'clink');
            $mysqli = new mysqli('localhost', 'root', '1234', 'clink');

            if ($mysqli->connect_errno) {
                printf("Connect failed %s\n", $mysqli->connect_error);
                exit();
            }
            
            $this->connection = $mysqli;
        }

        public function insert($query) {
            $result = $this->connection->query($query);
            if (!$result) {
                //echo 'error';
                return false;
            }
            return $this->connection->insert_id;
        }

        public function update($query) {
            $result = $this->connection->query($query);

            return $result;
        }

        public function select($query) {
            $result = $this->connection->query($query);

            if (!$result) {
                return false;
            }
            $results[] = [];
            while ($obj = $result->fetch_object()) {
                $results[] = $obj;
            }

            return $results;
        }
        
        

    }

}

$db = new DB;
?>