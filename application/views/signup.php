<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="E-Bazzar">

    <title>:: E-Bazzar | sign-Up ::</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/authentication.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/color_skins.css">
</head>

<body class="theme-cyan authentication sidebar-collapse">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
    <div class="container">        
        <div class="navbar-translate n_logo">
            <a class="navbar-brand" href="#" title="" target="_blank">E-Bazzar</a>
            <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('admin/index');?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Search Result</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" title="Follow us on Twitter" href="#" target="_blank">
                        <i class="zmdi zmdi-twitter"></i>
                        <p class="d-lg-none d-xl-none">Twitter</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" title="Like us on Facebook" href="#" target="_blank">
                        <i class="zmdi zmdi-facebook"></i>
                        <p class="d-lg-none d-xl-none">Facebook</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" title="Follow us on Instagram" href="#" target="_blank">                        
                        <i class="zmdi zmdi-instagram"></i>
                        <p class="d-lg-none d-xl-none">Instagram</p>
                    </a>
                </li>                
                <li class="nav-item">
                    <a class="nav-link btn btn-primary btn-round" href="<?php echo base_url('auth/login');?>">SIGN IN</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="page-header">
    <div class="page-header-image" style="background-image:url(<?php echo base_url();?>assets/images/login.jpg)"></div>
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="card-plain">
               <form class="form" method="post" action="<?php echo base_url('auth/signup');?>">
                    <div class="header">
                        <div class="logo-container">
                            <img src="<?php echo base_url();?>assets/images/logo.svg" alt="">
                        </div>
                        <h5>Sign Up</h5>
                        <span>Register a new membership</span>
                    </div>
                    <div class="content">                                                
                    <div class="row clearfix jsdemo-notification-button">
                 <?php if(!empty($errors) || !empty(validation_errors())):?>
    				
                    <div  class=" alert alert-danger" data-placement-from="top" data-placement-align="center"  data-color-name="alert-danger"> 
                        <?php if(!empty($errors)):echo $errors; endif;?>
                        <?php if(!empty(validation_errors())): 
                            echo validation_errors();   
                        endif; ?>  
				 </div>
				<?php endif; ?>
								
				<?php if($this->session->flashdata('success')): ?>
									
				<div class="alert alert-success" data-placement-from="top" data-placement-align="center"  data-color-name="alert-success"> 
				 <?php echo $this->session->flashdata('success'); ?>
				</div>

				<?php elseif($this->session->flashdata('error')): ?>
				    
                <div class="alert alert-danger" data-placement-from="top" data-placement-align="center" data-color-name="alert-danger"> 
				 <?php echo $this->session->flashdata('error'); ?>
             </div>
                <?php endif; ?>
        </div>    
                        
                        
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter User Name" name="username">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Full Name" name="name">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter mobile number" name="phone">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Email" name="email">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-email"></i>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="password" placeholder="Password" class="form-control" name="password"/>
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                        </div>         
                    </div>
                    <div class="checkbox">
                            <input id="terms" type="checkbox" checked readonly>
                            <label for="terms">
                                    I read and agree to the <a href="javascript:void(0);">terms of usage</a>
                            </label>
                        </div>
                    <div class="footer text-center">
                        <input type="submit"  value="SIGN UP" name="submit" class="btn l-cyan btn-round btn-lg btn-block waves-effect waves-light">
                        <h6 class="m-t-20"><a class="link" href="<?php echo base_url('admin/signin');?>">You already have a membership?</a></h6>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <nav>
                <ul>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </nav>
            <div class="copyright">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>,
                <span>Designed by <a href="https://www.interface11.com" target="_blank">Interface11</a></span>
            </div>
        </div>
    </footer>
</div>


<!-- Jquery Core Js -->
<script src="<?php echo base_url();?>assets/bundles/libscripts.bundle.js"></script>
<script src="<?php echo base_url();?>assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script src="<?php echo base_url();?>assets/plugins/bootstrap-notify/bootstrap-notify.js"></script> <!-- Bootstrap Notify Plugin Js -->

<script src="<?php echo base_url();?>assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="<?php echo base_url();?>assets/js/pages/ui/notifications.js"></script> <!-- Custom Js -->
<script>
   $(".navbar-toggler").on('click',function() {
    $("html").toggleClass("nav-open");
});

$('.form-control').on("focus", function() {
    $(this).parent('.input-group').addClass("input-group-focus");
}).on("blur", function() {
    $(this).parent(".input-group").removeClass("input-group-focus");
});
</script>
</body>

</html>