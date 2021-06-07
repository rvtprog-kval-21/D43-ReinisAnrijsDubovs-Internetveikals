<?php 
session_start();
include "components/header.inc.php";
require('functions/errors.php');

$service = new service();
$errors = new errors();

$workshops = $service->getWorkshops();

$services = $service->getService();

include "components/head.inc.php"; 
?>
<main>
    <body>
        <?php  ?>
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
                        <input type="text" class="form-control" name="surname" value="" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="phone"><b>Telefona numurs</b></label>
                        <input class="form-control" type="text" name="phone" value="" required>
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
    <!-- FOOTER -->
    <?php include "components/footer.inc.php" ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  
</body>
</html>
<?php

if(isset($_POST['reserve'])){
    $id = 0;

    if(isset($_SESSION['ID'])){
        $id = $_SESSION['ID'];
    }
    echo $_POST['time'];

    $result = $service->reserve($_POST['workshops'],$id,$_POST['service'],$_POST['name'],$_POST['surname'],$_POST['phone'],$_POST['date'],$_POST['time']);
    if($result == true){
        $errors->sucessfullyReserved();
    }else{
        $errors->tryAgain();
    }
}

?>

