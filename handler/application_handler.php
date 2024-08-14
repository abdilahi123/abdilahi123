<?php
session_start();

require_once "DB.php";
$db = new DBHelper();

$target_dir = "assets/letters/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$fileName = rand(1000, 1000000) . '.' . $fileType;
$uploadOk = 1;

echo $_POST['opportunityID'];

if (isset($_POST['confirm'])) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $fileName)) {
        $docData = array(
            'opportunityID' => $_POST['opportunityID'],
            'SpecialistID' => $_POST['SpecialistID'],
            'ApplicationDate'=> date("Y/M/d"),
            'LetterPath' => $fileName,
        );
        $insert_letter = $db->insert("applicants", $docData);
        if($insert_letter){
                header("location:it_specialist_dashboard.php?msg=success");
            }
    
        } else {
          echo "failed";
        }
        }

?>
  