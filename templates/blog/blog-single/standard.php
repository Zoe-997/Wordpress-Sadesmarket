<?php
while ( have_posts() ): the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-item post-single' ); ?>>
        <div class="post-inner">
            <?php
                sadesmarket_get_term_list();
                sadesmarket_post_title(false);
            ?>
            <div class="post-meta">
                <?php
                sadesmarket_post_comment(true);
                sadesmarket_post_date(true);
                ?>
            </div>
            <?php sadesmarket_post_content(); ?>
            <div class="clear"></div>
            <?php
            sadesmarket_get_term_list( 'post_tag' );
            sadesmarket_post_share();
            ?>
            <div class="clear"></div>
            <?php
            sadesmarket_pagination_post();
            sadesmarket_author_info();
            ?>
        </div>
        <?php
        /*If comments are open or we have at least one comment, load up the comment template.*/
        if ( comments_open() || get_comments_number() ) comments_template();
        ?>
    </article>
<?php endwhile;