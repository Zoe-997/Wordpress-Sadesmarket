<?php
if ( !defined( 'ABSPATH' ) ) {
    exit();
}

use Elementor\Core\Schemes;
use Elementor\Controls_Manager as Controls_Manager;

class Elementor_Ovic_Tabs extends Ovic_Widget_Elementor
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
        return 'ovic_tabs';
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
        return esc_html__( 'Tabs', 'sadesmarket' );
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
        return 'eicon-product-tabs';
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'general_section',
            [
                'tab'   => Controls_Manager::TAB_CONTENT,
                'label' => esc_html__( 'General', 'sadesmarket' ),
            ]
        );

        $this->add_control(
            'style',
            [
                'type'    => Controls_Manager::SELECT,
                'label'   => esc_html__( 'Tab style', 'sadesmarket' ),
                'options' => sadesmarket_preview_options( $this->get_name() ),
                'default' => 'style-01',
            ]
        );

        $this->add_control(
            'tab_title',
            [
                'label'       => esc_html__( 'Title', 'sadesmarket' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'active',
            [
                'label'   => esc_html__( 'Active', 'sadesmarket' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 1,
                'min'     => 1,
            ]
        );

        $this->add_control(
            'is_ajax',
            [
                'label' => esc_html__( 'Enable ajax', 'sadesmarket' ),
                'type'  => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'has_border_title',
            [
                'type'         => Controls_Manager::SWITCHER,
                'label'        => esc_html__( 'Has Border Title', 'sadesmarket' ),
                'prefix_class' => 'border-',
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label'     => esc_html__( 'Alignment', 'sadesmarket' ),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'left'   => [
                        'title' => esc_html__( 'Left', 'sadesmarket' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'sadesmarket' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'  => [
                        'title' => esc_html__( 'Right', 'sadesmarket' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tabs-head' => 'text-align: {{VALUE}};',
                ],
                'default'   => '',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'tab_section',
            [
                'tab'   => Controls_Manager::TAB_CONTENT,
                'label' => esc_html__( 'Tab Content', 'sadesmarket' ),
            ]
        );

        $repeater = new Elementor\Repeater();

        $repeater->start_controls_tabs( 'tab_repeater' );

        $repeater->start_controls_tab(
            'tab_title',
            [
                'label' => esc_html__( 'Title', 'sadesmarket' ),
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label'       => esc_html__( 'Title', 'sadesmarket' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'Tab Title', 'sadesmarket' ),
                'placeholder' => esc_html__( 'Tab Title', 'sadesmarket' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'content',
            [
                'label'   => esc_html__( 'Content', 'sadesmarket' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'product'  => esc_html__( 'Products', 'sadesmarket' ),
                    'template' => esc_html__( 'Template', 'sadesmarket' ),
                    'link'     => esc_html__( 'Simple Link', 'sadesmarket' ),
                ],
                'default' => 'product',
            ]
        );

        $repeater->add_control(
            'selected_media',
            [
                'label'   => esc_html__( 'Media', 'sadesmarket' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'image' => esc_html__( 'Image', 'sadesmarket' ),
                    'icon'  => esc_html__( 'Icon', 'sadesmarket' ),
                ],
                'default' => 'image',
            ]
        );

        $repeater->add_control(
            'selected_icon',
            [
                'label'            => esc_html__( 'Icon', 'sadesmarket' ),
                'type'             => Controls_Manager::ICONS,
                'fa4compatibility' => 'icon',
                'default'          => [
                    'value'   => 'fas fa-star',
                    'library' => 'fa-solid',
                ],
                'condition'        => [
                    'selected_media' => 'icon'
                ],
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label'     => esc_html__( 'Image', 'sadesmarket' ),
                'type'      => Controls_Manager::MEDIA,
                'condition' => [
                    'selected_media' => 'image'
                ],
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label'       => esc_html__( 'Link', 'sadesmarket' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'sadesmarket' ),
                'default'     => [
                    'url' => '#',
                ],
                'condition'   => [
                    'content' => 'link',
                ],
            ]
        );

        $repeater->add_control(
            'class',
            [
                'label'       => esc_html__( 'Class', 'sadesmarket' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->end_controls_tab();

        $repeater->start_controls_tab(
            'tab_template',
            [
                'label'     => esc_html__( 'Template', 'sadesmarket' ),
                'condition' => [
                    'content' => 'template',
                ],
            ]
        );

        if ( class_exists( 'ElementorPro\Modules\QueryControl\Module' ) ) {
            $repeater->add_control(
                'template_id',
                [
                    'label'        => esc_html__( 'Template ID', 'sadesmarket' ),
                    'type'         => ElementorPro\Modules\QueryControl\Module::QUERY_CONTROL_ID,
                    'options'      => [],
                    'label_block'  => true,
                    'multiple'     => false,
                    'autocomplete' => [
                        'object' => ElementorPro\Modules\QueryControl\Module::QUERY_OBJECT_POST,
                        'query'  => [
                            'post_type' => 'elementor_library'
                        ],
                    ],
                    'description'  => sprintf( '%s <a href="%s" target="_blank">%s</a>',
                        esc_html__( 'Create template from', 'sadesmarket' ),
                        admin_url( 'edit.php?post_type=elementor_library&tabs_group=library' ),
                        esc_html__( 'Here', 'sadesmarket' )
                    ),
                    'export'       => false,
                ]
            );
        } else {
            $repeater->add_control(
                'template_id',
                [
                    'label'       => esc_html__( 'Template ID', 'sadesmarket' ),
                    'type'        => Controls_Manager::TEXT,
                    'label_block' => true,
                    'placeholder' => '1',
                    'description' => sprintf( '%s <a href="%s" target="_blank">%s</a>',
                        esc_html__( 'Create template from', 'sadesmarket' ),
                        admin_url( 'edit.php?post_type=elementor_library&tabs_group=library' ),
                        esc_html__( 'Here', 'sadesmarket' )
                    ),
                ]
            );
        }

        $repeater->end_controls_tab();

        $repeater->start_controls_tab(
            'tab_product',
            [
                'label'     => esc_html__( 'Product', 'sadesmarket' ),
                'condition' => [
                    'content' => 'product',
                ],
            ]
        );

        $repeater->add_control(
            'target',
            [
                'label'   => esc_html__( 'Target', 'sadesmarket' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'recent_products'       => esc_html__( 'Recent Products', 'sadesmarket' ),
                    'featured_products'     => esc_html__( 'Feature Products', 'sadesmarket' ),
                    'sale_products'         => esc_html__( 'Sale Products', 'sadesmarket' ),
                    'best_selling_products' => esc_html__( 'Best Selling Products', 'sadesmarket' ),
                    'top_rated_products'    => esc_html__( 'Top Rated Products', 'sadesmarket' ),
                    'products'              => esc_html__( 'Products', 'sadesmarket' ),
                    'product_category'      => esc_html__( 'Products Category', 'sadesmarket' ),
                    'related_products'      => esc_html__( 'Products Related', 'sadesmarket' ),
                ],
                'default' => 'recent_products',
            ]
        );

        if ( class_exists( 'ElementorPro\Modules\QueryControl\Module' ) ) {
            $repeater->add_control(
                'ids',
                [
                    'label'        => esc_html__( 'Search Product', 'sadesmarket' ),
                    'type'         => ElementorPro\Modules\QueryControl\Module::QUERY_CONTROL_ID,
                    'options'      => [],
                    'label_block'  => true,
                    'multiple'     => true,
                    'autocomplete' => [
                        'object' => ElementorPro\Modules\QueryControl\Module::QUERY_OBJECT_POST,
                        'query'  => [
                            'post_type' => 'product'
                        ],
                    ],
                    'condition'    => [
                        'target' => 'products'
                    ],
                    'export'       => false,
                ]
            );
        } else {
            $repeater->add_control(
                'ids',
                [
                    'label'       => esc_html__( 'Product', 'sadesmarket' ),
                    'type'        => Controls_Manager::TEXT,
                    'description' => esc_html__( 'Product ids', 'sadesmarket' ),
                    'placeholder' => '1,2,3',
                    'label_block' => true,
                    'condition'   => [
                        'target' => 'products'
                    ],
                ]
            );
        }

        $repeater->add_control(
            'category',
            [
                'label'       => esc_html__( 'Products Category', 'sadesmarket' ),
                'type'        => Controls_Manager::SELECT2,
                'options'     => $this->get_taxonomy( [
                    'hide_empty' => true,
                    'taxonomy'   => 'product_cat',
                ] ),
                'label_block' => true,
                'condition'   => [
                    'target!' => 'products'
                ],
            ]
        );

        $repeater->add_control(
            'limit',
            [
                'label'       => esc_html__( 'Limit', 'sadesmarket' ),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 6,
                'placeholder' => 6,
            ]
        );

        $repeater->add_control(
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
                    'price'         => esc_html__( 'Price: low to high', 'sadesmarket' ),
                    'price-desc'    => esc_html__( 'Price: high to low', 'sadesmarket' ),
                    'rating'        => esc_html__( 'Average Rating', 'sadesmarket' ),
                    'popularity'    => esc_html__( 'Popularity', 'sadesmarket' ),
                    'post__in'      => esc_html__( 'Post In', 'sadesmarket' ),
                    'most-viewed'   => esc_html__( 'Most Viewed', 'sadesmarket' ),
                ],
            ]
        );

        $repeater->add_control(
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

        $repeater->end_controls_tab();

        $repeater->end_controls_tabs();

        $this->add_control(
            'tabs',
            [
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'product_section',
            [
                'tab'   => Controls_Manager::TAB_SETTINGS,
                'label' => esc_html__( 'Product Settings', 'sadesmarket' ),
            ]
        );

        $this->add_control(
            'product_style',
            array(
                'type'    => Controls_Manager::SELECT,
                'label'   => esc_html__( 'Product style', 'sadesmarket' ),
                'options' => sadesmarket_product_options( 'Shortcode', true ),
                'default' => 'style-01',
            )
        );

        $this->add_control(
            'mix_style',
            array(
                'type'      => Controls_Manager::SELECT,
                'label'     => esc_html__( 'Mix Style', 'sadesmarket' ),
                'options'   => [
                    ''              => esc_html__( 'None', 'sadesmarket' ),
                    'mix-one' => esc_html__( 'Mix 1', 'sadesmarket' ),
                ],
                'default'   => '',
                'condition' => [
                    'product_style' => [
                        'style-03',
                    ],
                ],
            )
        );

        $this->product_size_field();

        $this->add_control(
            'size_thumb',
            [
                'type'    => Controls_Manager::SELECT,
                'label'   => esc_html__( 'Size of Image', 'sadesmarket' ),
                'options' => [
                    ''            => esc_html__( 'Small', 'sadesmarket' ),
                    'large'       => esc_html__( 'Large', 'sadesmarket' ),
                ],
                'default' => '',
                'condition' => [
                    'product_style' => [
                        'style-02'
                    ],
                ],
            ]
        );

        $this->add_control(
            'short_text',
            [
                'label'        => esc_html__( 'Short Title', 'sadesmarket' ),
                'prefix_class' => 'short-text-',
                'type'         => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'uppercase_title',
            [
                'label'        => esc_html__( 'Uppercase Title', 'sadesmarket' ),
                'prefix_class' => 'uppercase-title-',
                'type'         => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'disable_labels',
            [
                'label'        => esc_html__( 'Disable Labels', 'sadesmarket' ),
                'type'         => Controls_Manager::SWITCHER,
                'prefix_class' => 'labels-not-',
            ]
        );

        $this->add_control(
            'disable_cate',
            [
                'label'        => esc_html__( 'Disable Category', 'sadesmarket' ),
                'type'         => Controls_Manager::SWITCHER,
                'prefix_class' => 'cate-not-',
            ]
        );

        $this->add_control(
            'disable_rating',
            [
                'label'        => esc_html__( 'Disable Rating', 'sadesmarket' ),
                'type'         => Controls_Manager::SWITCHER,
                'prefix_class' => 'rating-not-',
            ]
        );

        $this->add_control(
            'disable_add_cart',
            [
                'label'        => esc_html__( 'Disable Add to Cart', 'sadesmarket' ),
                'type'         => Controls_Manager::SWITCHER,
                'prefix_class' => 'add-cart-not-',
            ]
        );

        $this->add_control(
            'overflow_visible',
            [
                'label' => esc_html__( 'Content Overflow', 'sadesmarket' ),
                'type'  => Controls_Manager::SWITCHER,
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
}