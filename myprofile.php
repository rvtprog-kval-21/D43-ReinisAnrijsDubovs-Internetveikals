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
        </div>
    <!-- FOOTER -->
    <?php include "components/footer.inc.php" ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  
</body>
</html>
<?php

if(isset($_POST['u-changepass'])){
    $result = $service->changeUserPassword($_SESSION['ID'],$_POST['pass']);
    if($result == true){
        $errors->passwordChanged();
    }else{
        $errors->tryAgain();
    }
}


?>
