<?php
require('functions/service.php');
$service2 = new service();

if(isset($_SESSION['ID'])){
    $isAdmin = $service2->checkAdmin($_SESSION['ID']);
}
?>

<header>
    <div class="laguage-bar">
        
    </div>
    <div class="top-header">
        <div class="wrapper d-flex justify-content-center "> 
            <div class="row align-items-center flex-sm-nowrap">
                <div class="col-lg-3 col-md-6 col-sm-5 justify-content-center"> 
                    
                    <a href="reinis/index.php">
                        <img class="d-block w-100" src="reinis/img/Logo.jpg" alt="header-logo">
                    </a>
                    
                </div>
                <div class="col-lg-7 d-none d-sm-none d-xl-block header-contact">   
                    <a href="tel:371 67562222" class="top-header-contact-phone"><i class="fa fa-phone"></i>+371 67562222 (Šmerļa iela 3)</a>
                    <a href="mailto:info@vejstikli.lv" class="top-header-contact-email"><i class="fa fa-envelope-o"></i>info@vejstikli.lv</a>
                </div> 
                <div class="col-lg-4 ">
                    <?php if(!isset($_SESSION['ID'])){ ?>
                    <div class="col-lg-3 col-md-3 d-sm-none d-md-block Login-button">
                        <a href="reinis/login.php">
                            <button class="button" type="button">
                                Ielogoties
                            </button>
                        </a>
                    </div>
                    <?php } ?>
                    <?php if(isset($_SESSION['ID']) && $isAdmin == false){ ?>
                        <div class="col-lg-3 col-md-3 d-sm-none d-md-block float-start Login-button">
                        <a href="reinis/myprofile.php">
                            <button class="button" type="button">
                                Mans Profils
                            </button>
                        </a>
                    </div>
                    <?php } if(isset($_SESSION['ID'])){ ?>
                    <div class="col-lg-3 col-md-3 d-sm-none d-md-block float-end Login-button">
                        <a href="reinis/logout.php">
                            <button class="button" type="button">
                                Iziet
                            </button>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div> 
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <button class="navbar-toggler border-dark navbar-dark bg-green" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav2" aria-controls="navbarNav2" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav2">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white active" aria-current="page" href="http://localhost/reinis/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="reinis/pages/pakalpojumiShow.php">Pakalpojumi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="reinis/products-grid.php">Produkti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="reinis/reservation.php">Rezervacija</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="reinis/pages/par-mums.php">Par mums</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="reinis/pages/vakances.php">Vakances</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="reinis/pages/contacts.php">Kontakti</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>