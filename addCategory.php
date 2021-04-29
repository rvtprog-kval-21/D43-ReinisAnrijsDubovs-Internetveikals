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

$categories = $service->getProductCategories();

if($categories == false){
    $errors->PHPerror();
    header("location:index.php");
}

include "components/head.inc.php"; 
?>
<body>
        <?php include "components/header.inc.php" ?>
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

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
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
                    <li class="nav-item">
                        <a class="nav-link" href="reinis/category.php">
                        <span data-feather="layers"></span>
                        kategorijas
                        </a>
                    </li>
                    </ul>
                    <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="reinis/addWorkShops.php">
                        <span data-feather="file-text"></span>
                        Pievienot Darbnīcas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reinis/WorkShop.php">
                        <span data-feather="file-text"></span>
                        Darbnīcas
                        </a>
                    </li>
                </ul>
              </div>
          </nav>
          <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="home-main-info">
                <div class="container">
                    <h1>Administrātora panelis</h1>  
                    <h2>Produkta kategorijas pievienosana</h2>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-label" for="product_category_name"><b>Produkta kategorijas nosaukums</b></label>
                            <input class="form-control" type="text" name="product_category_name" value="" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit" name="add_product_category">Pievienot kategorju</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    <?php include "components/footer.inc.php" ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  
</body>
</html>
<?php

if(isset($_POST["add_product_category"])) {
    if($service->addProductCategory($_POST["product_category_name"])){
        $errors->productCategoryAdded();
    }else{
        $errors->tryAgain();
    }


}

?>