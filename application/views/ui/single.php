<div class="product-banner">
	<div class="product-banner-banner3">
		<h3>Best Deals For New Products<span class="blink_me"></span></h3>
	</div>
	<div class="product-single">
		<h5><?php echo $product_data['name']; ?></h5>
		<div class="col-md-4 product-single-left">
			<img id="example" src="<?php echo base_url($product_data['image']); ?>" alt=" " class="img-responsive" />
		</div>
		<div class="col-md-8 product-single-right">
			<div class="rating1">
				<span class="starRating">
					<input id="rating5" type="radio" name="rating" value="5">
					<label for="rating5">5</label>
					<input id="rating4" type="radio" name="rating" value="4">
					<label for="rating4">4</label>
					<input id="rating3" type="radio" name="rating" value="3" checked>
					<label for="rating3">3</label>
					<input id="rating2" type="radio" name="rating" value="2">
					<label for="rating2">2</label>
					<input id="rating1" type="radio" name="rating" value="1">
					<label for="rating1">1</label>
				</span>
			</div>
			<div class="product-description">
				<h4>Description :</h4>
				<p><?php echo $product_data['description']; ?></p>
			</div>
			<div class="product-item block">
				<div class="product-thumb product-single-right-thumb">
					<h4><?php echo $product_data['price']; ?></h4>
				</div>
				<div class="product-details product-single-right-details">
					<form action="#" method="post">
						<fieldset>
							<input type="hidden" name="cmd" value="_cart" />
							<input type="hidden" name="add" value="1" />
							<input type="hidden" name="business" value=" " />
							<input type="hidden" name="item_name" value="pulao basmati rice" />
							<input type="hidden" name="amount" value="21.00" />
							<input type="hidden" name="discount_amount" value="1.00" />
							<input type="hidden" name="currency_code" value="USD" />
							<input type="hidden" name="return" value=" " />
							<input type="hidden" name="cancel_return" value=" " />
							<input type="submit" name="submit" value="Add to cart" class="button add-to-cart" />
						</fieldset>
					</form>
				</div>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<div class="clearfix"></div>
</div>
<!-- //banner -->
<!-- brands -->
<div class="brands-section">
	<div class="container">
		<h3>Popular Brands</h3>
		<?php foreach ($category as $k => $v): ?>
			<div class="brand-section">
				<h6><?php echo $v['cat_name']; ?></h6>
				<?php
				$catlog = $this->Model_products->getProductDataByCatID($v['cat_id']);
				foreach ($catlog as $a => $b): ?>
					<div class="col-md-3 brand-item">
						<div class="hover14 column">
							<div class="brand-left-grid w3l-brand-left-grid">
								<!-- <div class="brand-left-grid-pos">
									<img src="<?php echo base_url(); ?>assets_ui/images/offer.png" alt=" " class="img-responsive" />
								</div> -->
								<div class="brand-left-grid1">
									<figure>
										<div class="product-item block">
											<div class="product-thumb">
												<a href="<?php echo base_url('dshboard/single/' . $b['id']); ?>"><img src="<?php echo base_url($b['image']); ?>" alt=" " class="img-responsive" /></a>
												<p><?php echo $b['name']; ?></p>
												<h4><?php echo $b['price']; ?></h4>
											</div>
											<div class="product-details">
												<form action="#" method="post">
													<fieldset>
														<input type="hidden" name="cmd" value="_cart" />
														<input type="hidden" name="add" value="<?php echo $b['qty']; ?>" />
														<input type="hidden" name="business" value=" " />
														<input type="hidden" name="item_name" value="<?php echo $b['name']; ?>" />
														<input type="hidden" name="amount" value="<?php echo $b['price']; ?>" />
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
				<?php endforeach; ?>
				<div class="clearfix"> </div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<!-- //brands -->