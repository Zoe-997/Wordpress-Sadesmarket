<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Widget_Ovic_Social' ) ) {
	class Widget_Ovic_Social extends OVIC_Widget
	{
		/**
		 * Constructor.
		 */
		public function __construct()
		{
			$this->widget_cssclass    = 'ovic-socials';
			$this->widget_description = 'Display the customer social.';
			$this->widget_id          = 'ovic_social';
			$this->widget_name        = esc_html__( 'Ovic: Social', 'sadesmarket' );
			$this->settings           = array(
				'title'    => array(
					'type'  => 'text',
					'title' => esc_html__( 'Title', 'sadesmarket' ),
				),
				'socials' => array(
					'type'           => 'select',
					'title'          => esc_html__( 'Socials', 'sadesmarket' ),
					'options'        => sadesmarket_social_option(),
					'multiple'    	 => true,
				),
			);

			parent::__construct();
		}

		/**
		 * Output widget.
		 *
		 * @param  array  $args
		 * @param  array  $instance
		 *
		 * @see WP_Widget
		 *
		 */
		public function widget( $args, $instance )
		{
			$this->widget_start( $args, $instance );

			unset( $instance['title'] );

			echo ovic_do_shortcode( 'ovic_social', $instance );

			$this->widget_end( $args );
		}
	}
}