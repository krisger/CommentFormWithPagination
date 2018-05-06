<?php 

    require_once '/includes/classes/Validate.php';
    require_once '/includes/classes/Messages.php';
    $firstNameErr = ""; $surNameErr = ""; $emailErr= ""; $messageErr =""; $birthErr="";
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {   
        
        $firstName = "";$surName = ""; $name = ""; $email = ""; $birthday = ""; $message = "";
        
        if(isset($_POST["fullname"])){$name = $_POST["fullname"];}
        if(isset($_POST["email"])){$email = $_POST["email"];}
        if(isset($_POST["birthdate"])){$birthday = $_POST["birthdate"];}
        if(isset($_POST["message"])){$message = $_POST["message"];}
      
        if(explode(',', $name)){
            $splitname = explode(',',$name);
        }else if(explode(' ', $name)){
            $splitname = explode(' ', $name);
        }
        
        if(sizeof($splitname) > 1){
            $firstName = $splitname[0];
            $surName = $splitname[1];
        }elseif(sizeof($splitname) > 0){
            $firstName = $splitname[0];
            $surName = $splitname[0];
        }
        
        $Validation = new Validate();
        $firstNameErr = $Validation->validateLength(2, 50, "Full name", $firstName);
        $surNameErr = $Validation->validateLength(2, 50, "Sure Name", $surName);
        $emailErr = $Validation->validateEmail("Email", $email);
        $messageErr = $Validation->validateLength(2, 150, "Message", $message);
        $birthErr = $Validation->validateDate("Birth date", $birthday);

     
        if(strlen($firstNameErr) == 0 && strlen($surNameErr) == 0 && strlen($emailErr) == 0 && strlen($messageErr) == 0 && strlen($birthErr) == 0){   
            
            $NewMessage = new Messages();
            $NewMessage->insertMessage($firstName, $birthday, $surName , $email, $message);
       
            
            header("Location: http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']));  
        }

    }
    