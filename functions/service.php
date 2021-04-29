<?php

include 'functions/validation.php';
include 'functions/db.php';

class service 
{
    private $db;
    private $validation;

    public function __construct()
    {
        $this->db = new db();
        $this->validation = new validation();
    }

    public function login ($username,$pass){
        $hasU = $this->validation->valuesExists($username);
        $hasP = $this->validation->valuesExists($pass);

        if($hasU && $hasP){
            $result = $this->db->login($username,$pass);
        }

        if(!$result){
            return false;
        }else{
            $_SESSION["ID"] = (int)$result; 
            return true;
        }
    }

    public function register ($username,$pass,$email,$surname,$name,$pass2){
        $hasU = $this->validation->valuesExists($username);
        $hasP = $this->validation->valuesExists($pass);
        $hasE = $this->validation->valuesExists($email);
        $hasS = $this->validation->valuesExists($surname);
        $hasN = $this->validation->valuesExists($name);
        $hasP2 = $this->validation->valuesExists($pass2);

        if($hasU && $hasP && $hasE && $hasS && $hasU && $hasN && $hasP2){
            if($this->validation->passwordsAreEqual($pass,$pass2)){
                if($this->validation->usernameAndEmailExists($username,$email)){
                    if($this->db->register($username,$pass,$email,$surname,$name,$pass2)){
                        return 4;
                    }else{
                        return 0;
                    }
                }else{
                    return 1;
                }
            }else{
                return 2;
            }
        }else{
            return 3;
        }
    }

    public function reserve ($workshop,$service,$name,$surname,$phone,$date,$time){
        $hasW = $this->validation->valuesExists($workshop);
        $hasSE = $this->validation->valuesExists($service);
        $hasP = $this->validation->valuesExists($phone);
        $hasS = $this->validation->valuesExists($surname);
        $hasN = $this->validation->valuesExists($name);
        $hasD = $this->validation->valuesExists($date);
        $hasT = $this->validation->valuesExists($time);

        if($hasW && $hasSE && $hasP && $hasS && $hasN && $hasD && $hasT){
            $result = $this->db->reserve($workshop,$service,$name,$surname,$phone,$date,$time);
            if($result == true){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function addProduct ($name,$category,$description,$brand,$picture){
        $hasN = $this->validation->valuesExists($name);
        $hasC = $this->validation->valuesExists($category);
        $hasD = $this->validation->valuesExists($description);
        $hasB = $this->validation->valuesExists($brand);
        $hasP = $this->validation->valuesExists($picture);

        if($hasN && $hasC && $hasD && $hasB && $hasP){
            $result = $this->db->addProduct($name,$category,$description,$brand,$picture);
            if($result == true){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function addProductCategory ($name){
        $hasN = $this->validation->valuesExists($name);

        if($hasN){
            $result = $this->db->addProductCategory($name);
            if($result == true){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function setAdmin($id){
        return $this->db->setAdmin($id);
    }

    public function changeUserPassword($id, $newpass){
        if($this->validation->valuesExists($newpass) && $this->validation->valuesExists($id)){
            return $this->db->changeUserPassword($id, $newpass);
        }else{
            return false;
        }
    }

    public function changeReservationDate($id, $date){
        return $this->db->changeReservationDate($id, $date);
    }

    public function changeReservationTime($id, $time){
        return $this->db->changeReservationTime($id, $time);
    }

    public function setUser($id){
        return $this->db->setUser($id);
    }

    public function deleteReservation($id){
        return $this->db->deleteReservation($id);
    }

    public function deleteProduct($id){
        return $this->db->deleteProduct($id);
    }

    public function getWorkshops(){
        return $this->db->getWorkshops();
    }

    public function getProductCategories(){
        return $this->db->getProductCategories();
    }

    public function getService(){
        return $this->db->getService();
    }

    public function checkAdmin($id){
        return $this->db->checkAdmin($id);
    }

    public function getAllUsers(){
        return $this->db->getAllUsers();
    }

    public function getAllProducts(){
        return $this->db->getAllProducts();
    }

    public function getAllReservations(){
        return $this->db->getAllReservations();
    }

}

?>