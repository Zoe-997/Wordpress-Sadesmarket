<?php
if ( !defined( 'ABSPATH' ) ) {
    die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * Shortcode class
 * @var $this "Shortcode_Ovic_Testmonials"
 * @version 1.0.0
 */
class Shortcode_Ovic_Testmonials extends Ovic_Addon_Shortcode
{
    /**
     * Shortcode name.
     *
     * @var  string
     */
    public $shortcode = 'ovic_testmonials';
    public $default   = array(
        'style'             => 'style-01',
        'quote'             => 'yes',
        'slides_rows_space' => '',
        'slide_nav'         => '',
    );

    public function content( $atts, $content = null )
    {
        $css_class = $this->main_class( $atts, array(
            'ovic-testmonials',
            $atts['style'],
            'quote-' . $atts['quote'],
            $atts['slides_rows_space'],
            $atts['slide_nav']
        ) );

        ob_start();
        ?>
        <div class="<?php echo esc_attr( $css_class ); ?>">
            <?php if ( !empty( $atts['tabs'] ) ) :
                $owl_settings = $this->generate_carousel( $atts ); ?>
                <div class="owl-slick" <?php echo esc_attr( $owl_settings ); ?>>
                    <?php foreach ( $atts['tabs'] as $tab ) : ?>
                        <?php $link = $this->add_link_attributes( $tab['link'], true ); ?>
                        <div class="item">
                            <div class="inner text-center">
                                <?php if ( !empty( $tab['avatar']['id'] ) ): ?>
                                    <div class="avatar">
                                        <a <?php echo esc_attr( $link ); ?>><?php echo wp_get_attachment_image( $tab['avatar']['id'], 'full' ); ?></a>
                                    </div>
                                <?php endif; ?>
                                <?php if ( !empty( $tab['desc'] ) ): ?>
                                    <p class="desc"><?php echo nl2br( $tab['desc'] ); ?></p>
                                <?php endif; ?>
                                <div class="content">
                                    <?php if ( !empty( $tab['name'] ) ): ?>
                                        <p class="name"><a <?php echo esc_attr( $link ); ?>><?php echo esc_html( $tab['name'] ); ?></a></p>
                                    <?php endif; ?>
                                    <?php if ( !empty( $tab['position'] ) ): ?>
                                        <p class="position"><?php echo esc_html( $tab['position'] ); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
        return ob_get_clean();
    }
}