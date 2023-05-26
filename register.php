<?php
   session_start(); 
   if(isset($_SESSION['users_data'])){
      ($_SESSION['users_data']['role'] == 0) ? header('location: '.$_SESSION['url'].'/public/student/') : ($_SESSION['users_data']['role'] > 0) && header('location: '.$_SESSION['url'].'/public/instructor/');
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="<?= $_SESSION['url'] ?>/public/assets/uploads/favicon.ico" />
      
    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="<?= $_SESSION['url'] ?>/public/assets/css/core/libs.min.css" />
    
    
    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="<?= $_SESSION['url'] ?>/public/assets/css/hope-ui.min.css?v=1.2.0" />
    
    <!-- Custom Css -->
    <link rel="stylesheet" href="<?= $_SESSION['url'] ?>/public/assets/css/custom.min.css?v=1.2.0" />
    
    <!-- Dark Css -->
    <link rel="stylesheet" href="<?= $_SESSION['url'] ?>/public/assets/css/dark.min.css"/>
    
    <!-- Customizer Css -->
    <link rel="stylesheet" href="<?= $_SESSION['url'] ?>/public/assets/css/customizer.min.css" />
    
    <!-- RTL Css -->
    <link rel="stylesheet" href="<?= $_SESSION['url'] ?>/public/assets/css/rtl.min.css"/>
</head>
<body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body"></div>
      </div>    </div>
    <!-- loader END -->
    
      <div class="wrapper">
      <section class="login-content">
         <div class="row m-0 align-items-center bg-white vh-100">            
               <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
               <img src="<?= $_SESSION['url'] ?>/public/assets/uploads/cpclogo.jpg" class="img-fluid gradient-main animated-scaleX" alt="images">
            </div>
            <div class="col-md-6">               
               <div class="row justify-content-center">
                  <div class="col-md-10">
                     <div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
                        <div class="card-body">
                           <a href="index.php" class="navbar-brand d-flex align-items-center mb-3">
                              <!--Logo start-->
                              <img src="<?= $_SESSION['url'] ?>/public/assets/uploads/favicon.ico" alt="logo" width="100">
                              <!--logo End-->                              
                              <h4 class="logo-title ms-3">Final Project</h4>
                           </a>
                           <h2 class="mb-2 text-center">Sign Up</h2> 
                           <form id="registerForm">
                              <div class="row">  
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="email" class="form-label">Email</label>
                                       <input type="email" class="form-control" name="data[email]" id="email" required>
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="password" class="form-label">Password</label>
                                       <input type="password" class="form-control" name="data[password]" id="password" required>
                                    </div>
                                 </div> 
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="confirm-password" class="form-label">Confirm Password</label>
                                       <input type="password" class="form-control" id="confirm-password" name="cpwd" required>
                                    </div>
                                 </div>
                                 <div class="col-lg-12 d-flex justify-content-center">
                                    <div class="form-check mb-3">
                                       <input type="checkbox" class="form-check-input" id="customCheck1" required>
                                       <label class="form-check-label" for="customCheck1">I agree with the terms of use</label>
                                    </div>
                                 </div>
                              </div>
                              <div class="d-flex justify-content-center">
                                 <button type="submit" class="btn btn-primary">Sign Up</button>
                              </div> 
                              <p class="mt-3 text-center">
                                 Already have an Account <a href="index.php" class="text-underline">Sign In</a>
                              </p>
                           </form>
                        </div>
                     </div>    
                  </div>
               </div>            
            </div>   
         </div>
      </section>
      </div>

   <script>
      url = '<?= $_SESSION['url'] ?>';
   </script>
    <!-- Library Bundle Script -->
    <script src="<?= $_SESSION['url'] ?>/public/assets/js/core/libs.min.js"></script>
    
    <!-- External Library Bundle Script -->
    <script src="<?= $_SESSION['url'] ?>/public/assets/js/core/external.min.js"></script>
    
    <!-- Widgetchart Script -->
    <script src="<?= $_SESSION['url'] ?>/public/assets/js/charts/widgetcharts.js"></script>
    
    <!-- mapchart Script -->
    <script src="<?= $_SESSION['url'] ?>/public/assets/js/charts/vectore-chart.js"></script>
    <script src="<?= $_SESSION['url'] ?>/public/assets/js/charts/dashboard.js" ></script>
    
    <!-- fslightbox Script -->
    <script src="<?= $_SESSION['url'] ?>/public/assets/js/plugins/fslightbox.js"></script>
    
    <!-- Settings Script -->
    <script src="<?= $_SESSION['url'] ?>/public/assets/js/plugins/setting.js"></script>
    
    <!-- Slider-tab Script -->
    <script src="<?= $_SESSION['url'] ?>/public/assets/js/plugins/slider-tabs.js"></script>
    
    <!-- Form Wizard Script -->
    <script src="<?= $_SESSION['url'] ?>/public/assets/js/plugins/form-wizard.js"></script>
    
    <!-- AOS Animation Plugin-->
    
    <!-- App Script -->
    <script src="<?= $_SESSION['url'] ?>/public/assets/js/hope-ui.js" defer></script>
    <script src="<?= $_SESSION['url'] ?>/public/assets/js/sweetalert2.js"></script>
   <script src="<?= $_SESSION['url'] ?>/public/assets/js/myscript.js"></script>
  </body>
</html>