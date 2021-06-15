<?php 
session_start();

require('functions/errors.php');
include "components/head.inc.php"; 
include "components/header.inc.php";
$service = new service();
$errors = new errors();

if(!isset($_SESSION['ID'])){
    header("location:index.php");
}

$usersReservations = $service->getAllUsersReservations();

if(isset($_GET['deletereservation'])){
    $result = $service->deleteReservation($_GET['deletereservation']);
    if($result){
        $errors->reservationDeleted();
    }else{
        $errors->tryAgain();
    }
    echo '<script>window.location.href="/reinis/myprofile.php"</script>';
}

?>
<main>
    <body>
        <?php  ?>
        <div class="home-main-info">
            <div class="container">
                <h1>Mans profils</h1>  
                <form method="POST">
                    <div class="form-group">
                        <label class="form-label" for="pass"><b>Jaunā parole</b></label>
                        <input type="text" class="form-control" placeholder="Enter Password" name="pass" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit" name="u-changepass">Nomainīt paroli</button>
                    </div>
                </form>
            </div>
            <div class="container mt-4">
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
                            <th scope="col">Atcelt</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $val = 8; 
                    for ($x = 0; $x < count($usersReservations); $x+=$val) {
                        echo "<tr>";
                        for ($i = $x; $i < $x + $val; $i++) {
                            if($i == $x){
                                echo "<th scope='row'>".$usersReservations[$x]."</th>";
                            }else{
                                echo "<td>".$usersReservations[$i]."</td>";
                            }
                        }
                        echo '<td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changedate" data-bs-whatever="'.$usersReservations[$x].'">Mainīt datumu</button></td>';
                        echo '<td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changetime" data-bs-whatever="'.$usersReservations[$x].'">Mainīt Laiku</button></td>';
                        echo '<td><button class="btn btn-danger"><a class="text-white text-decoration-none" href="reinis/myprofile.php?deletereservation='.$usersReservations[$x].'">Atcelt</a></td>';
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    <!-- FOOTER -->
    <?php include "components/footer.inc.php" ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="modal fade" id="changedate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ievadiet jauno datumu</h5>
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
        <h5 class="modal-title" id="exampleModalLabel">Ievadiet jauno laiku</h5>
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
    url: 'reinis/myprofile.php',
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

if(isset($_POST['u-changepass'])){
    $result = $service->changeUserPassword($_SESSION['ID'],$_POST['pass']);
    if($result == true){
        $errors->passwordChanged();
    }else{
        $errors->tryAgain();
    }
}

if(isset($_POST['newtime']) && isset($_POST['tid'])){
    $service->changeReservationTime($_POST['tid'], $_POST['newtime']);
}

if(isset($_POST['newdate']) && isset($_POST['id'])){
    $service->changeReservationDate($_POST['id'], $_POST['newdate']);
}

?>


