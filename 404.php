<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage SadesMarket
 * @since 1.0
 * @version 1.0
 */

get_header();
?>
<?php
$image = sadesmarket_get_option( '404_image' );
?>
    <div id="content" class="container site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <section class="error-404 not-found">
                    <?php if ( !empty( $image ) ) {
                        echo '<figure class="image">' . wp_get_attachment_image( $image, 'full' ) . '</figure>';
                    } ?>
                    <h1 class="page-title"><?php echo esc_html__( 'Page Not Found', 'sadesmarket' ); ?></h1>
                    <p class="subtitle"><?php echo esc_html__( 'Sorry, the page you\'ve requested is not available. Please try searching for something else or return to Homepage.', 'sadesmarket' ); ?></p>
                    <a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Return to Homepage', 'sadesmarket' ); ?></a>
                </section><!-- .error-404 -->
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .wrap -->
<?php
get_footer();
