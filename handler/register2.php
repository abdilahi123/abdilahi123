
<?php

session_start();

require_once "DB.php";
$db = new DBHelper();


if (isset($_POST['submit'])) {
   
    
    $datas = array(
        'Company_Name' =>  $_POST['companyname'],
        'email' =>  $_POST['email'],
        'Password'=>  $_POST['password'],
        'Phone'=> $_POST['phone_no'],
        'Address'=> $_POST['address'],
 
    );
  
    $insert_datas = $db->insert("company", $datas);

    if($insert_datas){
        
        $login_datas = array(
            'Email' =>  $_POST['email'],
            'Password' =>  $db->PwdHash($_POST['Password']),
            'Role'=> 'COMPANY',
        );
        $ild = $db->insert("Credentials", $login_datas);

        if($ild){
            header("location:signin.php?msg=success");
        }else{
            echo "nop";
        }

    }else{
        // echo "hazjai gia kwenye company"; 
    }

}

?>











































<!-- 

// require 'connect.php';
// echo "1";
// if (isset($_POST['email'])) {
//     $Company_Name = $_POST['companyname'];
//     $email = $_POST['email'];
//     $Password= $_POST['password'];
//     $Phone_Number = $_POST['phone_number'];
//     $Address= $_POST['address'];


    

//         $sql = "INSERT INTO company(Company_Name,email,Password,Phone_Number,Address)
//                        VALUES('$Company_Name','$email','$Password','$Phone_Number','$Address')";
//         if (mysqli_query($conn, $sql)){
            
//             header("location: company_dashboard.php");
//         } else {
//             echo "error:" . $conn->error;
//         }
//     }


//  -->
