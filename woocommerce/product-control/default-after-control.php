<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
?>
<div class="shop-control shop-after-control">
	<div class="item-left">
        <div class="display-per-page">
	        <span class="text"><?php echo esc_html__( 'Show', 'sadesmarket' ); ?></span>
	        <?php sadesmarket_shop_per_page(); ?>
	    </div>
        <?php woocommerce_result_count(); ?>
    </div>
    <?php woocommerce_pagination(); ?>
</div>