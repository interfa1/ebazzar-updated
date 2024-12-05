 <!-- All Doctors Start Here -->
        <section class="team-wrap-layout2 bg-light-accent100">
            <div class="container">
                <div class="section-heading heading-dark text-center heading-layout4">
                    <h2>Shop Online</h2>
                    <div class="text-right"><a href="<?php echo base_url('web/prescription');?>" class="btn btn-primary" style="font-size: 14px;
    display: inline-block;
    
    color: #ffffff;
    background-color: #dc3545;
    text-transform: uppercase;
    font-weight: 500;
    border: 1px solid;
    border-color: #dc3545;">upload prescription to order</a></div>
                    <p>Our shop online tool assists you in choosing from our products
                        pool of health specialists.</p>
                </div>
				<div class="text-right">
				<button style="margin-right: 40px;" title="View previous orders"><a href="<?php echo base_url('web/view_orders');?>"><img src="<?php echo base_url(); ?>assets/img/pre-order1.png" ></a></button><br>
				 <button type="button" title="Cart"  data-toggle="modal" data-target="#cart"><img src="<?php echo base_url(); ?>assets/img/cart.png" >(<span class="total-count"></span>)</button>
         <button class="clear-cart " title="Clear cart"><img src="<?php echo base_url(); ?>assets/img/clear_cart.jpg" ></button>
    
				</div>
                <div class="isotope-wrap">
                    
					<!-- Row start -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<?php if($this->session->flashdata('success')): ?>
							
							<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							  <?php echo $this->session->flashdata('success'); ?>
							</div>

						  <?php elseif($this->session->flashdata('errors')): ?>
							<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							  <?php echo $this->session->flashdata('errors'); ?>
							</div>
									
						<?php elseif(!empty(validation_errors())): ?>
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<?php echo validation_errors(); ?>  
						</div>			  
					<?php endif; ?>	
							
							
							<div class="card-deck">
					<?php if($product_data): ?>                  
                    <?php $i=1;foreach ($product_data as $k => $v): ?>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
								<div class="card" style="margin-bottom: 10px;">
									<img class="card-img-top" src="<?php echo base_url($v['image']);?>" alt="Card image cap" height="150px" width="150px">
									<div class="card-body">
										<h5 class="card-title"><?php echo $v['name']; ?> <a href="#" data-name="<?php echo $v['name'];?>" data-price="<?php echo $v['price'];?>" class="add-to-cart btn btn-primary">Add to cart</a></h5>
										<p class="card-text"><?php echo $v['description']; ?></p>
										<p class="card-text">
											<small class="text-muted"><?php $qty_status = '';
            if($v['qty'] <= 10 && $v['qty'] > 0) {
                $qty_status = '<span class="badge badge-warning">Low !</span>';
            } else if($v['qty'] <= 0) {
                $qty_status = '<span class="badge badge-danger">Out of stock !</span>';
            } else if($v['qty'] > 10){
				 $qty_status = '<span class="badge badge-success">In stock !</span>';
			} ?> 
						  <?php echo $qty_status; ?></small>
										</p>
									</div>
								</div>
								</div>
						<?php endforeach ?>
                 <?php endif; ?>		
								
							</div>
						</div>
					</div>
					
  
 <!-- Modal -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
		 <form role="form" action="<?php echo base_url('web/cart_items') ?>" method="post" id="removeBrandForm">
      <div class="modal-body">
        <table class="show-cart table">
       
        </table>
		  <input type="hidden" name="name" id="name">
        <div>Total price: <span class="total-cart"></span></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Order now</button>
      </div>
		</form>
    </div>
  </div>
</div> 

					
					
                </div>
            </div>
        </section>
        <!-- All Doctors End Here -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
// ************************************************
// Shopping Cart API
// ************************************************

var shoppingCart = (function() {
  // =============================
  // Private methods and propeties
  // =============================
  cart = [];
  
  // Constructor
  function Item(name, price, count) {
    this.name = name;
    this.price = price;
    this.count = count;
  }
  
  // Save cart
  function saveCart() {
    sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
  }
  
    // Load cart
  function loadCart() {
    cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
  }
  if (sessionStorage.getItem("shoppingCart") != null) {
    loadCart();
  }
  

  // =============================
  // Public methods and propeties
  // =============================
  var obj = {};
  
  // Add to cart
  obj.addItemToCart = function(name, price, count) {
    for(var item in cart) {
      if(cart[item].name === name) {
        cart[item].count ++;
        saveCart();
        return;
      }
    }
    var item = new Item(name, price, count);
    cart.push(item);
    saveCart();
  }
  // Set count from item
  obj.setCountForItem = function(name, count) {
    for(var i in cart) {
      if (cart[i].name === name) {
        cart[i].count = count;
        break;
      }
    }
  };
  // Remove item from cart
  obj.removeItemFromCart = function(name) {
      for(var item in cart) {
        if(cart[item].name === name) {
          cart[item].count --;
          if(cart[item].count === 0) {
            cart.splice(item, 1);
          }
          break;
        }
    }
    saveCart();
  }

  // Remove all items from cart
  obj.removeItemFromCartAll = function(name) {
    for(var item in cart) {
      if(cart[item].name === name) {
        cart.splice(item, 1);
        break;
      }
    }
    saveCart();
  }

  // Clear cart
  obj.clearCart = function() {
    cart = [];
    saveCart();
  }

  // Count cart 
  obj.totalCount = function() {
    var totalCount = 0;
    for(var item in cart) {
      totalCount += cart[item].count;
    }
    return totalCount;
  }

  // Total cart
  obj.totalCart = function() {
    var totalCart = 0;
    for(var item in cart) {
      totalCart += cart[item].price * cart[item].count;
    }
    return Number(totalCart.toFixed(2));
  }

  // List cart
  obj.listCart = function() {
    var cartCopy = [];
    for(i in cart) {
      item = cart[i];
      itemCopy = {};
      for(p in item) {
        itemCopy[p] = item[p];

      }
      itemCopy.total = Number(item.price * item.count).toFixed(2);
      cartCopy.push(itemCopy)
    }
    return cartCopy;
  }

  // cart : Array
  // Item : Object/Class
  // addItemToCart : Function
  // removeItemFromCart : Function
  // removeItemFromCartAll : Function
  // clearCart : Function
  // countCart : Function
  // totalCart : Function
  // listCart : Function
  // saveCart : Function
  // loadCart : Function
  return obj;
})();


// *****************************************
// Triggers / Events
// ***************************************** 
// Add item
$('.add-to-cart').click(function(event) {
  event.preventDefault();
  var name = $(this).data('name');
  var price = Number($(this).data('price'));
  window.print("Adding produc");
  shoppingCart.addItemToCart(name, price, 1);
  displayCart();
});

// Clear items
$('.clear-cart').click(function() {
  shoppingCart.clearCart();
  displayCart();
});


function displayCart() {
  var cartArray = shoppingCart.listCart();
  var output = "";
	output +="<thead><th>name</th><th>unit price</th><th>quantity</th><th></th><th>amount</th></thead>"
  for(var i in cartArray) {
    output += "<tr>"
      + "<td>" + cartArray[i].name + "</td>" 
      + "<td>" + cartArray[i].price + "</td>"
      + "<td><div class='input-group'><button class='minus-item input-group-addon btn btn-primary' data-name=" + cartArray[i].name + ">-</button>"
      + "<input type='number' class='item-count form-control' data-name='" + cartArray[i].name + "' value='" + cartArray[i].count + "'>"
      + "<button class='plus-item btn btn-primary input-group-addon' data-name=" + cartArray[i].name + ">+</button></div></td>"
      + "<td><button class='delete-item btn btn-danger' data-name=" + cartArray[i].name + ">X</button></td>"
      + " = " 
      + "<td>" + cartArray[i].total + "</td>" 
      +  "</tr>";
  }
  var aa = JSON.stringify(cartArray);
 $("#name").val(aa);
  $('.show-cart').html(output);
  $('.total-cart').html(shoppingCart.totalCart());
  $('.total-count').html(shoppingCart.totalCount());
}

// Delete item button

$('.show-cart').on("click", ".delete-item", function(event) {
  var name = $(this).data('name')
  shoppingCart.removeItemFromCartAll(name);
  displayCart();
})


// -1
$('.show-cart').on("click", ".minus-item", function(event) {
  var name = $(this).data('name')
  shoppingCart.removeItemFromCart(name);
  displayCart();
})
// +1
$('.show-cart').on("click", ".plus-item", function(event) {
  var name = $(this).data('name')
  shoppingCart.addItemToCart(name);
  displayCart();
})

// Item count input
$('.show-cart').on("change", ".item-count", function(event) {
   var name = $(this).data('name');
   var count = Number($(this).val());
  shoppingCart.setCountForItem(name, count);
  displayCart();
});

displayCart();

</script>