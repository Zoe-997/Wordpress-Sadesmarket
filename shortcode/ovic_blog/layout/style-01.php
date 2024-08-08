<div class="post-inner">
    <?php sadesmarket_post_thumbnail( $atts['image_width'], $atts['image_height'], false ); ?>
    <div class="post-info">
        <h2 class="post-title"><a href="<?php echo sadesmarket_post_link(); ?>"><?php echo wp_trim_words( get_the_title(), 5, '...' );?></a></h2>
        <?php
        sadesmarket_post_date(true);
        ?>
    </div>
</div>