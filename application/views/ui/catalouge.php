<div class="product_banner_section">
    <div class="product_banner">
        <h3>Best Deals For New Products<span class="blink_effect"></span></h3>
    </div>
        <div class="product_grid_section">
        <h3><?php echo $category['cat_name']; ?></h3>
        <div class="product_grid">
            <?php
            if (!isset($shop_id)):
                echo base_url('dashboard/index');
            endif;
            foreach ($catlog as $k => $v): ?>
            <!-- <form action="<?php echo base_url('dashboard/single/'.$v['id']);?>" method="post"> -->

            <div class="product_card">
                <div class="product_card_content">
                    <div class="product_offer_badge">
                        <img src="<?php echo base_url(); ?>assets_ui/images/offer.png" alt="Offer" class="img-responsive" />
                    </div>
                    <div class="product_info">
                        <figure>
                            <div class="product_item">
                                <div class="product_image">
                                    <a href="<?php echo base_url('dashboard/single/'.$v['id']); ?>">
                                        <img src="<?php echo base_url($v['image']); ?>" alt="<?php echo $v['name']; ?>" class="img-responsive" />
                                    </a>
                                    <p><?php echo $v['name']; ?></p>
                                    <h4>Rs. <?php echo $v['price']; ?></h4>
                                </div>
                                <div class="product_actions">
                                    <a href="#" data-name="<?php echo $v['name']; ?>" data-price="<?php echo $v['price']; ?>" data-id="<?php echo $v['id']; ?>" class="add-to-cart btn btn-primary">Add to cart</a>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
            <!-- </form> -->

            <?php endforeach; ?>
            <div class="clearfix"></div>
        </div>
    </div>
     
</div>
<div class="clearfix"></div>
