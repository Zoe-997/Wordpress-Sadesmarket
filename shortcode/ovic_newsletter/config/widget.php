<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

if ( !class_exists( 'Widget_Ovic_Newsletter' ) ) {
    class Widget_Ovic_Newsletter extends OVIC_Widget
    {
        /**
         * Constructor.
         */
        public function __construct()
        {
            $this->widget_cssclass = 'ovic-newsletter';
            $this->widget_id       = 'ovic_newsletter';
            $this->widget_name     = esc_html__( 'Ovic: Newsletter', 'sadesmarket' );
            $this->settings        = array(
                'title'       => array(
                    'type'  => 'text',
                    'title' => esc_html__( 'Title', 'sadesmarket' ),
                ),
                'style'       => array(
                    'type'    => 'select_preview',
                    'title'   => esc_html__( 'Select style', 'sadesmarket' ),
                    'options' => array(
                        'style-01' => array(
                            'title'   => esc_html__( 'Style 01', 'sadesmarket' ),
                            'preview' => get_theme_file_uri( 'shortcode/ovic_newsletter/layout/style-01.jpg' ),
                        ),
                        'style-02' => array(
                            'title'   => esc_html__( 'Style 02', 'sadesmarket' ),
                            'preview' => get_theme_file_uri( 'shortcode/ovic_newsletter/layout/style-02.jpg' ),
                        ),
                        'style-03' => array(
                            'title'   => esc_html__( 'Style 03', 'sadesmarket' ),
                            'preview' => get_theme_file_uri( 'shortcode/ovic_newsletter/layout/style-03.jpg' ),
                        ),
                    ),
                    'default' => 'style-01',
                ),
                'desc'        => array(
                    'type'  => 'text',
                    'title' => esc_html__( 'Description', 'sadesmarket' ),
                ),
                'placeholder' => array(
                    'type'  => 'text',
                    'title' => esc_html__( 'Input Placeholder', 'sadesmarket' ),
                ),
                'button'      => array(
                    'type'  => 'text',
                    'title' => esc_html__( 'Button', 'sadesmarket' ),
                ),
            );

            parent::__construct();
        }

        /**
         * Output widget.
         *
         * @param  array $args
         * @param  array $instance
         *
         * @see WP_Widget
         *
         */
        public function widget( $args, $instance )
        {
            $atts          = $instance;
            $atts['title'] = '';

            $this->widget_start( $args, $instance );

            unset( $instance['title'] );

            echo ovic_do_shortcode( 'ovic_newsletter', $atts );

            $this->widget_end( $args );
        }
    }
}