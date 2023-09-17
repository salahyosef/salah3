<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record </title>
    <link href="form/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
  <!-- Content here -->
  <div class="row">
       
       <div class="col-md-9 text-center">
         
       </div>
       
   </div>
  <div class="row">
      
       <div class="col-md-6 text-center">
      
  
    <?php
     $unerror = $emailerror = $passerror = $addresserror="";
    include "functions.php";
    $id = $_GET['id'];
    $sql1 = "SELECT * FROM users_tbl WHERE id = $id";
    $res = dbQuery($sql1);
    $row = dbFetchArray($res);
   
    ?>
    <form action="update.php?id=<?= $row[0] ?>" method="post" enctype="multipart/form-data">
    <button type="submit" class=" btn-primary" name="btnEdit">اضافة بيانات</button>
  <button type="button" onclick="document.location.href='index.php'" class=" btn-danger">الغاء</button>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" value ="<?= $row[1] ?>" class="form-control" name="un">
      <span class="text-danger"><?= $unerror ?></span>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" value ="<?= $row[2] ?>" class="form-control" name="email">
      <span class="text-danger"><?= $emailerror ?></span>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" value ="<?= $row[3] ?>" class="form-control" name="pass">
      <span class="text-danger"><?= $passerror ?></span>
    </div>
  </div>
  
  <div class="row mb-3">
  <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">
    <select class="form-select" aria-label="Default select example" name="address">
  <option value="" selected>Select Your Address</option>

  <option value="1" <?php if($row[4] == 1){?> SELECTED <?php } ?>>Gaza</option>
  <option value="2" <?php if($row[4] == 2){?> SELECTED <?php } ?>>Khanyouns</option>
  <option value="3" <?php if($row[4] == 3){?> SELECTED <?php } ?>>Rafah</option>
</select>
<span class="text-danger"><?= $addresserror ?></span>
    </div>
  </div>
  <div class="row mb-3">


  <label for="iamge" class="col-sm-2 col-form-label">Photo</label>
    <div class="col-sm-10">
     <div>
       <?php
       if($row[5]==''){
       ?>
      <img src="form/images/no-image.png" class="img-thumbnail"  width="125" height="125">
       <?php }else{ ?>
       <img src="form/images/<?= $row[5] ?>" class="img-thumbnail"  width="125" height="125">

        <?php } ?>
     </div>
     <div class="clearfix">&nbsp; </div>
    <input type="file" name="ImgSrc" class="form-control">
    <input type="hidden" value="<?= $row[5] ?>" name="oldImg">
    </div>
    
  </div>
  
</form>
    
       </div>
       <div class="col-md-3">
         
       </div>
   </div>
   
</div>
</body>
</html>