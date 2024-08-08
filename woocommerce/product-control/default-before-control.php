<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
?>
<?php
echo woocommerce_maybe_show_product_subcategories();
?>
<div class="shop-control shop-before-control">
    <div class="item-left">
        <?php
        $page_title        = sadesmarket_get_option( 'shop_page_title', 1 );
        if ( !is_product() && $page_title == 1 ) sadesmarket_page_title();
        ?>
        <?php woocommerce_result_count(); ?>
    </div>
    <div class="clear"></div>
    <?php sadesmarket_shop_display_mode() ?>
    <div class="display-sort-by">
        <span class="text"><?php echo esc_html__( 'Sort By:', 'sadesmarket' ); ?></span>
        <?php woocommerce_catalog_ordering(); ?>
    </div>
    <div class="display-per-page">
        <span class="text"><?php echo esc_html__( 'Show', 'sadesmarket' ); ?></span>
        <?php sadesmarket_shop_per_page(); ?>
    </div>
</div>
