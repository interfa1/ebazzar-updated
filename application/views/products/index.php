<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Manage Products </h2>
             <small class="text-muted">List of products</small>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                     <li class="breadcrumb-item"><a href="<?php echo base_url('admin/');?>"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="<?php echo base_url('products/create') ?>">Add Product</a></li>
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
                  <th> </th>
                  <th>Product name</th>
                  <th>Category</th>
                  <th>Qty</th>
                 <th>Price</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php if($products_data): ?>                  
                    <?php foreach ($products_data as $k => $v): ?>
                      <tr>
                        <td>
                        <div class="pw_img">
                            <img src="<?php echo base_url($v['image']); ?>" style="height:100px; width:100px !important;">
                            </div></td>
                        <td><?php echo $v['name']; ?></td>
 <?php $category= $this->Model_products->getCategoryData($v['category']);?>
					    <td><?php echo $category['cat_name']; ?></td>
                        <td><?php echo $v['qty']; ?></td>
                        <td><?php echo $v['price']; ?></td>
                        <td><?php echo $v['description']; ?></td>

                        <td>
                          <?php if(in_array('updateProduct', $user_permission)): ?>
                            <a href="<?php echo base_url('products/edit/'.$v['id']) ?>" title="update"><i class="material-icons">create</i></a>
                          <?php endif; ?>
                          <?php if(in_array('deleteProduct', $user_permission)): ?>
                            <a href="<?php echo base_url('products/delete/'.$v['id']) ?>" title="delete"><i class="material-icons">remove_circle</i></a>
                          <?php endif; ?>
						 <?php if(in_array('viewProduct', $user_permission)): ?>
                            <a href="<?php echo base_url('products/view/'.$v['id']) ?>" title="view"><i class="material-icons">visibility</i></a>
                          <?php endif; ?>
                        </td>
                      
                      </tr>
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


