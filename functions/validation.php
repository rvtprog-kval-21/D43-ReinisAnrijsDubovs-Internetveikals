<?php

class validation {
    public function valuesExists($value){
        if(empty($value) || $value = NULL){
            return false;
        }else{
            return true;
        }
    }

    public function passwordsAreEqual($pass1, $pass2){
        if($pass1 == $pass2){
            return true;
        }else{
            return false;
        }
    }

    public function usernameAndEmailExists($username,$email){
        $db = new db();
        if($db->usernameAndEmailExists($username,$email)){
            return false;
        }else{
            return true;
        }
    }
}

?>