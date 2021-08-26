<?php
   //database connection  file
include('connection.php');
include('header.php');
?>
<header class="masthead" style="background-image: url('assets/img/manali.jpg')">
            <div class="container-fluid position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>Blogs</h1>
                            
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <main class="mb-4">
             <div class="container ">
                 
                <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php
                                 $res=mysqli_query($conn,"select * from blog where status=1");
                                 $row=mysqli_num_rows($res);
                                 if($row>0)
                                 {
                                 while ($row=mysqli_fetch_array($res))
                                  {
                                 
                                 ?>
           
  <div class="col-sm-4">
    <div class="card" >
      <a href="single_blog.php?id=<?php echo $row['id']?>"><img src="./admin/upload/<?php echo $row['image']?>" style="height:400px;" class="card-img-top" alt="..."></a>
      <div class="card-body">
        <h5 class="card-title"><?php  echo $row['title'];?></h5>
        <p class="card-text"><?php  echo $row['description'];?></p>
      </div>
    </div>
  </div>
  

                <?php }}?>
</div></div>

        </main>

        
           <?php include('footer.php');?>