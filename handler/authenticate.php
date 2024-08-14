<?php
session_start();

require_once "DB.php";
$db = new DBHelper();

if (isset($_POST['signin'])) {

    $email = $_POST['email'];
    $upass = $_POST['password'];

    if ($db->doLogin($email, $upass)) {
        
        $role = $_SESSION['Role'];

       if ($role=="IT"){
            header("location:it_specialist_dashboard.php?msg=success");
        }

        if($role=="COMPANY"){
            header("location:company_dashboard.php?msg=success");
        }

    } else {
      echo "failed";
    }
} else {
    header("location:../index.php?msg=error");
}
