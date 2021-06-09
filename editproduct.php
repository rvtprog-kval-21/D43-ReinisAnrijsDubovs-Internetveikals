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

if(!isset($_GET['id'])){
    header("location:products.php");
}

$product = $service->getProduct($_GET['id']);

if($product == false){
    $errors->PHPerror();
    header("location:admin.php");
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
                        <h2>Produkta labošana</h2>
                        <form method="POST" enctype="multipart/form-data">
                            <input type="text" class="d-none" name="product_id" value="<?php echo $_GET['id']?>">
                            <div class="form-group">
                                <label class="form-label" for="product_name"><b>Produkta nosaukums</b></label>
                                <input class="form-control" type="text" name="product_name" value="<?php echo $product[1];?>" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="product_category"><b>Produkta kategorija</b></label>
                                <select name="product_category" id="product_category">
                                    <?php
                                        for ($x = 0; $x < count($categories); $x+=2) {
                                            if($categories[$x] == $product[2]){
                                                echo "<option selected value=".$categories[$x].">".$categories[$x+1]."</option>";
                                            }else{
                                                echo "<option value=".$categories[$x].">".$categories[$x+1]."</option>";
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="product_description"><b>Produkta apraksts</b></label>
                                <textarea class="form-control" name="product_description" required><?php echo $product[3];?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="product_brand"><b>Produkta brends</b></label>
                                <input class="form-control" type="text" name="product_brand" value="<?php echo $product[4];?>" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit" name="edit_product">Labot produktu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- FOOTER -->
    <?php include "components/footer.inc.php" ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  
</body>
</html>
<?php

if(isset($_POST["edit_product"])) {
    $val = $service->editProduct($_POST['product_id'],$_POST['product_name'],$_POST['product_category'],$_POST['product_description'],$_POST['product_brand']);
    if($val == true){
        $errors->sucessfullyAddedProduct();
        echo("<meta http-equiv='refresh' content='1'>");
        $errors->tryAgain();
    }
}

?>