<div class="w3l_banner_nav_right">
    <!-- about -->
    <div class="privacy about">
        <h3>Ord<span>ers</span></h3>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <address>
                    <strong><?php echo $order_data['name']; ?>.</strong><br>
                    <?php echo $order_data['landmark']; ?><br>
                    <?php echo $order_data['address']; ?><br>
                    <?php echo $order_data['pincode']; ?><br>
                    <abbr title="Phone">P:</abbr> <?php echo $order_data['mobile']; ?>
                </address>
            </div>
            <div class="col-md-6 col-sm-6 text-right">
                <p class="m-b-0"><strong>Order Date: </strong> <?php echo $order_data['order_date']; ?></p>
                <p class="m-b-0"><strong>Order Status: </strong> <?php if ($order_data['confirm'] == 1) {
                                                                        $status = '<span class="badge badge-success">confirm</span>';
                                                                    } elseif ($order_data['confirm'] == 2) {
                                                                        $status = '<span class="badge badge-danger">rejected</span>';
                                                                    } else {
                                                                        $status = '<span class="badge badge-warning">pending</span>';
                                                                    } ?>
                    <?php echo $status; ?></p>
                <p><strong>Order ID: </strong> <?php echo $order_data['bill_no']; ?></p>

                <p><strong>Shop Name: </strong> <?php echo $vendor_data['shop_name']; ?></p>
                <p><strong>Contact: </strong> <?php echo $vendor_data['phone']; ?></p>
            </div>
        </div>
        <div class="checkout-right">
            <table class="timetable_sub" id="product_info_table">
                <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $items = unserialize($order_data['item_name']);
                    $qty = unserialize($order_data['qty']);
                    $price = unserialize($order_data['price']);
                    $count = count($items);
                    for ($y = 0; $y < $count; $y++): ?>
                        <tr class="rem" id="row_<?php echo $y; ?>">
                            <td class="invert"><?php echo $y + 1; ?></td>
                            <td class="invert"><?php echo $items[$y]; ?></td>
                            <td class="invert"><?php echo $qty[$y]; ?></td>
                            <td class="invert"><?php echo $price[$y]; ?></td>
                        </tr>
                    <?php endfor; ?>
                    <tr class="rem">
                        <td class="invert" colspan="2">Total</td>
                        <td><?php echo $order_data['tot_qty']; ?></td>
                        <td><?php echo $order_data['tot_amt']; ?></td>
                    </tr>
                </tbody>
            </table>
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