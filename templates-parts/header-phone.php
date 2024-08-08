<?php
$header_phone = sadesmarket_theme_option_meta(
    '_custom_metabox_theme_options',
    'header_phone',
    'metabox_header_phone'
);
if ( !empty( $header_phone ) ) :
    $link = str_replace( ' ', '', $header_phone );
    ?>
    <div class="header-phone">
        <a href="<?php echo esc_attr( 'tel:' . $link ); ?>">
            <span class="icon linearicons-phone-wave"></span>
            <span class="info-text"> 
                <span class="title"><?php echo esc_html__( 'Call us 24/7', 'sadesmarket' ) ?></span>
                <span class="text"><?php echo esc_html( $header_phone ); ?></span>
            </span>  
        </a>
    </div>
<?php endif;