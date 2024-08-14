
<?php

session_start();

require_once "DB.php";
$db = new DBHelper();


if (isset($_POST['submit'])) {
  
    
    $datas = [
        'Title' =>  $_POST['title'],
        'Description' =>  $_POST['descr'],
        'Type'=>  $_POST['type'],
        'Requirements'=> $_POST['requir'],
        'StartDate'=> $_POST['start_date'],
        'EndDate '=> $_POST['end_date'],
        'ApplicationDeadline '=> $_POST['applica'],
    ];

    echo '<pre>'; echo print_r($datas); echo '</pre>';

    $insert_datas = $db->insert("opportunity", $datas);

    if($insert_datas){
        
        $login_datas = [
            'Email' =>  $_POST['email'],
            'Password' => $db->PwdHash('123'),
            'Role'=> 'COMPANY',
        ];
        
        $ild = $db->insert("Credentials", $login_datas);

        if($ild){
            header("location:signin.php?msg=success");
        }else{
            echo "nop";
        }

    }else{
        echo "hazjaigia kwenye company"; 
    }

}

?>

















