
		<div class="w3l_banner_nav_right">
			<div class="w3l_banner_nav_right_banner6">
				<h3>Best Deals For New Products<span class="blink_me"></span></h3>
			</div>
			<div class="w3l_banner_nav_right_banner3_btm">
				<div class="col-md-4 w3l_banner_nav_right_banner3_btml">
					<div class="view view-tenth">
						<img src="<?php echo base_url();?>assets_ui/images/13.jpg" alt=" " class="img-responsive" />
						<div class="mask">
							<h4>Grocery Store</h4>
							<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
						</div>
					</div>
					<h4>Utensils</h4>
					<ol>
						<li>sunt in culpa qui officia</li>
						<li>commodo consequat</li>
						<li>sed do eiusmod tempor incididunt</li>
					</ol>
				</div>
				<div class="col-md-4 w3l_banner_nav_right_banner3_btml">
					<div class="view view-tenth">
						<img src="<?php echo base_url();?>assets_ui/images/20.jpg" alt=" " class="img-responsive">
						<div class="mask">
							<h4>Grocery Store</h4>
							<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
						</div>
					</div>
					<h4>Vegetables</h4>
					<ol>
						<li>dolorem eum fugiat voluptas</li>
						<li>ut aliquid ex ea commodi</li>
						<li>magnam aliquam quaerat</li>
					</ol>
				</div>
				<div class="col-md-4 w3l_banner_nav_right_banner3_btml">
					<div class="view view-tenth">
						<img src="<?php echo base_url();?>assets_ui/images/15.jpg" alt=" " class="img-responsive" />
						<div class="mask">
							<h4>Grocery Store</h4>
							<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
						</div>
					</div>
					<h4>Cookies</h4>
					<ol>
						<li>dolorem eum fugiat voluptas</li>
						<li>ut aliquid ex ea commodi</li>
						<li>magnam aliquam quaerat</li>
					</ol>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="w3ls_w3l_banner_nav_right_grid">
				<div class="w3ls_w3l_banner_nav_right_grid_head">
					<h6>Popular Categories</h6>
				</div>
				<div class="w3ls_w3l_banner_nav_right_grid_head_grids">
					<div class="col-md-4 w3ls_w3l_banner_nav_right_grid_head_grid">
						<img src="<?php echo base_url();?>assets_ui/images/22.jpg" alt=" " class="img-responsive" />
						<h4>Bread & Bakery</h4>
						<ul>
							<li><a href="bread.html">Raising rolls</a></li>
							<li><a href="bread.html">Butter Croissants</a></li>
							<li><a href="bread.html">wheat pita</a></li>
							<li><a href="bread.html">Hot dog roll</a></li>
						</ul>
					</div>
					<div class="col-md-4 w3ls_w3l_banner_nav_right_grid_head_grid">
						<img src="<?php echo base_url();?>assets_ui/images/23.jpg" alt=" " class="img-responsive" />
						<h4>Beverages</h4>
						<ul>
							<li><a href="drinks.html">Juices</a></li>
							<li><a href="drinks.html">Soft Drinks</a></li>
							<li><a href="drinks.html">Energy Drinks</a></li>
						</ul>
					</div>
					<div class="col-md-4 w3ls_w3l_banner_nav_right_grid_head_grid">
						<img src="<?php echo base_url();?>assets_ui/images/24.jpg" alt=" " class="img-responsive" />
						<h4>Frozen Foods</h4>
						<ul>
							<li><a href="frozen.html">Frozen Snacks</a></li>
							<li><a href="frozen.html">Frozen Nonveg</a></li>
							<li><a href="frozen.html">Frozen Sweet Corn</a></li>
							<li><a href="frozen.html">Frozen Mixed Vegetable</a></li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->

<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
			<h3>Popular Products</h3>
			<div class="agile_top_brands_grids">
                <?php foreach($product_data as $k=>$v){?>
				<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block" >
										<div class="snipcart-thumb">
											<a href="<?php echo base_url('dashboard/single/'.$v['id']);?>"><img title=" " alt=" " src="<?php echo base_url($v['image']);?>" /></a>		
											<p><?php echo $v['name'];?></p>
											<p><?php echo $v['description'];?></p>
											<h4><?php echo $v['price'];?></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="<?php echo $v['name'];?>" />
													<input type="hidden" name="amount" value="<?php echo $v['price'];?>" />
													<input type="hidden" name="discount_amount" value="0.00" />
													<input type="hidden" name="currency_code" value="INR" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
					</div>
				</div>
                <?php } ?>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //top-brands -->
