<?php 
session_start();

require('functions/service.php');
require('functions/errors.php');

$service = new service();
$errors = new errors();

if(!isset($_SESSION['ID'])){
    header("location:index.php");
}

$workshops = $service->getWorkshops();

if($workshops == false){
    $errors->PHPerror();
    header("location:index.php");
}

$services = $service->getService();

if($services == false){
    $errors->PHPerror();
    header("location:index.php");
}

include "components/head.inc.php"; 
?>
<body>
        <?php include "components/adminHeader.inc.php" ?>
        <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Dashboard Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head> 
  <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="reinis/users.php">
                            <span data-feather="file"></span>
                            Lietotajs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reinis/Reservations.php">
                            <span data-feather="file-text"></span>
                            Rezervācijas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reinis/addReservation.php">
                            <span data-feather="file"></span>
                            Pievienot rezervāciju
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reinis/addProduct.php">
                            <span data-feather="shopping-cart"></span>
                            Pievienot produktu
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reinis/products.php">
                            <span data-feather="users"></span>
                            Produkti
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reinis/addCategory.php">
                            <span data-feather="bar-chart-2"></span>
                            pievienot kategoriju
                            </a>
                        </li>
                        </ul>
                        <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="reinis/addWorkShop.php">
                            <span data-feather="file-text"></span>
                            Pievienot Darbnīcas
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="home-main-info">
                    <div class="container">
                        <form class="register-content animate m-5" method="post">
                            <div class="reg-container">
                                <h1>Rezervācija</h1>
                                <div class="form-group">
                                    <label class="form-label" for="workshops"><b>Darbnīca</b></label>
                                    <select name="workshops" id="workshops">
                                        <?php
                                            for ($x = 0; $x < count($workshops); $x+=2) {
                                                echo "<option value=".$workshops[$x].">".$workshops[$x+1]."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="service"><b>Pakalpojums</b></label>
                                    <select name="service" id="service">
                                        <?php
                                            for ($x = 0; $x < count($services); $x+=2) {
                                                echo "<option value=".$services[$x].">".$services[$x+1]."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="name"><b>Vārds</b></label>
                                    <input type="text" class="form-control" name="name" value="" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="surname"><b>Uzvārds</b></label>
                                    <input type="text" class="form-control" name="surname" pattern="[A-Za-z]{1,30}" value="" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="phone"><b>Telefona numurs</b></label>
                                    <input class="form-control" type="text" name="phone" pattern="[0-9]{8}" value="" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="date"><b>Datums</b></label>
                                    <input class="form-control" type="date" name="date" value="" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="time"><b>Laiks</b></label>
                                    <input class="form-control" type="time" name="time" value="" required>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" type="submit" name="reserve">Pieteikt rezervāciju</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    <!-- FOOTER -->
    <?php include "components/footer.inc.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  
</body>
</html>
<?php

if(isset($_POST['reserve'])){
    $result = $service->reserve($_POST['workshops'],$_SESSION['ID'],$_POST['service'],$_POST['name'],$_POST['surname'],$_POST['phone'],$_POST['date'],$_POST['time']);
    if($result == true){
        $errors->sucessfullyReserved();
    }else{
        $errors->tryAgain();
    }
}

?>