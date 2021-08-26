<?php
//database connection  file
include('connection.php');
include('header.php');
   if(isset($_POST['submit']))
   {
      $name=$_POST['name'];
         $email=$_POST['email'];
      $message=$_POST['message'];

      $query=mysqli_query($conn,"INSERT INTO tbl_work (name,email,message) VALUES ('$name','$email','$message')");
       // echo $query;
       // exit();
       if ($query) {
         
       echo "<script>alert('Form Submitted Succesfully');</script>";
     }
     else
       {
         echo "<script>alert('Something Went Wrong. Please try again');</script>";
       }
   
      }
?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/home.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h4>Welcome</<h4>
                        <h6>to</h6>
                        <h2>"One Step Forward"</h2>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- Post preview-->
            <div class="post-preview">
                <?php
                
                                 $res=mysqli_query($conn,"select * from blog where status=1 LIMIT 3 ");
                                 $row=mysqli_num_rows($res);
                                 if($row>0)
                                 {
                                 while ($row=mysqli_fetch_array($res))
                                  {
                                 
                                 ?>

                <a href='single_blog.php?id=<?php echo $row['id']?>'>

                    <h2 class="post-title" style="font-size:30px;"><?php echo $row['title']; ?></h2>
                    <h3 class="post-subtitle" style="font-size: 20px;"><?php echo $row['description']; ?></h3>
                </a>
             
                <?php
            }
        }
    ?>
            </div>
            
            <!-- Divider-->
            <hr class="my-4" />
            <!-- Pager-->
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="blog.php">Older Posts →</a></div>
        </div>
    </div>
</div>

        <div class="container mt-3">
        
        <div class="row">
            <div class="col-md-6">
                <div class="demo-content"><h3>About Me</h3>
                <div class="demo-content" style="font-size: 15px;">I’m one of the top travel vloggers on YouTube who travels the world and shares my experiences and travel expertise through my videos and on Instagram..

My travel credentials include over 51+ countries visited, all photographed and recorded on video over the last 9 years and shared to my over 463,000+ subscribers on my YouTube channel. Whether you’re new to travel or a seasoned globetrotter, be sure to check out my content which is full of advice, hacks, and adventures to help and inspire your next trip..</div>
<div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="about.php">Learn More→</a></div>
            </div>
        </div>
            <div class="col-md-6">
                <div class="demo-content bg-alt"><img style="width: 100%;" src="assets/img/manali.jpg"></div>
            </div>
        </div>
    </div>




<header class="masthead" style="background-image: url('assets/img/work.jpg');height: 400px;">
    <div class="container position-relative px-4 px-lg-5" style="top:-100px;">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Work with Me</h1>
                    <p class="subheading text-warning" ><strong style="color: white;">I love to share my knowledge ,my experience and video expertise in all forms of media!</strong></p>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p class="text-warning" ><strong>Want to work with us?<br>Your project is very important to us.</strong></p>
                <div class="my-4">
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN" method="post">
                        <div class="form-floating">
                            <input class="form-control" id="name" type="text" name="name" placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="name">Name</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="email" type="email" name="email" placeholder="Enter your email..." data-sb-validations="required,email" />
                            <label for="email">Email address</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        
                        <div class="form-floating">
                            <textarea class="form-control" id="message" name="message" placeholder="Enter your message here..." style="height: 12rem" data-sb-validations="required"></textarea>
                            <label for="message">Message</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                        </div>
                        <br />

                       
                        <button id="payment-button" type="submit" name="submit" class="btn btn-primary ">
                            Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include('footer.php'); ?>