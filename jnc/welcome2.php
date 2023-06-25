<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Jennys College of Nursing</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/mycss.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">

  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor - v4.6.0
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"fetch2.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_content').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, query);
    });

    $('#search_box').keyup(function(){
      var query = $('#search_box').val();
      load_data(1, query);
    });

  });
</script>
  <style>
    li{
      font-size: 16px;
    }
    p{
      font-size: 16px;
    }
    table tr{
  height: 40px;
}

table td p
{
  margin-top: 5px;
  color: white;
  font-family:Poppins, sans-serif;
}
table td p a
{
  color:white;
  border: 1px solid white;
  border-radius: 3px;
  font-size: 15px;
}

.page-item.active .page-link
{
  background-color: #004a99;
  border-color: #004a99;
}




    

  </style>
</head>

<body>

  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href=""><img src="../assets/img/logo.png">Jennys College of Nursing</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="../index.html" class="logo me-auto"><img src="../assets/img/logo.png" alt="" class="img-fluid"></a>-->

     

    <!--<a href="../courses.html" class="get-started-btn">Get Started</a>--> 

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
 

  <main id="main" style="margin-top:150px;">

  
  
<div class="col-lg-12" style="text-align:right;right:80px">
<?php
if($_SESSION["name"]) {
?>
Welcome <?php echo $_SESSION["name"]; ?>. <a href="logout.php" tite="Logout">Logout.</a>
<?php
}else echo "<h1>Please login first .</h1>";
?>
</div>
<?php
if($_SESSION["name"]) {
?>
<div class="container">
      <br />
      <div class="card" style="border:none">
        <div class="card-body">

          <div class="form-group" >

            <input type="text" name="search_box" id="search_box" style="width:200px" class="form-control" placeholder="Search Name" />

        </div>
          <div class="table-responsive" id="dynamic_content" style="width:1200px">
            
          </div>
        </div>
      </div>
    </div>
    <?php
}
?>



      


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 <!-- ======= Footer ======= -->
 

  <div id="preloader"></div>
  <a href="../#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>
