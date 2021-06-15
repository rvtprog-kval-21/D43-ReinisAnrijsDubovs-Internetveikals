<header>
    <div class="laguage-bar">
        
    </div>
    <div class="top-header">
        <div class="wrapper d-flex justify-content-center "> 
            <div class="row align-items-center flex-sm-nowrap">
                <div class="col-lg-5 col-md-6 col-sm-5 justify-content-center"> 
                    
                    <a href="reinis/admin.php">
                        <img class="d-block w-100" src="reinis/img/Logo.jpg" alt="header-logo">
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
</header>