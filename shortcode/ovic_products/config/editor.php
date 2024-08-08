<?php

class Editor_Ovic_Products
{
    public static function shortcode_config()
    {
        return array(
            'name'   => 'ovic_products',
            'title'  => 'Products',
            'fields' => array(
                'title'         => array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => esc_html__('Title', 'sadesmarket'),
                ),
                'list_style'    => array(
                    'id'      => 'list_style',
                    'type'    => 'text',
                    'class'   => 'ovic-hidden',
                    'default' => 'none',
                    'title'   => esc_html__('List style', 'sadesmarket'),
                ),
                'product_style' => array(
                    'id'          => 'product_style',
                    'type'        => 'select_preview',
                    'title'       => esc_html__('Product style', 'sadesmarket'),
                    'options'     => sadesmarket_product_options('Shortcode'),
                    'default'     => 'style-01',
                    'description' => esc_html__('Select a style for product item', 'sadesmarket'),
                ),
                'target'        => array(
                    'id'          => 'target',
                    'type'        => 'select',
                    'title'       => esc_html__('Target', 'sadesmarket'),
                    'options'     => array(
                        'recent_products'       => esc_html__('Recent Products', 'sadesmarket'),
                        'featured_products'     => esc_html__('Feature Products', 'sadesmarket'),
                        'sale_products'         => esc_html__('Sale Products', 'sadesmarket'),
                        'best_selling_products' => esc_html__('Best Selling Products', 'sadesmarket'),
                        'top_rated_products'    => esc_html__('Top Rated Products', 'sadesmarket'),
                        'products'              => esc_html__('Products', 'sadesmarket'),
                        'product_category'      => esc_html__('Products Category', 'sadesmarket'),
                        'related_products'      => esc_html__('Products Related', 'sadesmarket'),
                    ),
                    'attributes'  => array(
                        'data-depend-id' => 'target',
                    ),
                    'default'     => 'recent_products',
                    'description' => esc_html__('Choose the target to filter products', 'sadesmarket'),
                ),
                'ids'           => array(
                    'id'          => 'ids',
                    'type'        => 'select',
                    'chosen'      => true,
                    'multiple'    => true,
                    'sortable'    => true,
                    'ajax'        => true,
                    'options'     => 'posts',
                    'query_args'  => array(
                        'post_type' => 'product',
                    ),
                    'title'       => esc_html__('Products', 'sadesmarket'),
                    'description' => esc_html__('Enter List of Products', 'sadesmarket'),
                    'dependency'  => array('target', '==', 'products'),
                ),
                'category'      => array(
                    'id'          => 'category',
                    'type'        => 'select',
                    'chosen'      => true,
                    'ajax'        => true,
                    'options'     => 'categories',
                    'placeholder' => esc_html__('Select Products Category', 'sadesmarket'),
                    'query_args'  => array(
                        'hide_empty' => true,
                        'taxonomy'   => 'product_cat',
                    ),
                    'title'       => esc_html__('Product Categories', 'sadesmarket'),
                    'description' => esc_html__('Note: If you want to narrow output, select category(s) above. Only selected categories will be displayed.',
                        'sadesmarket'),
                    'dependency'  => array('target', '!=', 'products'),
                ),
                'limit'         => array(
                    'id'          => 'limit',
                    'type'        => 'number',
                    'unit'        => 'items(s)',
                    'default'     => '6',
                    'title'       => esc_html__('Limit', 'sadesmarket'),
                    'description' => esc_html__('How much items per page to show', 'sadesmarket'),
                ),
                'orderby'       => array(
                    'id'          => 'orderby',
                    'type'        => 'select',
                    'title'       => esc_html__('Order by', 'sadesmarket'),
                    'options'     => array(
                        ''              => esc_html__('None', 'sadesmarket'),
                        'date'          => esc_html__('Date', 'sadesmarket'),
                        'ID'            => esc_html__('ID', 'sadesmarket'),
                        'author'        => esc_html__('Author', 'sadesmarket'),
                        'title'         => esc_html__('Title', 'sadesmarket'),
                        'modified'      => esc_html__('Modified', 'sadesmarket'),
                        'rand'          => esc_html__('Random', 'sadesmarket'),
                        'comment_count' => esc_html__('Comment count', 'sadesmarket'),
                        'menu_order'    => esc_html__('Menu order', 'sadesmarket'),
                        'price'         => esc_html__('Price: low to high', 'sadesmarket'),
                        'price-desc'    => esc_html__('Price: high to low', 'sadesmarket'),
                        'rating'        => esc_html__('Average Rating', 'sadesmarket'),
                        'popularity'    => esc_html__('Popularity', 'sadesmarket'),
                        'post__in'      => esc_html__('Post In', 'sadesmarket'),
                        'most-viewed'   => esc_html__('Most Viewed', 'sadesmarket'),
                    ),
                    'description' => sprintf(esc_html__('Select how to sort retrieved products. More at %s.',
                        'sadesmarket'),
                        '<a href="'.esc_url('http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters').'" target="_blank">'.esc_html__('WordPress codex page',
                            'sadesmarket').'</a>'),
                ),
                'order'         => array(
                    'id'          => 'order',
                    'type'        => 'select',
                    'title'       => esc_html__('Sort order', 'sadesmarket'),
                    'options'     => array(
                        ''     => esc_html__('None', 'sadesmarket'),
                        'DESC' => esc_html__('Descending', 'sadesmarket'),
                        'ASC'  => esc_html__('Ascending', 'sadesmarket'),
                    ),
                    'description' => sprintf(esc_html__('Designates the ascending or descending order. More at %s.',
                        'sadesmarket'),
                        '<a href="'.esc_url('http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters').'" target="_blank">'.esc_html__('WordPress codex page',
                            'sadesmarket').'</a>'),
                ),
            ),
        );
    }
}