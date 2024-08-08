<?php if (!defined('ABSPATH')) {
    die;
} // Cannot access pages directly.
/*==========================================================================
THEME BOX OPTIONS
===========================================================================*/
if (!function_exists('sadesmarket_theme_options') && class_exists('OVIC_Options')) {
    function sadesmarket_theme_options()
    {
        $vertical_menu = 'style-01,style-02,style-03,style-04,style-05,style-06';
        $options       = array();
        // -----------------------------------------
        // Theme Options              -
        // -----------------------------------------
        $options['general_main'] = array(
            'name'     => 'general_main',
            'icon'     => 'fa fa-wordpress',
            'title'    => esc_html__('General', 'sadesmarket'),
            'sections' => array(
                array(
                    'title'  => esc_html__('General', 'sadesmarket'),
                    'fields' => array(
                        array(
                            'id'    => 'logo',
                            'type'  => 'image',
                            'title' => esc_html__('Logo', 'sadesmarket'),
                            'desc'  => esc_html__('Setting Logo For Site', 'sadesmarket'),
                        ),
                        array(
                            'id'      => 'default_color',
                            'type'    => 'color',
                            'rgba'    => true,
                            'default' => '#222',
                            'title'   => esc_html__('Default Color', 'sadesmarket'),
                        ),
                        array(
                            'id'      => 'main_color',
                            'type'    => 'color',
                            'rgba'    => true,
                            'default' => '#ffc000',
                            'title'   => esc_html__('Main Color', 'sadesmarket'),
                        ),
                        array(
                            'id'      => 'main_color_2',
                            'type'    => 'color',
                            'rgba'    => true,
                            'default' => '#f04706',
                            'title'   => esc_html__('Main Color 2', 'sadesmarket'),
                        ),
                        array(
                            'id'      => 'main_container',
                            'type'    => 'slider',
                            'title'   => esc_html__('Main Container', 'sadesmarket'),
                            'min'     => 1140,
                            'max'     => 1920,
                            'step'    => 10,
                            'unit'    => esc_html__('px', 'sadesmarket'),
                            'default' => 1680,
                        ),
                    ),
                ),
                array(
                    'title'  => esc_html__('Enable/Disable', 'sadesmarket'),
                    'fields' => array(
                        array(
                            'id'    => 'disable_equal',
                            'type'  => 'switcher',
                            'title' => esc_html__('Disable Equal Height', 'sadesmarket'),
                        ),
                        array(
                            'id'    => 'enable_cache_option',
                            'type'  => 'switcher',
                            'title' => esc_html__('Enable Cache Options', 'sadesmarket'),
                        ),
                        array(
                            'id'    => 'enable_ajax_comment',
                            'type'  => 'switcher',
                            'title' => esc_html__('Enable Nav Ajax Comment', 'sadesmarket'),
                        ),
                        array(
                            'id'    => 'enable_backtotop',
                            'type'  => 'switcher',
                            'title' => esc_html__('Enable Back To Top Button', 'sadesmarket'),
                        ),
                    ),
                ),
                array(
                    'title'  => esc_html__('Sidebar Settings', 'sadesmarket'),
                    'fields' => array(
                        array(
                            'id'      => 'sidebar_width',
                            'type'    => 'slider',
                            'title'   => esc_html__('Sidebar Width', 'sadesmarket'),
                            'min'     => 200,
                            'max'     => 500,
                            'step'    => 1,
                            'unit'    => esc_html__('px', 'sadesmarket'),
                            'default' => 300,
                        ),
                        array(
                            'id'      => 'sidebar_space',
                            'type'    => 'spinner',
                            'title'   => esc_html__('Sidebar Space', 'sadesmarket'),
                            'min'     => 0,
                            'max'     => 200,
                            'step'    => 1,
                            'unit'    => 'px',
                            'default' => 70,
                        ),
                        array(
                            'id'      => 'sidebar_width_tablet',
                            'type'    => 'slider',
                            'title'   => esc_html__('Sidebar Width Tablet', 'sadesmarket'),
                            'desc'    => esc_html__('resolution < 1200px', 'sadesmarket'),
                            'min'     => 200,
                            'max'     => 500,
                            'step'    => 1,
                            'unit'    => esc_html__('px', 'sadesmarket'),
                            'default' => 290,
                        ),
                        array(
                            'id'      => 'sidebar_space_tablet',
                            'type'    => 'spinner',
                            'title'   => esc_html__('Sidebar Space Tablet', 'sadesmarket'),
                            'desc'    => esc_html__('resolution < 1200px', 'sadesmarket'),
                            'min'     => 0,
                            'max'     => 200,
                            'step'    => 1,
                            'unit'    => 'px',
                            'default' => 30,
                        ),
                        array(
                            'id'    => 'sticky_sidebar',
                            'type'  => 'switcher',
                            'title' => esc_html__('Sticky Sidebar', 'sadesmarket'),
                        ),
                        array(
                            'id'           => 'multi_sidebar',
                            'type'         => 'repeater',
                            'button_title' => esc_html__('Add Sidebar', 'sadesmarket'),
                            'title'        => esc_html__('Multi Sidebar', 'sadesmarket'),
                            'fields'       => array(
                                array(
                                    'id'    => 'add_sidebar',
                                    'type'  => 'text',
                                    'title' => esc_html__('Name Sidebar', 'sadesmarket'),
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'title'  => esc_html__('Popup Newsletter', 'sadesmarket'),
                    'fields' => array(
                        array(
                            'id'    => 'enable_popup',
                            'type'  => 'switcher',
                            'title' => esc_html__('Enable Popup', 'sadesmarket'),
                        ),
                        array(
                            'id'         => 'popup_page',
                            'type'       => 'select',
                            'title'      => esc_html__('Popup Page', 'sadesmarket'),
                            'options'    => 'page',
                            'multiple'   => true,
                            'chosen'     => true,
                            'query_args' => array(
                                'posts_per_page' => -1,
                            ),
                            'desc'       => esc_html__('The page popup will be show.', 'sadesmarket'),
                        ),
                        array(
                            'id'      => 'popup_effect',
                            'type'    => 'select',
                            'title'   => esc_html__('Popup Effect', 'sadesmarket'),
                            'options' => array(
                                'mfp-zoom-in'         => esc_html__('Zoom In', 'sadesmarket'),
                                'mfp-newspaper'       => esc_html__('Newspaper', 'sadesmarket'),
                                'mfp-move-horizontal' => esc_html__('Horizontal Move', 'sadesmarket'),
                                'mfp-move-from-top'   => esc_html__('Move From Top', 'sadesmarket'),
                                'mfp-3d-unfold'       => esc_html__('3D Unfold', 'sadesmarket'),
                                'mfp-zoom-out'        => esc_html__('Zoom Out', 'sadesmarket'),
                            ),
                            'default' => 'mfp-zoom-in',
                        ),
                        array(
                            'id'    => 'popup_bg',
                            'type'  => 'image',
                            'title' => esc_html__('Background', 'sadesmarket'),
                        ),
                        array(
                            'id'    => 'popup_img',
                            'type'  => 'image',
                            'title' => esc_html__('Image', 'sadesmarket'),
                        ),
                        array(
                            'id'      => 'popup_text_1',
                            'type'    => 'text',
                            'title'   => esc_html__('Text 1', 'sadesmarket'),
                            'default' => esc_html__('SIGN UP FOR OUR NEWSLETTER & PROMOTIONS !', 'sadesmarket'),
                        ),
                        array(
                            'id'      => 'popup_text_2',
                            'type'    => 'text',
                            'title'   => esc_html__('Text 2', 'sadesmarket'),
                            'default' => esc_html__('SALE 20% OFF', 'sadesmarket'),
                        ),
                        array(
                            'id'      => 'popup_text_3',
                            'type'    => 'text',
                            'title'   => esc_html__('Text 3', 'sadesmarket'),
                            'default' => esc_html__('ON YOUR NEXT PURCHASE', 'sadesmarket'),
                        ),
                        array(
                            'id'      => 'input_placeholder',
                            'type'    => 'text',
                            'title'   => esc_html__('Input Placeholder', 'sadesmarket'),
                            'default' => esc_html__('Enter your email address here...', 'sadesmarket'),
                        ),
                        array(
                            'id'      => 'popup_button',
                            'type'    => 'text',
                            'title'   => esc_html__('Button', 'sadesmarket'),
                            'default' => esc_html__('Subscribe & Get our promotion now !', 'sadesmarket'),
                        ),
                        array(
                            'id'      => 'popup_text_4',
                            'type'    => 'text',
                            'title'   => esc_html__('Text 4', 'sadesmarket'),
                            'default' => esc_html__('No Thank ! I am not interested in this promotion ', 'sadesmarket'),
                        ),
                        array(
                            'id'      => 'popup_delay',
                            'type'    => 'spinner',
                            'title'   => esc_html__('Delay', 'sadesmarket'),
                            'step'    => 1,
                            'min'     => 0,
                            'max'     => 9999,
                            'unit'    => 'milliseconds',
                            'default' => 1000,
                        ),
                    ),
                ),
                array(
                    'title'  => esc_html__('Page Head', 'sadesmarket'),
                    'fields' => array(
                        array(
                            'id'    => 'page_head_bg',
                            'type'  => 'image',
                            'title' => esc_html__('Background', 'sadesmarket'),
                        ),
                    ),
                ),
                array(
                    'title'  => esc_html__('404 Error', 'sadesmarket'),
                    'fields' => array(
                        array(
                            'id'    => '404_image',
                            'type'  => 'image',
                            'title' => esc_html__('404 Image', 'sadesmarket'),
                        ),
                    ),
                ),
                array(
                    'title'  => esc_html__('ACE Settings', 'sadesmarket'),
                    'fields' => array(
                        array(
                            'id'       => 'ace_style',
                            'type'     => 'code_editor',
                            'settings' => array(
                                'theme' => 'dracula',
                                'mode'  => 'css',
                            ),
                            'title'    => esc_html__('Editor Style', 'sadesmarket'),
                        ),
                        array(
                            'id'       => 'ace_script',
                            'type'     => 'code_editor',
                            'settings' => array(
                                'theme' => 'dracula',
                                'mode'  => 'javascript',
                            ),
                            'title'    => esc_html__('Editor Javascript', 'sadesmarket'),
                        ),
                    ),
                ),
            ),
        );
        $options['header_main']  = array(
            'name'     => 'header_main',
            'icon'     => 'fa fa-folder-open-o',
            'title'    => esc_html__('Header', 'sadesmarket'),
            'sections' => array(
                array(
                    'title'  => esc_html__('Header Main', 'sadesmarket'),
                    'fields' => array(
                        array(
                            'id'      => 'sticky_menu',
                            'type'    => 'button_set',
                            'title'   => esc_html__('Header Sticky', 'sadesmarket'),
                            'options' => array(
                                'none'     => esc_html__('None', 'sadesmarket'),
                                'template' => esc_html__('Template', 'sadesmarket'),
                                'jquery'   => esc_html__('jQuery', 'sadesmarket'),
                            ),
                            'default' => 'none',
                        ),
                        array(
                            'id'         => 'header_template',
                            'type'       => 'select_preview',
                            'title'      => esc_html__('Header Layout', 'sadesmarket'),
                            'options'    => sadesmarket_file_options('/templates/header/', 'header'),
                            'default'    => 'style-01',
                            'attributes' => array(
                                'data-depend-id' => 'header_template',
                            ),
                        ),
                        array(
                            'id'          => 'header_banner',
                            'type'        => 'select',
                            'options'     => 'page',
                            'chosen'      => true,
                            'ajax'        => true,
                            'placeholder' => esc_html__('None', 'sadesmarket'),
                            'title'       => esc_html__('Header Banner', 'sadesmarket'),
                            'desc'        => esc_html__('Get banner on header from page builder', 'sadesmarket'),
                        ),
                        array(
                            'id'      => 'enable_primary_menu',
                            'type'    => 'switcher',
                            'title'   => esc_html__('Enable Primary Menu', 'sadesmarket'),
                            'default' => 1,
                        ),
                        array(
                            'id'          => 'header_submenu',
                            'type'        => 'select',
                            'title'       => esc_html__('Header Submenu', 'sadesmarket'),
                            'options'     => 'menus',
                            'chosen'      => true,
                            'ajax'        => true,
                            'query_args'  => array(
                                'data-slug' => true,
                            ),
                            'placeholder' => esc_html__('None', 'sadesmarket'),
                            'dependency'  => array(
                                'header_template',
                                'any',
                                'style-01,style-02,style-03,style-06'
                            ),
                        ),
                        array(
                            'id'          => 'header_submenu_2',
                            'type'        => 'select',
                            'title'       => esc_html__('Header Submenu 2', 'sadesmarket'),
                            'options'     => 'menus',
                            'chosen'      => true,
                            'ajax'        => true,
                            'query_args'  => array(
                                'data-slug' => true,
                            ),
                            'placeholder' => esc_html__('None', 'sadesmarket'),
                            'dependency'  => array(
                                'header_template',
                                'any',
                                'style-01,style-03,style-05,style-06'
                            ),
                        ),
                        array(
                            'id'         => 'header_message',
                            'type'       => 'text',
                            'title'      => esc_html__('Header Message', 'sadesmarket'),
                            'dependency' => array(
                                'header_template',
                                'any',
                                'style-01,style-02,style-03,style-06'
                            ),
                        ),
                        array(
                            'id'    => 'header_phone',
                            'type'  => 'text',
                            'title' => esc_html__('Header Phone', 'sadesmarket'),
                        ),
                    ),
                ),
                array(
                    'title'  => esc_html__('Vertical Menu', 'sadesmarket'),
                    'fields' => array(
                        array(
                            'id'       => 'vertical_always_open',
                            'type'     => 'select',
                            'options'  => 'page',
                            'multiple' => true,
                            'chosen'   => true,
                            'ajax'     => true,
                            'title'    => esc_html__('Vertical Menu Always Open', 'sadesmarket'),
                        ),
                        array(
                            'type'       => 'notice',
                            'style'      => 'warning',
                            'content'    => esc_html__('Style header do not support vertical menu.', 'sadesmarket'),
                            'dependency' => array('header_template', 'not-any', $vertical_menu, true),
                        ),
                        array(
                            'id'          => 'vertical_menu',
                            'type'        => 'select',
                            'title'       => esc_html__('Vertical Menu', 'sadesmarket'),
                            'options'     => 'menus',
                            'chosen'      => true,
                            'ajax'        => true,
                            'query_args'  => array(
                                'data-slug' => true,
                            ),
                            'placeholder' => esc_html__('None', 'sadesmarket'),
                            'dependency'  => array('header_template', 'any', $vertical_menu, true),
                        ),
                        array(
                            'id'         => 'vertical_title',
                            'type'       => 'text',
                            'title'      => esc_html__('Vertical Title', 'sadesmarket'),
                            'default'    => esc_html__('All Departments', 'sadesmarket'),
                            'dependency' => array('header_template', 'any', $vertical_menu, true),
                        ),
                        array(
                            'id'         => 'vertical_items',
                            'type'       => 'number',
                            'unit'       => 'items',
                            'default'    => 10,
                            'title'      => esc_html__('Vertical Items', 'sadesmarket'),
                            'dependency' => array('header_template', 'any', $vertical_menu, true),
                        ),
                        array(
                            'title'      => esc_html__('Vertical Button Show More', 'sadesmarket'),
                            'id'         => 'vertical_show_more',
                            'type'       => 'text',
                            'default'    => esc_html__('See More', 'sadesmarket'),
                            'dependency' => array('header_template', 'any', $vertical_menu, true),
                        ),
                        array(
                            'title'      => esc_html__('Vertical Button Show Less', 'sadesmarket'),
                            'id'         => 'vertical_show_less',
                            'type'       => 'text',
                            'default'    => esc_html__('See Less', 'sadesmarket'),
                            'dependency' => array('header_template', 'any', $vertical_menu, true),
                        ),
                    ),
                ),
            ),
        );
        $options['footer_main']  = array(
            'name'   => 'footer_main',
            'icon'   => 'fa fa-folder-open-o',
            'title'  => esc_html__('Footer', 'sadesmarket'),
            'fields' => array(
                array(
                    'id'      => 'footer_template',
                    'type'    => 'select_preview',
                    'default' => 'footer-01',
                    'title'   => esc_html__('Footer Layout', 'sadesmarket'),
                    'options' => sadesmarket_footer_preview(),
                ),
            ),
        );
        $options['mobile_main']  = array(
            'name'     => 'mobile_main',
            'icon'     => 'fa fa-wordpress',
            'title'    => esc_html__('Mobile', 'sadesmarket'),
            'sections' => array(
                array(
                    'title'  => esc_html__('Mobile Layout', 'sadesmarket'),
                    'fields' => array(
                        array(
                            'id'      => 'mobile_enable',
                            'type'    => 'switcher',
                            'title'   => esc_html__('Mobile version', 'sadesmarket'),
                            'default' => 1,
                        ),
                        array(
                            'id'    => 'logo_mobile',
                            'type'  => 'image',
                            'title' => esc_html__('Logo Mobile', 'sadesmarket'),
                            'desc'  => esc_html__('Setting Logo For Site', 'sadesmarket'),
                        ),
                        array(
                            'id'      => 'mobile_layout',
                            'type'    => 'image_select',
                            'default' => 'style-01',
                            'title'   => esc_html__('Mobile Layout', 'sadesmarket'),
                            'options' => array(
                                'style-01' => get_theme_file_uri('templates/mobile/mobile-style-01.png'),
                                'style-02' => get_theme_file_uri('templates/mobile/mobile-style-02.png'),
                                'style-03' => get_theme_file_uri('templates/mobile/mobile-style-03.png'),
                            ),
                        ),
                        array(
                            'id'      => 'mobile_banner',
                            'type'    => 'switcher',
                            'title'   => esc_html__('Mobile Top Banner', 'sadesmarket'),
                            'default' => 1,
                        ),
                        array(
                            'id'      => 'background_mobile',
                            'type'    => 'background',
                            'title'   => esc_html__('Background Mobile', 'sadesmarket'),
                            'desc'    => esc_html__('Setting Background For Mobile Menu', 'sadesmarket'),
                            'default' => array(
                                'background-position'   => 'center center',
                                'background-repeat'     => 'no-repeat',
                                'background-attachment' => 'scroll',
                                'background-size'       => 'cover',
                            ),
                            'output'  => '.ovic-menu-clone-wrap .head-menu-mobile'
                        ),
                    )
                ),
                array(
                    'title'  => esc_html__('Mobile Content', 'sadesmarket'),
                    'fields' => array(
                        array(
                            'id'          => 'mobile_menu_top',
                            'type'        => 'select',
                            'title'       => esc_html__('Mobile Menu Top', 'sadesmarket'),
                            'options'     => 'menus',
                            'chosen'      => true,
                            'ajax'        => true,
                            'query_args'  => array(
                                'data-slug' => true,
                            ),
                            'placeholder' => esc_html__('None', 'sadesmarket'),
                        ),
                        array(
                            'id'          => 'mobile_menu_bottom',
                            'type'        => 'select',
                            'title'       => esc_html__('Mobile Menu Bottom', 'sadesmarket'),
                            'options'     => 'menus',
                            'chosen'      => true,
                            'ajax'        => true,
                            'query_args'  => array(
                                'data-slug' => true,
                            ),
                            'placeholder' => esc_html__('None', 'sadesmarket'),
                        ),
                        array(
                            'id'      => 'mobile_footer',
                            'type'    => 'select_preview',
                            'default' => 'inherit',
                            'title'   => esc_html__('Footer Mobile', 'sadesmarket'),
                            'options' => sadesmarket_footer_preview(true),
                        ),
                    )
                ),
            )
        );
        $options['posts_main']   = array(
            'name'     => 'posts_main',
            'icon'     => 'fa fa-rss',
            'title'    => esc_html__('Posts Settings', 'sadesmarket'),
            'sections' => array(
                array(
                    'title'  => esc_html__('Blog Page', 'sadesmarket'),
                    'fields' => array(
                        array(
                            'id'      => 'blog_page_title',
                            'type'    => 'switcher',
                            'title'   => esc_html__('Page Title', 'sadesmarket'),
                            'default' => 1,
                        ),
                        array(
                            'id'      => 'blog_list_style',
                            'type'    => 'select',
                            'title'   => esc_html__('Blog Style', 'sadesmarket'),
                            'options' => array(
                                'standard' => esc_html__('Standard', 'sadesmarket'),
                                'grid'     => esc_html__('Grid', 'sadesmarket'),
                            ),
                            'default' => 'standard',
                        ),
                        array(
                            'id'      => 'sidebar_blog_layout',
                            'type'    => 'image_select',
                            'title'   => esc_html__('Sidebar Blog Layout', 'sadesmarket'),
                            'desc'    => esc_html__('Select sidebar position on Blog.', 'sadesmarket'),
                            'options' => array(
                                'left'  => get_theme_file_uri('assets/images/left-sidebar.png'),
                                'right' => get_theme_file_uri('assets/images/right-sidebar.png'),
                                'full'  => get_theme_file_uri('assets/images/no-sidebar.png'),
                            ),
                            'default' => 'left',
                        ),
                        array(
                            'id'         => 'blog_used_sidebar',
                            'type'       => 'select',
                            'default'    => 'widget-area',
                            'title'      => esc_html__('Blog Sidebar', 'sadesmarket'),
                            'options'    => 'sidebars',
                            'dependency' => array('sidebar_blog_layout', '!=', 'full'),
                        ),
                        array(
                            'id'      => 'blog_pagination',
                            'type'    => 'button_set',
                            'title'   => esc_html__('Blog Pagination', 'sadesmarket'),
                            'options' => array(
                                'pagination' => esc_html__('Pagination', 'sadesmarket'),
                                'load_more'  => esc_html__('Load More', 'sadesmarket'),
                                'infinite'   => esc_html__('Infinite Scrolling', 'sadesmarket'),
                            ),
                            'default' => 'pagination',
                            'desc'    => esc_html__('Select style pagination on blog page.', 'sadesmarket'),
                        ),
                    ),
                ),
                array(
                    'title'  => esc_html__('Post Single', 'sadesmarket'),
                    'fields' => array(
                        array(
                            'id'      => 'single_layout',
                            'type'    => 'select',
                            'default' => 'standard',
                            'title'   => esc_html__('Single Post Layout', 'sadesmarket'),
                            'options' => array(
                                'standard' => esc_html__('Standard', 'sadesmarket'),
                                'modern'   => esc_html__('Modern', 'sadesmarket'),
                            ),
                        ),
                        array(
                            'id'         => 'head_height_post',
                            'type'       => 'spinner',
                            'title'      => esc_html__('Thumb Height', 'sadesmarket'),
                            'min'        => 200,
                            'max'        => 1000,
                            'step'       => 1,
                            'unit'       => 'px',
                            'dependency' => array('single_layout', '==', 'modern'),
                        ),
                        array(
                            'id'      => 'sidebar_single_layout',
                            'type'    => 'image_select',
                            'title'   => esc_html__(' Sidebar Single Post Layout', 'sadesmarket'),
                            'desc'    => esc_html__('Select sidebar position on Blog.', 'sadesmarket'),
                            'options' => array(
                                'left'  => get_theme_file_uri('assets/images/left-sidebar.png'),
                                'right' => get_theme_file_uri('assets/images/right-sidebar.png'),
                                'full'  => get_theme_file_uri('assets/images/no-sidebar.png'),
                            ),
                            'default' => 'right',
                        ),
                        array(
                            'id'         => 'single_used_sidebar',
                            'type'       => 'select',
                            'default'    => 'widget-area',
                            'title'      => esc_html__('Blog Single Sidebar', 'sadesmarket'),
                            'options'    => 'sidebars',
                            'dependency' => array('sidebar_single_layout', '!=', 'full'),
                        ),
                        array(
                            'id'    => 'enable_share_post',
                            'type'  => 'switcher',
                            'title' => esc_html__('Enable Share', 'sadesmarket'),
                        ),
                        array(
                            'id'    => 'enable_pagination_post',
                            'type'  => 'switcher',
                            'title' => esc_html__('Enable Prev/Next Post', 'sadesmarket'),
                        ),
                        array(
                            'id'    => 'enable_author_info',
                            'type'  => 'switcher',
                            'title' => esc_html__('Enable Author Info', 'sadesmarket'),
                        ),
                    ),
                ),
            ),
        );
        if (class_exists('WooCommerce')) {
            $options['woocommerce_mains'] = array(
                'name'     => 'woocommerce_mains',
                'icon'     => 'fa fa-shopping-bag',
                'title'    => esc_html__('WooCommerce', 'sadesmarket'),
                'sections' => array(
                    array(
                        'title'  => esc_html__('Shop Page', 'sadesmarket'),
                        'fields' => array(
                            array(
                                'id'      => 'shop_page_title',
                                'type'    => 'switcher',
                                'title'   => esc_html__('Page Title', 'sadesmarket'),
                                'default' => 1,
                            ),
                            array(
                                'id'          => 'shop_builder_top',
                                'type'        => 'select',
                                'options'     => 'page',
                                'query_args'  => array(
                                    'posts_per_page' => -1,
                                ),
                                'chosen'      => true,
                                'ajax'        => true,
                                'placeholder' => esc_html__('Select Page', 'sadesmarket'),
                                'title'       => esc_html__('Shop Builder Top', 'sadesmarket'),
                                'desc'        => esc_html__('Get shop banner from page builder.', 'sadesmarket'),
                            ),
                            array(
                                'id'      => 'shop_builder_position',
                                'type'    => 'select',
                                'title'   => esc_html__('Shop Builder Position', 'sadesmarket'),
                                'options' => array(
                                    'outside' => esc_html__('Outside', 'sadesmarket'),
                                    'inside'  => esc_html__('Inside', 'sadesmarket'),
                                ),
                                'default' => 'inside',
                            ),
                            array(
                                'id'          => 'shop_builder_bot',
                                'type'        => 'select',
                                'options'     => 'page',
                                'query_args'  => array(
                                    'posts_per_page' => -1,
                                ),
                                'chosen'      => true,
                                'ajax'        => true,
                                'placeholder' => esc_html__('Select Page', 'sadesmarket'),
                                'title'       => esc_html__('Shop Builder Bottom', 'sadesmarket'),
                                'desc'        => esc_html__('Get shop banner from page builder.', 'sadesmarket'),
                            ),
                            array(
                                'id'      => 'shop_page_layout',
                                'type'    => 'image_select',
                                'default' => 'grid',
                                'title'   => esc_html__('Shop Layout', 'sadesmarket'),
                                'desc'    => esc_html__('Select layout for shop product, product category archive.',
                                    'sadesmarket'),
                                'options' => array(
                                    'grid' => get_theme_file_uri('assets/images/grid-display.png'),
                                    'list' => get_theme_file_uri('assets/images/list-display.png'),
                                ),
                            ),
                            array(
                                'id'      => 'product_loop_columns',
                                'type'    => 'spinner',
                                'title'   => esc_html__('Products Columns', 'sadesmarket'),
                                'desc'    => esc_html__('for Grid', 'sadesmarket'),
                                'max'     => 6,
                                'min'     => 4,
                                'step'    => 1,
                                'unit'    => 'columns',
                                'default' => 5,
                            ),
                            array(
                                'id'      => 'product_per_page',
                                'type'    => 'spinner',
                                'default' => '10',
                                'unit'    => 'items',
                                'title'   => esc_html__('Products Per Page', 'sadesmarket'),
                            ),
                            array(
                                'id'      => 'product_newness',
                                'default' => 100,
                                'type'    => 'spinner',
                                'unit'    => 'days',
                                'title'   => esc_html__('Products Newness', 'sadesmarket'),
                            ),
                            array(
                                'id'      => 'product_hover',
                                'type'    => 'button_set',
                                'title'   => esc_html__('Product Image Hover', 'sadesmarket'),
                                'options' => array(
                                    ''       => esc_html__('None', 'sadesmarket'),
                                    'zoom'   => esc_html__('Zoom Image', 'sadesmarket'),
                                    'change' => esc_html__('Change Image', 'sadesmarket'),
                                    'slide'  => esc_html__('Slide Image', 'sadesmarket'),
                                ),
                                'default' => '',
                            ),
                            array(
                                'id'      => 'woocommerce_pagination',
                                'type'    => 'button_set',
                                'title'   => esc_html__('Shop Pagination', 'sadesmarket'),
                                'options' => array(
                                    'pagination' => esc_html__('Pagination', 'sadesmarket'),
                                    'load_more'  => esc_html__('Load More', 'sadesmarket'),
                                    'infinite'   => esc_html__('Infinite Scrolling', 'sadesmarket'),
                                ),
                                'default' => 'pagination',
                                'desc'    => esc_html__('Select style pagination on shop page.', 'sadesmarket'),
                            ),
                        ),
                    ),
                    array(
                        'title'  => esc_html__('Shop Page Sidebar', 'sadesmarket'),
                        'fields' => array(
                            array(
                                'id'      => 'sidebar_shop_layout',
                                'type'    => 'image_select',
                                'title'   => esc_html__('Shop Page Sidebar Layout', 'sadesmarket'),
                                'desc'    => esc_html__('Select sidebar position on Shop Page.', 'sadesmarket'),
                                'options' => array(
                                    'left'  => get_theme_file_uri('assets/images/left-sidebar.png'),
                                    'right' => get_theme_file_uri('assets/images/right-sidebar.png'),
                                    'full'  => get_theme_file_uri('assets/images/no-sidebar.png'),
                                ),
                                'default' => 'left',
                            ),
                            array(
                                'id'         => 'shop_used_sidebar',
                                'type'       => 'select',
                                'default'    => 'shop-widget-area',
                                'title'      => esc_html__('Sidebar Used For Shop', 'sadesmarket'),
                                'options'    => 'sidebars',
                                'dependency' => array('sidebar_shop_layout', '!=', 'full'),
                            ),
                            array(
                                'id'         => 'shop_vendor_used_sidebar',
                                'type'       => 'select',
                                'default'    => 'shop-widget-area',
                                'title'      => esc_html__('Sidebar Used For Vendor', 'sadesmarket'),
                                'options'    => 'sidebars',
                                'dependency' => array('sidebar_shop_layout', '!=', 'full'),
                            ),
                            array(
                                'id'      => 'shop_sidebar_width',
                                'type'    => 'slider',
                                'title'   => esc_html__('Sidebar Width', 'sadesmarket'),
                                'desc'    => esc_html__('Default is General / Sidebar settings', 'sadesmarket'),
                                'min'     => 200,
                                'max'     => 500,
                                'step'    => 1,
                                'unit'    => esc_html__('px', 'sadesmarket'),
                                'default' => 300,
                            ),
                            array(
                                'id'      => 'shop_sidebar_space',
                                'type'    => 'spinner',
                                'title'   => esc_html__('Sidebar Space', 'sadesmarket'),
                                'desc'    => esc_html__('Default is General / Sidebar settings', 'sadesmarket'),
                                'min'     => 0,
                                'max'     => 200,
                                'step'    => 1,
                                'unit'    => 'px',
                                'default' => 30,
                            ),
                            array(
                                'id'      => 'shop_sidebar_width_tablet',
                                'type'    => 'slider',
                                'title'   => esc_html__('Sidebar Width Tablet', 'sadesmarket'),
                                'desc'    => esc_html__('resolution < 1200px', 'sadesmarket'),
                                'min'     => 200,
                                'max'     => 500,
                                'step'    => 1,
                                'unit'    => esc_html__('px', 'sadesmarket'),
                                'default' => 290,
                            ),
                            array(
                                'id'      => 'shop_sidebar_space_tablet',
                                'type'    => 'spinner',
                                'title'   => esc_html__('Sidebar Space Tablet', 'sadesmarket'),
                                'desc'    => esc_html__('resolution < 1200px', 'sadesmarket'),
                                'min'     => 0,
                                'max'     => 200,
                                'step'    => 1,
                                'unit'    => 'px',
                                'default' => 30,
                            ),
                        ),
                    ),
                    array(
                        'title'  => esc_html__('Shop Page Items', 'sadesmarket'),
                        'fields' => array(
                            array(
                                'id'      => 'shop_product_style',
                                'type'    => 'select_preview',
                                'default' => 'style-01',
                                'title'   => esc_html__('Grid Items Style', 'sadesmarket'),
                                'options' => sadesmarket_product_options('Theme Option'),
                            ),
                            array(
                                'id'      => 'shop_product_list_style',
                                'type'    => 'select_preview',
                                'default' => 'style-01',
                                'title'   => esc_html__('List Items Style', 'sadesmarket'),
                                'options' => sadesmarket_file_options('/woocommerce/product-list-style/', 'content-product'),
                            ),
                            array(
                                'id'    => 'enable_short_title',
                                'type'  => 'switcher',
                                'title' => esc_html__('Short Title on Mobile ( < 768px )', 'sadesmarket'),
                            ),
                            array(
                                'id'    => 'short_text',
                                'type'  => 'switcher',
                                'title' => esc_html__('Short Title', 'sadesmarket'),
                            ),
                            array(
                                'id'    => 'disable_labels',
                                'type'  => 'switcher',
                                'title' => esc_html__('Disable Labels', 'sadesmarket'),
                            ),
                            array(
                                'id'    => 'disable_rating',
                                'type'  => 'switcher',
                                'title' => esc_html__('Disable Rating', 'sadesmarket'),
                            ),
                            array(
                                'id'    => 'disable_add_cart',
                                'type'  => 'switcher',
                                'title' => esc_html__('Disable Add to Cart', 'sadesmarket'),
                            ),
                        ),
                    ),
                    array(
                        'title'  => esc_html__('Product Single', 'sadesmarket'),
                        'fields' => array(
                            array(
                                'id'      => 'single_product_thumbnail',
                                'type'    => 'select',
                                'title'   => esc_html__('Product Thumbnails', 'sadesmarket'),
                                'options' => array(
                                    'standard' => esc_html__('Standard', 'sadesmarket'),
                                    'grid'     => esc_html__('Grid Gallery', 'sadesmarket'),
                                    'slide'    => esc_html__('Slide Gallery', 'sadesmarket'),
                                    'sticky'   => esc_html__('Sticky Summary', 'sadesmarket'),
                                ),
                                'default' => 'standard',
                            ),
                            array(
                                'id'    => 'enable_countdown_product',
                                'type'  => 'switcher',
                                'title' => esc_html__('Enable Countdown', 'sadesmarket'),
                            ),
                            array(
                                'id'    => 'enable_share_product',
                                'type'  => 'switcher',
                                'title' => esc_html__('Enable Share', 'sadesmarket'),
                            ),
                            array(
                                'id'    => 'disable_zoom',
                                'type'  => 'switcher',
                                'title' => esc_html__('Disable Zoom Gallery', 'sadesmarket'),
                            ),
                            array(
                                'id'    => 'disable_lightbox',
                                'type'  => 'switcher',
                                'title' => esc_html__('Disable Lightbox Gallery', 'sadesmarket'),
                            ),
                            array(
                                'id'      => 'single_product_tabs',
                                'type'    => 'select',
                                'title'   => esc_html__('Product Tabs', 'sadesmarket'),
                                'options' => array(
                                    ''         => esc_html__('Default', 'sadesmarket'),
                                    'show-all' => esc_html__('Show All', 'sadesmarket'),
                                ),
                                'default' => '',
                            ),
                        ),
                    ),
                    array(
                        'title'  => esc_html__('Related Products', 'sadesmarket'),
                        'fields' => array(
                            array(
                                'id'      => 'woo_related_enable',
                                'type'    => 'button_set',
                                'default' => 'enable',
                                'options' => array(
                                    'enable'  => esc_html__('Enable', 'sadesmarket'),
                                    'disable' => esc_html__('Disable', 'sadesmarket'),
                                ),
                                'title'   => esc_html__('Enable Related Products', 'sadesmarket'),
                            ),
                            array(
                                'id'         => 'woo_related_title',
                                'type'       => 'text',
                                'title'      => esc_html__('Related products title', 'sadesmarket'),
                                'desc'       => esc_html__('Related products title', 'sadesmarket'),
                                'dependency' => array('woo_related_enable', '==', 'enable'),
                                'default'    => esc_html__('Related Products', 'sadesmarket'),
                            ),
                            array(
                                'id'         => 'woo_related_style',
                                'type'       => 'select_preview',
                                'default'    => 'style-03',
                                'title'      => esc_html__('Product Related Layout', 'sadesmarket'),
                                'options'    => sadesmarket_product_options('Theme Option'),
                                'dependency' => array('woo_related_enable', '==', 'enable'),
                            ),
                            array(
                                'id'         => 'woo_related_perpage',
                                'type'       => 'spinner',
                                'title'      => esc_html__('Related products Items', 'sadesmarket'),
                                'desc'       => esc_html__('Number Related products to show', 'sadesmarket'),
                                'dependency' => array('woo_related_enable', '==', 'enable'),
                                'default'    => 6,
                                'unit'       => 'item(s)',
                            ),
                            array(
                                'id'      => 'woo_related_desktop',
                                'title'   => esc_html__('items on Desktop', 'sadesmarket'),
                                'desc'    => esc_html__('1500px <= resolution', 'sadesmarket'),
                                'type'    => 'slider',
                                'default' => 6,
                                'min'     => 1,
                                'max'     => 8,
                                'unit'    => 'item(s)',
                            ),
                            array(
                                'id'      => 'woo_related_laptop',
                                'title'   => esc_html__('items on Laptop', 'sadesmarket'),
                                'desc'    => esc_html__('1200px <= resolution < 1500px', 'sadesmarket'),
                                'type'    => 'slider',
                                'default' => 5,
                                'min'     => 1,
                                'max'     => 6,
                                'unit'    => 'item(s)',
                            ),
                            array(
                                'id'      => 'woo_related_ipad',
                                'title'   => esc_html__('items on Ipad', 'sadesmarket'),
                                'desc'    => esc_html__('992px <= resolution < 1200px', 'sadesmarket'),
                                'type'    => 'slider',
                                'default' => 4,
                                'min'     => 1,
                                'max'     => 6,
                                'unit'    => 'item(s)',
                            ),
                            array(
                                'id'      => 'woo_related_landscape',
                                'title'   => esc_html__('items on Landscape Tablet', 'sadesmarket'),
                                'desc'    => esc_html__('768px <= resolution < 992px', 'sadesmarket'),
                                'type'    => 'slider',
                                'default' => 3,
                                'min'     => 1,
                                'max'     => 6,
                                'unit'    => 'item(s)',
                            ),
                            array(
                                'id'      => 'woo_related_portrait',
                                'title'   => esc_html__('items on Portrait Tablet', 'sadesmarket'),
                                'desc'    => esc_html__('480px <= resolution < 768px', 'sadesmarket'),
                                'type'    => 'slider',
                                'default' => 3,
                                'min'     => 1,
                                'max'     => 6,
                                'unit'    => 'item(s)',
                            ),
                            array(
                                'id'      => 'woo_related_mobile',
                                'title'   => esc_html__('items on Mobile', 'sadesmarket'),
                                'desc'    => esc_html__('resolution < 480px', 'sadesmarket'),
                                'type'    => 'slider',
                                'default' => 2,
                                'min'     => 1,
                                'max'     => 6,
                                'unit'    => 'item(s)',
                            ),
                        ),
                    ),
                    array(
                        'title'  => esc_html__('Upsell Products', 'sadesmarket'),
                        'fields' => array(
                            array(
                                'id'      => 'woo_upsell_enable',
                                'type'    => 'button_set',
                                'default' => 'enable',
                                'options' => array(
                                    'enable'  => esc_html__('Enable', 'sadesmarket'),
                                    'disable' => esc_html__('Disable', 'sadesmarket'),
                                ),
                                'title'   => esc_html__('Enable Upsell Products', 'sadesmarket'),
                            ),
                            array(
                                'id'         => 'woo_upsell_title',
                                'type'       => 'text',
                                'title'      => esc_html__('Upsell products title', 'sadesmarket'),
                                'desc'       => esc_html__('Upsell products title', 'sadesmarket'),
                                'dependency' => array('woo_upsell_enable', '==', 'enable'),
                                'default'    => esc_html__('Upsell Products', 'sadesmarket'),
                            ),
                            array(
                                'id'         => 'woo_upsell_style',
                                'type'       => 'select_preview',
                                'default'    => 'style-03',
                                'title'      => esc_html__('Product Upsell Layout', 'sadesmarket'),
                                'options'    => sadesmarket_product_options('Theme Option'),
                                'dependency' => array('woo_upsell_enable', '==', 'enable'),
                            ),
                            array(
                                'id'      => 'woo_upsell_desktop',
                                'title'   => esc_html__('items on Desktop', 'sadesmarket'),
                                'desc'    => esc_html__('1500px <= resolution', 'sadesmarket'),
                                'type'    => 'slider',
                                'default' => 6,
                                'min'     => 1,
                                'max'     => 8,
                                'unit'    => 'item(s)',
                            ),
                            array(
                                'id'      => 'woo_upsell_laptop',
                                'title'   => esc_html__('items on Laptop', 'sadesmarket'),
                                'desc'    => esc_html__('1200px <= resolution < 1500px', 'sadesmarket'),
                                'type'    => 'slider',
                                'default' => 5,
                                'min'     => 1,
                                'max'     => 6,
                                'unit'    => 'item(s)',
                            ),
                            array(
                                'id'      => 'woo_upsell_ipad',
                                'title'   => esc_html__('items on Ipad', 'sadesmarket'),
                                'desc'    => esc_html__('992px <= resolution < 1200px', 'sadesmarket'),
                                'type'    => 'slider',
                                'default' => 4,
                                'min'     => 1,
                                'max'     => 6,
                                'unit'    => 'item(s)',
                            ),
                            array(
                                'id'      => 'woo_upsell_landscape',
                                'title'   => esc_html__('items on Landscape Tablet', 'sadesmarket'),
                                'desc'    => esc_html__('768px <= resolution < 992px', 'sadesmarket'),
                                'type'    => 'slider',
                                'default' => 3,
                                'min'     => 1,
                                'max'     => 6,
                                'unit'    => 'item(s)',
                            ),
                            array(
                                'id'      => 'woo_upsell_portrait',
                                'title'   => esc_html__('items on Portrait Tablet', 'sadesmarket'),
                                'desc'    => esc_html__('480px <= resolution < 768px', 'sadesmarket'),
                                'type'    => 'slider',
                                'default' => 3,
                                'min'     => 1,
                                'max'     => 6,
                                'unit'    => 'item(s)',
                            ),
                            array(
                                'id'      => 'woo_upsell_mobile',
                                'title'   => esc_html__('items on Mobile', 'sadesmarket'),
                                'desc'    => esc_html__('resolution < 480px', 'sadesmarket'),
                                'type'    => 'slider',
                                'default' => 2,
                                'min'     => 1,
                                'max'     => 6,
                                'unit'    => 'item(s)',
                            ),
                        ),
                    ),
                    array(
                        'title'  => esc_html__('Cross Sell Products', 'sadesmarket'),
                        'fields' => array(
                            array(
                                'id'      => 'woo_crosssell_enable',
                                'type'    => 'button_set',
                                'default' => 'enable',
                                'options' => array(
                                    'enable'  => esc_html__('Enable', 'sadesmarket'),
                                    'disable' => esc_html__('Disable', 'sadesmarket'),
                                ),
                                'title'   => esc_html__('Enable Cross Sell Products', 'sadesmarket'),
                            ),
                            array(
                                'id'         => 'woo_crosssell_title',
                                'type'       => 'text',
                                'title'      => esc_html__('Cross Sell products title', 'sadesmarket'),
                                'desc'       => esc_html__('Cross Sell products title', 'sadesmarket'),
                                'dependency' => array('woo_crosssell_enable', '==', 'enable'),
                                'default'    => esc_html__('Cross Sell Products', 'sadesmarket'),
                            ),
                            array(
                                'id'         => 'woo_crosssell_style',
                                'type'       => 'select_preview',
                                'default'    => 'style-03',
                                'title'      => esc_html__('Product Cross Sell Layout', 'sadesmarket'),
                                'options'    => sadesmarket_product_options('Theme Option'),
                                'dependency' => array('woo_crosssell_enable', '==', 'enable'),
                            ),
                            array(
                                'id'      => 'woo_crosssell_desktop',
                                'title'   => esc_html__('items on Desktop', 'sadesmarket'),
                                'desc'    => esc_html__('1500px <= resolution', 'sadesmarket'),
                                'type'    => 'slider',
                                'default' => 6,
                                'min'     => 1,
                                'max'     => 8,
                                'unit'    => 'item(s)',
                            ),
                            array(
                                'id'      => 'woo_crosssell_laptop',
                                'title'   => esc_html__('items on Laptop', 'sadesmarket'),
                                'desc'    => esc_html__('1200px <= resolution < 1500px', 'sadesmarket'),
                                'type'    => 'slider',
                                'default' => 5,
                                'min'     => 1,
                                'max'     => 6,
                                'unit'    => 'item(s)',
                            ),
                            array(
                                'id'      => 'woo_crosssell_ipad',
                                'title'   => esc_html__('items on Ipad', 'sadesmarket'),
                                'desc'    => esc_html__('992px <= resolution < 1200px', 'sadesmarket'),
                                'type'    => 'slider',
                                'default' => 4,
                                'min'     => 1,
                                'max'     => 6,
                                'unit'    => 'item(s)',
                            ),
                            array(
                                'id'      => 'woo_crosssell_landscape',
                                'title'   => esc_html__('items on Landscape Tablet', 'sadesmarket'),
                                'desc'    => esc_html__('768px <= resolution < 992px', 'sadesmarket'),
                                'type'    => 'slider',
                                'default' => 3,
                                'min'     => 1,
                                'max'     => 6,
                                'unit'    => 'item(s)',
                            ),
                            array(
                                'id'      => 'woo_crosssell_portrait',
                                'title'   => esc_html__('items on Portrait Tablet', 'sadesmarket'),
                                'desc'    => esc_html__('480px <= resolution < 768px', 'sadesmarket'),
                                'type'    => 'slider',
                                'default' => 3,
                                'min'     => 1,
                                'max'     => 6,
                                'unit'    => 'item(s)',
                            ),
                            array(
                                'id'      => 'woo_crosssell_mobile',
                                'title'   => esc_html__('items on Mobile', 'sadesmarket'),
                                'desc'    => esc_html__('resolution < 480px', 'sadesmarket'),
                                'type'    => 'slider',
                                'default' => 2,
                                'min'     => 1,
                                'max'     => 6,
                                'unit'    => 'item(s)',
                            ),
                        ),
                    ),
                ),
            );
        }
        $options['social']     = array(
            'name'   => 'social',
            'icon'   => 'fa fa-users',
            'title'  => esc_html__('Social', 'sadesmarket'),
            'fields' => array(
                array(
                    'id'              => 'user_all_social',
                    'type'            => 'group',
                    'title'           => esc_html__('Social', 'sadesmarket'),
                    'button_title'    => esc_html__('Add New Social', 'sadesmarket'),
                    'accordion_title' => esc_html__('Social Settings', 'sadesmarket'),
                    'fields'          => array(
                        array(
                            'id'      => 'title_social',
                            'type'    => 'text',
                            'title'   => esc_html__('Title Social', 'sadesmarket'),
                            'default' => esc_html__('Facebook', 'sadesmarket'),
                        ),
                        array(
                            'id'      => 'link_social',
                            'type'    => 'text',
                            'title'   => esc_html__('Link Social', 'sadesmarket'),
                            'default' => 'https://facebook.com',
                        ),
                        array(
                            'id'      => 'icon_social',
                            'type'    => 'icon',
                            'title'   => esc_html__('Icon Social', 'sadesmarket'),
                            'default' => 'fa fa-facebook',
                        ),
                    ),
                    'default'         => array(
                        array(
                            'title_social' => esc_html__('Facebook', 'sadesmarket'),
                            'link_social'  => 'https://facebook.com/',
                            'icon_social'  => 'fa fa-facebook',
                        ),
                        array(
                            'title_social' => esc_html__('Twitter', 'sadesmarket'),
                            'link_social'  => 'https://twitter.com/',
                            'icon_social'  => 'fa fa-twitter',
                        ),
                        array(
                            'title_social' => esc_html__('Instagram', 'sadesmarket'),
                            'link_social'  => 'https://instagram.com/',
                            'icon_social'  => 'fa fa-instagram',
                        ),
                        array(
                            'title_social' => esc_html__('Youtube', 'sadesmarket'),
                            'link_social'  => 'https://youtube.com/',
                            'icon_social'  => 'fa fa-youtube-play',
                        ),
                    ),
                ),
            ),
        );
        $options['typography'] = array(
            'name'   => 'typography',
            'icon'   => 'fa fa-font',
            'title'  => esc_html__('Typography', 'sadesmarket'),
            'fields' => array(
                array(
                    'id'             => 'body_typography',
                    'type'           => 'typography',
                    'title'          => esc_html__('Typography of Body', 'sadesmarket'),
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
        );
        $options['backup']     = array(
            'name'   => 'backup',
            'icon'   => 'fa fa-bold',
            'title'  => esc_html__('Backup / Reset', 'sadesmarket'),
            'fields' => array(
                array(
                    'id'    => 'reset',
                    'type'  => 'backup',
                    'title' => esc_html__('Reset', 'sadesmarket'),
                ),
            ),
        );
        //
        // Framework Settings
        //
        $settings = array(
            'option_name'      => '_ovic_customize_options',
            'menu_title'       => esc_html__('Theme Options', 'sadesmarket'),
            'menu_type'        => 'submenu', // menu, submenu, options, theme, etc.
            'menu_parent'      => 'ovic_addon-dashboard',
            'menu_slug'        => 'ovic_theme_options',
            'menu_position'    => 5,
            'show_search'      => true,
            'show_reset'       => true,
            'show_footer'      => false,
            'show_all_options' => true,
            'ajax_save'        => true,
            'sticky_header'    => false,
            'save_defaults'    => true,
            'framework_title'  => sprintf(
                '%s <small>%s <a href="%s" target="_blank">%s</a></small>',
                esc_html__('Theme Options', 'sadesmarket'),
                esc_html__('by', 'sadesmarket'),
                esc_url('https://kutethemes.com/'),
                esc_html__('Kutethemes', 'sadesmarket')
            ),
        );

        OVIC_Options::instance($settings, apply_filters('sadesmarket_framework_theme_options', $options));
    }

    add_action('init', 'sadesmarket_theme_options');
}