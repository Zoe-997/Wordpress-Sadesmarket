<?php
if (!defined('ABSPATH')) {
    exit();
}

use Elementor\Controls_Manager as Controls_Manager;

class Elementor_Ovic_Banner extends Ovic_Widget_Elementor
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
        return 'ovic_banner';
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
        return esc_html__('Banner', 'sadesmarket');
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
        return 'eicon-image-box';
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'general_section',
            array(
                'tab'   => Controls_Manager::TAB_CONTENT,
                'label' => esc_html__('General', 'sadesmarket'),
            )
        );

        $this->add_control(
            'style',
            [
                'type'    => Controls_Manager::SELECT,
                'label'   => esc_html__('Select style', 'sadesmarket'),
                'options' => sadesmarket_preview_options(
                    $this->get_name()
                ),
                'default' => 'style-01',
            ]
        );

        $this->add_control(
            'image',
            [
                'label'   => esc_html__('Choose Image', 'sadesmarket'),
                'type'    => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_responsive_control(
            'height',
            [
                'label'     => esc_html__('Height', 'sadesmarket'),
                'type'      => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .ovic-banner .inner' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'border_radius',
            [
                'label'     => esc_html__('Border Radius', 'sadesmarket'),
                'type'      => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .ovic-banner .inner' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'text_01',
            [
                'type'        => Controls_Manager::TEXTAREA,
                'label'       => esc_html__('Text 01', 'sadesmarket'),
                'description' => esc_html__('some style use tag "span" for hight light', 'sadesmarket'),
            ]
        );

        $this->add_control(
            'text_02',
            [
                'type'        => Controls_Manager::TEXTAREA,
                'label'       => esc_html__('Text 02', 'sadesmarket'),
                'description' => esc_html__('some style use tag "span" for hight light', 'sadesmarket'),'condition' => [
                    'style!' => [
                        'style-09',
                    ],
                ],
            ]
        );


        $this->add_control(
            'text_03',
            [
                'type'        => Controls_Manager::TEXTAREA,
                'label'       => esc_html__('Text 03', 'sadesmarket'),
                'description' => esc_html__('some style use tag "span" for hight light', 'sadesmarket'),
                'condition' => [
                    'style' => [
                        'style-02',
                        'style-03',
                        'style-04',
                        'style-05',
                        'style-08',
                        'style-10',
                        'style-12',
                    ],
                ],
            ]
        );

        $this->add_control(
            'text_04',
            [
                'type'        => Controls_Manager::TEXTAREA,
                'label'       => esc_html__('Text 04', 'sadesmarket'),
                'description' => esc_html__('some style use tag "span" for hight light', 'sadesmarket'),
                'condition' => [
                    'style' => [
                        'style-10',
                    ],
                ],
            ]
        );

        $this->add_control(
            'text_05',
            [
                'type'        => Controls_Manager::TEXTAREA,
                'label'       => esc_html__('Text 05', 'sadesmarket'),
                'description' => esc_html__('some style use tag "span" for hight light', 'sadesmarket'),
                'condition' => [
                    'style' => [
                        'style-10',
                    ],
                ],
            ]
        );

        $this->add_control(
            'link',
            [
                'type'        => Controls_Manager::URL,
                'label'       => esc_html__('Link', 'sadesmarket'),
                'placeholder' => esc_html__('https://your-link.com', 'sadesmarket'),
                'default'     => [
                    'url' => '#',
                ],
                'condition' => [
                    'style' => [
                        'style-02',
                        'style-03',
                        'style-04',
                        'style-05',
                    ],
                ],
            ]
        );

        $this->add_control(
            'text_button',
            [
                'type'    => Controls_Manager::TEXT,
                'label'   => esc_html__('Text button', 'sadesmarket'),
                'default' => 'Shop Now',
                'condition' => [
                    'style' => [
                        'style-02',
                        'style-03',
                        'style-04',
                        'style-05',
                    ],
                ],
            ]
        );

        $this->add_control(
            'image_effect',
            [
                'type'    => Controls_Manager::SELECT,
                'label'   => esc_html__('Hover Animation', 'sadesmarket'),
                'options' => [
                    'none'                          => esc_html__('None', 'sadesmarket'),
                    'zoom'                          => esc_html__('Zoom jquery', 'sadesmarket'),
                    'effect normal-effect'          => esc_html__('Normal Effect', 'sadesmarket'),
                    'effect normal-effect dark-bg'  => esc_html__('Normal Effect Dark', 'sadesmarket'),
                    'effect background-zoom'        => esc_html__('Background Zoom', 'sadesmarket'),
                    'effect background-slide'       => esc_html__('Background Slide', 'sadesmarket'),
                    'effect rotate-in rotate-left'  => esc_html__('Rotate Left In', 'sadesmarket'),
                    'effect rotate-in rotate-right' => esc_html__('Rotate Right In', 'sadesmarket'),
                    'effect plus-zoom'              => esc_html__('Plus Zoom', 'sadesmarket'),
                    'effect border-zoom'            => esc_html__('Border Zoom', 'sadesmarket'),
                    'effect border-scale'           => esc_html__('Border ScaleUp', 'sadesmarket'),
                    'effect border-plus'            => esc_html__('Border Plus', 'sadesmarket'),
                    'effect overlay-plus'           => esc_html__('Overlay Plus', 'sadesmarket'),
                    'effect overlay-cross'          => esc_html__('Overlay Cross', 'sadesmarket'),
                    'effect overlay-horizontal'     => esc_html__('Overlay Horizontal', 'sadesmarket'),
                    'effect overlay-vertical'       => esc_html__('Overlay Vertical', 'sadesmarket'),
                    'effect flashlight'             => esc_html__('Flashlight', 'sadesmarket'),
                ],
                'default' => 'none',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'price_section',
            array(
                'tab'       => Controls_Manager::TAB_CONTENT,
                'label'     => esc_html__('Price', 'sadesmarket'),
                'condition' => [
                    'style' => [
                        'style-01',
                        'style-06',
                        'style-07',
                        'style-08',
                        'style-09',
                        'style-11',
                        'style-12',
                        'style-13',
                    ],
                ],
            )
        );

        $this->add_control(
            'price',
            [
                'type'    => Controls_Manager::TEXT,
                'label'   => esc_html__('Price', 'sadesmarket'),
                'default' => '749',
            ]
        );

        $this->add_control(
            'price_text',
            [
                'type'    => Controls_Manager::TEXT,
                'label'   => esc_html__('Text', 'sadesmarket'),
                'default' => 'from',
            ]
        );

        $this->end_controls_section();
    }
}