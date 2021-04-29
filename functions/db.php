<?php

class db {
    private $servername;
    private $username;
    private $password;
    private $dbname;

    public function __construct()
    {
        $this->servername = "localhost:3308";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "vejstikli";
    }

    public function login($username, $password){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        $username = mysqli_escape_string($conn, $username);
        $password = mysqli_escape_string($conn, $password);

        $sql = "SELECT id FROM users WHERE username='".$username."' AND password='".$password."'";
        $result = $conn->query($sql);
        if ($result) {
            while($row = $result->fetch_assoc()) {
                return $row['id'];
            }
        } else {
            return false;
        }
        $conn->close();
    }

    public function usernameAndEmailExists($username, $email){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        $username = mysqli_escape_string($conn, $username);

        $sql = "SELECT id FROM users WHERE username='".$username."' OR email='".$email."'";
        $result = $conn->query($sql);
        if ($result) {
            if($result->fetch_assoc()) {
                return true;
            }
        } else {
            return false;
        }
        $conn->close();
    }

    public function register($username,$pass,$email,$surname,$name,$pass2){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        $username = mysqli_escape_string($conn, $username);
        $pass = mysqli_escape_string($conn, $pass);
        $email = mysqli_escape_string($conn, $email);
        $surname = mysqli_escape_string($conn, $surname);
        $name = mysqli_escape_string($conn, $name);
        $pass2 = mysqli_escape_string($conn, $pass2);

        $sql = "INSERT INTO users(username,name,sir_name,email,password,create_datetime) VALUES ('".$username."','".$name."','".$surname."','".$email."','".$pass."',NOW())";
        $result = $conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
        $conn->close();
    }

    public function getWorkshops(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        mysqli_set_charset($conn,"utf8mb4");
        $workshops = array("0","Izvēlieties darbnīcu");
        $sql = "SELECT ID, Darbnica FROM darbnicas";
        $result = $conn->query($sql);
        if ($result) {
            while($row = $result->fetch_assoc()) {
                array_push($workshops, strval($row['ID']), $row['Darbnica']);
            }
        } else {
            return false;
        }
        $conn->close();
        return $workshops;
    }

    public function getService(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        mysqli_set_charset($conn,"utf8mb4");
        $services = array("0","Izvēlieties pakalpojumu");
        $sql = "SELECT ID, Pakalpojums FROM Pakalpojums";
        $result = $conn->query($sql);
        if ($result) {
            while($row = $result->fetch_assoc()) {
                array_push($services, strval($row['ID']), $row['Pakalpojums']);
            }
        } else {
            return false;
        }
        $conn->close();
        return $services;
    }

    public function getProductCategories(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        mysqli_set_charset($conn,"utf8mb4");
        $categ = array("0","Izvēlieties kategoriju");
        $sql = "SELECT id, category_name FROM category";
        $result = $conn->query($sql);
        if ($result) {
            while($row = $result->fetch_assoc()) {
                array_push($categ, strval($row['id']), $row['category_name']);
            }
        } else {
            return false;
        }
        $conn->close();
        return $categ;
    }

    public function getAllUsers(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "SELECT * FROM users";
        $users = array();
        $result = $conn->query($sql);
        if ($result) {
            while($row = $result->fetch_assoc()) {
                array_push($users, strval($row['id']), $row['username'], $row['admin'],$row['name'],$row['sir_name'],$row['email'],$row['password'],$row['create_datetime']);
            }
        } else {
            return false;
        }
        $conn->close();
        return $users;
    }

    public function getAllProducts(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "SELECT p.*, c.category_name FROM produkti AS p JOIN category AS c ON c.id=p.category_id";
        $products = array();
        $result = $conn->query($sql);
        if ($result) {
            while($row = $result->fetch_assoc()) {
                array_push($products, strval($row['id']), $row['product_name'], $row['category_name'],$row['description'],$row['brand'],$row['products_picture']);
            }
        } else {
            return false;
        }
        $conn->close();
        return $products;
    }

    public function getAllReservations(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        mysqli_set_charset($conn,"utf8mb4");
        $sql = "SELECT r.*, d.Darbnica, p.Pakalpojums, DATE_FORMAT(r.Datums, '%Y-%m-%d') AS date   FROM rezervacija AS r JOIN darbnicas as d ON d.ID=r.DarbnicasID JOIN pakalpojums as p ON p.ID=r.PakalpojumaID";
        $reservations = array();
        $result = $conn->query($sql);
        if ($result) {
            while($row = $result->fetch_assoc()) {
                array_push($reservations, strval($row['ID']), $row['Darbnica'], $row['Pakalpojums'],$row['Vards'],$row['Uzvards'],$row['TelefonaNr'],$row['date'],$row['Laiks']);
            }
        } else {
            return false;
        }
        $conn->close();
        return $reservations;
    }

    public function reserve($workshop,$service,$name,$surname,$phone,$date,$time){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "INSERT INTO rezervacija(DarbnicasID,UserID,PakalpojumaID,Vards,Uzvards,TelefonaNr, Datums,Laiks) VALUES".
        "(".$workshop.",".$_SESSION['ID'].",".$service.",'".$name."','".$surname."','".$phone."','".$date."','".$time."')";
        $result = $conn->query($sql);
        if ($result) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    public function addProduct($name,$category,$description,$brand,$picture){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "INSERT INTO produkti(product_name,category_id,description,brand,products_picture) VALUES".
        "('".$name."',".$category.",'".$description."','".$brand."','".$picture."')";
        $result = $conn->query($sql);
        if ($result) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    public function addProductCategory($name){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "INSERT INTO category(category_name) VALUES".
        "('".$name."')";
        $result = $conn->query($sql);
        if ($result) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    public function checkAdmin($id){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "SELECT admin FROM users WHERE id=".$id."";
        $result = $conn->query($sql);
        if ($result) {
            while($row = $result->fetch_assoc()) {
                if($row['admin'] == 1){
                    return true;
                }else{
                    return false;
                }
            }
        } 
        return false;
    }

    public function setAdmin($id){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "UPDATE users SET admin=1 WHERE id=".$id."";
        $result = $conn->query($sql);
        if ($result) {
            return true;
        } 
        return false;
    }

    public function deleteReservation($id){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "DELETE FROM rezervacija WHERE ID=".$id."";
        $result = $conn->query($sql);
        if ($result) {
            return true;
        } 
        return false;
    }

    public function deleteProduct($id){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "DELETE FROM produkti WHERE ID=".$id."";
        $result = $conn->query($sql);
        if ($result) {
            return true;
        } 
        return false;
    }

    public function setUser($id){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "UPDATE users SET admin=0 WHERE id=".$id."";
        $result = $conn->query($sql);
        if ($result) {
            return true;
        } 
        return false;
    }

    public function changeUserPassword($id, $newpass){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "UPDATE users SET password='".$newpass."' WHERE id=".$id."";
        $result = $conn->query($sql);
        if ($result) {
            return true;
        } 
        return false;
    }

    public function changeReservationDate($id, $date){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "UPDATE rezervacija SET datums='".$date."' WHERE id=".$id."";
        $result = $conn->query($sql);
        if ($result) {
            return true;
        } 
        return false;
    }

    public function changeReservationTime($id, $time){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "UPDATE rezervacija SET laiks='".$time."' WHERE id=".$id."";
        $result = $conn->query($sql);
        if ($result) {
            return true;
        } 
        return false;
    }
}


?>