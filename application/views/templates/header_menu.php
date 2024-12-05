<div class="container-fluid">


			<!-- Navigation start -->
			<nav class="navbar navbar-expand-lg custom-navbar">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#royalHospitalsNavbar" aria-controls="royalHospitalsNavbar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i></i>
						<i></i>
						<i></i>
					</span>
				</button>
				<div class="collapse navbar-collapse" id="royalHospitalsNavbar">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link active-page" href="<?php echo base_url('dashboard/');?>">
								<i class="icon-home nav-icon"></i>
								Dashboard
							</a>
						</li>
						
<!--
						<li class="nav-item">
							<a class="nav-link" href="<?php //echo base_url('inquiry/');?>">
								<i class="icon-devices_other nav-icon"></i>
								Inquiry
							</a>
						</li>
-->
								
						<?php if(in_array('createSubItems', $user_permission)||
                                    in_array('updateSubItems', $user_permission)||
                                    in_array('deleteSubItems', $user_permission)||
                                    in_array('viewSubItems', $user_permission)): ?>
                         <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="enrollment" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-file-text nav-icon"></i>
								Specifications
							</a>
							<ul class="dropdown-menu" aria-labelledby="enrollment">
								<li>
                                    <?php if(in_array('createSubItems', $user_permission)): ?>
									<a class="dropdown-item" href="<?php echo base_url('sub_items/create');?>">Add Specifications</a>
                                    <?php endif; ?>

								</li>
								<li>
                                    <?php if( in_array('updateSubItems', $user_permission)||
                                    in_array('deleteSubItems', $user_permission)||
                                    in_array('viewSubItems', $user_permission)): ?>
									<a class="dropdown-item" href="<?php echo base_url('sub_items/');?>">Manage Specifications</a>
                                    <?php endif; ?>
                                    
								</li>
							</ul>
						</li>
                        <?php endif; ?>
						
						
						
						 <?php if(in_array('createRM', $user_permission)||
                                    in_array('updateRM', $user_permission)||
                                    in_array('deleteRM', $user_permission)||
                                    in_array('viewRM', $user_permission)): ?>
                        <li class="nav-item">
							<a class="nav-link " href="<?php echo base_url('raw_materials/');?>">
								<i class="icon-box nav-icon"></i>
								Raw Materials
							</a>
						</li>
                        <?php endif; ?>
				
						 <?php if(in_array('createMakes', $user_permission)||
                                    in_array('updateMakes', $user_permission)||
                                    in_array('deleteMakes', $user_permission)||
                                    in_array('viewMakes', $user_permission) ||
									in_array('createModels', $user_permission)||
                                    in_array('updateModels', $user_permission)||
                                    in_array('deleteModels', $user_permission)||
                                    in_array('viewModels', $user_permission)):?>
                         <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="enrollment" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-shareable nav-icon"></i>
								Makes & Models
							</a>
							<ul class="dropdown-menu" aria-labelledby="enrollment">
								<li>
                                    <?php if(in_array('createMakes', $user_permission)||
                                    in_array('updateMakes', $user_permission)||
                                    in_array('deleteMakes', $user_permission)||
                                    in_array('viewMakes', $user_permission)):  ?>
									<a class="dropdown-item" href="<?php echo base_url('makes/');?>">Manage Makes</a>
                                    <?php endif; ?>

								</li>
								<li>
                                   <?php if(in_array('createModels', $user_permission)||
                                    in_array('updateModels', $user_permission)||
                                    in_array('deleteModels', $user_permission)||
                                    in_array('viewModels', $user_permission)): ?>
									<a class="dropdown-item" href="<?php echo base_url('models/');?>">Manage Models</a>
                                    <?php endif; ?>
                                    
								</li>
							</ul>
						</li>
                        <?php endif; ?>
						
							
                         <?php if(in_array('createItems', $user_permission)||
                                    in_array('updateItems', $user_permission)||
                                    in_array('deleteItems', $user_permission)||
                                    in_array('viewItems', $user_permission)): ?>
                         <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="enrollment" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-command nav-icon"></i>
								Specs & Cost
							</a>
							<ul class="dropdown-menu" aria-labelledby="enrollment">
								<li>
                                    <?php if(in_array('createItems', $user_permission)): ?>
									<a class="dropdown-item" href="<?php echo base_url('items/create');?>">Add Specs & Cost</a>
                                    <?php endif; ?>

								</li>
								<li>
                                    <?php if( in_array('updateItems', $user_permission)||
                                    in_array('deleteItems', $user_permission)||
                                    in_array('viewItems', $user_permission)): ?>
									<a class="dropdown-item" href="<?php echo base_url('items/');?>">Manage Specs & Cost</a>
                                    <?php endif; ?>
                                    
								</li>
							</ul>
						</li>
                        <?php endif; ?>
                        
						
						 <?php if(in_array('createPlants', $user_permission)||
                                    in_array('updatePlants', $user_permission)||
                                    in_array('deletePlants', $user_permission)||
                                    in_array('viewPlants', $user_permission)): ?>
                         <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="enrollment" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-area-graph nav-icon"></i>
								Plants
							</a>
							<ul class="dropdown-menu" aria-labelledby="enrollment">
								<li>
                                    <?php if(in_array('createPlants', $user_permission)): ?>
									<a class="dropdown-item" href="<?php echo base_url('plants/create');?>">Add Plant</a>
                                    <?php endif; ?>

								</li>
								<li>
                                    <?php if( in_array('updatePlants', $user_permission)||
                                    in_array('deletePlants', $user_permission)||
                                    in_array('viewPlants', $user_permission)): ?>
									<a class="dropdown-item" href="<?php echo base_url('plants/');?>">Manage Plants</a>
                                    <?php endif; ?>
                                    
								</li>
							</ul>
						</li>
                        <?php endif; ?>
						
						
					
<!--
						
						 <?php //if(in_array('createProducts', $user_permission)||
                                   // in_array('updateProducts', $user_permission)||
                                   // in_array('deleteProducts', $user_permission)||
                                   // in_array('viewProducts', $user_permission)): ?>
                         <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="enrollment" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-file-text nav-icon"></i>
								Products
							</a>
							<ul class="dropdown-menu" aria-labelledby="enrollment">
								<li>
                                    <?php //if(in_array('createProducts', $user_permission)): ?>
									<a class="dropdown-item" href="<?php //echo base_url('products/create');?>">Add product</a>
                                    <?php //endif; ?>

								</li>
								<li>
                                    <?php// if( in_array('updateProducts', $user_permission)||
                                   // in_array('deleteProducts', $user_permission)||
                                   // in_array('viewProducts', $user_permission)): ?>
									<a class="dropdown-item" href="<?php //echo base_url('products/');?>">Manage product</a>
                                    <?php// endif; ?>
                                    
								</li>
							</ul>
						</li>
                        <?php //endif; ?>
-->
                    
						
						
						
						 <?php if(in_array('createQuotes', $user_permission)||
                                    in_array('updateQuotes', $user_permission)||
                                   in_array('deleteQuotes', $user_permission)||
                                    in_array('viewQuotes', $user_permission)): ?>
                         <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="enrollment" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-keyboard_hide nav-icon"></i>
								Quotes
							</a>
							<ul class="dropdown-menu" aria-labelledby="enrollment">
								<li>
                                    <?php if(in_array('createQuotes', $user_permission)): ?>
									<a class="dropdown-item" href="<?php echo base_url('quotes/create');?>">Create Quote</a>
                                    <?php endif; ?>

								</li>
								<li>
                                    <?php if( in_array('updateQuotes', $user_permission)||
                                    in_array('deleteQuotes', $user_permission)||
                                    in_array('viewQuotes', $user_permission)): ?>
									<a class="dropdown-item" href="<?php echo base_url('quotes/');?>">History Quotes</a>
                                    <?php endif; ?>
                                    
								</li>
								<li>
                                    <?php if(in_array('viewSpares', $user_permission)): ?>
									<a class="dropdown-item" href="<?php echo base_url('spare/');?>">Manage Spares</a>
                                    <?php endif; ?>

								</li>
							</ul>
						</li>
                        <?php endif; ?>
                    
      			
						 <?php if(in_array('createAMC', $user_permission)||
                                   in_array('updateAMC', $user_permission)||
                                   in_array('deleteAMC', $user_permission)||
                                   in_array('viewAMC', $user_permission)): ?>
                         <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="amc" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-target nav-icon"></i>
								AMC
							</a>
							<ul class="dropdown-menu" aria-labelledby="amc">
								<li>
                                    <?php if(in_array('createAMC', $user_permission)): ?>
									<a class="dropdown-item" href="<?php echo base_url('amc/create');?>">Add AMC</a>
                                    <?php endif; ?>

								</li>
								<li>
                                    <?php if( in_array('updateAMC', $user_permission)||
                                    in_array('deleteAMC', $user_permission)||
                                    in_array('viewAMC', $user_permission)): ?>
									<a class="dropdown-item" href="<?php echo base_url('amc/');?>">Manage AMC</a>
                                    <?php endif; ?>
                                    
								</li>
							</ul>
						</li>
                        <?php endif; ?>
						
						
<!--
						
						<?php //if(in_array('createAMC', $user_permission)||
                                  // in_array('updateAMC', $user_permission)||
                                  // in_array('deleteAMC', $user_permission)||
                                  // in_array('viewAMC', $user_permission)): ?>
                         <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="sell" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-file-text nav-icon"></i>
								Spare
							</a>
							<ul class="dropdown-menu" aria-labelledby="sell">
								
								<li>
                                    <?php //if( in_array('updateAMC', $user_permission)||
                                    //in_array('deleteAMC', $user_permission)||
                                   // in_array('viewAMC', $user_permission)): ?>
									<a class="dropdown-item" href="<?php //echo base_url('spare/');?>">Add Spare</a>
                                    <?php// endif; ?>
                                    
								</li>
								<li>
                                    <?php// if(in_array('createAMC', $user_permission)): ?>
									<a class="dropdown-item" href="<?php// echo base_url('spare/');?>">Manage Spares</a>
                                    <?php// endif; ?>

								</li>
								
							</ul>
						</li>
                        <?php //endif; ?>
						
-->
							<?php if(in_array('visitReport', $user_permission)||
                                   in_array('inspectionReport', $user_permission)): ?>
                         <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="report" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-pie_chart_outlined nav-icon"></i>
								Reports
							</a>
							<ul class="dropdown-menu" aria-labelledby="report">
								
								<li>
                                    <?php if( in_array('visitReport', $user_permission)): ?>
									<a class="dropdown-item" href="<?php echo base_url('visit/');?>">Customer Visit</a>
                                    <?php endif; ?>
                               </li>
								<li>
                                    <?php if(in_array('inspectionReport', $user_permission)): ?>
									<a class="dropdown-item" href="<?php echo base_url('inspection/');?>">Site Inspection</a>
                                    <?php endif; ?>
								</li>
								
							</ul>
						</li>
                        <?php endif; ?>
						
						
						
<!--
						<li class="nav-item">
							<a class="nav-link " href="<?php //echo base_url('auth/logout');?>">
								<i class="icon-log-out1 nav-icon"></i>
								Logout
							</a>
						</li>
-->
					</ul>
				</div>
			</nav>
			<!-- Navigation end -->

