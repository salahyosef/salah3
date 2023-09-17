<?php  include "functions.php"; 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="form/css/bootstrap.min.css" rel="stylesheet">
    <link href="form/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
  <!-- Content here -->
  <div class="row">
       <div class="col-md-3">
          
       </div>
       <div class="col-md-9 text-center">
         
       </div>
       
   </div>
  <div class="row">
       <div class="col-md-3">
       <a href="logout.php">  <?= $_SESSION['name'] ?> </a>
       </div>
       <div class="col-md-10 text-center">
        
 <table class="table">
 <thead class="bg-primary"><br>
    <tr>
      <th scope="col">#</th>
      <th scope="col">الاسم</th>
      <th scope="col">الايميل </th>
      <th scope="col">العنوان</th>
      <th> الصورة </th>
      <th scope="col">الاجراء</th>
    </tr>
  </thead>
  <tbody>
    <?php
     
      $noOfRec= 3;
      
      if(isset($_GET['page'])){
        $page = $_GET['page'];
      }else{
        $page = 1;
      }
      $total = ($page-1) * $noOfRec;
      $sql = "SELECT * FROM `users_tbl` LIMIT  $total,  $noOfRec";
      $rs = dbQuery($sql);
      while($row=dbFetchArray($rs)){
    ?>
    <tr>
      <th scope="row"><?= $row[0]; ?></th>
      <td><?= $row[1]; ?></td>
      <td><?= $row[2]; ?></td>
      
      <td><?php if($row[4] == 1)
      { echo "Gaza";}
      elseif($row[4] == 2){
        echo "Khanyouns";
      }else{
        echo "Rafah";
      }
      
      ?>
      </td>
      
      <td>

      <?php
       if($row[5]==''){
        
       ?>
       
      <img src="form/images/no-image.png"   width="80" height="80">
       <?php }else{ ?>
       <img src="form/images/<?= $row[5] ?>"  width="80" height="80">

        <?php } ?>

      </td>
      <td><a href="edit.php?id=<?= $row[0];  ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> |
      <a href="delete.php?id=<?= $row[0];  ?>&img=<?= $row[5] ?>" onclick="return confirm('هل تريد بالتأكيد حذف هذا المستخدم؟')"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
      <!-- <td><a href="edit.php?id=<?= $row[0];  ?>">EDIT</a>|<a href="delete.php?id=<?= $row[0];  ?>&img=<?= $row[5] ?>" onclick="return confirm('هل تريد بالتأكيد حذف هذا المستخدم؟')">DELETE</a></td> -->
    </tr>
 <?php } ?>
 <tr class="table-secondary">
      <td colspan="5" align='left'>عدد الصفوف</td>
      <td><?= dbNumRows($rs); ?></td>
  
    </tr>

  
  </tbody>
  <tfoot>
    <tr class="table-dark">
      <th scope="col">#</th>
      <th scope="col">الاسم</th>
      <th scope="col">الايميل </th>
      <th scope="col">العنوان</th>
      <th scope="col">الصورة</th>
      <th scope="col">الاجرات</th>
    </tr>
  </tfoot>
</table>
<?php
   $query = "SELECT * FROM `users_tbl`";
   $res = dbQuery($query);
   $totalRec = dbNumRows($res); 
   $no_pages = ceil($totalRec / $noOfRec); 
   $nxt_page = $page + 1;
   $prv_page = $page - 1;

?>
<div style=" margin: auto; width: 30%;">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <?php if($prv_page == 0){ ?>
         
           <?php }else{ ?>
            <li class="page-item"><a class="page-link" href="?page=<?= $prv_page ?>">Previous</a></li>
           <?php }  ?>
          <?php for($i=1; $i <=$no_pages; $i++){ ?>
          <li class="page-item"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
           <?php } ?>
           <?php if($no_pages < $nxt_page){ ?>

           <?php }else{ ?>
          <li class="page-item"><a class="page-link" href="?page=<?= $nxt_page ?>">Next</a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
       </div>
       <div><a href="add.php"><i class="fa fa-plus-square" aria-hidden="true"></i></i></a></div>
       <div class="col-md-5">
         
       </div>
   </div>
   
</div>
</body>
</html>