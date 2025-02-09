<?php
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 *
 * POST LINK
 **/
if ( !function_exists( 'sadesmarket_post_link' ) ) {
    function sadesmarket_post_link( $type = 'post', $id = 0 )
    {
        global $post;

        switch ( $type ) {
            case 'date':
                $archive_year  = get_the_time( 'Y' );
                $archive_month = get_the_time( 'm' );
                $archive_day   = get_the_time( 'd' );
                $permalink     = get_day_link( $archive_year, $archive_month, $archive_day );
                break;
            case 'auth':

                if ( $id == 0 ) {
                    $id = get_the_author_meta( 'ID' );
                }
                $permalink = get_author_posts_url( $id );
                break;
            default:

                if ( $id == 0 ) {
                    $id = get_the_ID();
                }
                $permalink = get_the_permalink( $id );
                break;
        }

        return apply_filters( 'ovic_loop_post_link', esc_url( $permalink ), $post );
    }
}
/**
 *
 * TEMPLATES FUNCTION
 **/
if ( !function_exists( 'sadesmarket_post_thumbnail_simple' ) ) {
    function sadesmarket_post_thumbnail_simple( $category = false, $effect = 'effect background-zoom' )
    {
        if ( has_post_thumbnail() ) : ?>
            <div class="post-thumb">
                <?php if ( $category ) sadesmarket_get_term_list(); ?>
                <a href="<?php echo sadesmarket_post_link(); ?>" class="thumb-link <?php echo esc_attr( $effect ); ?>">
                    <?php the_post_thumbnail( 'full' ); ?>
                </a>
                <?php do_action( 'sadesmarket_post_thumbnail_inner' ); ?>
            </div>
        <?php endif;
    }
}
if ( !function_exists( 'sadesmarket_post_thumbnail' ) ) {
    function sadesmarket_post_thumbnail( $width, $height, $category = false, $placeholder = true, $effect = 'effect background-zoom' )
    {
        $width  = apply_filters( 'sadesmarket_post_thumbnail_width', $width );
        $height = apply_filters( 'sadesmarket_post_thumbnail_height', $height );
        ?>
        <div class="post-thumb">
            <?php if ( $category ) sadesmarket_get_term_list(); ?>
            <a href="<?php echo sadesmarket_post_link(); ?>" class="thumb-link <?php echo esc_attr( $effect ); ?>">
                <figure>
                    <?php
                    $thumb = sadesmarket_resize_image( get_post_thumbnail_id(), $width, $height, true, true, $placeholder );
                    echo wp_specialchars_decode( $thumb['img'] );
                    ?>
                </figure>
            </a>
            <?php do_action( 'sadesmarket_post_thumbnail_inner' ); ?>
        </div>
        <?php
    }
}
if ( !function_exists( 'sadesmarket_post_author' ) ) {
    function sadesmarket_post_author( $icon = false )
    {
        ?>
        <div class="post-meta post-author">
            <a class="author" href="<?php echo sadesmarket_post_link( 'auth' ); ?>">
                <?php if ( $icon ): ?><span class="icon linearicons-user"></span><?php endif; ?>
                <span class="sub"><?php echo esc_html__( 'Post By', 'sadesmarket' ); ?></span>
                <?php the_author(); ?>
            </a>
        </div>
        <?php
    }
}
if ( !function_exists( 'sadesmarket_post_date' ) ) {
    function sadesmarket_post_date( $icon = false, $format = '' )
    {
        ?>
        <div class="post-meta post-date">
            <a href="<?php echo sadesmarket_post_link( 'date' ); ?>">
                <?php if ( $icon ): ?><span class="icon linearicons-clock3"></span><?php endif; ?>
                <?php
                if ( !empty( $format ) ) {
                    echo get_the_date( $format );
                } else {
                    echo get_the_date();
                }
                ?>
            </a>
        </div>
        <?php
    }
}
if ( !function_exists( 'sadesmarket_post_comment' ) ) {
    function sadesmarket_post_comment( $icon = false )
    {
        ?>
        <div class="post-meta post-comment">
            <a href="<?php echo sadesmarket_post_link(); ?>#comments" class="comment">
                <?php if ( $icon ): ?><span class="icon linearicons-bubble-dots"></span><?php endif; ?>
                <?php comments_number(
                    esc_html__( '0', 'sadesmarket' ),
                    esc_html__( '1', 'sadesmarket' ),
                    esc_html__( '%', 'sadesmarket' )
                ); ?>
            </a>
        </div>
        <?php
    }
}
if ( !function_exists( 'sadesmarket_author_info' ) ) {
    function sadesmarket_author_info()
    {
        $enable    = sadesmarket_get_option( 'enable_author_info' );
        $author_id = get_the_author_meta( 'ID' );
        if ( $enable ):?>
            <div class="post-author-info">
                <div class="avatar">
                    <a href="<?php echo sadesmarket_post_link( 'auth' ); ?>">
                        <?php echo get_avatar( $author_id, 100 ); ?>
                    </a>
                </div>
                <div class="content">
                    <p class="name"><?php the_author(); ?></p>
                    <p class="desc"><?php echo get_the_author_meta( 'description', $author_id ); ?></p>
                    <a href="<?php echo sadesmarket_post_link( 'auth' ); ?>" class="button">
                        <?php echo esc_html__( ' All Author Posts', 'sadesmarket' ); ?>
                    </a>
                </div>
            </div>
        <?php
        endif;
    }
}
if ( !function_exists( 'sadesmarket_post_time_diff' ) ) {
    function sadesmarket_post_time_diff( $icon = false )
    {
        $posted = get_the_time( 'U' );
        ?>
        <a class="posted" href="<?php echo sadesmarket_post_link(); ?>">
            <?php if ( $icon ): ?><span class="icon"></span><?php endif; ?>
            <?php echo human_time_diff( $posted, current_time( 'U' ) ); ?>
        </a>
        <?php
    }
}
if ( !function_exists( 'sadesmarket_get_term_list' ) ) {
    function sadesmarket_get_term_list( $taxonomy = 'category', $title = '' )
    {
        $class = 'cat-list ' . $taxonomy;
        if ( $taxonomy == 'category' ) $class .= ' post_cat';
        if ( !empty( $title ) ) {
            $title = '<span class="sub">' . $title . '</span>';
        }
        echo get_the_term_list( get_the_ID(), $taxonomy,
            '<div class="' . $class . '">' . $title . '<div class="inner">',
            ', ',
            '</div></div>'
        );
    }
}
if ( !function_exists( 'sadesmarket_post_formats' ) ) {
    function sadesmarket_post_formats()
    {
        $data      = '';
        $default   = 'standard';
        $format    = get_post_format();
        $post_meta = get_post_meta( get_the_ID(), '_custom_metabox_post_options', true );
        if ( !empty( $post_meta['post_formats'][ $format ] ) ) {
            $default = $format;
            $data    = $post_meta['post_formats'][ $format ];
        }
        sadesmarket_get_template(
            "templates/blog/blog-formats/format-{$default}.php",
            array(
                'data' => $data,
            )
        );
    }
}
if ( !function_exists( 'sadesmarket_post_pagination' ) ) {
    function sadesmarket_post_pagination()
    {
        $args = array( // WPCS: XSS ok.
            'screen_reader_text' => '&nbsp;',
            'before_page_number' => '',
            'prev_text'          => esc_html__( 'Prev', 'sadesmarket' ),
            'next_text'          => esc_html__( 'Next', 'sadesmarket' ),
            'type'               => 'list',
        );

        $pagination = sadesmarket_get_option( 'blog_pagination', 'pagination' );
        $blog_style = sadesmarket_get_option( 'blog_list_style', 'standard' );
        $animate    = 'fadeInUp';
        if ( $blog_style == 'masonry' ) {
            $animate = '';
        }

        if ( function_exists( 'ovic_custom_pagination' ) ) : ?>
            <div class="pagination-wrap">
                <?php
                ovic_custom_pagination(
                    array(
                        'pagination'    => $pagination,
                        'class'         => 'button',
                        'animate'       => $animate,
                        'text_loadmore' => esc_html__( 'Load more', 'sadesmarket' ),
                        'text_infinite' => esc_html__( 'Loading', 'sadesmarket' ),
                    ), $args
                );
                ?>
            </div>
        <?php else: ?>
            <div class="pagination-wrap">
                <nav class="woocommerce-pagination">
                    <?php echo paginate_links( $args ); ?>
                </nav>
            </div>
        <?php endif;
    }
}
if ( !function_exists( 'sadesmarket_post_title' ) ) {
    function sadesmarket_post_title( $link = true )
    {
        if ( get_the_title() ) {
            $tag = is_single() ? 'h1' : 'h2';
            if ( $link == true ) {
                echo '<' . $tag . ' class="post-title"><a href="' . sadesmarket_post_link() . '">' . get_the_title() . '</a></' . $tag . '>';
            } else {
                echo '<' . $tag . ' class="post-title"><span>' . get_the_title() . '</span></' . $tag . '>';
            }
        }
    }
}
if ( !function_exists( 'sadesmarket_post_readmore' ) ) {
    function sadesmarket_post_readmore( $icon = true, $title = '' )
    {
        $text = !empty( $title ) ? $title : esc_html__( 'Read More...', 'sadesmarket' );
        ?>
        <div class="post-readmore">
            <a href="<?php echo sadesmarket_post_link(); ?>">
                <?php echo esc_html( $text ); ?>
                <?php if ( $icon ): ?><span class="icon"></span><?php endif; ?>
            </a>
        </div>
        <?php
    }
}
if ( !function_exists( 'sadesmarket_post_excerpt' ) ) {
    function sadesmarket_post_excerpt( $count = null )
    {
        ?>
        <div class="post-excerpt">
            <?php
            if ( $count == null ) {
                echo apply_filters( 'the_excerpt', get_the_excerpt() );
            } else {
                echo wp_trim_words( apply_filters( 'the_excerpt', get_the_excerpt() ), $count,
                    esc_html__( '...', 'sadesmarket' ) );
            }
            ?>
        </div>
        <?php
    }
}
if ( !function_exists( 'sadesmarket_post_content' ) ) {
    function sadesmarket_post_content()
    {
        if ( !is_search() ):
            ?>
            <div class="post-content">
                <?php
                /* translators: %s: Name of current post */
                the_content( sprintf(
                        esc_html__( 'Continue reading %s', 'sadesmarket' ),
                        the_title( '<span class="screen-reader-text">', '</span>', false )
                    )
                );
                wp_link_pages( array(
                        'before'      => '<div class="post-pagination"><span class="title">' . esc_html__( 'Pages:',
                                'sadesmarket' ) . '</span>',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                    )
                );
                ?>
            </div>
        <?php
        endif;
    }
}
if ( !function_exists( 'sadesmarket_post_share' ) ) {
    function sadesmarket_post_share()
    {
        $share = sadesmarket_get_option( 'enable_share_post' );
        if ( $share == 1 ): ?>
            <div class="post-share">
                <?php ovic_share_button( get_the_ID() ); ?>
            </div>
        <?php endif;
    }
}
if ( !function_exists( 'sadesmarket_pagination_post' ) ) {
    function sadesmarket_pagination_post()
    {
        $enable    = sadesmarket_get_option( 'enable_pagination_post' );
        $prev_post = get_previous_post();
        $next_post = get_next_post();
        if ( $enable == 1 ):
            ?>
            <nav class="pagination-post">
                <div class="inner">
                    <?php if ( !empty( $prev_post ) ): ?>
                        <div class="item prev">
                            <a class="link" href="<?php echo sadesmarket_post_link( 'post', $prev_post->ID ); ?>">
                                <span class="text"><?php echo esc_html__( 'Previous Post', 'sadesmarket' ); ?></span>
                                <span class="title"><?php echo esc_html( $prev_post->post_title ) ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if ( !empty( $next_post ) ): ?>
                        <div class="item next">
                            <a class="link" href="<?php echo sadesmarket_post_link( 'post', $next_post->ID ); ?>">
                                <span class="text"><?php echo esc_html__( 'Next Post', 'sadesmarket' ); ?></span>
                                <span class="title"><?php echo esc_html( $next_post->post_title ) ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </nav>
        <?php
        endif;
    }
}
if ( !function_exists( 'sadesmarket_comment_form_args' ) ) {
    function sadesmarket_comment_form_args()
    {
        return array(
            'wraper_start' => '<div class="row">',
            'author'       => '<p class="comment-form-author col-sm-6"><label for="author">' . esc_attr__( 'Name', 'sadesmarket' ) . '</label><input type="text" name="author" id="author" required="required" /></p>',
            'email'        => '<p class="comment-form-email col-sm-6"><label for="email">' . esc_attr__( 'Email', 'sadesmarket' ) . '</label><input type="text" name="email" id="email" required="required" /></p>',
            'website'        => '<p class="comment-form-website col-sm-12"><label for="website">' . esc_attr__( 'Website', 'sadesmarket' ) . '</label><input type="text" name="website" id="website" required="required" /></p>',
            'wraper_end'   => '</div>',
        );
    }
}
if ( !function_exists( 'sadesmarket_comment_form_field' ) ) {
    function sadesmarket_comment_form_field( $text = '' )
    {
        if ( empty( $text ) ) $text = esc_attr__( 'Comment', 'sadesmarket' );
        return '<p class="comment-form-comment"><label for="author">' . $text . '</label><textarea class="input-form" id="comment" name="comment" cols="45" rows="8" aria-required="true">' . '</textarea></p>';
    }
}
if ( !function_exists( 'sadesmarket_callback_comment' ) ) {
    /**
     * Ocolus comment template
     *
     * @param  array $comment the comment array.
     * @param  array $args the comment args.
     * @param  int $depth the comment depth.
     *
     * @since 1.0.0
     */
    function sadesmarket_callback_comment( $comment, $args, $depth )
    {
        $tag       = ( 'div' === $args['style'] ) ? 'div' : 'li';
        $commenter = wp_get_current_commenter();
        if ( $commenter['comment_author_email'] ) {
            $moderation_note = esc_html__( 'Your comment is awaiting moderation.', 'sadesmarket' );
        } else {
            $moderation_note = esc_html__( 'Your comment is awaiting moderation. This is a preview, your comment will be visible after it has been approved.',
                'sadesmarket' );
        }
        ?>
        <<?php echo wp_specialchars_decode( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? 'parent' : '', $comment ); ?>>
        <div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <?php if ( 0 != $args['avatar_size'] ): ?>
                <div class="comment-avatar">
                    <figure><?php echo get_avatar( $comment, $args['avatar_size'] ); ?></figure>
                </div>
            <?php endif; ?>
            <div class="comment-info">
                <div class="comment-author vcard">
                    <?php
                    /* translators: %s: comment author link */
                    printf( '<b class="fn">%s</b>', get_comment_author_link( $comment ) );
                    ?>
                </div>
                <div class="comment-date">
                    <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
                        <time datetime="<?php comment_time( 'c' ); ?>">
                            <?php
                            /* translators: 1: comment date */
                            printf( esc_html__( '%1$s', 'sadesmarket' ), get_comment_date( '', $comment ) );
                            ?>
                        </time>
                    </a>
                </div>
                <?php
                edit_comment_link(
                    esc_html__( 'Edit', 'sadesmarket' ),
                    '<span class="edit-link">',
                    '</span>'
                );
                ?>
                <div class="comment-text">
                    <?php comment_text(); ?>
                </div>
                <?php
                comment_reply_link(
                    array_merge( $args,
                        array(
                            'reply_text' => esc_html__( 'Reply', 'sadesmarket' ),
                            'add_below'  => 'div-comment',
                            'depth'      => $depth,
                            'max_depth'  => $args['max_depth'],
                            'before'     => '<div class="reply">',
                            'after'      => '</div>',
                        )
                    )
                );
                ?>
                <?php if ( '0' == $comment->comment_approved ) : ?>
                    <em class="comment-awaiting-moderation"><?php echo esc_html( $moderation_note ); ?></em>
                <?php endif; ?>
            </div>
        </div><!-- .comment-body -->
        <?php
    }
}