<?php
if ( !defined( 'ABSPATH' ) ) {
    exit();
}

use Elementor\Controls_Manager as Controls_Manager;

class Elementor_Ovic_Category extends Ovic_Widget_Elementor
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
        return 'ovic_category';
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
        return esc_html__( 'Category', 'sadesmarket' );
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
        return 'eicon-product-categories';
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
            'category',
            [
                'label'       => esc_html__( 'Products Category', 'sadesmarket' ),
                'type'        => Controls_Manager::SELECT2,
                'options'     => $this->get_taxonomy( [
                    'hide_empty' => false,
                    'taxonomy'   => 'product_cat',
                ] ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'title',
            [
                'type'        => Controls_Manager::TEXT,
                'label'       => esc_html__( 'Title', 'sadesmarket' ),
                'description' => esc_html__( 'Default is Category Name', 'sadesmarket' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'image',
            [
                'type'        => Controls_Manager::MEDIA,
                'label'       => esc_html__( 'Image', 'sadesmarket' ),
                'description' => esc_html__( 'Default is Category Thumbnail', 'sadesmarket' ),
                'label_block' => true,
                'condition'   => [
                    'style!' => [
                        'style-03',
                        'style-05',
                        'style-06'
                    ],
                ],
            ]
        );

        $this->add_control(
            'image_size',
            [
                'type'         => Controls_Manager::SELECT,
                'label'        => esc_html__( 'Image Size', 'sadesmarket' ),
                'options'      => [
                    'small'    => esc_html__( 'Small', 'sadesmarket' ),
                    'large'    => esc_html__( 'Large', 'sadesmarket' ),
                ],
                'prefix_class' => '',
                'default'      => 'small',
            ]
        );

        $this->add_control(
            'image_icon',
            [
                'type'             => Controls_Manager::ICONS,
                'label'            => esc_html__( 'Icon', 'sadesmarket' ),
                'description'      => esc_html__( 'Default is Category Thumbnail', 'sadesmarket' ),
                'fa4compatibility' => 'icon',
                'default'          => [
                    'value'   => 'far fa-paper-plane',
                    'library' => 'fa-regular',
                ],
                'condition'        => [
                    'style' => [
                        'style-03',
                        'style-05',
                        'style-06'
                    ],
                ],
            ]
        );

        $this->add_control(
            'count',
            [
                'type'    => Controls_Manager::SWITCHER,
                'label'   => esc_html__( 'Show Count', 'sadesmarket' ),
                'default' => 'yes',
            ]
        );

        $this->add_responsive_control(
            'height',
            [
                'label'     => esc_html__( 'Height', 'sadesmarket' ),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .thumb' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'style!' => [
                        'style-03',
                        'style-05',
                        'style-06'
                    ],
                ],
            ]
        );

        $this->add_control(
            'image_effect',
            [
                'type'    => Controls_Manager::SELECT,
                'label'   => esc_html__( 'Hover', 'sadesmarket' ),
                'options' => sadesmarket_effect_style(),
                'default' => '',
            ]
        );

        $this->end_controls_section();
    }
}