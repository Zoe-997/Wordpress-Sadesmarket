<div id="header-sticky" class="header-sticky megamenu-wrap">
    <div class="container">
        <div class="header-inner">
            <?php sadesmarket_vertical_menu(); ?>
            <div class="box-header-nav">
                <?php sadesmarket_primary_menu(); ?>
            </div>
            <div class="header-control">
                <div class="inner-control">
                    <?php
                    sadesmarket_header_search_popup( true );
                    sadesmarket_header_user();
                    if ( function_exists( 'sadesmarket_header_wishlist' ) ) sadesmarket_header_wishlist();
                    if ( function_exists( 'sadesmarket_header_mini_cart' ) ) sadesmarket_header_mini_cart();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>