<?php

session_start();

require_once "DB.php";
$db = new DBHelper();


if (isset($_POST['submit'])) {
  
    
    $datas = array(
        'FullName' =>  $_POST['name'],
        'Email' =>  $_POST['email'],
        'Phone_Number'=>  $_POST['phone'],
        'GitHub_Username'=> $_POST['git'],
        'Speciality'=> $_POST['special'],
        'Expirience'=> $_POST['experi'],
    );

    $insert_datas = $db->insert("specialist", $datas);

    if($insert_datas){
        
        $login_datas = array(
            'Email' =>  $_POST['email'],
            'Password' => $db->PwdHash('123') ,
            'Role'=> 'IT',
        );
        $ild = $db->insert("Credentials", $login_datas);

        if($ild){
            header("location:signin.php?msg=success");
        }else{
            echo "nop";
        }

    }else{
        echo "hazjai gia kwenye specialist"; 
    }

}

?>