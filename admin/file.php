<?php
   session_start();
   include('header.php');
   include('../connection.php');

   if(isset($_POST['submit']))
   {
     
      
       $filename = $_FILES['file']['name'];   
       $tempname = $_FILES['file']['tmp_name'];
       $folder="./upload/".$filename;
      move_uploaded_file($tempname, $folder);
      $query=mysqli_query($conn,"INSERT INTO file (file) VALUES ('$filename')");
       // echo $query;
       // exit();
       if ($query)
        {
         
       echo "<script>alert('You have successfully inserted the data');</script>";
       
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
               <div class="card">
                 
                     <div class="form-group"><label for="company" class=" form-control-label">Image</label><input type="file" name="file"></div>
                     <button id="payment-button" type="submit" name="submit" class="btn btn-primary">
                     <span id="payment-button-amount">Submit</span>
                     </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<?php include('footer.php');?>