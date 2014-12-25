<?php
    
require 'Mysql.php';

class Membership {
    function validate_user($un, $pwd) {
        $mysql = new Mysql();
        $ensure_credentials = $mysql->verify_Username_and_Pass($un, $pwd);

        if($ensure_credentials) {
            $_SESSION['status'] = 'authorized';
            header("location: page.php");
        } else return "Please enter a correct username and password";
    }
}
