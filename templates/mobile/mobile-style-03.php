<?php
/**
 * Name:  Mobile 03
 *
 * @var $account_link
 * @var $logo_link
 * @var $page_layout
 * @var $page_template
 **/
?>
<div class="main">
    <div class="container">
        <div class="inner">
            <div class="inner-control">
                <div class="block-minicart">
                    <a href="javascript:void(0)" class="menu-bar menu-toggle">
                        <span class="icon ovic-icon-menu"><span class="inner"><span></span><span></span><span></span></span></span>
                    </a>
                </div>
            </div>
            <?php echo sadesmarket_get_logo(); ?>
            <div class="inner-control">
                <div class="block-minicart">
                    <?php if ( function_exists( 'sadesmarket_header_cart_link' ) ) sadesmarket_header_cart_link( false ); ?>
                </div>
            </div>
            <?php sadesmarket_header_search(); ?>
        </div>
    </div>
</div>
<div class="fixed">
    <div class="inner">
        <a href="<?php echo esc_url( $logo_link ); ?>" class="home-page">
            <span class="icon linearicons-home"></span>
            <span class="text"><?php echo esc_html__( 'Home', 'sadesmarket' ); ?></span>
        </a>
        <a href="<?php echo esc_url( $account_link ); ?>" class="woo-user-link">
            <span class="icon linearicons-user"></span>
            <span class="text"><?php echo esc_html__( 'Account', 'sadesmarket' ); ?></span>
        </a>
        <?php if ( $page_layout['layout'] != 'full' && $page_template == '' ) : ?>
            <a href="javascript:void(0)" class="open-sidebar">
                <span class="icon linearicons-list4"></span>
                <span class="text"><?php echo esc_html__( 'Sidebar', 'sadesmarket' ); ?></span>
            </a>
        <?php elseif ( class_exists( 'WeDevs_Dokan' ) && dokan_is_store_page() ) : ?>
            <a href="javascript:void(0)" class="open-sidebar">
                <span class="icon linearicons-list4"></span>
                <span class="text"><?php echo esc_html__( 'Sidebar', 'sadesmarket' ); ?></span>
            </a>
        <?php endif; ?>
        <?php
        if ( class_exists( 'YITH_WCWL' ) ) : ?>
            <?php
            $wishlist_url = YITH_WCWL()->get_wishlist_url();
            $count        = YITH_WCWL()->count_products();
            if ( !empty( $wishlist_url ) ) : ?>
                <a class="woo-wishlist-link icon-link" href="<?php echo esc_url( $wishlist_url ); ?>">
                    <span class="icon linearicons-heart"></span>
                    <span class="text"><?php echo esc_html__( 'Wishlist', 'sadesmarket' ) ?></span>
                </a>
            <?php endif;
        endif;
        ?>
        <a href="javascript:void(0)" class="action-to-top">
            <span class="icon linearicons-chevrons-expand-vertical"></span>
            <span class="text"><?php echo esc_html__( 'Top', 'sadesmarket' ); ?></span>
        </a>
    </div>
</div>
