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
                <h2>Update Group
                    <small>update the group details</small>
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
                        <form class="form-horizontal" id="form_validation" method="POST" action="<?php base_url('groups/edit');?>">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                 <label for="gname">Group Name</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8">
                                    <div class="form-group">
                                        <input type="text" id="group_name" class="form-control" name="group_name" placeholder="Enter group name"  value="<?php echo $group_data['group_name']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                             <label for="gname">Group Permissions</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8">
                                    <div class="form-group">
                   <?php $serialize_permission = unserialize($group_data['permission']); ?>                 						
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
                        <td><input type="checkbox" class="minimal" name="permission[]" id="permission" class="minimal" value="createUser" <?php if($serialize_permission) {
                          if(in_array('createUser', $serialize_permission)) { echo "checked"; } 
                        } ?> ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateUser" <?php 
                        if($serialize_permission) {
                          if(in_array('updateUser', $serialize_permission)) { echo "checked"; } 
                        }
                        ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewUser" <?php 
                        if($serialize_permission) {
                          if(in_array('viewUser', $serialize_permission)) { echo "checked"; }   
                        }
                        ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteUser" <?php 
                        if($serialize_permission) {
                          if(in_array('deleteUser', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                      </tr>
                      <tr>
                        <td>Groups</td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createGroup" <?php 
                        if($serialize_permission) {
                          if(in_array('createGroup', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateGroup" <?php 
                        if($serialize_permission) {
                          if(in_array('updateGroup', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewGroup" <?php 
                        if($serialize_permission) {
                          if(in_array('viewGroup', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteGroup" <?php 
                        if($serialize_permission) {
                          if(in_array('deleteGroup', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                      </tr>
				
                        <tr>
                        <td>Products</td>
                        <td><input type="checkbox" name="permission[]" id="" value="createProduct"  <?php 
                        if($serialize_permission) {
                          if(in_array('createProduct', $serialize_permission)) { echo "checked"; }  
                        }
                         ?> class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="" value="updateProduct"  <?php 
                        if($serialize_permission) {
                          if(in_array('updateProduct', $serialize_permission)) { echo "checked"; }  
                        }
                         ?> class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="" value="viewProduct"  <?php 
                        if($serialize_permission) {
                          if(in_array('viewProduct', $serialize_permission)) { echo "checked"; }  
                        }
                         ?> class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="" value="deleteProduct"  <?php 
                        if($serialize_permission) {
                          if(in_array('deleteProduct', $serialize_permission)) { echo "checked"; }  
                        }
                         ?> class="minimal"></td>
                      </tr>
                        
                        <tr>
                        <td>Orders</td>
                        <td><input type="checkbox" name="permission[]" id="" value="createOrder" <?php 
                        if($serialize_permission) {
                          if(in_array('createOrder', $serialize_permission)) { echo "checked"; }  
                        }
                         ?> class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="" value="updateOrder" <?php 
                        if($serialize_permission) {
                          if(in_array('updateOrder', $serialize_permission)) { echo "checked"; }  
                        }
                         ?> class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="" value="viewOrder" <?php 
                        if($serialize_permission) {
                          if(in_array('viewOrder', $serialize_permission)) { echo "checked"; }  
                        }
                         ?> class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="" value="deleteOrder" <?php 
                        if($serialize_permission) {
                          if(in_array('deleteOrder', $serialize_permission)) { echo "checked"; }  
                        }
                         ?> class="minimal"></td>
                      </tr>	
        
                      <tr>
                        <td>Profile</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewProfile" <?php if($serialize_permission) {
                          if(in_array('viewProfile', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Setting</td>
                        <td>-</td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateSetting" <?php if($serialize_permission) {
                          if(in_array('updateSetting', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
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