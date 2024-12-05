
<section class="content invoice">
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
        <div class="row clearfix">
            <div class="col-lg-12">
<!--
                <div class="card">
                    <div class="header">
                        <h2><strong>Single</strong> Invoice</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="javascript:void(0);">Print Invoices</a></li>
                                    <li role="presentation" class="divider"></li>
                                    <li><a href="javascript:void(0);">Export to XLS</a></li>
                                    <li><a href="javascript:void(0);">Export to CSV</a></li>
                                    <li><a href="javascript:void(0);">Export to XML</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <h3 class="m-b-0">Invoice Details : <strong class="text-primary"><?php //echo $order_data['bill_no'];?></strong></h3>
                        <ul class="nav nav-tabs">
                            <li class="nav-item inlineblock"><a class="nav-link active" data-toggle="tab" href="#details" aria-expanded="true">Details</a></li>
                            <li class="nav-item inlineblock"><a class="nav-link" data-toggle="tab" href="#history" aria-expanded="false">History</a></li>
                        </ul>                
                    </div>
                </div>
-->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane in active" id="details" aria-expanded="true">
                        <div class="card" id="details">
                            <div class="body">                                
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <address>
                     <strong><?php echo $order_data['name'];?>.</strong><br>
                            <?php echo $order_data['landmark'];?><br>
                            <?php echo $order_data['address'];?><br>
                            <?php echo $order_data['pincode'];?><br>
                                            <abbr title="Phone">P:</abbr> <?php echo $order_data['mobile'];?>
                                        </address>
                                    </div>
                                    <div class="col-md-6 col-sm-6 text-right">
                                        <p class="m-b-0"><strong>Order Date: </strong> <?php echo $order_data['order_date'];?></p>
                                        <p class="m-b-0"><strong>Order Status: </strong> <?php if($order_data['confirm'] == 1){ $status = '<span class="badge badge-success">confirm</span>'; }elseif($order_data['confirm'] == 2){ $status = '<span class="badge badge-danger">rejected</span>';}else{ $status = '<span class="badge badge-warning">pending</span>'; }?>
		                <?php echo $status; ?></p>
                                        <p><strong>Order ID: </strong> <?php echo $order_data['bill_no'];?></p>
                                    </div>
                                </div>
                                <div class="mt-40"></div>
                                <div class="row">
                             <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered data-table">
                         <thead>
                             <tr>
                                <th>#</th>                                       <th>Item</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
         <?php $items = unserialize($order_data['item_name']);
               $qty = unserialize($order_data['qty']);
               $price = unserialize($order_data['price']);
               $count = count($items); 
               for($y = 0; $y < $count; $y++):?>                                          <tr>
                        <td><?php echo $y+1;?></td>
                        <td><?php echo $items[$y];?></td>
                        <td><?php echo $qty[$y];?></td>
                        <td><?php echo $price[$y];?></td>
                    </tr>
                <?php endfor; ?>
                    </tbody>
                </table>
            </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Note</h5>
                                        <p>Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.</p>
                                    </div>
                                    <div class="col-md-6 text-right">
            <p><b>Total Qty:</b> <?php echo $order_data['tot_qty'];?></p>
                <p>Total Amount: <?php echo $order_data['tot_amt'];?></p>
            <h3 class="m-b-0">Rs <?php echo $order_data['tot_amt'];?></h3>
                                    </div>
                                </div>
                                <hr>
                                <div class="hidden-print col-md-12 text-right">
                                    <a href="javascript:void(0);" class="btn btn-info btn-round"><i class="zmdi zmdi-print"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-primary btn-round">Submit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div role="tabpanel" class="tab-pane" id="history" aria-expanded="false">
                        <div class="card" id="details">
                            <div class="body">                                
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <address>
                                            <strong>ThemeMakker Inc.</strong><br>
                                            795 Folsom Ave, Suite 546<br>
                                            San Francisco, CA 54656<br>
                                            <abbr title="Phone">P:</abbr> (123) 456-34636
                                        </address>
                                    </div>
                                    <div class="col-md-6 col-sm-6 text-right">
                                        <p class="m-b-0"><strong>Order Date: </strong> Jun 15, 2016</p>
                                        <p class="m-b-0"><strong>Order Status: </strong> <span class="badge bg-orange">Pending</span></p>
                                        <p><strong>Order ID: </strong> #123456</p>
                                    </div>
                                </div>
                                <div class="mt-40"></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Description</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Invoice Created</td>
                                                        <td>18 Dec, 2017</td>
                                                        <td><span class="badge badge-default">Panding</span></td>
                                                    </tr>
                                                     <tr>
                                                        <td>1</td>
                                                        <td>Invoice Sent</td>
                                                        <td>19 Dec, 2017</td>
                                                        <td><span class="badge badge-default">Panding</span></td>
                                                    </tr>
                                                     <tr>
                                                        <td>1</td>
                                                        <td>Invoice Paid</td>
                                                        <td>20 Dec, 2017</td>
                                                        <td><span class="badge badge-success">Success</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</section>
