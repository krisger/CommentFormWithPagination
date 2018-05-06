<?php

    require_once '/includes/classes/Database.php';
    
    class Messages {
        
        
        public function insertMessage($firstName, $birthDate, $surName,  $emailAddress, $message){
            
            $todayDate = date('Y-m-d H:i:s'); 
            $data = array($firstName, $surName, $emailAddress, $message, $birthDate, $todayDate);            
            $rowNames = "Username, SurName, Email, Message, Birthday, Date";
            
            $db = Database::getInstance();
            $db->insertRecord('Messages', $data, $rowNames);
        }
        
        public function  deleteOldestMessage(){     
            $deleteQuery = "DELETE FROM messages WHERE Date IS NOT NULL  ORDER BY Cast(Date as date) asc LIMIT 1";
            return $deleteQuery;
        }
        
        public function getMessages($page, $itemsPerPage){
    
            $firsItem = ($page * $itemsPerPage) - $itemsPerPage;
    
            $selectQuery = "SELECT UserName, SurName, Email, Message, ((TO_DAYS(Now())-TO_DAYS(BirthDay))/365) As Birthday FROM Messages Order by date desc LIMIT $itemsPerPage OFFSET $firsItem";
            return $selectQuery;     
        }
        
        //Need to update select work as insert. Now it's not secure.
        
        public function  countMessages(){
            $selectQuery = "SELECT Count(*) FROM Messages";  
            return $selectQuery;
        }

        
        
    }
