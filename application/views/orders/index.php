<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Manage Orders </h2>
             <small class="text-muted">List of orders</small>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                     <li class="breadcrumb-item"><a href="<?php echo base_url('admin/');?>"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
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
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable" style="width:100%">
                           <thead>
                <tr>
                  <th>Date</th>
                  <th>Order No.</th>
                  <th>Customer Name</th>
                  <th>Mobile</th>
                 <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $user_id = $_SESSION['id'];
                    if($order_data): ?>                  
                    <?php foreach ($order_data as $k => $v):
                                        if($v['vendor_id']==$user_id): ?>                  
                      <tr>
                        <td><?php echo $v['order_date']; ?></td>
                        <td><?php echo $v['bill_no']; ?></td>
					    <td><?php echo $v['name']; ?></td>
                        <td><?php echo $v['mobile']; ?></td>
                       <?php if($v['confirm'] == 1){ $status = '<span class="badge badge-success">confirm</span>'; }elseif($v['confirm'] == 2){ $status = '<span class="badge badge-danger">rejected</span>';}else{ $status = '<span class="badge badge-warning">pending</span>'; }?>
		                <td><?php echo $status; ?></td>
                        <td>
                          <?php if(in_array('updateOrder', $user_permission)): ?>
                         <?php if($v['confirm'] == 0):?>
                            <a href="<?php echo base_url('orders/edit/'.$v['order_id']) ?>" title="update"><i class="material-icons">create</i></a>
                          <?php endif; ?>
                          <?php endif; ?>
						 <?php if(in_array('viewOrder', $user_permission)): ?>
                            <a href="<?php echo base_url('orders/view/'.$v['order_id']) ?>" title="view"><i class="material-icons">visibility</i></a>
                          <?php endif; ?>
                        </td>
                      
                      </tr>
                     <?php endif; ?>
                    <?php endforeach; ?>
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


