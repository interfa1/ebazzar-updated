
<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="image"><a href="<?php echo base_url('admin/index');?>"><img src="<?php echo base_url();?>assets/images/profile_av.jpg" alt="User"></a></div>
                    <div class="detail">
                        <h4><?php echo $user_data['name']?? 'Guest'; ?></h4>
                        <small><?php echo $user_data['username']?? 'Unknown'; ?></small>                        
                    </div>
                    <a href="#" title="Events"><i class="zmdi zmdi-calendar"></i></a>
                    <a href="#" title="Inbox"><i class="zmdi zmdi-email"></i></a>
                    <a href="#" title="Contact List"><i class="zmdi zmdi-account-box-phone"></i></a>
                    <a href="#" title="Chat App"><i class="zmdi zmdi-comments"></i></a>
                    <a href="<?php echo base_url('auth/logout');?>" title="Sign out"><i class="zmdi zmdi-power"></i></a>
                </div>
            </li>
            <li class="header">MAIN</li>
            <li class="active open"> <a href="" class="menu"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a>
            </li>
             <?php if(in_array('updateGroup', $user_permission)||
                    in_array('deleteGroup', $user_permission)||
                    in_array('createGroup', $user_permission)||
                    in_array('viewGroup', $user_permission)): ?> 
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-swap-alt"></i><span>Groups</span> </a>
                <ul class="ml-menu">
                <?php if(in_array('createGroup', $user_permission)): ?>
<li> <a href="<?php echo base_url('groups/create');?>">Add Group</a> </li>    
                <?php endif; 
                if(in_array('updateGroup', $user_permission)||
                    in_array('deleteGroup', $user_permission)||
                    in_array('viewGroup', $user_permission)):?>                <li> <a href="<?php echo base_url('groups/');?>">Manage Groups</a> </li>  
                <?php endif; ?>
                </ul>
            </li>
            <?php endif; 
            if(in_array('updateUser', $user_permission)||
                    in_array('deleteUser', $user_permission)||
                    in_array('createUser', $user_permission)||
                    in_array('viewUser', $user_permission)):?>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Users</span> </a>
                <ul class="ml-menu">
    <?php if(in_array('createUser', $user_permission)): ?>
    <li><a href="<?php echo base_url('users/create');?>">Add User</a></li>
                <?php endif; 
                if(in_array('updateUser', $user_permission)||
                    in_array('deleteUser', $user_permission)||
                    in_array('viewUser', $user_permission)):?> 
    <li><a href="<?php echo base_url('users/');?>">Manage Users</a></li>
                 <?php endif; ?>
                </ul>
            </li>
            <?php endif; 
            if(in_array('updateProduct', $user_permission)||
                    in_array('deleteProduct', $user_permission)||
                    in_array('createProduct', $user_permission)||
                    in_array('viewProduct', $user_permission)):?>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Products</span> </a>
                <ul class="ml-menu">
        <?php if(in_array('createProduct', $user_permission)): ?>
<li><a href="<?php echo base_url('products/create');?>">Add Product</a></li>
        <?php endif; 
                if(in_array('updateProduct', $user_permission)||
                    in_array('deleteProduct', $user_permission)||
                    in_array('viewProduct', $user_permission)):?> 
<li><a href="<?php echo base_url('products/');?>">Manage Product</a></li>
                   <?php endif; ?>
                </ul>
            </li>            
            <?php endif; 
            if(in_array('updateOrder', $user_permission)||
                    in_array('deleteOrder', $user_permission)||
                    in_array('createOrder', $user_permission)||
                    in_array('viewOrder', $user_permission)):?>
            <li> <a href="<?php echo base_url('orders/');?>" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Manage Orders</span> </a>
            </li>            
            <?php endif; ?> 
            <li class="header">FORMS, CHARTS, TABLES</li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Forms</span> </a>
                <ul class="ml-menu">
             <li><a href="#">Products</a> </li>
             <li><a href="#">Shops</a> </li>
               </ul>
            </li>
                     

            
             <li> <a href="<?php echo base_url('admin/signin');?>" class="menu"><i class="zmdi zmdi-power"></i><span>Logout</span></a>
            </li>
            

           
            <li class="header">Extra</li>
            <li>
                <div class="progress-container progress-primary m-t-10">
                    <span class="progress-badge">Traffic this Month</span>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100" style="width: 67%;">
                            <span class="progress-value">67%</span>
                        </div>
                    </div>
                </div>
                <div class="progress-container progress-info">
                    <span class="progress-badge">Server Load</span>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="width: 86%;">
                            <span class="progress-value">86%</span>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>
