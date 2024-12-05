<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Manage Users </h2>
             <small class="text-muted">List of users</small>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                     <li class="breadcrumb-item"><a href="<?php echo base_url('admin/');?>"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="<?php echo base_url('users/create') ?>">Add User</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        
        <!-- Exportable Table -->
        <div class="row clearfix"> 
            <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
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
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                           <thead>
                <tr>
<!--                  <th>Branch</th>-->
                  <th>Username</th>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Group</th>
                  <th>Status</th>
                  <th>Approval</th>
            
                  <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                  <th>Action</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                  <?php if($users_data): ?>                  
                    <?php foreach ($users_data as $k => $v): ?>
                      <tr>
<!--                        <td><?php// echo $v['user_branch']['b_name']; ?></td>-->
                        <td><?php echo $v['user_info']['username']; ?></td>
					    <td><?php echo $v['user_info']['email']; ?></td>
                        <td><?php echo $v['user_info']['name']; ?></td>
                        <td><?php echo $v['user_info']['phone']; ?></td>
                        <td><?php echo $v['user_group']['group_name']; ?></td>
						  <?php $status = ($v['user_info']['active'] == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-warning">Inactive</span>';?>
		                <td><?php echo $status; ?></td>
						   <?php $approval = ($v['user_info']['approved'] == 1) ? '<span class="badge badge-success">Approved</span>' : '<span class="badge badge-warning">Not Approved</span>';?>
		                <td><?php echo $approval; ?></td>
						
                        <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>

                        <td>
                          <?php if(in_array('updateUser', $user_permission)): ?>
                            <a href="<?php echo base_url('users/edit/'.$v['user_info']['id']) ?>" title="update"><i class="material-icons">create</i></a>
                          <?php endif; ?>
                          <?php if(in_array('deleteUser', $user_permission)): ?>
                            <a href="<?php echo base_url('users/delete/'.$v['user_info']['id']) ?>" title="delete"><i class="material-icons">remove_circle</i></a>
                          <?php endif; ?>
						 <?php if(in_array('viewUser', $user_permission)): ?>
                            <a href="<?php echo base_url('users/view/'.$v['user_info']['id']) ?>" title="view"><i class="material-icons">visibility</i></a>
                          <?php endif; ?>
                        </td>
                      <?php endif; ?>
                      </tr>
                    <?php endforeach ?>
                  <?php endif; ?>
                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table --> 
    </div>
</section>


