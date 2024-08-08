<?php
if (!defined('ABSPATH')) {
    die('-1');
}

/**
 * Shortcode attributes
 * @var $atts
 * Shortcode class
 * @var $this "Shortcode_Ovic_Title"
 * @version 1.0.0
 */
class Shortcode_Ovic_Title extends Ovic_Addon_Shortcode
{
    /**
     * Shortcode name.
     *
     * @var  string
     */
    public $shortcode = 'ovic_title';
    public $default   = array(
        'style' => 'style-01',
        'title' => '',
    );

    public function content($atts, $content = null)
    {
        $css_class = $this->main_class($atts, array(
            'ovic-title',
            $atts['style'],
        ));
        if (empty($atts['title'])) {
            return '';
        }
        ob_start();
        ?>
        <div class="<?php echo esc_attr($css_class); ?>">
            <div class="inner">
                <h2 class="title"><?php echo esc_html($atts['title']); ?></h2>
                <?php if ( !empty( $atts['date'] ) ) :
                    $atts['date'] = apply_filters( 'ovic_change_datetime_countdown', $atts['date'], 0 );
                    $params = array(
                        'days_text' => !empty( $atts['days_text'] ) ? $atts['days_text'] : esc_html__( 'Days', 'sadesmarket' ),
                        'hrs_text'  => !empty( $atts['hrs_text'] ) ? $atts['hrs_text'] : esc_html__( 'Hours', 'sadesmarket' ),
                        'mins_text' => !empty( $atts['mins_text'] ) ? $atts['mins_text'] : esc_html__( 'Mins', 'sadesmarket' ),
                        'secs_text' => !empty( $atts['secs_text'] ) ? $atts['secs_text'] : esc_html__( 'Secs', 'sadesmarket' ),
                    );
                    wp_enqueue_script( 'sadesmarket-countdown' );
                    ?>
                    <div class="sadesmarket-countdown-wrapper">
                        <?php if ( !empty( $atts['date_title'] ) ): ?>
                            <span class="title"><?php echo wp_specialchars_decode( $atts['date_title'] ); ?></span>
                        <?php endif; ?>
                        <div class="sadesmarket-countdown"
                             data-datetime="<?php echo esc_attr( $atts['date'] ); ?>"
                             data-params="<?php echo esc_attr( wp_json_encode( $params ) ) ?>">
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ( !empty( $atts['button'] ) ):
                    $atts['button_link']['url'] = apply_filters( 'ovic_shortcode_vc_link', $atts['button_link']['url'] );
                    $link = $this->add_link_attributes( $atts['button_link'], true ); ?>
                    <div class="button-wrap"><a <?php echo esc_attr( $link ); ?>><?php echo esc_html( $atts['button'] ) ?></a></div>
                <?php endif; ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}