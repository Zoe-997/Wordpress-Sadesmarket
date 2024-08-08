<?php
if ( !defined( 'ABSPATH' ) ) {
    exit();
}

use Elementor\Controls_Manager as Controls_Manager;

class Elementor_Ovic_Blog extends Ovic_Widget_Elementor
{
    /**
     * Get widget name.
     *
     * Retrieve image widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name()
    {
        return 'ovic_blog';
    }

    /**
     * Get widget title.
     *
     * Retrieve image widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title()
    {
        return esc_html__( 'Blog', 'sadesmarket' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve image widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon()
    {
        return 'eicon-post-list';
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'general_section',
            array(
                'tab'   => Controls_Manager::TAB_CONTENT,
                'label' => esc_html__( 'General', 'sadesmarket' ),
            )
        );

        $this->add_control(
            'style',
            [
                'type'    => Controls_Manager::SELECT,
                'label'   => esc_html__( 'Select style', 'sadesmarket' ),
                'options' => sadesmarket_preview_options( $this->get_name() ),
                'default' => 'style-01',
            ]
        );

        $this->add_control(
            'image_width',
            [
                'type'    => Controls_Manager::NUMBER,
                'label'   => esc_html__( 'Image width', 'sadesmarket' ),
                'default' => 272,
            ]
        );

        $this->add_control(
            'image_height',
            [
                'type'    => Controls_Manager::NUMBER,
                'label'   => esc_html__( 'Image height', 'sadesmarket' ),
                'default' => 170,
            ]
        );

        $this->add_control(
            'image_full_size',
            [
                'type'  => Controls_Manager::SWITCHER,
                'label' => esc_html__( 'Image Full size', 'sadesmarket' ),
            ]
        );

        $this->add_control(
            'target',
            [
                'label'   => esc_html__( 'Target', 'sadesmarket' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'recent_post' => esc_html__( 'Latest', 'sadesmarket' ),
                    'popularity'  => esc_html__( 'Popularity', 'sadesmarket' ),
                    'date'        => esc_html__( 'Date', 'sadesmarket' ),
                    'title'       => esc_html__( 'Title', 'sadesmarket' ),
                    'post'        => esc_html__( 'Post', 'sadesmarket' ),
                    'random'      => esc_html__( 'Random', 'sadesmarket' ),
                ],
                'default' => 'recent_post',
            ]
        );

        if ( class_exists( 'ElementorPro\Modules\QueryControl\Module' ) ) {
            $this->add_control(
                'ids',
                [
                    'label'        => esc_html__( 'Search Post', 'sadesmarket' ),
                    'type'         => ElementorPro\Modules\QueryControl\Module::QUERY_CONTROL_ID,
                    'options'      => [],
                    'label_block'  => true,
                    'multiple'     => true,
                    'autocomplete' => [
                        'object' => ElementorPro\Modules\QueryControl\Module::QUERY_OBJECT_POST,
                        'query'  => [
                            'post_type' => 'post'
                        ],
                    ],
                    'condition'    => [
                        'target' => 'post'
                    ],
                    'export'       => false,
                ]
            );
        } else {
            $this->add_control(
                'ids',
                [
                    'label'       => esc_html__( 'Post', 'sadesmarket' ),
                    'type'        => Controls_Manager::TEXT,
                    'description' => esc_html__( 'Post ids', 'sadesmarket' ),
                    'placeholder' => '1,2,3',
                    'label_block' => true,
                    'condition'   => [
                        'target' => 'post'
                    ],
                ]
            );
        }

        $this->add_control(
            'category',
            [
                'label'       => esc_html__( 'Category', 'sadesmarket' ),
                'type'        => Controls_Manager::SELECT2,
                'options'     => $this->get_taxonomy( [
                    'meta_key'   => '',
                    'hide_empty' => true,
                ] ),
                'label_block' => true,
                'condition'   => [
                    'target!' => 'post'
                ],
            ]
        );

        $this->add_control(
            'limit',
            [
                'label'       => esc_html__( 'Limit', 'sadesmarket' ),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 6,
                'placeholder' => 6,
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label'   => esc_html__( 'Order by', 'sadesmarket' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    ''              => esc_html__( 'None', 'sadesmarket' ),
                    'date'          => esc_html__( 'Date', 'sadesmarket' ),
                    'ID'            => esc_html__( 'ID', 'sadesmarket' ),
                    'author'        => esc_html__( 'Author', 'sadesmarket' ),
                    'title'         => esc_html__( 'Title', 'sadesmarket' ),
                    'modified'      => esc_html__( 'Modified', 'sadesmarket' ),
                    'rand'          => esc_html__( 'Random', 'sadesmarket' ),
                    'comment_count' => esc_html__( 'Comment count', 'sadesmarket' ),
                    'menu_order'    => esc_html__( 'Menu order', 'sadesmarket' ),
                    'post__in'      => esc_html__( 'Post In', 'sadesmarket' ),
                ],
            ]
        );

        $this->add_control(
            'order',
            [
                'label'   => esc_html__( 'Sort order', 'sadesmarket' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    ''     => esc_html__( 'None', 'sadesmarket' ),
                    'DESC' => esc_html__( 'Descending', 'sadesmarket' ),
                    'ASC'  => esc_html__( 'Ascending', 'sadesmarket' ),
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'carousel_section',
            [
                'tab'   => Controls_Manager::TAB_SETTINGS,
                'label' => esc_html__( 'Carousel settings', 'sadesmarket' ),
            ]
        );

        $this->add_control(
            'slide_nav',
            [
                'label'   => esc_html__( 'Nav style', 'sadesmarket' ),
                'type'    => Controls_Manager::SELECT,
                'options' => sadesmarket_nav_style(),
                'default' => '',
            ]
        );

        $this->carousel_settings( false );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        echo ovic_do_shortcode( $this->get_name(), $settings );
    }
}