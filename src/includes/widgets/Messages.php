<?php 

    require_once '/includes/classes/Messages.php';
    require_once '/includes/classes/Database.php';
    
    
    $db = Database::getInstance();
    $mysqli = $db->getConnection();
    
    
    
    if(isset($_GET['page']) && is_numeric($_GET['page'])){
        $page = $_GET['page'];
    }
    else{
        $page = 1;
    }

    $messages = new Messages();
    $pageSize = 5;
    
    $result = $mysqli->query($messages->getMessages($page, $pageSize));
    $countMessages = $mysqli->query($messages->countMessages());
    
    $countMessages = mysqli_fetch_array($countMessages);
    
    if($countMessages[0] > $pageSize){
        $pages = $countMessages[0]/$pageSize;
    }
    else{
        $pages = 1;
    }
    $output = "";
             
        
    if($row = mysqli_num_rows($result) == 0){
            $output = "<ul><li><strong>Komentaru nera</strong></li></ul>";    
        }
        else{
            $output = $output . "<ul>";
            while($row = mysqli_fetch_array($result)) {
                $output .= "<li>";
                $output .= "<span>" . htmlspecialchars(number_format($row["Birthday"], 0, '.', '')) . "</span>";
                    $output .= "<a href='mailto:". htmlspecialchars($row["Email"]) . "'>" . htmlspecialchars($row["UserName"]) . " " . htmlspecialchars($row["SurName"]) . "</a>";
                    $output .= "</br>" . htmlspecialchars($row["Message"]); 
                $output .= "</li>";
            }

             $output .= "</ul>";
             
             $output .= "<p id='pages'>";
                if($page != 1){
                     $output .= "<a href='?page=".($page - 1)."'>Atgal</a>";
                }
                for($i = 1; $i <= $pages; $i++){
                    $output .= "<a href='?page=$i'>$i</a>";
                }
                if($pages > $page){
                    $output .= "<a href='?page=".($page + 1)."'>Pirmyn</a>";
                }
             $output .= "</p>";
            
        }
  
        
    $mysqli->close();
 
    
    echo $output;
