<?php
$style    = '';
$bg_to    = sadesmarket_get_option( 'page_head_bg' );
$bg       = sadesmarket_theme_option_meta( '_custom_page_side_options', null, 'page_head_bg' );
$height   = sadesmarket_theme_option_meta( '_custom_page_side_options', null, 'page_head_height' );
$height_t = sadesmarket_theme_option_meta( '_custom_page_side_options', null, 'page_head_height_t' );
$height_m = sadesmarket_theme_option_meta( '_custom_page_side_options', null, 'page_head_height_m' );
if ( !empty( $bg ) ) {
    $style .= 'background-image: url(' . wp_get_attachment_image_url( $bg, '$bg' ) . ');';
} elseif ( !empty( $bg_to ) ) {
    $style .= 'background-image: url(' . wp_get_attachment_image_url( $bg_to, '$bg_to' ) . ');';
}
if ( !empty( $height ) )
    $style .= '--head-height: ' . $height . 'px;';
if ( !empty( $height_t ) )
    $style .= '--head-height-t: ' . $height_t . 'px;';
if ( !empty( $height_m ) )
    $style .= '--head-height-m: ' . $height_m . 'px;';
?>
<div class="page-head" <?php if ( !empty( $style ) ) echo 'style="' . esc_attr( $style ) . '""'; ?>>
    <div class="container">
        <div class="head-inner">
            <?php
            sadesmarket_breadcrumb();
            if ( !is_single() ) sadesmarket_page_title();
            ?>
        </div>
    </div>
</div>
