<?php
$page_layout = sadesmarket_page_layout();
$post_style  = sadesmarket_get_option( 'single_layout', 'standard' );
$class       = 'post-head style-' . $post_style . ' sidebar-' . $page_layout['layout'];
while ( have_posts() ): the_post(); ?>
    <div class="max-content-1110 content-1110-single ">
        <div class="<?php echo esc_attr( $class ); ?>">
            <?php if ( has_post_thumbnail() ) sadesmarket_post_formats(); ?>
        </div>
    </div>
<?php endwhile;
