<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
if ( !function_exists( 'sadesmarket_enqueue_inline_css' ) ) {
    function sadesmarket_enqueue_inline_css()
    {
        $css                       = html_entity_decode( sadesmarket_get_option( 'ace_style', '' ) );
        $body_typography           = sadesmarket_theme_option_meta(
            '_custom_metabox_theme_options',
            'body_typography',
            'body_typography'
        );
        $default_color             = sadesmarket_theme_option_meta(
            '_custom_metabox_theme_options',
            'default_color',
            'metabox_default_color',
            '#222'
        );
        $main_color                = sadesmarket_theme_option_meta(
            '_custom_metabox_theme_options',
            'main_color',
            'metabox_main_color',
            '#ffc000'
        );
        $main_color_2              = sadesmarket_theme_option_meta(
            '_custom_metabox_theme_options',
            'main_color_2',
            'metabox_main_color_2',
            '#f04706'
        );
        $container                 = sadesmarket_theme_option_meta(
            '_custom_metabox_theme_options',
            'main_container',
            'metabox_main_container',
            1680
        );
        $vertical_items            = sadesmarket_theme_option_meta(
            '_custom_metabox_theme_options',
            'vertical_items',
            'metabox_vertical_items'
        );
        $sidebar_width             = sadesmarket_get_option( 'sidebar_width', 300 );
        $sidebar_space             = sadesmarket_get_option( 'sidebar_space', 70 );
        $shop_sidebar_width        = sadesmarket_get_option( 'shop_sidebar_width', 300 );
        $shop_sidebar_space        = sadesmarket_get_option( 'shop_sidebar_space', 30 );
        $sidebar_width_tablet      = sadesmarket_get_option( 'sidebar_width_tablet', 290 );
        $sidebar_space_tablet      = sadesmarket_get_option( 'sidebar_space_tablet', 30 );
        $shop_sidebar_width_tablet = sadesmarket_get_option( 'shop_sidebar_width_tablet', 290 );
        $shop_sidebar_space_tablet = sadesmarket_get_option( 'shop_sidebar_space_tablet', 30 );

        $css .= 'body{';
        if ( !empty( $body_typography ) ) {
            if ( !empty( $body_typography['font-family'] ) )
                $css .= '--main-cl:' . $body_typography['font-family'] . ';';
            if ( !empty( $body_typography['font-size'] ) )
                $css .= '--main-cl:' . $body_typography['font-size'] . ';';
            if ( !empty( $body_typography['line-height'] ) )
                $css .= '--main-cl:' . $body_typography['line-height'] . ';';
            if ( !empty( $body_typography['color'] ) )
                $css .= '--main-cl:' . $body_typography['color'] . ';';
        }
        if ( $default_color != '#222' )
            $css .= '--default-color:' . $default_color . ';';
        if ( $main_color != '#fcbe00' )
            $css .= '--main-color:' . $main_color . ';';
        if ( $sidebar_width != 300 )
            $css .= '--sidebar-width:' . $sidebar_width . 'px;';
        if ( $sidebar_space != 70 )
            $css .= '--sidebar-space:' . $sidebar_space . 'px;';
        if ( $shop_sidebar_width != 300 )
            $css .= '--shop-sidebar-width:' . $shop_sidebar_width . 'px;';
        if ( $shop_sidebar_space != 30 )
            $css .= '--shop-sidebar-space:' . $shop_sidebar_space . 'px;';
        $css .= '}';
        $css .= '@media (max-width:1199px) and (min-width:992px){body{';
        if ( $sidebar_width_tablet != 290 )
            $css .= '--sidebar-width:' . $sidebar_width_tablet . 'px;';
        if ( $sidebar_space_tablet != 30 )
            $css .= '--sidebar-space:' . $sidebar_space_tablet . 'px;';
        if ( $shop_sidebar_width_tablet != 290 )
            $css .= '--shop-sidebar-width:' . $shop_sidebar_width_tablet . 'px;';
        if ( $shop_sidebar_space_tablet != 30 )
            $css .= '--shop-sidebar-space:' . $shop_sidebar_space_tablet . 'px;';
        $css .= '}}';
        if ( !empty( $container ) && $container != 1140 ) {
            $container_padding = $container + 30;
            $media             = $container_padding < 1200 ? 1200 : ( $container_padding + 30 );
            $css               .= '
            @media (min-width: ' . $media . 'px){
                body{
                    --main-container:' . $container . 'px;
                }
                body.wcfm-store-page .site #main{
                    width:' . $container_padding . 'px !important;
                }
            }
            ';
        }
        if ( !empty( $vertical_items ) ) {
            $css .= '
            .vertical-menu > .menu-item:nth-child(n+' . ( $vertical_items + 1 ) . '){
                display: none;
            }
            ';
        }

        $css = preg_replace( '/\s+/', ' ', $css );

        wp_add_inline_style( 'sadesmarket-main',
            apply_filters( 'sadesmarket_custom_inline_css', $css, $main_color, $container )
        );
    }

    add_action( 'wp_enqueue_scripts', 'sadesmarket_enqueue_inline_css', 30 );
}