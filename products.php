<?php 
session_start();

require('functions/service.php');
require('functions/errors.php');

$service = new service();
$errors = new errors();
$isAdmin = $service->checkAdmin($_SESSION['ID']);

if(!isset($_SESSION['ID'])){
    header("location:index.php");
}
if($isAdmin == false){
    header("location:index.php");
}

$products = $service->getAllProducts();

if(isset($_GET['deleteproduct'])){
    $result = $service->deleteProduct($_GET['deleteproduct']);
    if($result){
        $errors->productDeleted();
    }else{
        $errors->tryAgain();
    }
    echo '<script>window.location.href="/reinis/products.php"</script>';
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
                            <a class="nav-link active" aria-current="page" href="reinis/admin.php">
                            <span data-feather="home"></span>
                            Pārskats
                            </a>
                        </li>
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
                        <h1>Administrātora panelis</h1>  
                        <h2>Produkti</h2> 
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Produkta nosaukums</th>
                                    <th scope="col">Kategorija</th>
                                    <th scope="col">Produkta apraksts</th>
                                    <th scope="col">Produkta brands</th>
                                    <th scope="col">Produkta bilde</th>
                                    <th scope="col">Labot</th>
                                    <th scope="col">Dzēst</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $val = 6; 
                            for ($x = 0; $x < count($products); $x+=$val) {
                                echo "<tr>";
                                for ($i = $x; $i < $x + $val; $i++) {
                                    if($i == $x){
                                        echo "<th scope='row'>".$products[$x]."</th>";
                                    }else{
                                        echo "<td>".$products[$i]."</td>";
                                    }
                                }
                                echo "<td><button class='btn btn-primary'><a class='text-white text-decoration-none' href='reinis/editproduct.php?id=".$products[$x]."'>Labot produktu</a></button></td>";
                                echo "<td><button class='btn btn-danger'><a class='text-white text-decoration-none' href='reinis/products.php?deleteproduct=".$products[$x]."'>Dzēst produktu</a></button></td>";
                                
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main> 
        </div>
    </div>
        
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
<!-- FOOTER -->
<?php include "components/footer.inc.php" ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>


<?php


?>
