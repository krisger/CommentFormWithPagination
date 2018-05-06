<?php 
    class Database {
		
        private $_connection;
        private static $_instance; //The single instance
        private $_host = "localhost";
        private $_username = "root";
        private $_password = "";
        private $_database = "general_aptitude_db";

        public static function getInstance() {
            if(!self::$_instance) { // If no instance then make one
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        private function __construct() {
            $this->_connection = new mysqli($this->_host, $this->_username,
                $this->_password, $this->_database);
            

            if(mysqli_connect_error()) {
                trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
                    E_USER_ERROR);
            }
        }

        private function __clone() { }

        public function getConnection() {
            return $this->_connection;
        }
        
        public function insertRecord($table, $records, $rowNames){
          
            $placeholder = '';
            $type = '';
            for ($i = 0; $i < sizeof($records); $i++){
                $placeholder[$i] = "?";
                $type .= 's';
            }
       
            $placeholder = implode(',', $placeholder); 
            $sql = "INSERT INTO ".$table." (".$rowNames.") VALUES (" . $placeholder . ")";
          
            $query = $this->_connection->prepare($sql);   
            $query->bind_param($type, ...$records);
            $query->execute();

        }
    }
	
	
