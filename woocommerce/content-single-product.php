<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
    echo get_the_password_form(); // WPCS: XSS ok.

    return;
}

if ( function_exists( 'ovic_set_post_views' ) ) {
    ovic_set_post_views( $product->get_id(), 'product' );
}

$hook = array(
    array( 'remove_action', 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 ),
    array( 'remove_action', 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 ),
    array( 'add_action', 'sadesmarket_before_single_product_summary', 'sadesmarket_single_product_flash_stock', 15 ),
    array( 'add_action', 'sadesmarket_before_single_product_summary', 'woocommerce_template_single_title', 5 ),
    array( 'add_action', 'sadesmarket_before_single_product_summary', 'woocommerce_template_single_rating', 10 ),
    array( 'add_action', 'woocommerce_single_product_summary', 'sadesmarket_product_share', 55 ),
    array( 'add_action', 'woocommerce_single_product_summary', function () {
        sadesmarket_product_loop_countdown( 'style-01' );
    }, 25 ),
);
if (class_exists('Ovic_Addon_Toolkit')) {
    $hook[] = array('add_action', 'woocommerce_after_add_to_cart_button', 'sadesmarket_button_buy_now', 10);
}
sadesmarket_add_action( $hook );

$attachment_ids = $product->get_gallery_image_ids();
$class_wrapper  = array( 'single-product-wrapper' );
$class_summary  = array( 'summary entry-summary' );
if ( !empty( $attachment_ids ) && has_post_thumbnail() || !empty( $video_url ) || !empty( $galleries ) ) {
    $class_wrapper[] = 'has-gallery';
}
$slide      = apply_filters( 'sadesmarket_slide_single_product_thumbnail', array(
    'infinite'     => false,
    'slidesMargin' => 10,
    'slidesToShow' => 5,
    'vertical'     => false,
    'responsive'   => array(
        array(
            'breakpoint' => 480,
            'settings'   => array(
                'vertical' => false,
            ),
        ),
    ),
) );
$data_slide = json_encode( $slide );
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
    <?php
    /**
     * Hook: sadesmarket_before_single_product_summary.
     *
     * @hooked woocommerce_template_single_title - 5
     * @hooked woocommerce_template_single_rating - 10
     */
    do_action( 'sadesmarket_before_single_product_summary' );
    ?>
    <div class="<?php echo esc_attr( implode( ' ', $class_wrapper ) ); ?>"
         data-slick="<?php echo esc_attr( $data_slide ); ?>">
        <?php
        /**
         * Hook: woocommerce_before_single_product_summary.
         *
         * @hooked woocommerce_show_product_sale_flash - 10
         * @hooked woocommerce_show_product_images - 20
         */
        do_action( 'woocommerce_before_single_product_summary' );
        ?>

        <div class="<?php echo esc_attr( implode( ' ', $class_summary ) ); ?>">
            <?php
            /**
             * Hook: woocommerce_single_product_summary.
             *
             * @hooked woocommerce_template_single_title - 5
             * @hooked woocommerce_template_single_rating - 10
             * @hooked woocommerce_template_single_price - 10
             * @hooked woocommerce_template_single_excerpt - 20
             * @hooked woocommerce_template_single_add_to_cart - 30
             * @hooked woocommerce_template_single_meta - 40
             * @hooked woocommerce_template_single_sharing - 50
             * @hooked WC_Structured_Data::generate_product_data() - 60
             */
            do_action( 'woocommerce_single_product_summary' );
            ?>
        </div>
    </div>

    <?php
    /**
     * Hook: woocommerce_after_single_product_summary.
     *
     * @hooked woocommerce_output_product_data_tabs - 10
     * @hooked woocommerce_upsell_display - 15
     * @hooked woocommerce_output_related_products - 20
     */
    do_action( 'woocommerce_after_single_product_summary' );
    ?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>

<?php sadesmarket_add_action( $hook, true ); ?>
