<?php
   session_start();
   include('header.php');
   include('../connection.php');
   // print_r($_SESSION);
   //$email=$_SESSION['id'];
   if(isset($_POST['submit']))
   {
       $id = $_GET["id"];
      $category=$_POST['category'];
    $location="./upload/";
       $file_name = $_FILES['file']['name'];   
       $tmp_name = $_FILES['file']['tmp_name'];
      move_uploaded_file($tmp_name, $location.$file_name);
      $query=mysqli_query($conn,"UPDATE tbl_category SET category='$category', image='$file_name' where id='$id'");
       // echo $query;
       // exit();
       if ($query) {
         
       echo "<script>alert('You have successfully updated the data');</script>";
       echo "<script > document.location ='category.php'; </script>";
     }
     else
       {
         echo "<script>alert('Something Went Wrong. Please try again');</script>";
       }
   
      }
   
   ?>
<div class="content pb-0">
   <div class="animated fadeIn">
      <div class="row">
         <div class="col-lg-12">
            <form method="post" enctype="multipart/form-data">
               <?php
    $id=$_GET['id'];

    $res=mysqli_query($conn,"select * from tbl_category where id='$id'");
    while ($row=mysqli_fetch_array($res)) {
?>
               <div class="card">
                  <div class="card-header"><strong>Add Category</strong></div>
                  <div class="card-body card-block">
                     <div class="form-group"><label for="company" class=" form-control-label">Category</label><input type="text" value="<?php  echo $row['category'];?>" id="company" placeholder="Enter category name" name="category" class="form-control"></div>
                     <div class="form-group"><label for="company" class=" form-control-label">Image</label><input type="file" name="file" value="<?php  echo $row['image'];?>"></div>
                     <button id="payment-button" type="submit" name="submit" class="btn btn-primary">
                     <span id="payment-button-amount">Submit</span>
                     </button>
                  </div>
               </div>
            <?php }?>
            </form>
         </div>
      </div>
   </div>
</div>
<?php include('footer.php');?>