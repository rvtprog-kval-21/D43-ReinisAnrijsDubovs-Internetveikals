
<?php
if(isset($_REQUEST['CheckLogin'])){
    global $wpdb;
        $table_name = $wpdb->prefix.'my_users';
       
        $username = $_POST['uname'];
        $password = $_POST['psw'];

        if(empty($username) || empty($password))
        {
            $error = "Both fields are required.";
            var_dump($error);
        }else{
            $get_username = $wpdb->get_results("SELECT username FROM $table_name WHERE username = '$username'");
            global $wp_hasher;
                $hash = $wpdb->get_results("SELECT password FROM $table_name WHERE username = '$username'");
                $valid = wp_check_password( $password, $hash );
                var_dump($get_username);
                var_dump($hash);
                var_dump($valid);
                if($username = $get_username && $valid == false){
                    if ( password_needs_rehash ( $hash, PASSWORD_DEFAULT ) ) {
                        $newHash = wp_hash_password($password);
                        /* UPDATE the user's row in `log_user` to store $newHash */

                    }
                    header("Location: /");
                    var_dump($username);
                }else {
                    /* tell the would-be user the username/password combo is invalid */
                    var_dump("Invalid password or username!!!");
                }
        }
}
?>