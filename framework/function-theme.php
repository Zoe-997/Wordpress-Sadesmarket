<?php if ( !defined( 'ABSPATH' ) ) {
    die;
} // Cannot access pages directly.

if ( sadesmarket_is_mobile() ) {
    require_once get_theme_file_path( '/framework/function-mobile.php' );
}

add_filter( 'ovic_get_api_libary_elementor', function ( $url, $api, $info ) {
    return str_replace(
        '{THEME_URI}/libary-elementor/',
        'https://sadesmarket.kutethemes.net/sadesmarket/',
        $api
    );
}, 10, 3 );

add_filter( 'ovic_menu_toggle_mobile', '__return_false' );
add_filter( 'ovic_menu_locations_mobile', 'sadesmarket_extend_mobile_menu', 10, 2 );
add_filter( 'ovic_override_footer_template', 'sadesmarket_footer_template' );
add_filter( 'elementor/icons_manager/native', 'sadesmarket_elementor_icons' );
add_action( 'import_sample_data_after_install_sample_data', 'sadesmarket_after_install_sample_data' );
add_action( 'sadesmarket_before_mobile_header', 'sadesmarket_mobile_menu_top', 10 );
add_action( 'sadesmarket_after_mobile_header', 'sadesmarket_mobile_menu_bottom', 10 );
add_action( 'dynamic_sidebar_before', 'sadesmarket_dynamic_sidebar_before', 10, 2 );
add_action( 'dynamic_sidebar_after', 'sadesmarket_dynamic_sidebar_after', 10, 2 );
add_action( 'dgwt/wcas/search_query/args', 'sadesmarket_search_query_args' );

/**
 *
 * ajax search query
 */
if ( !function_exists( 'sadesmarket_search_query_args' ) ) {
    function sadesmarket_search_query_args( $args )
    {
        if ( !empty( $_REQUEST['product_cat'] ) ) {

            $product_cat = sanitize_text_field( $_REQUEST['product_cat'] );

            $args['tax_query'][] = array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => array( $product_cat ),
            );
        }

        return $args;
    }
}
/**
 *
 * dynamic sidebar
 */
if ( !function_exists( 'sadesmarket_dynamic_sidebar_before' ) ) {
    function sadesmarket_dynamic_sidebar_before()
    {
        if ( !is_admin() ) {
            if ( sadesmarket_is_mobile() ) :?>
                <div class="sidebar-head">
                    <span class="title"><?php echo esc_html__( 'Sidebar', 'sadesmarket' ); ?></span>
                    <a href="#" class="close-sidebar"></a>
                </div>
            <?php endif;
            echo '<div class="sidebar-inner">';
        }
    }
}
if ( !function_exists( 'sadesmarket_dynamic_sidebar_after' ) ) {
    function sadesmarket_dynamic_sidebar_after()
    {
        if ( !is_admin() ) {
            echo '</div>';
        }
    }
}
/**
 *
 * TEMPLATE HEADER
 */
if ( !function_exists( 'sadesmarket_header_template' ) ) {
    function sadesmarket_header_template()
    {
        if ( sadesmarket_is_mobile() ) {
            sadesmarket_mobile_template();
        } else {
            $sticky_menu = sadesmarket_get_option( 'sticky_menu', 'none' );
            get_template_part( 'templates-parts/header', 'banner' );
            get_template_part( 'templates/header/header', sadesmarket_get_header() );
            if ( $sticky_menu == 'template' ) {
                get_template_part( 'templates-parts/header', 'sticky' );
            }
            if ( !class_exists( 'Ovic_Megamenu_Settings' ) ) {
                sadesmarket_mobile_menu( 'primary' );
            }
        }
    }
}
if ( !function_exists( 'sadesmarket_footer_template' ) ) {
    function sadesmarket_footer_template()
    {
        return sadesmarket_get_footer();
    }
}
if ( !function_exists( 'sadesmarket_extend_mobile_menu' ) ) {
    function sadesmarket_extend_mobile_menu( $menus, $locations )
    {

        $vertical_menu = apply_filters( 'sadesmarket_extend_mobile_menu_vertical', sadesmarket_theme_option_meta(
            '_custom_metabox_theme_options',
            'vertical_menu',
            'metabox_vertical_menu'
        ) );
        $primary_menu  = sadesmarket_theme_option_meta(
            '_custom_metabox_theme_options',
            null,
            'metabox_primary_menu'
        );
        if ( !empty( $primary_menu ) ) {
            $term = get_term_by( 'slug', $primary_menu, 'nav_menu' );
            if ( !is_wp_error( $term ) && !empty( $term ) ) {
                $menus = array( $primary_menu );
            }
        }
        if ( empty( $menus ) && !empty( $locations['primary'] ) ) {
            $mobile_menu = wp_get_nav_menu_object( $locations['primary'] );
            $menus[]     = $mobile_menu->slug;
        }
        if ( !empty( $vertical_menu ) ) {
            $menus[] = $vertical_menu;
        }

        return $menus;
    }
}
/**
 *
 * PRIMARY MENU
 */
if ( !function_exists( 'sadesmarket_primary_menu' ) ) {
    function sadesmarket_primary_menu( $layout = 'horizontal' )
    {
        $enable_primary_menu = sadesmarket_theme_option_meta(
            '_custom_metabox_theme_options',
            'enable_primary_menu',
            'metabox_enable_primary_menu',
            1
        );
        if ( $enable_primary_menu != 1 )
            return false;
        $enable_metabox = sadesmarket_theme_option_meta(
            '_custom_metabox_theme_options',
            null,
            "enable_metabox_options"
        );
        $primary_menu   = '';
        if ( $enable_metabox == 1 ) {
            $primary_menu = sadesmarket_theme_option_meta(
                '_custom_metabox_theme_options',
                null,
                "metabox_primary_menu"
            );
        }
        if ( !empty( $primary_menu ) ) {
            $term = get_term_by( 'slug', $primary_menu, 'nav_menu' );
            if ( !is_wp_error( $term ) && !empty( $term ) ) {
                wp_nav_menu( array(
                        'menu'            => $primary_menu,
                        'theme_location'  => $primary_menu,
                        'depth'           => 3,
                        'container'       => '',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'sadesmarket-nav main-menu ' . $layout . '-menu',
                        'megamenu_layout' => $layout,
                    )
                );
            }
        } else {
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu( array(
                        'menu'            => 'primary',
                        'theme_location'  => 'primary',
                        'depth'           => 3,
                        'container'       => '',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'sadesmarket-nav main-menu ' . $layout . '-menu',
                        'megamenu_layout' => $layout,
                    )
                );
            }
        }
    }
}
if ( !function_exists( 'sadesmarket_header_menu_bar' ) ) {
    function sadesmarket_header_menu_bar()
    {
        ?>
        <div class="mobile-block block-menu-bar">
            <a href="javascript:void(0)" class="menu-bar menu-toggle">
                <span class="icon ovic-icon-menu"><span class="inner"><span></span><span></span><span></span></span></span>
                <span class="text"><?php echo esc_html__( 'Menu', 'sadesmarket' ); ?></span>
            </a>
        </div>
        <?php
    }
}
/**
 *
 * VERTICAL MENU
 */
if ( !function_exists( 'sadesmarket_vertical_menu' ) ) {
    function sadesmarket_vertical_menu( $layout = 'default' )
    {
        sadesmarket_get_template(
            "templates-parts/header-vertical.php",
            array(
                'layout' => $layout,
            )
        );
    }
}
if ( !function_exists( 'sadesmarket_vertical_menu_button' ) ) {
    function sadesmarket_vertical_menu_button()
    {
        $vertical_menu = sadesmarket_theme_option_meta(
            '_custom_metabox_theme_options',
            'vertical_menu',
            'metabox_vertical_menu'
        );
        if ( !sadesmarket_is_mobile() && !empty( $vertical_menu ) ): ?>
            <div class="button-vertical">
                <a href="#" class="vertical-open">
                    <span class="icon ovic-icon-menu"><span class="inner"><span></span><span></span><span></span></span></span>
                </a>
            </div>
        <?php endif;
    }
}
/**
 *
 * HEADER SUBMENU
 */
if ( !function_exists( 'sadesmarket_header_submenu' ) ) {
    function sadesmarket_header_submenu( $menu_location, $depth = 2 )
    {
        $header_menu = sadesmarket_theme_option_meta(
            '_custom_metabox_theme_options',
            $menu_location,
            "metabox_{$menu_location}"
        );
        if ( !empty( $header_menu ) ) {
            do_action( "sadesmarket_before_header_menu_{$header_menu}", $header_menu );
            wp_nav_menu( array(
                    'menu'           => $header_menu,
                    'theme_location' => $header_menu,
                    'link_before'    => '<span class="text">',
                    'link_after'     => '</span>',
                    'depth'          => $depth,
                    'menu_class'     => 'ovic-menu header-submenu ' . $menu_location,
                )
            );
            do_action( "sadesmarket_after_header_menu_{$header_menu}", $header_menu );
        }
    }
}
/**
 *
 * HEADER BANNER
 */
if ( !function_exists( 'sadesmarket_header_banner' ) ) {
    function sadesmarket_header_banner()
    {
        get_template_part( 'templates-parts/header', 'banner' );
    }
}
/**
 *
 * HEADER SOCIAL
 */
if ( !function_exists( 'sadesmarket_header_social' ) ) {
    function sadesmarket_header_social()
    {
        $social_menu = sadesmarket_theme_option_meta(
            '_custom_metabox_theme_options',
            'social_menu',
            'metabox_social_menu'
        );
        if ( $social_menu == 1 ) {
            get_template_part( 'templates-parts/header', 'social' );
        }
    }
}
/**
 *
 * HEADER MESSAGE
 */
if ( !function_exists( 'sadesmarket_header_message' ) ) {
    function sadesmarket_header_message()
    {
        get_template_part( 'templates-parts/header', 'mess' );
    }
}
/**
 *
 * HEADER PHONE
 */
if ( !function_exists( 'sadesmarket_header_phone' ) ) {
    function sadesmarket_header_phone()
    {
        get_template_part( 'templates-parts/header', 'phone' );
    }
}
/**
 *
 * HEADER SEARCH
 */
if ( !function_exists( 'sadesmarket_header_search' ) ) {
    function sadesmarket_header_search( $category = false, $text = '' )
    {
        echo '<div class="block-search">';
        sadesmarket_get_template(
            "templates-parts/header-search.php",
            array(
                'category' => $category,
                'text'     => $text,
            )
        );
        echo '</div>';
    }
}
/**
 *
 * HEADER SEARCH POPUP
 */
if ( !function_exists( 'sadesmarket_header_search_popup' ) ) {
    function sadesmarket_header_search_popup( $category = false, $text = '' )
    {
        ?>
        <div class="block-search sadesmarket-dropdown">
            <a data-sadesmarket="sadesmarket-dropdown" class="woo-search-link" href="javascript:void(0)">
                <span class="icon linearicons-magnifier"></span>
                <span class="text">
                    <span class="sub"><?php echo esc_html__( 'Looking for', 'sadesmarket' );?></span>
                    <?php echo esc_html__( 'My Search', 'sadesmarket' ); ?>
                </span>
            </a>
            <div class="sub-menu">
                <?php
                sadesmarket_get_template(
                    "templates-parts/header-search.php",
                    array(
                        'category' => $category,
                        'text'     => $text,
                    )
                );
                ?>
            </div>
        </div>
        <?php
    }
}
/**
 *
 * HEADER ACCOUNT MENU
 */
if ( !function_exists( 'sadesmarket_header_user' ) ) {
    function sadesmarket_header_user( $text = '' )
    {
        sadesmarket_get_template( "templates-parts/header-user.php",
            array(
                'text' => $text,
            )
        );
    }
}
/**
 *
 * CUSTOM MOBILE MENU
 */
if ( !function_exists( 'sadesmarket_before_mobile_menu' ) ) {
    function sadesmarket_before_mobile_menu( $menu_locations, $data_menus )
    {
        sadesmarket_get_template(
            "templates-parts/mobile-header.php",
            array(
                'menu_locations' => $menu_locations,
                'data_menus'     => $data_menus,
            )
        );
    }

    add_action( 'ovic_before_html_mobile_menu', 'sadesmarket_before_mobile_menu', 10, 2 );
}
if ( !function_exists( 'sadesmarket_after_mobile_menu' ) ) {
    function sadesmarket_after_mobile_menu( $menu_locations, $data_menus )
    {
        sadesmarket_get_template(
            "templates-parts/mobile-footer.php",
            array(
                'menu_locations' => $menu_locations,
                'data_menus'     => $data_menus,
            )
        );
    }

    add_action( 'ovic_after_html_mobile_menu', 'sadesmarket_after_mobile_menu', 10, 2 );
}
/**
 *
 * MEGAMENU ICON
 */
if ( !function_exists( 'sadesmarket_theme_options_icons' ) ) {
    function sadesmarket_theme_options_icons( $icon )
    {
        sadesmarket_get_template( "templates-parts/icon-options.php" );

        return sadesmarket_get_icon_options( $icon );
    }

    add_filter( 'ovic_field_icon_add_icons', 'sadesmarket_theme_options_icons' );
}
/**
 *
 * MEGAMENU ICON
 */
if ( !function_exists( 'sadesmarket_megamenu_options_icons' ) ) {
    function sadesmarket_megamenu_options_icons()
    {
        sadesmarket_get_template( "templates-parts/icon-megamenu.php" );

        return sadesmarket_get_icon_megamenu();
    }

    add_filter( 'ovic_menu_icons_setting', 'sadesmarket_megamenu_options_icons' );
}
if ( !function_exists( 'sadesmarket_elementor_icons' ) ) {
    function sadesmarket_elementor_icons( $tabs )
    {
        $tabs['main-icon'] = [
            'name'          => 'main-icon',
            'label'         => esc_html__( 'Theme Icons', 'sadesmarket' ),
            'url'           => '',
            'enqueue'       => [],
            'prefix'        => '',
            'displayPrefix' => '',
            'labelIcon'     => 'fab fa-font-awesome-alt',
            'ver'           => '1.0.0',
            'fetchJson'     => get_theme_file_uri( '/assets/json/main-icons.json' ),
            'native'        => true,
        ];

        return $tabs;
    }
}
if ( !function_exists( 'sadesmarket_after_install_sample_data' ) ) {
    function sadesmarket_after_install_sample_data()
    {
        $cpt_support   = get_option( 'elementor_cpt_support', [ 'page', 'post' ] );
        $cpt_support[] = 'ovic_menu';
        $cpt_support[] = 'ovic_footer';

        update_option( 'elementor_cpt_support', $cpt_support );
        update_option( 'elementor_disable_color_schemes', 'yes' );
        update_option( 'elementor_disable_typography_schemes', 'yes' );
        update_option( 'elementor_load_fa4_shim', 'yes' );

        if ( class_exists( 'Elementor\Plugin' ) ) {
            $manager = new Elementor\Core\Files\Manager();
            $manager->clear_cache();
        }
    }
}
/**
 *
 * POPUP NEWSLETTER
 */
if ( !function_exists( 'sadesmarket_popup_newsletter' ) ) {
    function sadesmarket_popup_newsletter()
    {
        global $post;
        $enable = sadesmarket_get_option( 'enable_popup' );
        if ( $enable != 1 ) {
            return;
        }
        if ( isset( $_COOKIE['sadesmarket_disabled_popup_by_user'] ) && $_COOKIE['sadesmarket_disabled_popup_by_user'] == 'true' ) {
            return;
        }
        $page = (array)sadesmarket_get_option( 'popup_page' );
        if ( isset( $post->ID ) && is_array( $page ) && in_array( $post->ID, $page ) && $post->post_type == 'page' ) {
            wp_enqueue_style( 'magnific-popup' );
            wp_enqueue_script( 'magnific-popup' );
            get_template_part( 'templates-parts/popup', 'newsletter' );
        }
    }
}