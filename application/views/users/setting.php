<style>
.error{
 color:red;
}
</style>
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>User Setting
                    <small>update / change the user settings</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/');?>"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                    
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        
        <!-- Basic Validation -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body">
                     <?php if($this->session->flashdata('success')): ?>
                        <div class="alert alert-success" role="alert">
                        <div class="container">
                            <div class="alert-icon">
                                <i class="zmdi zmdi-thumb-up"></i>
                            </div>
                            <strong>Well done!</strong> 
                        <?php echo $this->session->flashdata('success'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">
                                <i class="zmdi zmdi-close"></i>
                            </span>
                        </button>
                        </div>
                        </div>

                <?php elseif($this->session->flashdata('error')): ?>
				<div class="alert alert-danger" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="zmdi zmdi-block"></i>
                    </div>
                    <strong>Oh snap!</strong> 
                    <?php echo $this->session->flashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="zmdi zmdi-close"></i>
                        </span>
                    </button>
                </div>
                </div>
							 
				<?php elseif(!empty(validation_errors())): ?>
				<div class="alert alert-warning" role="alert">
                <div class="container">
                    <div class="alert-icon">
                        <i class="zmdi zmdi-notifications"></i>
                    </div>
                    <strong>Warning!</strong> 
                    <?php echo validation_errors(); ?>  
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="zmdi zmdi-close"></i>
                        </span>
                    </button>
                </div>
                </div>	  
					<?php endif; ?>
                        <form class="form-horizontal" id="form_validation" method="POST" action="<?php base_url('users/setting');?>" enctype="multipart/form-data">
                        
                            
                            
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-2 form-control-label">
                                 <label for="name">Full Name</label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                       <input type="text" class="form-control"  name="name" placeholder="enter full name" value="<?php echo $user_data['name'] ?>" required>
                                    </div>
                                </div>
                            
                                <div class="col-lg-2 col-md-2 col-sm-2 form-control-label">
                                 <label for="uname">Username</label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                       <input type="text" class="form-control"  name="username" placeholder="enter username" value="<?php echo $user_data['username'] ?>" required>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="alert alert-info" role="alert">
<div class="container">
    <div class="alert-icon">
        <i class="zmdi zmdi-alert-circle-o"></i>
    </div>
     <strong>Heads up!</strong>Skip the password field empty, if you dont want to change.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">
            <i class="zmdi zmdi-close"></i>
        </span>
    </button>
</div>
</div>
                            
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-2 form-control-label">
                                 <label for="password">Password</label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                       <input type="password" class="form-control"  name="password" placeholder="enter password" >
                                    </div>
                                </div>
                            
                                <div class="col-lg-2 col-md-2 col-sm-2 form-control-label">
                        <label for="cpassword">Confirm Password</label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                       <input type="password" class="form-control"  name="cpassword" placeholder="enter confirm password" >
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-2 form-control-label">
                                 <label for="phone">Mobile No.</label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                       <input type="text" class="form-control"  name="phone" value="<?php echo $user_data['phone'] ?>" placeholder="enter mobile number" required>
                                    </div>
                                </div>
                           
                                <div class="col-lg-2 col-md-2 col-sm-2 form-control-label">
                                 <label for="email">Email</label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                       <input type="email" class="form-control"  name="email" value="<?php echo $user_data['email'] ?>" placeholder="enter email address" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                 <label for="address">Address</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8">
                                    <div class="form-group">
                                       <textarea class="form-control" name="address" placeholder="enter address"><?php echo $user_data['address'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            
                              
                            <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit">UPDATE SETTINGS</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Validation --> 
    </div>
</section>