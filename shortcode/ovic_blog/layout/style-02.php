<div class="post-inner">
    <?php sadesmarket_post_thumbnail( $atts['image_width'], $atts['image_height'], false ); ?>
    <div class="post-info">
    	<?php
            sadesmarket_get_term_list();
        ?>
        <h2 class="post-title"><a href="<?php echo sadesmarket_post_link(); ?>"><?php echo wp_trim_words( get_the_title(), 8, '...' );?></a></h2>
        <div class="post-meta">
            <?php
            sadesmarket_post_comment(true);
            sadesmarket_post_date(true);
            ?>
        </div>
    </div>
</div>