<style>
.error{
 color:red;
}
     /* Hide the default checkbox */ 
        input[type=checkbox] { 
          width: 30px;
			height: 25px;
        } 
</style>
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Create Group
                    <small>fill the form to create new group</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/');?>"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('groups/');?>">Manage Groups</a></li>
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
                        <form class="form-horizontal" id="form_validation" method="POST" action="<?php echo base_url('groups/create');?>">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                 <label for="gname">Group Name</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <input type="text" id="group_name" class="form-control" name="group_name" placeholder="Enter group name" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                             <label for="gname">Group Permissions</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8">
                                    <div class="form-group">
                                    						
				<table  class="table table-bordered dt-responsive nowrap">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Create</th>
                        <th>Update</th>
                        <th>View</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Users</td>
						  <td><input type="checkbox" name="permission[]" id="" value="createUser" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="" value="updateUser" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="" value="viewUser" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="" value="deleteUser" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Groups</td>
                        <td><input type="checkbox" name="permission[]" id="" value="createGroup" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="" value="updateGroup" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="" value="viewGroup" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="" value="deleteGroup" class="minimal"></td>
                      </tr>
						<tr>
                        <td>Products</td>
                        <td><input type="checkbox" name="permission[]" id="" value="createProduct" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="" value="updateProduct" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="" value="viewProduct" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="" value="deleteProduct" class="minimal"></td>
                      </tr>
					   <tr>
                        <td>Orders</td>
                        <td><input type="checkbox" name="permission[]" id="" value="createOrder" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="" value="updateOrder" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="" value="viewOrder" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="" value="deleteOrder" class="minimal"></td>
                      </tr>	
                      
                     <tr>
                        <td>Reports</td>
                        <td> <input type="checkbox" name="permission[]" id="" value="visitReport" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="" value="inspectionReport" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="" value="viewReport" class="minimal"></td>
                        <td> - </td>
                      </tr>
        
                      <tr>
                        <td>Profile</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="" value="viewProfile" class="minimal"></td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Setting</td>
                        <td>-</td>
                        <td><input type="checkbox" name="permission[]" id="" value="updateSetting" class="minimal"></td>
                        <td> - </td>
                        <td> - </td>
                      </tr>
                    </tbody>
                  </table>
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