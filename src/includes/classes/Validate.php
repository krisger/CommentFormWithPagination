<?php 
    Class Validate{

        public function validateLength($minLength, $maxLenght, $fieldName, $field){
            if(strlen($field) > $maxLenght){
                return $fieldName . " is too long";
            }else if(strlen($field) < $minLength){
                return $fieldName . " is too short";    
            }else{
                return "";
            }
        }
        
        public function validateEmail($fieldName, $field){
            if(strlen($field) > 0){
                if (!filter_var($field, FILTER_VALIDATE_EMAIL)) {
                    return "Invalid email format";
                }else{
                    return "";
                }
            }
        }
        
        function validateDate($fieldName, $field, $format = 'Y-m-d') {
            $d = DateTime::createFromFormat($format, $field);
            if(!($d && $d->format($format) == $field)){
                return "In validadate format. It should go like '$format'";   
            }else{
                return "";
            }
        }
                 
    }

