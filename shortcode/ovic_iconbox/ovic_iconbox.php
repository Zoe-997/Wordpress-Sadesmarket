<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * Shortcode class
 * @var $this "Shortcode_Ovic_Iconbox"
 * @version 1.0.0
 */
class Shortcode_Ovic_Iconbox extends Ovic_Addon_Shortcode
{
	/**
	 * Shortcode name.
	 *
	 * @var  string
	 */
	public $shortcode = 'ovic_iconbox';
	public $default   = array(
		'style' => 'style-01',
		'title' => '',
		'desc'  => '',
	);

	public function content( $atts, $content = null )
	{
		$css_class = $this->main_class( $atts,
			array(
				'ovic-iconbox',
				$atts['style'],
                'effect bounce-in'
			)
		);
		if ( $atts['style'] == 'style-02' ||
             $atts['style'] == 'style-03' ){
            $css_class .= ' style-01';
        }

		ob_start();
		?>
        <div class="<?php echo esc_attr( $css_class ); ?>">
            <div class="inner">
                <div class="icon image-effect">
                    <?php \Elementor\Icons_Manager::render_icon( $atts['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </div>
                <div class="content">
                    <?php if ( ! empty( $atts['title'] ) ): ?>
                        <h3 class="title"><?php echo wp_specialchars_decode( $atts['title'] ); ?></h3>
                    <?php endif; ?>
                    <?php if ( ! empty( $atts['desc'] ) ): ?>
                        <p class="desc"><?php echo wp_specialchars_decode( $atts['desc'] ); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
		<?php
		return ob_get_clean();
	}
}