<div class="inner <?php echo esc_attr($atts['image_effect']); ?>"
     data-image="<?php echo esc_url($image_url); ?>">
    <?php if (!empty($atts['image']['id'])) : ?>
        <div class="background image-effect"
             style="background-image: url(<?php echo esc_url($image_url); ?>)">
        </div>
    <?php endif; ?>
    <a class="target" <?php echo esc_attr($link); ?>></a>
    <div class="content">
        <div class="item-left">
            <?php if (!empty($atts['text_01'])): ?>
                <h3 class="text-01"><?php echo nl2br($atts['text_01']); ?></h3>
            <?php endif; ?>
            <?php if (!empty($atts['text_02'])): ?>
                <h3 class="text-02"><?php echo nl2br($atts['text_02']); ?></h3>
            <?php endif; ?>
        </div>
        <?php if (!empty($atts['price'])): ?>
            <div class="price-content">
                <?php if (!empty($atts['price_text'])): ?>
                    <span class="price-text">
                        <?php echo esc_html($atts['price_text']); ?>
                    </span>
                <?php endif; ?>
                <span class="group-number">
                    <span class="symbol"><?php echo esc_html__( '$', 'sadesmarket' ); ?></span>
                    <span class="number"><?php echo esc_html($atts['price']); ?></span>
                </span>
            </div>
        <?php endif; ?>
    </div>
</div>