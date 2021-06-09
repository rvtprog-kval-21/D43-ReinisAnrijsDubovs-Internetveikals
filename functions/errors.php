<?php

class errors{
    private $wrongUsernameOrPassword;
    private $PHPerror;
    private $noValues;
    private $passwordsNotEqual;
    private $usernameAndEmailExists;
    private $sucessfullyRegistered;
    private $tryAgain;
    private $sucessfullyReserved;
    private $adminSet;
    private $userSet;
    private $passwordChanged;
    private $reservationDeleted;
    private $sucessfullyAddedProduct;
    private $productDeleted;
    private $productCategoryAdded;
    private $workshopAdded;
    private $workshopDeleted;
    private $CategoryDeleted;

    public function __construct()
    {
        $this->wrongUsernameOrPassword = "Nepareizs lietotājvārds vai parole";
        $this->PHPerror = "Programmas kļūda, lūdzu sazinieties ar administrātoru!";
        $this->noValues = "Lūdzu aizpildiet visus laukus!";
        $this->passwordsNotEqual = "Paroles nesakrīt!";
        $this->usernameAndEmailExists = "Lietotājvārds vai E-pasts jau eksistē!";
        $this->sucessfullyRegistered = "Jūs esat veiksmīgi reģistrēts sistēmā!";
        $this->tryAgain = "Notikusi kļūda, mēģiniet vēlreiz!";
        $this->sucessfullyReserved = "Jūsu rezervācija ir veiksmīgi pieteikta!";
        $this->adminSet = "Lietotājs veiksmīgi iestatīts, kā administrātors!";
        $this->userSet = "Administrātors veiksmīgi iestatīts, kā lietotājs!";
        $this->passwordChanged = "Parole tika veiksmīgi nomainīta!";
        $this->sucessfullyAddedProduct = "Produkts tika veiksmīgi pievienots!";
        $this->productDeleted = "Produkts tika veiksmīgi dzēsts!";
        $this->productCategoryAdded = "Produkta kategorija veiksmīgi pievienota!";
        $this->workshopAdded = "Darbnīca pievienota!";
        $this->workshopDeleted = "Darbnīca veiksmīgi izdzēsta!";
        $this->CategoryDeleted = "Kategorija veiksmīgi izdzēsta!";
    }

    public function workshopAdded(){
        echo '<script>alert("'.$this->workshopAdded.'");</script>';
    }

    public function WorkshopDeleted(){
        echo '<script>alert("'.$this->workshopDeleted.'");</script>';
    }

    public function CategoryDeleted(){
        echo '<script>alert("'.$this->CategoryDeleted.'");</script>';
    }

    public function falseLogin(){
        echo '<script>alert("'.$this->wrongUsernameOrPassword.'");</script>';
    }

    public function tryAgain(){
        echo '<script>alert("'.$this->tryAgain.'");</script>';
    }

    public function PHPerror(){
        echo '<script>alert("'.$this->PHPerror.'");</script>';
    }

    public function noValuesEntered(){
        echo '<script>alert("'.$this->noValues.'");</script>';
    }

    public function passwordsAreNotEqual(){
        echo '<script>alert("'.$this->passwordsNotEqual.'");</script>';
    }

    public function usernameAndEmailExists(){
        echo '<script>alert("'.$this->usernameAndEmailExists.'");</script>';
    }

    public function sucessfullyRegistered(){
        echo '<script>alert("'.$this->sucessfullyRegistered.'");</script>';
    }

    public function sucessfullyReserved(){
        echo '<script>alert("'.$this->sucessfullyReserved.'");</script>';
    }

    public function mysqlerror($msg){
        echo '<script>alert("'.$msg.'");</script>';
    }

    public function adminSet(){
        echo '<script>alert("'.$this->adminSet.'");</script>';
    }

    public function userSet(){
        echo '<script>alert("'.$this->userSet.'");</script>';
    }

    public function passwordChanged(){
        echo '<script>alert("'.$this->passwordChanged.'");</script>';
    }

    public function reservationDeleted(){
        echo '<script>alert("'.$this->reservationDeleted.'");</script>';
    }

    public function sucessfullyAddedProduct(){
        echo '<script>alert("'.$this->sucessfullyAddedProduct.'");</script>';
    }

    public function productDeleted(){
        echo '<script>alert("'.$this->productDeleted.'");</script>';
    }

    public function productCategoryAdded(){
        echo '<script>alert("'.$this->productCategoryAdded.'");</script>';
    }
}

?>