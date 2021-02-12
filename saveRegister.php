<?php
if(isset($_REQUEST['insertRegistration'])){
    global $wpdb;
        $table_name = $wpdb->prefix.'my_users';

        $username = $_POST['uname'];
        $name = $_POST['name'];
        $sirname = $_POST['sirName'];
        $email = $_POST['email'];
        $password = $_POST['psw'];
        $checkpassword = $_POST['confpsw'];
        $hash = wp_hash_password($password);

        $DuplicetUsers = $wpdb->get_results("SELECT * FROM $table_name WHERE username = '$username'"); 
        $adminPriv = false;
        if($password === $checkpassword){
           if($DuplicetUsers){
                header("Location: /");
           }else{
                $wpdb->insert($table_name,
                array(
                    'username'=> $username,
                    'admin'=> $adminPriv,
                    'name'=> $name,
                    'sir_name'=> $sirname,
                    'email'=> $email,
                    'password'=> $hash
                ));
                header("Location: /");
           }
        }
}
?>