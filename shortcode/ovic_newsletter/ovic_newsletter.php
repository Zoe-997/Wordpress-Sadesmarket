<?php
if ( !defined( 'ABSPATH' ) ) {
    die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * Shortcode class
 * @var $this "Shortcode_Ovic_Newsletter"
 * @version 1.0.0
 */
class Shortcode_Ovic_Newsletter extends Ovic_Addon_Shortcode
{
    /**
     * Shortcode name.
     *
     * @var  string
     */
    public $shortcode = 'ovic_newsletter';
    public $default   = array(
        'style' => 'style-01',
    );

    public function newsletter_form( $html, $form_id )
    {
        if ( function_exists( 'mc4wp_show_form' ) ) {
            $api_key = mc4wp_get_api_key();
            if ( empty( $api_key ) ) {
                echo sprintf( '<div class="alert alert-warning"><strong>%s</strong> <a href="' . esc_url( 'https://wordpress.org/plugins/mailchimp-for-wp/' ) . '">%s</a></div>',
                    esc_html__( 'Warning!', 'sadesmarket' ),
                    esc_html__( 'API key is empty.', 'sadesmarket' )
                );
            }
            if ( $form_id == get_option( 'mc4wp_default_form_id', '0' ) ) {
                add_filter( 'mc4wp_form_content',
                    function ( $content, $form, $element ) use ( $html ) {
                        return $html;
                    }, 10, 3
                );
                mc4wp_show_form( $form_id );
                remove_all_filters( 'mc4wp_form_content' );
            } else {
                mc4wp_show_form( $form_id );
            }
        } else {
            echo sprintf( '<div class="alert alert-warning"><strong>%s</strong> <a href="' . esc_url( 'https://wordpress.org/plugins/mailchimp-for-wp/' ) . '">%s</a></div>',
                esc_html__( 'Warning!', 'sadesmarket' ),
                esc_html__( 'Please Active plugin "Mailchimp for WordPress".', 'sadesmarket' )
            );
        }
    }

    public function content( $atts, $content = null )
    {
        $css_class = $this->main_class( $atts, array(
            'ovic-newsletter',
            $atts['style']
        ) );
        $form_id   = get_option( 'mc4wp_default_form_id', '0' );
        if ( !empty( $atts['form_id'] ) ) {
            $form_id = $atts['form_id'];
        }
        ob_start();
        ?>
        <div class="<?php echo esc_attr( $css_class ); ?>">
            <?php
            $this->get_template( "layout/{$atts['style']}.php",
                array(
                    'atts'       => $atts,
                    'form_id'    => $form_id,
                    'newsletter' => $this,
                )
            );
            ?>
        </div>
        <?php
        return ob_get_clean();
    }
}