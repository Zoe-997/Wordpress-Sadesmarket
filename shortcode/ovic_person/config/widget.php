<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

if ( !class_exists( 'Widget_Ovic_Person' ) ) {
    class Widget_Ovic_Person extends OVIC_Widget
    {
        /**
         * Constructor.
         */
        public function __construct()
        {
            $this->widget_cssclass = 'ovic-person';
            $this->widget_id       = 'ovic_person';
            $this->widget_name     = esc_html__( 'Ovic: Person', 'sadesmarket' );
            $this->settings        = array(
                'title'     => array(
                    'type'  => 'text',
                    'title' => esc_html__( 'Title', 'sadesmarket' ),
                ),
                'style'     => array(
                    'type'    => 'select_preview',
                    'title'   => esc_html__( 'Select style', 'sadesmarket' ),
                    'options' => array(
                        'style-01' => array(
                            'title'   => esc_html__( 'Style 01', 'sadesmarket' ),
                            'preview' => get_theme_file_uri( 'shortcode/ovic_person/layout/style-01.jpg' ),
                        ),
                    ),
                    'default' => 'style-01',
                ),
                'avatar'    => array(
                    'type'  => 'image',
                    'title' => esc_html__( 'Avatar', 'sadesmarket' ),
                ),
                'name'      => array(
                    'type'  => 'text',
                    'title' => esc_html__( 'Name', 'sadesmarket' ),
                ),
                'desc'      => array(
                    'type'  => 'text',
                    'title' => esc_html__( 'Description', 'sadesmarket' ),
                ),
                'signature' => array(
                    'type'  => 'image',
                    'title' => esc_html__( 'Signature', 'sadesmarket' ),
                ),
                'link'      => array(
                    'type'  => 'text',
                    'title' => esc_html__( 'Link', 'sadesmarket' ),
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

            echo ovic_do_shortcode( 'ovic_person', $atts );

            $this->widget_end( $args );
        }
    }
}