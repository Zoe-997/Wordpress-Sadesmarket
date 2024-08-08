<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * Shortcode class
 * @var $this "Shortcode_Ovic_Social"
 * @version 1.0.0
 */
class Shortcode_Ovic_Social extends Ovic_Addon_Shortcode
{
	/**
	 * Shortcode name.
	 *
	 * @var  string
	 */
	public $shortcode = 'ovic_social';
	public $default   = array(
		'style' => 'style-01',
	);

	public function content( $atts, $content = null )
	{
		$all_socials = sadesmarket_get_option( 'user_all_social' );
		$css_class   = $this->main_class( $atts,
			array(
				'ovic-socials',
				$atts['style']
			)
		);
		ob_start();
		?>
        <div class="<?php echo esc_attr( $css_class ); ?>">
            <div class="widget">
				<?php
				if ( ! empty( $atts['title'] ) ) {
					echo '<h4 class="widget-title">' . esc_html( $atts['title'] ) . '</h4>';
				}
				?>
                <div class="inner">
					<?php if ( ! empty( $atts['socials'] ) ) : ?>
						<?php foreach ( $atts['socials'] as $value ) : ?>
							<?php if ( isset( $all_socials[ $value ] ) ) :
								$array_socials = $all_socials[ $value ]; ?>
                                <a href="<?php echo esc_url( $array_socials['link_social'] ) ?>">
                                    <span class="icon <?php echo esc_attr( $array_socials['icon_social'] ); ?>"></span>
                                    <span class="text"><?php echo esc_html( $array_socials['title_social'] ); ?></span>
                                </a>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php endif; ?>
                </div>
            </div>
        </div>
		<?php
		return ob_get_clean();
	}
}