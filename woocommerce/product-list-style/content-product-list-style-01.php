<?php
/**
 * Name: Product List Style 01
 **/
?>
<?php

global $product;

$functions = array(
    array('add_action', 'woocommerce_shop_loop_item_title', 'sadesmarket_product_list_categories', 15),
    array( 'remove_action', 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 ),
    array( 'add_action', 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 5 ),
);
sadesmarket_add_action( $functions );
?>
    <div class="product-inner">
        <?php
        /**
         * Hook: woocommerce_before_shop_loop_item.
         *
         * @hooked woocommerce_template_loop_product_link_open - 10
         */
        do_action( 'woocommerce_before_shop_loop_item' );
        ?>
        <div class="product-thumb images tooltip-wrap tooltip-top">
            <?php
            /**
             * Hook: woocommerce_before_shop_loop_item_title.
             *
             * @hooked woocommerce_show_product_loop_sale_flash - 10
             * @hooked woocommerce_template_loop_product_thumbnail - 10
             */
            do_action( 'woocommerce_before_shop_loop_item_title' );
            ?>
        </div>
        <div class="product-info">
            <div class="inner-info">
                <?php
                /**
                 * Hook: woocommerce_shop_loop_item_title.
                 *
                 * @hooked woocommerce_template_loop_product_title - 10
                 */
                do_action( 'woocommerce_shop_loop_item_title' );
                /**
                 * Hook: woocommerce_after_shop_loop_item_title.
                 *
                 * @hooked woocommerce_template_loop_rating - 5
                 * @hooked woocommerce_template_loop_price - 10
                 */
                do_action( 'woocommerce_after_shop_loop_item_title' );
                ?>
                <?php sadesmarket_product_excerpt(); ?>
                <?php sadesmarket_read_more_product_list(); ?>
            </div>
            <div class="group-info">
                <?php
                echo wc_get_stock_html( $product );
                /**
                 * Hook: woocommerce_after_shop_loop_item.
                 *
                 * @hooked woocommerce_template_loop_product_link_close - 5
                 * @hooked woocommerce_template_loop_add_to_cart - 10
                 */
                do_action( 'woocommerce_after_shop_loop_item' );
                ?>
                <div class="group-button">
                    <?php if ( !sadesmarket_is_mobile() ) {
                        do_action( 'sadesmarket_function_shop_loop_item_quickview' );
                        do_action( 'sadesmarket_function_shop_loop_item_wishlist' );
                        do_action( 'sadesmarket_function_shop_loop_item_compare' );
                    } ?>
                </div>
            </div>
        </div>
    </div>
<?php
sadesmarket_add_action( $functions, true );
