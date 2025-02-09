<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage SadesMarket
 * @since 1.0
 * @version 1.0
 */

$sidebar_name = sadesmarket_get_option( 'shop_vendor_used_sidebar', 'vendor-widget-area' );
if ( !is_active_sidebar( $sidebar_name ) ) {
	$sidebar_name = 'sidebar-store';
}
?>
<div id="dokan-secondary" class="dokan-clearfix dokan-w3 dokan-store-sidebar <?php echo esc_attr( $sidebar_name ); ?>" role="complementary">
    <div class="dokan-widget-area widget-collapse widget-area">
		<?php dynamic_sidebar( $sidebar_name ); ?>
    </div>
</div>