<?php
/**
 * Name:  Mobile 02
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
            <?php echo sadesmarket_get_logo(); ?>
            <?php sadesmarket_header_search(); ?>
            <div class="control">
                <div class="inner-control">
                    <div class="block-userlink">
                        <a class="woo-user-link" href="<?php echo esc_url( $account_link ); ?>">
                            <span class="icon linearicons-user"></span>
                        </a>
                    </div>
                    <?php if ( function_exists( 'sadesmarket_header_wishlist' ) ) sadesmarket_header_wishlist(); ?>
                    <div class="block-minicart">
                        <?php if ( function_exists( 'sadesmarket_header_cart_link' ) ) sadesmarket_header_cart_link( false ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="fixed sadesmarket-dropdown">
    <div class="inner">
        <a href="<?php echo esc_url( $logo_link ); ?>" class="home-page">
            <span class="icon linearicons-home"></span>
        </a>
        <a href="javascript:void(0)" class="menu-bar menu-toggle">
            <span class="icon linearicons-menu"></span>
        </a>
        <?php if ( $page_layout['layout'] != 'full' && $page_template == '' ) : ?>
            <a href="javascript:void(0)" class="open-sidebar">
                <span class="icon linearicons-list4"></span>
            </a>
        <?php elseif ( class_exists( 'WeDevs_Dokan' ) && dokan_is_store_page() ) : ?>
            <a href="javascript:void(0)" class="open-sidebar">
                <span class="icon linearicons-list4"></span>
            </a>
        <?php else: ?>
            <?php if ( function_exists( 'sadesmarket_header_cart_link' ) ) sadesmarket_header_cart_link( false ); ?>
        <?php endif; ?>
        <a href="javascript:void(0)" class="action-to-top">
            <span class="icon linearicons-chevrons-expand-vertical"></span>
        </a>
    </div>
    <a href="javascript:void(0)" class="mobile-toggle" data-sadesmarket="sadesmarket-dropdown">
        <span class="icon linearicons-cross"></span>
    </a>
</div>
