<style>
.error{
 color:red;
}
</style>
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Create User
                    <small>fill the form to create new user</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/');?>"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('users/');?>">Manage Users</a></li>
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
                        <form class="form-horizontal" id="form_validation" method="POST" action="<?php echo base_url('users/create');?>" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                 <label for="gname">Upload Image</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8">
                                    <div class="form-group">
                                       <input type="file" class="form-control" id="changeProfile" name="picture" required>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                 <label for="gname">Select Group</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8">
                                    <div class="form-group">
                    				
								<select class="form-control show-tick z-index" data-live-search="true" name="groups">
                             <?php foreach ($group_data as $k => $v): ?>
                                    <option value="<?php echo $v['id'] ?>"><?php echo $v['group_name'] ?></option>
                                <?php endforeach; ?>
				            </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-2 form-control-label">
                                 <label for="name">Full Name</label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                       <input type="text" class="form-control"  name="name" placeholder="enter full name" required>
                                    </div>
                                </div>
                            
                                <div class="col-lg-2 col-md-2 col-sm-2 form-control-label">
                                 <label for="uname">Username</label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                       <input type="text" class="form-control"  name="username" placeholder="enter username" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-2 form-control-label">
                                 <label for="password">Password</label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                       <input type="password" class="form-control"  name="password" placeholder="enter password" required>
                                    </div>
                                </div>
                            
                                <div class="col-lg-2 col-md-2 col-sm-2 form-control-label">
                        <label for="cpassword">Confirm Password</label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                       <input type="password" class="form-control"  name="cpassword" placeholder="enter confirm password" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-2 form-control-label">
                                 <label for="phone">Mobile No.</label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                       <input type="text" class="form-control"  name="phone" placeholder="enter mobile number" required>
                                    </div>
                                </div>
                           
                                <div class="col-lg-2 col-md-2 col-sm-2 form-control-label">
                                 <label for="email">Email</label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                       <input type="email" class="form-control"  name="email" placeholder="enter email address" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                 <label for="address">Address</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8">
                                    <div class="form-group">
                                       <textarea class="form-control" name="address" placeholder="enter address"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-2 form-control-label">
                                 <label for="status">Status</label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                <select class="form-control" id="active" name="active">
								 <option value="1">Active</option>
								<option value="0">Inactive</option>
										</select>
                                    </div>
                                </div>
                           
                                <div class="col-lg-2 col-md-2 col-sm-2 form-control-label">
                                 <label for="approval">Approval</label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                <select class="form-control" id="approved" name="approved">
                    <option value="1">Approved</option>
				    <option value="0">Non-approved</option>
										</select>
                                    </div>
                                </div>
                            </div>
                              
                            <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Validation --> 
    </div>
</section>