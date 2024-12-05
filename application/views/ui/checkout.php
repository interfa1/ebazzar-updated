<div class="banner_nav_right">
	<!-- about -->
	<div class="checkout_section">
		<h3>Chec<span>kout</span></h3>

		<div class="checkout_table">
			<h4>Your shopping cart contains: <span><?php echo count($order_data); ?> Products</span></h4>
			<form action="<?php echo base_url('dashboard/orders'); ?>" method="post" class="order_form">
				<table class="product_table" id="product_info_table">
					<thead>
						<tr>
							<th>SL No.</th>
							<th>Product</th>
							<th>Product Name</th>
							<th>Quantity</th>
							<th>Price</th>
						</tr>
					</thead>
					<tbody>
						<?php $x = 1;
						$tot_qty = 0;
						foreach ($order_data as $k => $v):
							$product = $this->Model_products->getProductDataByname($v['name']);
							$tot_qty = $tot_qty + $v['count']; ?>
							<tr class="row_data" id="row_<?php echo $x; ?>">
								<td class="serial"><?php echo $x; ?></td>
								<td class="product_imageieie"><a href="<?php echo base_url('dashboard/single/' . $product['id']); ?>"><img src="<?php echo base_url($product['image']); ?>" alt="image not found" class="image_responsive"></a></td>
								<td class="product_name"><?php echo $v['name']; ?><input type="hidden" name="item_name[]" value="<?php echo $v['name']; ?>"></td>
								<td class="product_quantity">
									<div class="quantity_container">
										<div class="quantity_box">
											<input type="number" name="qty[]" id="qty_<?php echo $x; ?>" class="qty_input" placeholder=" qty" value="<?php echo $v['count']; ?>" readonly>
										</div>
									</div>
								</td>

								<td class="product_price">Rs. <?php echo ($v['count'] * $product['price']); ?><input type="hidden" name="price[]" value="<?php echo ($v['count'] * $product['price']); ?>"></td>
							</tr>
						<?php $x++;
						endforeach; ?>
						<tr>
							<td colspan="2">Total</td>
							<td></td>
							<td><?php echo $tot_qty; ?><input type="hidden" name="tot_qty" value="<?php echo $tot_qty; ?>"></td>
							<td>Rs. <?php echo $order_tot_amt; ?> <input type="hidden" name="tot_amt" value="<?php echo $order_tot_amt; ?>"></td>
						</tr>
					</tbody>
				</table>
		</div>
		<div class="checkout_form">
			<div class="delivery_address">
				<h4>Delivery to this Address</h4>

				<section class="address_section">
					<div class="address_wrapper">
						<div class="form_group">
							<div class="input_half">
								<label class="label">Full name: </label>
								<input class="form_input" type="text" name="name" placeholder="Full name" value="<?php echo $cust_data['name']; ?>" required>
							</div>

							<div class="inputsss">
								<div class="input_group">
									<div class="input_mobileee">
										<label class="control-label">Mobile number:</label>
										<input class="form-control" type="text" name="mobile" value="<?php echo $cust_data['mobile']; ?>" placeholder="Mobile number" required>
									</div>
								</div>

								<div class="input_grouppp">
									<div class=" input_landmarkkk">
										<label class="control-label">Landmark: </label>
										<input class="form-control" name="landmark" type="text" placeholder="Landmark" required>
									</div>
								</div>
								<div class="clear"> </div>
							</div>

							<div class="input_half">
								<label class="label">Pincode:</label>
								<input class="form_input" type="text" placeholder="Pincode" name="pincode" value="<?php echo $cust_data['pincode']; ?>" required>
							</div>
							<?php if (!isset($shop_id)):
								$shop_id = 1;
							endif; ?>
							<?php $shop_data = $this->Model_users->getUserData($shop_id); ?>
							<div class="input_half">
								<label class="label">Shop Name:</label>
								<input class="form_input" type="text" placeholder="shop" name="shop_name" value="<?php echo $shop_data['shop_name']; ?>" readonly>
								<input class="form_input" type="hidden" placeholder="shop" name="shop_id" value="<?php echo $shop_data['id']; ?>" readonly>
							</div>

							<div class="input_full">
								<label class="label">Shop Address:</label>
								<textarea class="form_textarea"><?php echo $shop_data['address']; ?></textarea>
							</div>

							<div class="input_full">
								<label class="label">Address: </label>
								<textarea class="form_textarea" name="address" required><?php echo $cust_data['address']; ?></textarea>
							</div>
						</div>
						<div class="order_button">
							<button type="submit" name="submit" value="submit" class="btn_confirm_order">Confirm Order <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
						</div>
					</div>
				</section>
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //about -->
</div>
<div class="clearfix"></div>
</div>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets_ui/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets_ui/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event) {
			event.preventDefault();
			$('html,body').animate({
				scrollTop: $(this.hash).offset().top
			}, 1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->

</body>

</html>
