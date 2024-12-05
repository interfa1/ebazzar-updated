<style>
.error{
 color:red;
}
</style>
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Create Product
                    <small>fill the form to add new product</small>
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
                        <form class="form-horizontal" id="form_validation" method="POST" action="<?php echo base_url('products/create');?>" enctype="multipart/form-data">
            <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">         				
    <table id="product_info_table" class="table table-bordered data-table">
              <thead>
                <tr>
				  <th style="width:15%">Category</th>
				  <th style="width:15%">Image</th>
                  <th style="width:15%">Name</th>
                  <th style="width:15%">Quantity</th>
                  <th style="width:15%">Price</th>
                  <th style="width:20%">Description</th>
				  <th style="width:5%"><button type="button" id="add_row" class="btn btn-primary"><i class="zmdi zmdi-plus"></i></button></th>
                </tr>
              </thead>
             <tbody>
	     <tr id="row_1">      
		<td><select class="form-control show-tick z-index" data-live-search="true" name="category[]" id="cat_1">
                <option value="">select category</option>
               <?php foreach ($cat_data as $k => $v): ?>
              <option value="<?php echo $v['cat_id'] ?>"><?php echo $v['cat_name'] ?></option>
                <?php endforeach; ?>
            </select>
             </td>	
             
             <td><input type="file" class="form-control" name="picture[]" id="picture_1" required></td>
		
            <td><input type="text"  class="form-control" id="name_1"  name="name[]" placeholder="name" required></td>
			 
		  <td> <input type="text" class="form-control"  name="qty[]" placeholder="quanity" id="qty_1" required> </td>	
		
		  <td> <input type="text" class="form-control"  name="price[]" placeholder=" price" id="price_1" required> </td>
			 
		  <td><textarea class="form-control" name="description[]" placeholder="enter description" id="desc_1"></textarea></td>
		
             <td></td> 
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


<!--end-Footer-part--> 
<script src="<?php echo base_url(); ?>assets/jquery-3.1.0.min.js"></script> 
	<script type="text/javascript">
  var base_url = "<?php echo site_url(); ?>";

  $(document).ready(function() {
 
    // Add new row in the table 
    $("#add_row").unbind('click').bind('click', function() {
      var table = $("#product_info_table");
      var count_table_tbody_tr = $("#product_info_table tbody tr").length;
      var row_id = count_table_tbody_tr + 1;

      $.ajax({
          url: base_url + '/products/getCategoryData/',
          type: 'post',
          dataType: 'json',
          success:function(response) {
			  
               // console.log(reponse.x);
               var html = '<tr id="row_'+row_id+'">'+ 
                    '<td>'+ 
                    '<select class="form-control select_group product" data-row-id="'+row_id+'" id="product_'+row_id+'" name="category[]" style="width:100%;" onchange="getCategoryData('+row_id+')">'+
                        '<option value="">select category</option>';
                        $.each(response, function(index, value) {
                          html += '<option value="'+value.cat_id+'">'+value.cat_name+'</option>';             
                        });
                        
                      html += '</select>'+
                    '</td>'+ 
				   '<td><input type="file" class="form-control"  name="picture[]" id="picture_'+row_id+'" required>'+
                   
                    '<td><input type="text"  class="form-control" id="name_'+row_id+'"  name="name[]" placeholder="name" required></td>'+                            
                   '</td>'+ 
                   '<td> <input type="text" class="form-control"  name="qty[]" placeholder="quanity" id="qty_'+row_id+'" required></td>'+
				    '<td><input type="text" class="form-control"  name="price[]" placeholder=" price" id="price_'+row_id+'" required></td>'+              
				   '<td><textarea class="form-control" name="description[]" placeholder="enter description" id="desc_'+row_id+'"></textarea></td> '+
			  '<td><button type="button" class="btn btn-danger" onclick="removeRow(\''+row_id+'\')"><i class="zmdi zmdi-minus"></i></button></td>'+
                    '</tr>';

                if(count_table_tbody_tr >= 1) {
                $("#product_info_table tbody tr:last").after(html);  
              }
              else {
                $("#product_info_table tbody").html(html);
              }

          }
        });
      
      return false;
    });
	  
  }); // /document

	 function removeRow(tr_id)
  {
    $("#product_info_table tbody tr#row_"+tr_id).remove();
  }
        
  
	</script>