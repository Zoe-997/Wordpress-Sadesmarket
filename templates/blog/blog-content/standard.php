<?php
/**
 * Name: Blog Standard
 **/
?>
<div class="blog-content blog-standard response-content">
    <?php while ( have_posts() ): the_post(); ?>
        <article <?php post_class( 'post-item style-01' ); ?>>
            <div class="post-inner">
                <?php sadesmarket_post_thumbnail_simple(); ?>
                <div class="post-info">
                    <?php
                        sadesmarket_get_term_list();
                        sadesmarket_post_title();
                    ?>
                    <div class="post-meta">
                        <?php
                        if ( get_post_type() != 'product' ) {
                            sadesmarket_post_comment(true);
                            sadesmarket_post_date(true);
                        }
                        if ( get_post_type() != 'product' ) : ?>
                            <?php
                                
                            ?>
                        <?php endif; ?>
                    </div>
                    <?php
                        sadesmarket_post_excerpt( 50 );
                        if ( get_post_type() != 'product' ) {
                            sadesmarket_post_readmore();
                        }
                    ?>
                </div>
            </div>
        </article>
    <?php endwhile; ?>
</div>
<?php sadesmarket_post_pagination(); ?>
