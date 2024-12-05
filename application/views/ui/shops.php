
		<div class="w3l_banner_nav_right">
			<div class="w3l_banner_nav_right_banner7">
				<h3>Best shops near your location<span class="blink_me"></span></h3>
			</div>
			<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub">
				<h3>Select one shop</h3>
				<div class="w3ls_w3l_banner_nav_right_grid1">
					 <?php
                    asort($vendor_data);
                    foreach($vendor_data as $k => $v):
                    $user_data = $this->Model_users->getUserData($k);
                    ?>
					<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
				<img src="<?php echo base_url($user_data['logo']);?>" alt="Logo not available" class="img-responsive" />
				<p>Distance: <?php echo $v."&nbspKM";?></p>						     <h4><?php echo $user_data['shop_name'];?></h4>
										</div>
				<div class="snipcart-details">
				<a href="<?php echo base_url('dashboard/getShopData/'.$user_data['id']); ?>" class=" btn btn-primary">go to shop</a>				</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
                    <?php endforeach; ?>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
