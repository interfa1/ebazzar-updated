<style>
.error{
 color:red;
}
</style>
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Product Details
                    <small><?php ?></small>
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
        			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title"><?php echo $product_data['name'];?></div>
								</div>
								<div class="card-body">
								<div class="row clearfix">
                                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                                    <div class="pw_img">
                                        <img class="img-responsive" src="<?php echo base_url($product_data['image']);?>" alt="About the image">
                                    </div>
                                </div>
                                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12">
                            <table class="table"> 
                                <tr>
                                  <th>Product Name</th>
                                  <td><?php echo $product_data['name']; ?></td>
                                </tr>
                                <tr>
                                  <th>Product Category</th>
                                    <?php $category=''; if($product_data['category'] == 1){ $category='Cold-Press Oil';} elseif($product_data['category'] == 2){ $category='Namkins';} elseif($product_data['category'] == 3){ $category='Aachar';} elseif($product_data['category'] == 4){ $category='Organic Tea';}  elseif($product_data['category'] == 2){ $category='Organic Spices';};?>
                                    <td><?php echo $category; ?></td>
                                </tr>
                                <tr>
                                  <th>Price</th>
                                  <td><?php echo $product_data['price']; ?></td>
                                </tr>
                                <tr>
                                  <th>Description</th>
                                  <td><?php echo $product_data['description']; ?></td>
                                </tr>
                      </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>