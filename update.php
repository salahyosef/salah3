<?php
$id = $_GET['id'];
include "functions.php";
 if(isset($_POST['btnEdit'])){
    $image = $_FILES['ImgSrc']['name'];
     $un = $_POST['un'];
     $email = $_POST['email'];
     $pass= $_POST['pass'];
     $address = $_POST['address'];
     $oldImg =  $_POST['oldImg'];
     if($un == ''){
      $unerror = "Please Enter User name";
     }
    if($email == ""){
         $emailerror = "Please Enter Your Email";
     }
    if(empty($pass)){
         $passerror = "Please Enter Your Password";
     }
     if(empty($address)){
         $addresserror = "Please Enter Your Address";
     }else{
    if($image== ''){
   $sql = "UPDATE  `users_tbl` SET
          username = '$un', 
          email = '$email', 
          password = '$pass', 
          address = '$address'
          WHERE id = $id";
           
   $rs = dbQuery($sql);
   if($rs){
     echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
   }else{
     echo "Error";
   }
    }else{
        //update Image and other data
        $file_name = rand(10000, 100000)."-".$image;
     
      move_uploaded_file($_FILES['ImgSrc']['tmp_name'], "form/images/$file_name");
      $sql = "UPDATE  `users_tbl` SET
          username = '$un', 
          email = '$email', 
          password = '$pass', 
          address = '$address',
          img_src = '$file_name'
          WHERE id = $id";
           
   $rs = dbQuery($sql);
   if($rs){
    @unlink('form/images/'.$oldImg);
     echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
   }else{
     echo "Error";
   }
    }
  }
 }

?>