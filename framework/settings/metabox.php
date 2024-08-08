<?php if ( !defined( 'ABSPATH' ) ) {
    die;
} // Cannot access pages directly.
/*==========================================================================
METABOX BOX OPTIONS
===========================================================================*/
if ( !function_exists( 'sadesmarket_metabox_options' ) && class_exists( 'OVIC_Metabox' ) ) {
    function sadesmarket_metabox_options()
    {
        $vertical_menu = 'style-01,style-02,style-03,style-04,style-05,style-06';
        $sections = array();
        // -----------------------------------------
        // Page Side Meta box Options              -
        // -----------------------------------------
        $sections[] = array(
            'id'             => '_custom_page_side_options',
            'title'          => esc_html__( 'Custom Page Side Options', 'sadesmarket' ),
            'post_type'      => 'page',
            'context'        => 'side',
            'priority'       => 'high',
            'page_templates' => 'default',
            'sections'       => array(
                array(
                    'name'   => 'page_option',
                    'fields' => array(
                        array(
                            'id'    => 'page_head_bg',
                            'type'  => 'image',
                            'title' => esc_html__( 'Page Head Background', 'sadesmarket' ),
                            'desc'  => esc_html__( 'Default value in Theme Options', 'sadesmarket' ),
                        ),
                        array(
                            'id'    => 'page_head_height',
                            'type'  => 'number',
                            'title' => esc_html__( 'Page Head Height', 'sadesmarket' ),
                        ),
                        array(
                            'id'    => 'page_head_height_t',
                            'type'  => 'number',
                            'title' => esc_html__( 'Page Head Height on Tablet', 'sadesmarket' ),
                            'desc'  => esc_html__( 'resolution < 1200px', 'sadesmarket' ),
                        ),
                        array(
                            'id'    => 'page_head_height_m',
                            'type'  => 'number',
                            'title' => esc_html__( 'Page Head Height on Mobile', 'sadesmarket' ),
                            'desc'  => esc_html__( 'resolution < 768px', 'sadesmarket' ),
                        ),
                        array(
                            'id'         => 'sidebar_page_layout',
                            'type'       => 'image_select',
                            'title'      => esc_html__( 'Single Page Sidebar Position', 'sadesmarket' ),
                            'desc'       => esc_html__( 'Select sidebar position on Page.', 'sadesmarket' ),
                            'options'    => array(
                                'left'  => get_theme_file_uri( 'assets/images/left-sidebar.png' ),
                                'right' => get_theme_file_uri( 'assets/images/right-sidebar.png' ),
                                'full'  => get_theme_file_uri( 'assets/images/no-sidebar.png' ),
                            ),
                            'default'    => 'left',
                            'attributes' => array(
                                'data-depend-id' => 'sidebar_page_layout',
                            ),
                        ),
                        array(
                            'id'         => 'page_sidebar',
                            'type'       => 'select',
                            'title'      => esc_html__( 'Page Sidebar', 'sadesmarket' ),
                            'options'    => 'sidebars',
                            'dependency' => array( 'sidebar_page_layout', '!=', 'full' ),
                        ),
                        array(
                            'id'    => 'page_extra_class',
                            'type'  => 'text',
                            'title' => esc_html__( 'Extra Class', 'sadesmarket' ),
                        ),
                    ),
                ),
            ),
        );
        // -----------------------------------------
        // Page Meta box Options                   -
        // -----------------------------------------
        $sections[] = array(
            'id'        => '_custom_metabox_theme_options',
            'title'     => esc_html__( 'Custom Theme Options', 'sadesmarket' ),
            'post_type' => 'page',
            'context'   => 'normal',
            'priority'  => 'high',
            'sections'  => array(
                'options' => array(
                    'name'   => 'options',
                    'title'  => esc_html__( 'General', 'sadesmarket' ),
                    'icon'   => 'fa fa-wordpress',
                    'fields' => array(
                        array(
                            'id'    => 'enable_metabox_options',
                            'type'  => 'switcher',
                            'title' => esc_html__( 'Enable Metabox Options', 'sadesmarket' ),
                            'desc'  => esc_html__( 'If this option enable then this page will get setting in here, else this page will get setting in Theme Options', 'sadesmarket' ),
                        ),
                        array(
                            'id'    => 'metabox_logo',
                            'type'  => 'image',
                            'title' => esc_html__( 'Logo', 'sadesmarket' ),
                            'desc'  => esc_html__( 'Setting Logo For Site', 'sadesmarket' ),
                        ),
                        array(
                            'id'      => 'metabox_default_color',
                            'type'    => 'color',
                            'rgba'    => true,
                            'default' => '#222',
                            'title'   => esc_html__( 'Default Color', 'sadesmarket' ),
                        ),
                        array(
                            'id'      => 'metabox_main_color',
                            'type'    => 'color',
                            'rgba'    => true,
                            'default' => '#ffc000',
                            'title'   => esc_html__( 'Main Color', 'sadesmarket' ),
                        ),
                        array(
                            'id'      => 'metabox_main_color_2',
                            'type'    => 'color',
                            'rgba'    => true,
                            'default' => '#f04706',
                            'title'   => esc_html__( 'Main Color 2', 'sadesmarket' ),
                        ),
                        array(
                            'id'      => 'metabox_main_container',
                            'type'    => 'slider',
                            'title'   => esc_html__( 'Main Container', 'sadesmarket' ),
                            'min'     => 1140,
                            'max'     => 1920,
                            'step'    => 10,
                            'unit'    => esc_html__( 'px', 'sadesmarket' ),
                            'default' => 1680,
                        ),
                        array(
                            'id'             => 'body_typography',
                            'type'           => 'typography',
                            'title'          => esc_html__( 'Typography of Body', 'sadesmarket' ),
                            'font_family'    => true,
                            'font_weight'    => true,
                            'font_style'     => true,
                            'subset'         => true,
                            'text_align'     => true,
                            'text_transform' => true,
                            'font_size'      => true,
                            'line_height'    => true,
                            'letter_spacing' => true,
                            'extra_styles'   => true,
                            'color'          => true,
                            'output'         => 'body',
                        ),
                    ),
                ),
                'header'  => array(
                    'name'   => 'header',
                    'title'  => esc_html__( 'Header', 'sadesmarket' ),
                    'icon'   => 'fa fa-folder-open-o',
                    'fields' => array(
                        array(
                            'id'         => 'metabox_header_template',
                            'type'       => 'select_preview',
                            'options'    => sadesmarket_file_options( '/templates/header/', 'header' ),
                            'default'    => 'style-01',
                            'attributes' => array(
                                'data-depend-id' => 'metabox_header_template',
                            ),
                        ),
                        array(
                            'id'          => 'metabox_header_banner',
                            'type'        => 'select',
                            'options'     => 'page',
                            'chosen'      => true,
                            'ajax'        => true,
                            'placeholder' => esc_html__( 'None', 'sadesmarket' ),
                            'title'       => esc_html__( 'Header Banner', 'sadesmarket' ),
                            'desc'        => esc_html__( 'Get banner on header from page builder', 'sadesmarket' ),
                        ),
                        array(
                            'id'      => 'metabox_enable_primary_menu',
                            'type'    => 'switcher',
                            'title'   => esc_html__( 'Enable Primary Menu', 'sadesmarket' ),
                            'default' => 1,
                        ),
                        array(
                            'id'          => 'metabox_primary_menu',
                            'type'        => 'select',
                            'title'       => esc_html__( 'Primary Menu', 'sadesmarket' ),
                            'desc'        => esc_html__( 'default is Display location on Menu panel: "Primary Menu"', 'sadesmarket' ),
                            'options'     => 'menus',
                            'chosen'      => true,
                            'ajax'        => true,
                            'query_args'  => array(
                                'data-slug' => true,
                            ),
                            'placeholder' => esc_html__( 'None', 'sadesmarket' ),
                            'dependency'  => array( 'metabox_enable_primary_menu', '==', 1 ),
                        ),
                        array(
                            'id'          => 'metabox_header_submenu',
                            'type'        => 'select',
                            'title'       => esc_html__( 'Header Submenu', 'sadesmarket' ),
                            'options'     => 'menus',
                            'chosen'      => true,
                            'ajax'        => true,
                            'query_args'  => array(
                                'data-slug' => true,
                            ),
                            'placeholder' => esc_html__( 'None', 'sadesmarket' ),
                            'dependency' => array(
                                'metabox_header_template',
                                'any',
                                'style-01,style-02,style-03,style-06'
                            ),
                        ),
                        array(
                            'id'          => 'metabox_header_submenu_2',
                            'type'        => 'select',
                            'title'       => esc_html__( 'Header Submenu 2', 'sadesmarket' ),
                            'options'     => 'menus',
                            'chosen'      => true,
                            'ajax'        => true,
                            'query_args'  => array(
                                'data-slug' => true,
                            ),
                            'placeholder' => esc_html__( 'None', 'sadesmarket' ),
                            'dependency' => array(
                                'metabox_header_template',
                                'any',
                                'style-01,style-03,style-05,style-06'
                            ),
                        ),
                        array(
                            'id'    => 'metabox_header_message',
                            'type'  => 'text',
                            'title' => esc_html__( 'Header Message', 'sadesmarket' ),
                            'dependency' => array(
                                'metabox_header_template',
                                'any',
                                'style-01,style-02,style-03,style-06'
                            ),
                        ),
                        array(
                            'id'    => 'metabox_header_phone',
                            'type'  => 'text',
                            'title' => esc_html__( 'Header Phone', 'sadesmarket' ),
                        ),
                        array(
                            'id'          => 'metabox_vertical_menu',
                            'type'        => 'select',
                            'title'       => esc_html__( 'Vertical Menu', 'sadesmarket' ),
                            'options'     => 'menus',
                            'chosen'      => true,
                            'ajax'        => true,
                            'query_args'  => array(
                                'data-slug' => true,
                            ),
                            'placeholder' => esc_html__( 'None', 'sadesmarket' ),
                            'dependency'  => array( 'metabox_header_template', 'any', $vertical_menu, true ),
                        ),
                        array(
                            'id'      => 'metabox_vertical_title',
                            'type'    => 'text',
                            'title'   => esc_html__( 'Vertical Title', 'sadesmarket' ),
                            'default' => esc_html__( 'Shop by Department', 'sadesmarket' ),
                            'dependency' => array( 'metabox_header_template', 'any', $vertical_menu, true ),
                        ),
                        array(
                            'id'      => 'metabox_vertical_items',
                            'type'    => 'number',
                            'unit'    => 'items',
                            'default' => 10,
                            'title'   => esc_html__( 'Vertical Items', 'sadesmarket' ),
                            'dependency' => array( 'metabox_header_template', 'any', $vertical_menu, true ),
                        ),
                        array(
                            'id'      => 'metabox_vertical_show_more',
                            'type'    => 'text',
                            'title'   => esc_html__( 'Vertical Button Show More', 'sadesmarket' ),
                            'default' => esc_html__( 'See More', 'sadesmarket' ),
                            'dependency' => array( 'metabox_header_template', 'any', $vertical_menu, true ),
                        ),
                        array(
                            'id'      => 'metabox_vertical_show_less',
                            'type'    => 'text',
                            'title'   => esc_html__( 'Vertical Button Show Less', 'sadesmarket' ),
                            'default' => esc_html__( 'See Less', 'sadesmarket' ),
                            'dependency' => array( 'metabox_header_template', 'any', $vertical_menu, true ),
                        ),
                    ),
                ),
                'footer'  => array(
                    'name'   => 'footer',
                    'title'  => esc_html__( 'Footer', 'sadesmarket' ),
                    'icon'   => 'fa fa-folder-open-o',
                    'fields' => array(
                        array(
                            'id'      => 'metabox_footer_template',
                            'type'    => 'select_preview',
                            'default' => 'footer-01',
                            'options' => sadesmarket_footer_preview(),
                        ),
                    ),
                ),
            ),
        );
        // -----------------------------------------
        // Post Meta box Options                   -
        // -----------------------------------------
        $sections[] = array(
            'id'        => '_custom_metabox_post_options',
            'title'     => esc_html__( 'Post Meta', 'sadesmarket' ),
            'post_type' => 'post',
            'context'   => 'normal',
            'priority'  => 'high',
            'sections'  => array(
                array(
                    'name'   => 'post_options',
                    'icon'   => 'fa fa-picture-o',
                    'fields' => array(
                        array(
                            'id'    => 'post_formats',
                            'type'  => 'tabbed',
                            'title' => esc_html__( 'Post formats', 'sadesmarket' ),
                            'desc'  => esc_html__( 'The data post formats', 'sadesmarket' ),
                            'tabs'  => array(
                                array(
                                    'title'  => esc_html__( 'Quote', 'sadesmarket' ),
                                    'fields' => array(
                                        array(
                                            'id'         => 'quote',
                                            'type'       => 'text',
                                            'title'      => esc_html__( 'Quote Text', 'sadesmarket' ),
                                            'attributes' => array(
                                                'style' => 'width:100%',
                                            ),
                                        ),
                                    ),
                                ),
                                array(
                                    'title'  => esc_html__( 'Gallery', 'sadesmarket' ),
                                    'fields' => array(
                                        array(
                                            'id'    => 'gallery',
                                            'type'  => 'gallery',
                                            'title' => esc_html__( 'Gallery source', 'sadesmarket' ),
                                        ),
                                    ),
                                ),
                                array(
                                    'title'  => esc_html__( 'Video', 'sadesmarket' ),
                                    'fields' => array(
                                        array(
                                            'id'      => 'video',
                                            'type'    => 'upload',
                                            'library' => 'video',
                                            'title'   => esc_html__( 'Video source', 'sadesmarket' ),
                                        ),
                                    ),
                                ),
                                array(
                                    'title'  => esc_html__( 'Audio', 'sadesmarket' ),
                                    'fields' => array(
                                        array(
                                            'id'      => 'audio',
                                            'type'    => 'upload',
                                            'title'   => esc_html__( 'Audio source', 'sadesmarket' ),
                                            'library' => 'audio',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),

            ),
        );
        // -----------------------------------------
        // Product Meta box Options                -
        // -----------------------------------------
        if ( class_exists( 'WooCommerce' ) ) {
            $sections[] = array(
                'id'        => '_custom_metabox_product_options',
                'title'     => esc_html__( 'Custom Product Options', 'sadesmarket' ),
                'post_type' => 'product',
                'context'   => 'side',
                'priority'  => 'high',
                'sections'  => array(
                    array(
                        'name'   => 'product_option',
                        'fields' => array(
                            array(
                                'id'    => 'poster',
                                'type'  => 'image',
                                'title' => esc_html__( 'Poster Video', 'sadesmarket' ),
                            ),
                            array(
                                'id'    => 'video',
                                'type'  => 'text',
                                'title' => esc_html__( 'Video Url', 'sadesmarket' ),
                            ),
                            array(
                                'id'    => 'gallery',
                                'type'  => 'gallery',
                                'title' => esc_html__( '360 Degree', 'sadesmarket' ),
                            ),
                        ),
                    ),
                ),
            );
        }

        OVIC_Metabox::instance( apply_filters( 'sadesmarket_framework_metabox_options', $sections ) );
    }

    add_action( 'init', 'sadesmarket_metabox_options' );
}