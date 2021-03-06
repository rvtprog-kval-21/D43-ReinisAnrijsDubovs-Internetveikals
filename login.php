<?php
    require('components/head.inc.php');
    require('functions/service.php');
    require('functions/errors.php');
    session_start();
    if(isset($_SESSION['ID'])){
        header("location:index.php");
    }
?>
<head>
<link rel="stylesheet" type="text/css" href="reinis/scss/custom.scss">
</head>
<div class="login" aria-labelledby="login">
    <div class="form-group float-end">
        <button class="btn btn-success btn-back" onclick="window.location.href='/reinis/index.php'">Atpakaļ</button>
    </div>
    <form class="login-content animate m-5" method="post">
        <div class="log-container">
            <h2>Ienākt</h2>
            <div class="form-group">
                <label class="form-label" for="uname"><b>Lietotāj vārds</b></label>
                <input type="text" class="form-control" placeholder="Ievadiet lietotājvārdu" name="uname" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="psw"><b>Parole</b></label>
                <input class="form-control" type="password" placeholder="Ievadiet paroli" name="psw" required>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit" name="login">Ienākt</button>
            </div>
        </div>
    </form>
    <form class="register-content animate m-5" method="post">
        <div class="reg-container">
            <h2>Reģistrēšanās</h2>
            <div class="form-group">
                <label class="form-label" for="runame"><b>Lietotāj vārds</b></label>
                <input type="text" class="form-control" placeholder="Ievadiet lietotājvārdu" name="runame" value="<?php if(isset($_POST['runame'])){echo $_POST['runame'];}?>" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="email"><b>E-pasts</b></label>
                <input type="email" class="form-control" placeholder="Ievadiet epastu" name="remail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php if(isset($_POST['remail'])){echo $_POST['remail'];}?>" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="name"><b>Vārds</b></label>
                <input type="text" class="form-control" placeholder="Ievadiet vārdu" name="rname" pattern="[A-Za-z]{1,30}" value="<?php if(isset($_POST['rname'])){echo $_POST['rname'];}?>" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="surname"><b>Uzvārds</b></label>
                <input type="text" class="form-control" placeholder="Ievadiet uzvārdu" name="rsurname" pattern="[A-Za-z]{1,30}" value="<?php if(isset($_POST['rsurname'])){echo $_POST['rsurname'];}?>" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="psw"><b>Parole</b></label>
                <input class="form-control" type="password" placeholder="Ievadiet paroli" name="rpsw" value="<?php if(isset($_POST['rpsw'])){echo $_POST['rpsw'];}?>" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="psw"><b>Atkārtota parole</b></label>
                <input class="form-control" type="password" placeholder="Ievadiet atkārtotu paroli" name="rpsw1" value="<?php if(isset($_POST['rpsw1'])){echo $_POST['rpsw1'];}?>" required>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit" name="register">Reģistrēties</button>
            </div>
        </div>
    </form>
</div>

<?php

$service = new service();
$errors = new errors();

if(isset($_POST['login'])){
    $result = $service->login($_POST['uname'], $_POST['psw']);
    if($result){
        $isAdmin = $service->checkAdmin($_SESSION['ID']);
        if($isAdmin == false){
            header("location:index.php");
        }else{
            header("location:users.php");
        }
    }else{
        $errors->falseLogin();
    }
}

if(isset($_POST['register'])){
    $result = $service->register($_POST['runame'], $_POST['rpsw'], $_POST['remail'],$_POST['rsurname'],$_POST['rname'],$_POST['rpsw1']);
    if($result == 4){
        $errors->sucessfullyRegistered();
        header("location:login.php");
    }else if($result == 1){
        $errors->usernameAndEmailExists();
    }else if($result == 2){
        $errors->passwordsAreNotEqual();
    }else if($result == 3){
        $errors->noValuesEntered();
    }else{
        $errors->PHPerror();
    }
}
?>


