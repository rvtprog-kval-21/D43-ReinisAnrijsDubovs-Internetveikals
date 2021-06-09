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

        $sql = "SELECT id FROM lietotaji WHERE lietotajvards='".$username."' AND parole='".$password."'";
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

        $sql = "SELECT id FROM lietotaji WHERE lietotajvards='".$username."' OR epasts='".$email."'";
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

        $sql = "INSERT INTO lietotaji(lietotajvards,Vards,Uzvards,epasts,parole,Izveides_Datums_Laiks) VALUES ('".$username."','".$name."','".$surname."','".$email."','".$pass."',NOW())";
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
        $sql = "SELECT ID, Darbnicas_Adrese FROM darbnicas";
        $result = $conn->query($sql);
        if ($result) {
            while($row = $result->fetch_assoc()) {
                array_push($workshops, strval($row['ID']), $row['Darbnicas_Adrese']);
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
        $sql = "SELECT ID, Pakalpojums_Nosaukums FROM Pakalpojums";
        $result = $conn->query($sql);
        if ($result) {
            while($row = $result->fetch_assoc()) {
                array_push($services, strval($row['ID']), $row['Pakalpojums_Nosaukums']);
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
        $sql = "SELECT id, KategorijasVards FROM kategorija";
        $result = $conn->query($sql);
        if ($result) {
            while($row = $result->fetch_assoc()) {
                array_push($categ, strval($row['id']), $row['KategorijasVards']);
            }
        } else {
            return false;
        }
        $conn->close();
        return $categ;
    }

    public function getAllCategorys(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        mysqli_set_charset($conn,"utf8mb4");
        $categ = array();
        $sql = "SELECT id, KategorijasVards FROM kategorija";
        $result = $conn->query($sql);
        if ($result) {
            while($row = $result->fetch_assoc()) {
                array_push($categ, strval($row['id']), $row['KategorijasVards']);
            }
        } else {
            return false;
        }
        $conn->close();
        return $categ;
    }

    public function getAllUsers(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        mysqli_set_charset($conn,"utf8mb4");
        $sql = "SELECT * FROM lietotaji";
        $users = array();
        $result = $conn->query($sql);
        if ($result) {
            while($row = $result->fetch_assoc()) {
                array_push($users, strval($row['id']), $row['lietotajvards'], $row['admins'],$row['Vards'],$row['Uzvards'],$row['epasts'],$row['Izveides_Datums_Laiks']);
            }
        } else {
            return false;
        }
        $conn->close();
        return $users;
    }

    public function getAllWorkshops(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        mysqli_set_charset($conn,"utf8mb4");
        $sql = "SELECT * FROM darbnicas";
        $users = array();
        $result = $conn->query($sql);
        if ($result) {
            while($row = $result->fetch_assoc()) {
                array_push($users, strval($row['ID']), $row['Darbnicas_Adrese']);
            }
        } else {
            return false;
        }
        $conn->close();
        return $users;
    }

    public function getAllProducts(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        mysqli_set_charset($conn,"utf8mb4");
        $sql = "SELECT p.*, k.KategorijasVards FROM produkti AS p JOIN kategorija AS k ON k.id=p.kategorijas_id";
        $products = array();
        $result = $conn->query($sql);
        if ($result) {
            while($row = $result->fetch_assoc()) {
                array_push($products, strval($row['id']), $row['ProduktaVards'], $row['KategorijasVards'],$row['apraksts'],$row['razotajs'],$row['Produkta_Bilde']);
            }
        } else {
            return false;
        }
        $conn->close();
        return $products;
    }

    public function getProduct($id){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        mysqli_set_charset($conn,"utf8mb4");
        $sql = "SELECT p.*, k.id FROM produkti AS p JOIN kategorija AS k ON k.id=p.kategorijas_id WHERE p.id=".$id."";
        $products = array();
        $result = $conn->query($sql);
        if ($result) {
            while($row = $result->fetch_assoc()) {
                array_push($products, strval($row['id']), $row['ProduktaVards'], $row['id'],$row['apraksts'],$row['razotajs'],$row['Produkta_Bilde']);
            }
        } else {
            return false;
        }
        $conn->close();
        return $products;
    }

    public function getAllProductsForGrid(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        mysqli_set_charset($conn,"utf8mb4");
        $sql = "SELECT p.*, k.KategorijasVards FROM produkti AS p JOIN kategorija AS k ON k.id=p.kategorijas_id ";
        $products = array();
        $result = $conn->query($sql);
        if ($result) {
            while($row = $result->fetch_assoc()) {
                $product = array();
                array_push($product, strval($row['id']), $row['ProduktaVards'], $row['KategorijasVards'],$row['apraksts'],$row['razotajs'],$row['Produkta_Bilde']);
                array_push($products,$product);
            }
        } else {
            return false;
        }
        $conn->close();
        return $products;
    }

    public function getAllProductsForGridByCat($param){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        mysqli_set_charset($conn,"utf8mb4");
        $sql = "SELECT p.*, k.KategorijasVards FROM produkti AS p JOIN kategorija AS k ON k.id=p.kategorijas_id ORDER BY k.KategorijasVards ".$param."";
        $products = array();
        $result = $conn->query($sql);
        if ($result) {
            while($row = $result->fetch_assoc()) {
                $product = array();
                array_push($product, strval($row['id']), $row['ProduktaVards'], $row['KategorijasVards'],$row['apraksts'],$row['razotajs'],$row['Produkta_Bilde']);
                array_push($products,$product);
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
        $sql = "SELECT r.*, d.Darbnicas_Adrese, p.Pakalpojums_Nosaukums, DATE_FORMAT(r.Datums, '%Y-%m-%d') AS date FROM rezervacija AS r LEFT JOIN darbnicas as d ON d.ID=r.DarbnicasID JOIN pakalpojums as p ON p.ID=r.PakalpojumaID";
        $reservations = array();
        $result = $conn->query($sql);
        if ($result) {
            while($row = $result->fetch_assoc()) {
                array_push($reservations, strval($row['ID']), $row['Darbnicas_Adrese'], $row['Pakalpojums_Nosaukums'],$row['Vards'],$row['Uzvards'],$row['TelefonaNr'],$row['Datums'],$row['Laiks']);
            }
        } else {
            return false;
        }
        $conn->close();
        return $reservations;
    }

    public function getAllUsersReservations(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        mysqli_set_charset($conn,"utf8mb4");
        $sql = "SELECT r.*, d.Darbnicas_Adrese, p.Pakalpojums_Nosaukums, DATE_FORMAT(r.Datums, '%Y-%m-%d') AS date FROM rezervacija AS r LEFT JOIN darbnicas as d ON d.ID=r.DarbnicasID JOIN pakalpojums as p ON p.ID=r.PakalpojumaID WHERE r.LietotajuID=".$_SESSION["ID"]."";
        $reservations = array();
        $result = $conn->query($sql);
        $id = 0;

        if ($result) {
            while($row = $result->fetch_assoc()) {
                array_push($reservations, strval($row['ID']), $row['Darbnicas_Adrese'], $row['Pakalpojums_Nosaukums'],$row['Vards'],$row['Uzvards'],$row['TelefonaNr'],$row['Datums'],$row['Laiks']);
            }
        } else {
            return false;
        }
        $conn->close();
        return $reservations;
    }

    
    public function reserve($workshop,$ID,$service,$name,$surname,$phone,$date,$time){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "";
        if($ID > 0){
            $sql = "INSERT INTO rezervacija(DarbnicasID,LietotajuID,PakalpojumaID,Vards,Uzvards,TelefonaNr, Datums,Laiks) VALUES".
            "(".$workshop.",".$ID.",".$service.",'".$name."','".$surname."','".$phone."','".$date."','".$time."')";
        }else{
            $sql = "INSERT INTO rezervacija(DarbnicasID,PakalpojumaID,Vards,Uzvards,TelefonaNr, Datums,Laiks) VALUES".
            "(".$workshop.",".$service.",'".$name."','".$surname."','".$phone."','".$date."','".$time."')";
        }
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
        mysqli_set_charset($conn,"utf8mb4");
        $sql = "INSERT INTO produkti(ProduktaVards,kategorijas_id,apraksts,razotajs,Produkta_Bilde) VALUES".
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

    public function editProduct($id, $name,$category,$description,$brand){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        mysqli_set_charset($conn,"utf8mb4");
        $sql = "UPDATE produkti SET ProduktaVards='".$name."',kategorijas_id=".$category.",apraksts='".$description."',razotajs='".$brand."' WHERE id=".$id."";
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
        mysqli_set_charset($conn,"utf8mb4");
        $sql = "INSERT INTO kategorija(KategorijasVards) VALUES".
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

    public function changeCategory($id, $newCategory){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        mysqli_set_charset($conn,"utf8mb4");
        $sql = "UPDATE kategorija SET KategorijasVards='".$newCategory."' WHERE id=".$id."";
        $result = $conn->query($sql);
        if ($result) {
            return true;
        } 
        return false;
    }

    public function addWorkshop($address){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        mysqli_set_charset($conn,"utf8mb4");
        $sql = "INSERT INTO darbnicas(Darbnicas_Adrese) VALUES".
        "('".$address."')";
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
        $sql = "SELECT admins FROM lietotaji WHERE id=".$id."";
        $result = $conn->query($sql);
        if ($result) {
            while($row = $result->fetch_assoc()) {
                if($row['admins'] == 1){
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
        $sql = "UPDATE lietotaji SET admins=1 WHERE id=".$id."";
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
        $sql = "UPDATE lietotaji SET admins= NULL WHERE id=".$id."";
        $result = $conn->query($sql);
        if ($result) {
            return true;
        } 
        return false;
    }

    public function changeUserPassword($id, $newpass){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "UPDATE lietotaji SET parole='".$newpass."' WHERE id=".$id."";
        $result = $conn->query($sql);
        if ($result) {
            return true;
        } 
        return false;
    }

    public function changeWorkshopAddress($id, $newaddress){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        mysqli_set_charset($conn,"utf8mb4");
        $sql = "UPDATE darbnicas SET Darbnicas_Adrese='".$newaddress."' WHERE id=".$id."";
        $result = $conn->query($sql);
        if ($result) {
            return true;
        } 
        return false;
    }

    public function deleteWorkshop($id){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "DELETE FROM darbnicas WHERE ID=".$id."";
        $result = $conn->query($sql);
        if ($result) {
            return true;
        } 
        return false;
    }

    public function deleteCategory($id){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "DELETE FROM kategorija WHERE ID=".$id."";
        $result = $conn->query($sql);
        if ($result) {
            return true;
        } 
        return false;
    }

    public function changeReservationDate($id, $date){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "UPDATE rezervacija SET Datums='".$date."' WHERE id=".$id."";
        $result = $conn->query($sql);
        if ($result) {
            return true;
        } 
        return false;
    }

    public function changeReservationTime($id, $time){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "UPDATE rezervacija SET Laiks='".$time."' WHERE id=".$id."";
        $result = $conn->query($sql);
        if ($result) {
            return true;
        } 
        return false;
    }
}


?>