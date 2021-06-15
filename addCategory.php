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
$categorysdb = $service->getAllCategorys();

if(isset($_GET['deleteproduct'])){
    $result = $service->deleteCategory($_GET['deleteproduct']);
    if($result){
        $errors->CategoryDeleted();
    }else{
        $errors->tryAgain();
    }
    echo '<script>window.location.href="/reinis/addCategory.php"</script>';
}

if($categories == false){
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
                    <h2>Produkta kategorijas pievienosana</h2>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-label" for="product_category_name"><b>Produkta kategorijas nosaukums</b></label>
                            <input class="form-control" type="text" name="product_category_name" pattern="[A-Za-z]{1,30}" value="" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit" name="add_product_category">Pievienot kategorju</button>
                        </div>
                    </form>
                </div>
                <div class="container mt-4">
                <h2>Kategorijas</h2> 
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Kategorija</th>
                                <th scope="col">Mainīt kategoriju</th>
                                <th scope="col">Dzēst kategoriju</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $val = 2; 
                        for ($x = 0; $x < count($categorysdb); $x+=$val) {
                            echo "<tr>";
                            for ($i = $x; $i < $x + $val; $i++) {
                                if($i == $x){
                                    echo "<th scope='row'>".$categorysdb[$x]."</th>";
                                }else{
                                    echo "<td>".$categorysdb[$i]."</td>";
                                }
                            }
                            
                            echo '<td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changeCategory" data-bs-whatever="'.$categorysdb[$x].'">Mainit kategoriju</button></td>';
                            echo "<td><button class='btn btn-danger'><a class='text-white text-decoration-none' href='reinis/addCategory.php?deleteproduct=".$categorysdb[$x]."'>Dzēst kategoriju</a></button></td>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    <?php include "components/footer.inc.php" ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="modal fade" id="changeCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ievadiet jaunu kategoriju</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="mb-3">
            <input type="text" class="category-id d-none" >
            <label for="newCategory" class="col-form-label">Jauna kategorija</label>
            <input class="form-control" id="newCategory" />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aizvērt</button>
        <button type="button" id="change-category"  data-bs-dismiss="modal" class="btn btn-primary">Mainīt kategoriju</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
<?php

if(isset($_POST["add_product_category"])) {
    if($service->addProductCategory($_POST["product_category_name"])){
        $errors->productCategoryAdded();
        echo '<script>window.location.href="/reinis/addCategory.php"</script>';
    }else{
        $errors->tryAgain();
    }


}

if(isset($_POST['newCategory'])){
    $service->changeCategory($_POST['id'], $_POST['newCategory']);
}

?>

<script>

var exampleModal = document.getElementById('changeCategory')
exampleModal.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget
  var id = button.getAttribute('data-bs-whatever')
  var modalTitle = exampleModal.querySelector('.modal-title')
  var modalBodyInput = exampleModal.querySelector('.modal-body .category-id')

  modalBodyInput.value = id
})

$(document).ready(function(){

    $('#change-category').click(function(){
    
    var id = $('.category-id').val();
    var newCategory = $('#newCategory').val();
    $.ajax({
        type: 'POST',
        url: 'reinis/addCategory.php',
        dataType: "json",
        data: {
            id: id,
            newCategory: newCategory,
        },
        complete: function(jqXHR) {
        if(jqXHR.readyState === 4) {
                alert("Kategorijas nosaukums tika veiksmīgi nomainīta!")
                setInterval('refreshPage()', 200);
            }   
        }   
    });
    });
});

function refreshPage() {
    location.reload(true);
}

</script>