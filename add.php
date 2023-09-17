<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Record Page</title>
    <link href="form/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
  <!-- Content here -->
  <div class="row">
       <div class="col-md-3">
        
       </div>
       <div class="col-md-9 text-center">
         تعديل بيانات المستخدم
       </div>
       
   </div>
  <div class="row">
       <div class="col-md-3">
          
       </div>
       <div class="col-md-6 text-center">
      
  
    <?php
    $unerror = $emailerror = $passerror = $addresserror = "";
    if(isset($_POST['btnSub'])){
        $image = $_FILES['ImgSrc']['name'];
        $un = $_POST['un'];
        $email = $_POST['email'];
        $pass= $_POST['pass'];
        $address = $_POST['address'];
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
         
        

      include "functions.php";
      $file_name = rand(10000, 100000)."-".$image;
     
      move_uploaded_file($_FILES['ImgSrc']['tmp_name'], "form/images/$file_name");
      $sql = "insert into `users_tbl`(username, email, password, address, img_src)
              values('$un','$email','$pass','$address','$file_name')";
      $rs = dbQuery($sql);
      if($rs){
        echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
      }else{
        echo "Error";
      }
     }
    }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="un">
      <span class="text-danger"><?= $unerror ?></span>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email">
      <span class="text-danger"><?= $emailerror ?></span>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="pass">
      <span class="text-danger"><?= $passerror ?></span>
    </div>
  </div>
  
  <div class="row mb-3">
  <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">
    <select class="form-select" aria-label="Default select example" name="address">
  <option value="" selected>Select Your Address</option>

  <option value="1">Gaza</option>
  <option value="2">Khanyouns</option>
  <option value="3">Rafah</option>
</select>
<span class="text-danger"><?= $addresserror ?></span>
    </div>
  </div>

  <div class="row mb-3">
  <label for="iamge" class="col-sm-2 col-form-label">Photo</label>
    <div class="col-sm-10">
 
    <input type="file" name="ImgSrc" class="form-control">
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="btnSub">Add data</button>
</form>
    
       </div>
       <div class="col-md-3">
         
       </div>
   </div>
   
</div>
</body>
</html>