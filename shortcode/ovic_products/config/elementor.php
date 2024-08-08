<?php
if ( !defined( 'ABSPATH' ) ) {
    exit();
}

use Elementor\Controls_Manager as Controls_Manager;

class Elementor_Ovic_Products extends Ovic_Widget_Elementor
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
        return 'ovic_products';
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
        return esc_html__( 'Products', 'sadesmarket' );
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
        return 'eicon-woocommerce';
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

        $this->start_controls_tabs( 'tabs_general' );

        $this->start_controls_tab(
            'tab_general',
            [
                'label' => esc_html__( 'Settings', 'sadesmarket' ),
            ]
        );

        $this->add_control(
            'list_style',
            array(
                'type'    => Controls_Manager::SELECT,
                'label'   => esc_html__( 'List style', 'sadesmarket' ),
                'options' => [
                    'none' => esc_html__( 'None', 'sadesmarket' ),
                    'grid' => esc_html__( 'Bootstrap', 'sadesmarket' ),
                    'owl'  => esc_html__( 'Carousel', 'sadesmarket' ),
                ],
                'default' => 'owl',
            )
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
                    'mix-one'   => esc_html__( 'Mix 1', 'sadesmarket' ),
                ],
                'default'   => '',
                'condition' => [
                    'list_style'    => 'owl',
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

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_products',
            [
                'label' => esc_html__( 'Products', 'sadesmarket' ),
            ]
        );

        $this->add_control(
            'pagination',
            [
                'label'   => esc_html__( 'Pagination', 'sadesmarket' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'none'      => esc_html__( 'None', 'sadesmarket' ),
                    'view_all'  => esc_html__( 'View all', 'sadesmarket' ),
                    'load_more' => esc_html__( 'Load More', 'sadesmarket' ),
                    'infinite'  => esc_html__( 'Infinite Scrolling', 'sadesmarket' ),
                ],
                'default' => 'none',
            ]
        );

        $this->add_control(
            'link',
            [
                'type'        => Controls_Manager::URL,
                'label'       => esc_html__( 'Link', 'sadesmarket' ),
                'placeholder' => esc_html__( 'https://your-link.com', 'sadesmarket' ),
                'default'     => [
                    'url' => '#',
                ],
                'condition'   => [
                    'pagination' => 'view_all',
                ],
            ]
        );

        $this->add_control(
            'text_button',
            [
                'type'      => Controls_Manager::TEXT,
                'label'     => esc_html__( 'Text button', 'sadesmarket' ),
                'default'   => 'VIEW ALL',
                'condition' => [
                    'pagination' => 'view_all',
                ],
            ]
        );

        $this->add_control(
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
            $this->add_control(
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
            $this->add_control(
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

        $this->add_control(
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
                    'price'         => esc_html__( 'Price: low to high', 'sadesmarket' ),
                    'price-desc'    => esc_html__( 'Price: high to low', 'sadesmarket' ),
                    'rating'        => esc_html__( 'Average Rating', 'sadesmarket' ),
                    'popularity'    => esc_html__( 'Popularity', 'sadesmarket' ),
                    'post__in'      => esc_html__( 'Post In', 'sadesmarket' ),
                    'most-viewed'   => esc_html__( 'Most Viewed', 'sadesmarket' ),
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

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'carousel_section',
            [
                'tab'       => Controls_Manager::TAB_SETTINGS,
                'label'     => esc_html__( 'Carousel settings', 'sadesmarket' ),
                'condition' => [
                    'list_style' => 'owl',
                ],
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

        $this->bootstrap_settings( [
            'tab'       => Controls_Manager::TAB_SETTINGS,
            'label'     => esc_html__( 'Bootstrap settings', 'sadesmarket' ),
            'condition' => [
                'list_style' => 'grid',
            ],
        ] );
    }

    protected function render()
    {
        $settings        = $this->get_settings_for_display();
        $settings['_id'] = substr( $this->get_id_int(), 0, 3 );

        echo ovic_do_shortcode( $this->get_name(), $settings );
    }
}