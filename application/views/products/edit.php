<style>
.error{
 color:red;
}
</style>
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Update Product
                    <small>update / change the product details</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/');?>"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('products/');?>">Manage Products</a></li>
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
                        <form class="form-horizontal" id="form_validation" method="POST" action="<?php echo base_url('products/edit/'.$product_data['id']);?>" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                 <label for="gname">Upload Image</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8">
                                    <div class="form-group">
                                       <input type="file" class="form-control" id="changeProfile" name="picture" >
                                    </div>
                                </div>
                            </div>
                            <input type="text" class="form-control"  name="old_pic" value="<?php echo $product_data['image']; ?>" >
                            
                             <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                 <label for="gname">Select Category</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8">
                                    <div class="form-group">
                    				
								<select class="form-control show-tick z-index" data-live-search="true" name="category">
                                    <option value="0">Select category</option>
                                    <option value="1" <?php if(1 == $product_data['category']) { echo 'selected="selected"'; } ?>>Grocery</option><option value="2" <?php if(2 == $product_data['category']) { echo 'selected="selected"'; } ?>>Dairy</option><option value="3" <?php if(3 == $product_data['category']) { echo 'selected="selected"'; } ?>>Medicine</option>
				            </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-2 form-control-label">
                                 <label for="name">Product Name</label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                       <input type="text" class="form-control"  name="name" value="<?php echo $product_data['name']; ?>" placeholder="enter product name" required>
                                    </div>
                                </div>
                            
                                <div class="col-lg-2 col-md-2 col-sm-2 form-control-label">
                                 <label for="uname">Price</label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group">
                                       <input type="text" class="form-control"  name="price" value="<?php echo $product_data['price']; ?>" placeholder="enter price" required>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                 <label for="description">Description</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8">
                                    <div class="form-group">
                                       <textarea class="form-control" name="description" placeholder="enter description" value="<?php echo $product_data['description']; ?>" ></textarea>
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