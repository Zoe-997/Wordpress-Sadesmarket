<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

if ( !class_exists( 'Widget_Ovic_Blog' ) ) {
    class Widget_Ovic_Blog extends OVIC_Widget
    {
        /**
         * Constructor.
         */
        public function __construct()
        {
            $this->widget_cssclass    = 'ovic-blog';
            $this->widget_description = 'Display the customer blog.';
            $this->widget_id          = 'ovic_blog';
            $this->widget_name        = esc_html__( 'Ovic: Blog', 'sadesmarket' );
            $this->settings           = array(
                'title'    => array(
                    'type'  => 'text',
                    'title' => esc_html__( 'Title', 'sadesmarket' ),
                ),
                'style'    => array(
                    'type'    => 'select_preview',
                    'title'   => esc_html__( 'Select style', 'sadesmarket' ),
                    'options' => sadesmarket_file_options( '/shortcode/ovic_blog/layout/', '' ),
                    'default' => 'style-01',
                ),
                'target'   => array(
                    'type'       => 'select',
                    'title'      => esc_html__( 'Target', 'sadesmarket' ),
                    'options'    => array(
                        'recent_post' => esc_html__( 'Recent post', 'sadesmarket' ),
                        'popularity'  => esc_html__( 'Popularity', 'sadesmarket' ),
                        'date'        => esc_html__( 'Date', 'sadesmarket' ),
                        'title'       => esc_html__( 'Title', 'sadesmarket' ),
                        'random'      => esc_html__( 'Random', 'sadesmarket' ),
                    ),
                    'attributes' => array(
                        'data-depend-id' => 'target',
                        'style'          => 'width:100%',
                    ),
                    'default'    => 'recent_post',
                ),
                'category' => array(
                    'type'           => 'select',
                    'title'          => esc_html__( 'Category Blog', 'sadesmarket' ),
                    'options'        => 'categories',
                    'chosen'         => true,
                    'query_args'     => array(
                        'orderby' => 'name',
                        'order'   => 'ASC',
                    ),
                    'default_option' => esc_html__( 'Select a category', 'sadesmarket' ),
                    'placeholder'    => esc_html__( 'Select a category', 'sadesmarket' ),
                ),
                'limit'    => array(
                    'type'        => 'number',
                    'unit'        => 'items(s)',
                    'default'     => '6',
                    'title'       => esc_html__( 'Limit', 'sadesmarket' ),
                    'description' => esc_html__( 'How much items per page to show', 'sadesmarket' ),
                ),
                'orderby'  => array(
                    'type'        => 'select',
                    'title'       => esc_html__( 'Order by', 'sadesmarket' ),
                    'options'     => array(
                        ''              => esc_html__( 'None', 'sadesmarket' ),
                        'date'          => esc_html__( 'Date', 'sadesmarket' ),
                        'ID'            => esc_html__( 'ID', 'sadesmarket' ),
                        'author'        => esc_html__( 'Author', 'sadesmarket' ),
                        'title'         => esc_html__( 'Title', 'sadesmarket' ),
                        'modified'      => esc_html__( 'Modified', 'sadesmarket' ),
                        'rand'          => esc_html__( 'Random', 'sadesmarket' ),
                        'comment_count' => esc_html__( 'Comment count', 'sadesmarket' ),
                        'menu_order'    => esc_html__( 'Menu order', 'sadesmarket' ),
                    ),
                    'attributes'  => array(
                        'style' => 'width:100%',
                    ),
                    'description' => sprintf( esc_html__( 'Select how to sort retrieved products. More at %s.',
                        'sadesmarket' ),
                        '<a href="' . esc_url( 'http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters' ) . '" target="_blank">' . esc_html__( 'WordPress codex page',
                            'sadesmarket' ) . '</a>' ),
                ),
                'order'    => array(
                    'type'        => 'select',
                    'title'       => esc_html__( 'Sort order', 'sadesmarket' ),
                    'options'     => array(
                        ''     => esc_html__( 'None', 'sadesmarket' ),
                        'DESC' => esc_html__( 'Descending', 'sadesmarket' ),
                        'ASC'  => esc_html__( 'Ascending', 'sadesmarket' ),
                    ),
                    'attributes'  => array(
                        'style' => 'width:100%',
                    ),
                    'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.',
                        'sadesmarket' ),
                        '<a href="' . esc_url( 'http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters' ) . '" target="_blank">' . esc_html__( 'WordPress codex page',
                            'sadesmarket' ) . '</a>' ),
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
            $atts                 = $instance;
            $atts['title']        = '';
            $atts['carousel']     = array(
                'slidesToShow' => 1,
                'slidesMargin' => 15,
                'rows'         => 3,
                'arrows'       => false,
                'infinite'     => true,
            );
            $atts['image_width']  = 95;
            $atts['image_height'] = 95;

            $this->widget_start( $args, $instance );

            unset( $instance['title'] );

            echo ovic_do_shortcode( 'ovic_blog', $atts );

            $this->widget_end( $args );
        }
    }
}