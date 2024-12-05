
		<div class="w3l_banner_nav_right">
<!-- about -->
		<div class="privacy about">
			<h3>Ord<span>ers</span></h3>
			
	      <div class="checkout-right">
				<table class="timetable_sub" id="product_info_table">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Date</th>
                            <th>Invoice No.</th>
							<th>Quantity</th>
						    <th>Amount</th>
						    <th>Status</th>
						    <th></th>
						</tr>
					</thead>
					<tbody>
                        <?php $x = 1;  
                        foreach($order_data as $k => $v):?>
                        <tr class="rem" id="row_<?php echo $x; ?>">
						<td class="invert"><?php echo $x;?></td>
				<td class="invert"><?php echo $v['order_date'];?></td>
                <td class="invert"><?php echo $v['bill_no'];?></td>
				<td class="invert"><?php echo $v['tot_qty'];?></td>
				<td class="invert"><?php echo $v['tot_amt'];?></td>
                <?php if($v['confirm'] == 1){ $status = '<span class="badge badge-success">confirm</span>'; }elseif($v['confirm'] == 2){ $status = '<span class="badge badge-danger">rejected</span>';}else{ $status = '<span class="badge badge-warning">pending</span>'; }?>
		       <td class="invert"><?php echo $status; ?></td>
				<td class="invert"><a href="<?php echo base_url('dashboard/vieworder/'.$v['order_id']);?>" class="btn btn-success">View Order <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a></td>
					</tr>
                        <?php $x++; endforeach; ?>
                           
				</tbody></table>
			</div>
        </div>
<!-- //about -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?php echo base_url();?>assets_ui/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets_ui/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->

</body>
</html>