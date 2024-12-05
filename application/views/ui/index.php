<!-- <div class="w3l_banner_nav_right">
<div class="privacy about">
    <h3>Find nearest shop</h3>
		<div class="checkout-right">	
				<div class="col-md-12 address_form_agile">
<section class="creditly-wrapper wthree, w3_agileits_wrapper">
        <div class="information-wrapper">
            <form action="<?php echo base_url('dashboard/findshop');?>" method="post" class="advance-search-query input-night-rider yellow-theme">
            <div class="first-row form-group">
				<div class=" col-md-6 controls">
                <input type='hidden' id='latitude' name='latitude'>
                <input type='hidden' id='longitude' name='longitude'>
                    <input id="autocomplete" type="text" 
                        placeholder="enter your location"  onFocus="geolocate()" class="pick-location form-control"  name="p_location" required>
				</div>
				
            <div class="w3_agileits_card_number_grids">
				 <div class="w3_agileits_card_number_grid_right">
				    <div class=" col-md-6  controls">
				        <button type="submit" name="submit" value="Find nearby shops" class="btn btn-success">get location<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
				    </div>
				</div>
         <div class="clearfix"> </div>
       </div>
</div>
 </form>
</div>
</section>
</form>
            </div>
			<div class="clearfix"> </div>
            </div>
</div></div> -->



		<div class="w3l_banner_nav_right">
			<section class="slider">
                        <div class="row clearfix jsdemo-notification-button">
                 <?php if(!empty($errors) || !empty(validation_errors())):?>
    				
                    <div  class=" alert alert-danger" data-placement-from="top" data-placement-align="center"  data-color-name="alert-danger"> 
                        <?php if(!empty($errors)):echo $errors; endif;?>
                        <?php if(!empty(validation_errors())): 
                            echo validation_errors();   
                        endif; ?>  
				 </div>
				<?php endif; ?>
								
				<?php if($this->session->flashdata('success')): ?>
									
				<div class="alert alert-success" data-placement-from="top" data-placement-align="center"  data-color-name="alert-success"> 
				 <?php echo $this->session->flashdata('success'); ?>
				</div>

				<?php elseif($this->session->flashdata('error')): ?>
				    
                <div class="alert alert-danger" data-placement-from="top" data-placement-align="center" data-color-name="alert-danger"> 
				 <?php echo $this->session->flashdata('error'); ?>
             </div>
                <?php endif; ?>
        </div>
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="w3l_banner_nav_right_banner">
								<h3>Make your <span>food</span> with Spicy.</h3>
								<div class="more">
									<a href="<?php echo base_url('dashboard/products');?>" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner1">
								<h3>Make your <span>food</span> with Spicy.</h3>
								<div class="more">
									<a href="<?php echo base_url('dashboard/products');?>" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner2">
								<h3>upto <i>50%</i> off.</h3>
								<div class="more">
									<a href="<?php echo base_url('dashboard/products');?>" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</section>
			<!-- flexSlider -->
				<link rel="stylesheet" href="<?php echo base_url();?>assets_ui/css/flexslider.css" type="text/css" media="screen" property="" />
				<script defer src="<?php echo base_url();?>assets_ui/js/jquery.flexslider.js"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
			<!-- //flexSlider -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- banner -->
	<div class="banner_bottom">
			<div class="wthree_banner_bottom_left_grid_sub">
			</div>
			<div class="wthree_banner_bottom_left_grid_sub1">
				<div class="col-md-4 wthree_banner_bottom_left">
					<div class="wthree_banner_bottom_left_grid">
						<img src="<?php echo base_url();?>assets_ui/images/4.jpg" alt=" " class="img-responsive" />
						<div class="wthree_banner_bottom_left_grid_pos">
							<h4>Discount Offer <span>25%</span></h4>
						</div>
					</div>
				</div>
				<div class="col-md-4 wthree_banner_bottom_left">
					<div class="wthree_banner_bottom_left_grid">
						<img src="<?php echo base_url();?>assets_ui/images/5.jpg" alt=" " class="img-responsive" />
						<div class="wthree_banner_btm_pos">
							<h3>introducing <span>best store</span> for <i>groceries</i></h3>
						</div>
					</div>
				</div>
				<div class="col-md-4 wthree_banner_bottom_left">
					<div class="wthree_banner_bottom_left_grid">
						<img src="<?php echo base_url();?>assets_ui/images/6.jpg" alt=" " class="img-responsive" />
						<div class="wthree_banner_btm_pos1">
							<h3>Save <span>Upto</span> $10</h3>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
	</div>
<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
			<h3>Hot Offers</h3>
			<div class="agile_top_brands_grids">
				<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
						<div class="agile_top_brand_left_grid_pos">
								<img src="<?php echo base_url();?>assets_ui/images/offer.png" alt=" " class="img-responsive" />
							</div>
							<!-- <div class="tag"><img src="<?php echo base_url();?>assets_ui/images/tag.png" alt=" " class="img-responsive" /></div> -->
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block" >
										<div class="snipcart-thumb">
											<a href="single.html"><img title=" " alt=" " src="<?php echo base_url();?>assets_ui/images/1.png" /></a>		
											<p>fortune sunflower oil</p>
											<h4>$7.99 <span>$10.00</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="checkout.html" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
													<input type="hidden" name="amount" value="7.99" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
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
				<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
						<div class="agile_top_brand_left_grid_pos">
								<img src="<?php echo base_url();?>assets_ui/images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block" >
										<div class="snipcart-thumb">
											<a href="single.html"><img title=" " alt=" " src="<?php echo base_url();?>assets_ui/images/3.png" /></a>		
											<p>basmati rise (5 Kg)</p>
											<h4>$11.99 <span>$15.00</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="basmati rise" />
													<input type="hidden" name="amount" value="11.99" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
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
				<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="<?php echo base_url();?>assets_ui/images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.html"><img src="<?php echo base_url();?>assets_ui/images/2.png" alt=" " class="img-responsive" /></a>
											<p>Pepsi soft drink (2 Ltr)</p>
											<h4>$8.00 <span>$10.00</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Pepsi soft drink" />
													<input type="hidden" name="amount" value="8.00" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
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
				<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="<?php echo base_url();?>assets_ui/images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.html"><img src="<?php echo base_url();?>assets_ui/images/4.png" alt=" " class="img-responsive" /></a>
											<p>dogs food (4 Kg)</p>
											<h4>$9.00 <span>$11.00</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="dogs food" />
													<input type="hidden" name="amount" value="9.00" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
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
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //top-brands -->
<!-- fresh-vegetables -->
	<div class="fresh-vegetables">
		<div class="container">
			<h3>Top Products</h3>
			<div class="w3l_fresh_vegetables_grids">
				<div class="col-md-3 w3l_fresh_vegetables_grid w3l_fresh_vegetables_grid_left">
					<div class="w3l_fresh_vegetables_grid2">
						<ul>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="products.html">All Brands</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="vegetables.html">Vegetables</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="vegetables.html">Fruits</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="drinks.html">Juices</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="pet.html">Pet Food</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="bread.html">Bread & Bakery</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="household.html">Cleaning</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="products.html">Spices</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="products.html">Dry Fruits</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="products.html">Dairy Products</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-9 w3l_fresh_vegetables_grid_right">
					<div class="col-md-4 w3l_fresh_vegetables_grid">
						<div class="w3l_fresh_vegetables_grid1">
							<img src="<?php echo base_url();?>assets_ui/images/8.jpg" alt=" " class="img-responsive" />
						</div>
					</div>
					<div class="col-md-4 w3l_fresh_vegetables_grid">
						<div class="w3l_fresh_vegetables_grid1">
							<div class="w3l_fresh_vegetables_grid1_rel">
								<img src="<?php echo base_url();?>assets_ui/images/7.jpg" alt=" " class="img-responsive" />
								<div class="w3l_fresh_vegetables_grid1_rel_pos">
									<div class="more m1">
										<a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
									</div>
								</div>
							</div>
						</div>
						<div class="w3l_fresh_vegetables_grid1_bottom">
							<img src="<?php echo base_url();?>assets_ui/images/10.jpg" alt=" " class="img-responsive" />
							<div class="w3l_fresh_vegetables_grid1_bottom_pos">
								<h5>Special Offers</h5>
							</div>
						</div>
					</div>
					<div class="col-md-4 w3l_fresh_vegetables_grid">
						<div class="w3l_fresh_vegetables_grid1">
							<img src="<?php echo base_url();?>assets_ui/images/9.jpg" alt=" " class="img-responsive" />
						</div>
						<div class="w3l_fresh_vegetables_grid1_bottom">
							<img src="<?php echo base_url();?>assets_ui/images/11.jpg" alt=" " class="img-responsive" />
						</div>
					</div>
					<div class="clearfix"> </div>
					<div class="agileinfo_move_text">
						<div class="agileinfo_marquee">
							<h4>get <span class="blink_me">25% off</span> on first order and also get gift voucher</h4>
						</div>
						<div class="agileinfo_breaking_news">
							<span> </span>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //fresh-vegetables -->
<!-- //fresh-vegetables -->
<script src="<?php echo base_url('assets_ui/js/jquery.min.js');?>"></script>
<script>
  var base_url = "<?php echo site_url(); ?>";
 $(document).ready(function(){
  if(navigator.geolocation)
   navigator.geolocation.getCurrentPosition(success);
  else
   $('#latitude').html("HTML not Supported");
  
 });
 
  function success(position)
  {
   document.getElementById("latitude").value=position.coords.latitude;
   document.getElementById("longitude").value=position.coords.longitude;
  
   var latitude = position.coords.latitude;
   var longitude = position.coords.longitude;
  
   $.ajax({
 		  url:base_url+'/dashboard/getPlaceName',
         method: 'post',
         data: {latitude: latitude,
               longitude: longitude},
         dataType: 'json',
         success: function(response){
         document.getElementById("autocomplete").value = response;
         }
      });
  
   return false;
  
  }
 
</script>
<script>
// This sample uses the Autocomplete widget to help the user select a
// place, then it retrieves the address components associated with that
// place, and then it populates the form fields with those details.
// This sample requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script
// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">


var placeSearch, autocomplete;

var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      document.getElementById('autocomplete'), {types: ['geocode']});

  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  autocomplete.setFields(['address_component']);

  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
 
 // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocompletedrop = new google.maps.places.Autocomplete(
      document.getElementById('autocompletedrop'), {types: ['geocode']});

  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  autocompletedrop.setFields(['address_component']);

  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocompletedrop.addListener('place_changed', fillInAddress);
 
 map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 12
        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
}

function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle(
          {center: geolocation, radius: position.coords.accuracy});
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACvdH6GgA5wWrOF4838PORRIULGSSKXkQ&libraries=places&callback=initAutocomplete"
        async defer></script>