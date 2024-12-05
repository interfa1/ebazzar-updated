<style>
.error{
 color:red;
}
</style>
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>User Details
                    <small>User details</small>
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
            <div class="col-lg-6 col-md-6 col-sm-6">
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
                        <form class="form-horizontal" id="form_validation" method="POST" action="<?php echo base_url('users/profile');?>" enctype="multipart/form-data">
                            
                            
                               
                            
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                 <label for="gname">Logo</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8">
                                     <div class="pw_img">
                                            <img class="img-responsive" src="<?php echo base_url($user_data['logo']); ?>" alt="Logo not found">
                                        </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                 <label for="gname">Upload Logo</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8">
                                    <div class="form-group">
                                       <input type="file" name="logo" class="form-control" placeholder="file upload" required>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                 <label for="address">Shop Name</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8">
                                    <div class="form-group">
                                       <input type="text" name="shop_name" class="form-control" placeholder="enter customer name / organization name" value="<?php echo $user_data['shop_name'];?>" required>
                                    </div>
                                </div>
                            </div>
                            
                           
                              
                            <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        
        
        
        			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title"><?php echo $page_title;?></div>
								</div>
								<div class="card-body">
								<div class="row clearfix">
					<table class="table"> <tr>
                  <th>Username</th>
                  <td><?php echo $user_data['username']; ?></td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td><?php echo $user_data['email']; ?></td>
                </tr>
                <tr>
                  <th>Name</th>
                  <td><?php echo $user_data['name']; ?></td>
                </tr>
               
                
                <tr>
                  <th>Phone</th>
                  <td><?php echo $user_data['phone']; ?></td>
                </tr>
                <tr>
                    <?php $group_data = $this->Model_users->getUserGroup($user_data['id']);?>
                  <th>Group</th>
                  <td><?php echo $group_data['group_name']; ?></td>
                </tr>
					<tr>
                  <th>Status</th>
                  <td><?php echo ($user_data['active'] == 1) ? 'Active' : 'Inactive'; ?></td>
                </tr>
				<tr>
                  <th>Approval Status</th>
                  <td><?php if($user_data['approved'] == 1){
                             echo "approved"; }else {echo "not approved"; }
                      ?>
                </tr>
              </table>
							    	</div>
								</div>
							</div>
						</div>
					</div>
        
    </div>
</section>