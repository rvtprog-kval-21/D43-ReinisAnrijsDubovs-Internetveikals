<header>
    <div class="laguage-bar">
        
    </div>
    <div class="top-header">
        <div class="wrapper d-flex justify-content-center "> 
            <div class="row align-items-center flex-sm-nowrap">
                <div class="col-lg-3 col-md-6 col-sm-5 justify-content-center"> 
                    
                    <a href="/">
                        <img class="d-block w-100" src="reinis/img/Logo.jpg" alt="header-logo">
                    </a>
                    
                </div>
                <div class="col-lg-7 d-none d-sm-none d-xl-block header-contact">   
                    <a href="tel:371 67562222" class="top-header-contact-phone"><i class="fa fa-phone"></i>+371 67562222 (Šmerļa iela 3)</a>
                    <a href="mailto:info@vejstikli.lv" class="top-header-contact-email"><i class="fa fa-envelope-o"></i>info@vejstikli.lv</a>
                </div> 
                <div class="search-container d-flex aligne-items-center ">
                    <div class="col-lg-2 col-md-3 d-sm-none d-md-block search-input-holder">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q" placeholder="" pattern="[^'\x22]+" title="Invalid input">
                    </div>
                    <div class=" d-sm-none d-md-block search-button">
                        <button><i class="fa fa-search" aria-hidden="true" type="submit" style="font-size:30px"></i></button>
                    </div>
                    <div class="col-lg-3 col-md-3 d-sm-none d-md-block Login-button">
                        <a href="reinis/login.php">
                            <button class="button" type="button">
                                Ielogoties
                            </button>
                        </a>
                    </div>
                    <?php if(isset($_SESSION['ID'])){ ?>
                    <div class="col-lg-3 col-md-3 d-sm-none d-md-block Login-button">
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
            <button class="navbar-toggler border-dark navbar-dark bg-green" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link text-white" aria-current="page" href="http://myvejstikli.local/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="reinis/pakalpojumi.php">Pakalpojumi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="reinis/pages\template-cenas.php">Cenas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="reinis/template-rezervacija.php">Rezervacija</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="reinis/pages\template-par-mums.php">Par mums</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="reinis/pages\template-vakances.php">Vakances</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="reinis/pages\template-kontakti.php">Kontakti</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>