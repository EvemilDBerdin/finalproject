<?php
   session_start(); 
   $_SESSION['url'] = "http://localhost:8000/finalproject";
   if(isset($_SESSION['users_data'])){
      ($_SESSION['users_data']['role'] == 'student') ? header('location: '.$_SESSION['url'].'/public/student/') : ($_SESSION['users_data']['role'] == 'instructor' || $_SESSION['users_data']['role'] == 'dean') && header('location: '.$_SESSION['url'].'/public/instructor/');
   }
   
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Berdin Final Project</title>
   <!-- Favicon -->
   <link rel="shortcut icon" type="image/png" href="<?= $_SESSION['url'] ?>/public/assets/uploads/favicon.ico" />

   <!-- Library / Plugin Css Build -->
   <link rel="stylesheet" href="<?= $_SESSION['url'] ?>/public/assets/css/core/libs.min.css" />


   <!-- Hope Ui Design System Css -->
   <link rel="stylesheet" href="<?= $_SESSION['url'] ?>/public/assets/css/hope-ui.min.css?v=1.2.0" />

   <!-- Custom Css -->
   <link rel="stylesheet" href="<?= $_SESSION['url'] ?>/public/assets/css/custom.min.css?v=1.2.0" /> 

   <!-- Customizer Css -->
   <link rel="stylesheet" href="<?= $_SESSION['url'] ?>/public/assets/css/customizer.min.css" />
 
</head>

<body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
   <!-- loader Start -->
   <div id="loading">
      <div class="loader simple-loader">
         <div class="loader-body"></div>
      </div>
   </div>
   <!-- loader END -->

   <div class="wrapper">
      <section class="login-content">
         <div class="row m-0 align-items-center bg-white vh-100">
            <div class="col-md-6">
               <div class="row justify-content-center">
                  <div class="col-md-10">
                     <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                        <div class="card-body">
                           <a href="<?= $_SESSION['url'] ?>" class="navbar-brand d-flex align-items-center mb-3">
                           
                              <img src="<?= $_SESSION['url'] ?>/public/assets/uploads/favicon.ico" alt="logo" width="100">
                              
                              <h4 class="logo-title ms-3">Final Project</h4>
                           </a>
                           <form id="loginForm">
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label class="form-label">Email</label>
                                       <input type="email" class="form-control" name="users[email]" placeholder="Enter valid email">
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label class="form-label">Password</label>
                                       <input type="password" class="form-control" name="users[password]" placeholder="Enter valid password">
                                    </div>
                                 </div>
                                 <div class="col-lg-12 d-flex justify-content-between">
                                    
                                 </div>
                              </div>
                              <div class="d-flex justify-content-center mt-5">
                                 <button type="submit" class="btn btn-primary">Sign In</button>
                              </div>
                              <p class="mt-3 text-center">
                                 Don't have an account? <a href="register.php" class="text-underline">Click here to sign up.</a>
                              </p>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
               <img src="<?= $_SESSION['url'] ?>/public/assets/uploads/cpclogo.jpg" class="img-fluid gradient-main animated-scaleX" alt="images">
            </div>
         </div>
      </section>
   </div>
   <script>
      url = '<?= $_SESSION['url'] ?>';
   </script>

   <!-- Library Bundle Script -->
   <script src="<?= $_SESSION['url'] ?>/public/assets/js/core/libs.min.js"></script>
   <!-- <script src="<?= $_SESSION['url'] ?>/public/assets/js/jquery.js"></script> -->
   <!-- External Library Bundle Script -->
   <script src="<?= $_SESSION['url'] ?>/public/assets/js/core/external.min.js"></script>
 
 
   <script src="<?= $_SESSION['url'] ?>/public/assets/js/charts/dashboard.js"></script>  
 

   <!-- App Script -->
   <script src="<?= $_SESSION['url'] ?>/public/assets/js/hope-ui.js" defer></script>
    <script src="<?= $_SESSION['url'] ?>/public/assets/js/sweetalert2.js"></script>
   <script src="<?= $_SESSION['url'] ?>/public/assets/js/myscript.js"></script>
</body>

</html>