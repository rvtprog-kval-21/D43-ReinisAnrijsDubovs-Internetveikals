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

$users = $service->getAllUsers();

if(isset($_GET['setAdmin'])){
    $result = $service->setAdmin($_GET['setAdmin']);
    if($result){
        $errors->adminSet();
    }else{
        $errors->tryAgain();
    }
    echo '<script>window.location.href="/reinis/users.php"</script>';
}

if(isset($_GET['setUser'])){
    $result = $service->setUser($_GET['setUser']);
    if($result){
        $errors->userSet();
        
    }else{
        $errors->tryAgain();
    }
    echo '<script>window.location.href="/reinis/users.php"</script>';
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

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
    </head>
    <body>
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
                            <h1>Administrātora panelis</h1>  
                            <h2>Lietotāji</h2> 
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">LIETOTĀJVĀRDS</th>
                                        <th scope="col">IR ADMINS</th>
                                        <th scope="col">VĀRDS</th>
                                        <th scope="col">UZVĀRDS</th>
                                        <th scope="col">EPASTS</th>
                                        <th scope="col">IZVEIDOTS</th>
                                        <th scope="col">UZSTĀDĪT KĀ ADMINU</th>
                                        <th scope="col">NOMAINĪT PAROLI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $val = 7; 
                                for ($x = 0; $x < count($users); $x+=$val) {
                                    echo "<tr>";
                                    for ($i = $x; $i < $x + $val; $i++) {
                                        if($i == $x){
                                            echo "<th scope='row'>".$users[$x]."</th>";
                                        }else{
                                            echo "<td>".$users[$i]."</td>";
                                        }
                                    }
                                    if($users[$x+2] == 0){
                                        echo "<td><a href='reinis/users.php?setAdmin=".$users[$x]."'>Uzstādīt kā adminu</a></td>";
                                    }else{
                                        echo "<td><a href='reinis/users.php?setUser=".$users[$x]."'>Uzstādīt kā lietotāju</a></td>";
                                    }
                                    echo '<td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changepass" data-bs-whatever="'.$users[$x].'">Nomainīt paroli</button></td>';
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
    <!-- FOOTER -->
    <?php include "components/footer.inc.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="modal fade" id="changepass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ievadiet jauno paroli</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="mb-3">
            <input type="text" class="user-id d-none" >
            <label for="newpass" class="col-form-label">Jaunā parole</label>
            <input class="form-control" id="newpass" />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="change-pass"  data-bs-dismiss="modal" class="btn btn-primary">Mainīt paroli</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>

<script>

var exampleModal = document.getElementById('changepass')
exampleModal.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget
  var id = button.getAttribute('data-bs-whatever')
  var modalTitle = exampleModal.querySelector('.modal-title')
  var modalBodyInput = exampleModal.querySelector('.modal-body .user-id')

  modalBodyInput.value = id
})

$(document).ready(function(){

$('#change-pass').click(function(){
  
  var userid = $('.user-id').val();
  var newpass = $('#newpass').val();
  $.ajax({
    type: 'POST',
    url: 'reinis/users.php',
    dataType: "json",
    data: {
       userid: userid,
       newpass: newpass,
    },
    complete: function(jqXHR) {
       if(jqXHR.readyState === 4) {
            alert("Parole tika veiksmīgi nomainīta!")
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
<?php

if(isset($_POST['newpass'])){
    $service->changeUserPassword($_POST['userid'], $_POST['newpass']);
}
?>
