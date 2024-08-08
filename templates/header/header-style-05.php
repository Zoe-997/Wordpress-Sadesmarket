<?php
/**
 * Name: Header 05
 **/
?>
<header id="header" class="header style-01 style-05">
    <div class="header-mid">
        <div class="container">
            <div class="header-inner">
                <?php echo sadesmarket_get_logo(); ?>
                <div class="header-center">
                    <?php sadesmarket_header_search( true ); ?>
                </div>
                <div class="header-control">
                    <div class="inner-control">
                        <?php
                        sadesmarket_header_phone();
                        if ( function_exists( 'sadesmarket_header_mini_cart' ) ) sadesmarket_header_mini_cart();
                        if ( function_exists( 'sadesmarket_header_wishlist' ) ) sadesmarket_header_wishlist();
                        sadesmarket_header_user();
                        sadesmarket_header_menu_bar();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bot megamenu-wrap header-sticky">
        <div class="container">
            <div class="header-inner">
                <?php sadesmarket_vertical_menu(); ?>
                <div class="box-header-nav">
                    <?php sadesmarket_primary_menu(); ?>
                </div>
                <div class="last-menu">
                    <?php sadesmarket_header_submenu( 'header_submenu_2' ); ?>
                </div>
            </div>
        </div>
    </div>
</header>
