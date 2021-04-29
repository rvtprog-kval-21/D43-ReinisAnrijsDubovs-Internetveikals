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

$reservations = $service->getAllReservations();

if(isset($_GET['deletereservation'])){
    $result = $service->deleteReservation($_GET['deletereservation']);
    if($result){
        $errors->reservationDeleted();
    }else{
        $errors->tryAgain();
    }
    echo '<script>window.location.href="/reinis/reservations.php"</script>';
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
                  <button class="btn btn-success"><a href="reinis/users.php">Lietotāji</a></button> 
                  <button class="btn btn-success"><a href="reinis/reservation.php">Pievienot rezervāciju</a></button> 
                  <h2>Rezervācijas</h2> 
                  <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Darbnica</th>
                            <th scope="col">Pakalpojums</th>
                            <th scope="col">Vards</th>
                            <th scope="col">Uzvards</th>
                            <th scope="col">TelefonaNr</th>
                            <th scope="col">Datums</th>
                            <th scope="col">Laiks</th>
                            <th scope="col">Mainīt datumu</th>
                            <th scope="col">Mainīt laiku</th>
                            <th scope="col">Dzēst</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $val = 8; 
                    for ($x = 0; $x < count($reservations); $x+=$val) {
                        echo "<tr>";
                        for ($i = $x; $i < $x + $val; $i++) {
                            if($i == $x){
                                echo "<th scope='row'>".$reservations[$x]."</th>";
                            }else{
                                echo "<td>".$reservations[$i]."</td>";
                            }
                        }
                        echo '<td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changedate" data-bs-whatever="'.$reservations[$x].'">Mainīt datumu</button></td>';
                        echo '<td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changetime" data-bs-whatever="'.$reservations[$x].'">Mainīt Laiku</button></td>';
                        echo '<td><a href="reinis/reservations.php?deletereservation='.$reservations[$x].'">Dzēst</a></td>';
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

    <div class="modal fade" id="changedate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Set new date</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST">
              <div class="mb-3">
                <input type="text" class="res-id d-none" >
                <label for="date" class="col-form-label">Datums</label>
                <input type="date" class="form-control" class="date" id="modal-date" />
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aizvērt</button>
            <button type="button" id="change-date"  data-bs-dismiss="modal" class="btn btn-primary">Saglabāt</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="changetime" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Set new time</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST">
              <div class="mb-3">
                <input type="text" class="res-id2 d-none" >
                <label for="time" class="col-form-label">Laiks</label>
                <input type="time" class="form-control" class="time" id="modal-time" />
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aizvērt</button>
            <button type="button" id="change-time"  data-bs-dismiss="modal" class="btn btn-primary">Saglabāt</button>
          </div>
        </div>
      </div>
    </div>

</body>
</html>
<script>

var exampleModal = document.getElementById('changedate')
exampleModal.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget
  var id = button.getAttribute('data-bs-whatever')
  var modalBodyInput = exampleModal.querySelector('.modal-body .res-id')
  modalBodyInput.value = id
})

var exampleModal2 = document.getElementById('changetime')
exampleModal2.addEventListener('show.bs.modal', function (event2) {
  var button2 = event2.relatedTarget
  var id2 = button2.getAttribute('data-bs-whatever')
  var modalBodyInput2 = exampleModal2.querySelector('.modal-body .res-id2')
  modalBodyInput2.value = id2
})

$(document).ready(function(){

$('#change-date').click(function(){
  
  var id = $('.res-id').val();
  var newdate = $('#modal-date').val();
  $.ajax({
    type: 'POST',
    url: 'reinis/reservations.php',
    dataType: "json",
    data: {
        id: id,
        newdate: newdate,
    },
    complete: function(jqXHR) {
       if(jqXHR.readyState === 4) {
            alert("Datums tika veiksmīgi nomainīts!")
            setInterval('refreshPage()', 200);
        }   
    }   
 });
});

$('#change-time').click(function(){
  
  var tid = $('.res-id2').val();
  var newtime = $('#modal-time').val();
  $.ajax({
    type: 'POST',
    url: 'reinis/reservations.php',
    dataType: "json",
    data: {
        tid: tid,
        newtime: newtime,
    },
    complete: function(jqXHR) {
       if(jqXHR.readyState === 4) {
            alert("Laiks tika veiksmīgi nomainīts!");
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

if(isset($_POST['newtime']) && isset($_POST['tid'])){
    $service->changeReservationTime($_POST['tid'], $_POST['newtime']);
}

if(isset($_POST['newdate']) && isset($_POST['id'])){
    $service->changeReservationDate($_POST['id'], $_POST['newdate']);
}
?>
