<?php
/**
 * Name: Blog Grid
 **/
?>
<?php
$page_layout   = sadesmarket_page_layout();
$container     = sadesmarket_theme_option_meta(
    '_custom_metabox_theme_options',
    'main_container',
    'metabox_main_container'
);
$sidebar_width = 0;
$sidebar_space = 0;
$columns       = 3;
$blog_space    = 15;
$crop          = 0.6277;
if ( $page_layout['layout'] == 'left' || $page_layout['layout'] == 'right' ) {
    $sidebar_width = sadesmarket_get_option( 'sidebar_width', 270 );
    $sidebar_space = sadesmarket_get_option( 'sidebar_space', 30 );
    $columns       = 2;
}
$width  = ( $container - $sidebar_width - $sidebar_space - ( ( $columns - 1 ) * ( $blog_space * 2 ) ) ) / $columns;
$height = $width * $crop;
?>
<div class="blog-content blog-grid response-content"
     style="--blog-columns: <?php echo esc_attr( $columns ); ?>; --blog-space: <?php echo esc_attr( $blog_space ); ?>px;">
    <?php while ( have_posts() ): the_post(); ?>
        <article <?php post_class( 'post-item style-01' ); ?>>
            <div class="post-inner">
                <?php sadesmarket_post_thumbnail( $width, $height, true ); ?>
                <div class="post-info">
                    <?php
                    sadesmarket_post_title();
                    if ( get_post_type() != 'product' ) {
                        sadesmarket_post_author();
                    }
                    sadesmarket_post_excerpt( 36 );
                    if ( get_post_type() != 'product' ) : ?>
                        <div class="post-foot">
                            <?php
                            sadesmarket_post_readmore();
                            sadesmarket_post_date();
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </article>
    <?php endwhile; ?>
</div>
<?php sadesmarket_post_pagination(); ?>
