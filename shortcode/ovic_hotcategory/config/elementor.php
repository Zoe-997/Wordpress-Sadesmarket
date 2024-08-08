<?php
if (!defined('ABSPATH')) {
    exit();
}

use Elementor\Controls_Manager as Controls_Manager;

class Elementor_Ovic_Hotcategory extends Ovic_Widget_Elementor
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
        return 'ovic_hotcategory';
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
        return esc_html__('Hot category', 'sadesmarket');
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
        return 'eicon-bullet-list';
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
                'options' => sadesmarket_preview_options($this->get_name()),
                'default' => 'style-01',
            ]
        );

        $this->add_control(
            'title',
            [
                'type'  => Controls_Manager::TEXT,
                'label' => esc_html__('Title', 'sadesmarket'),
            ]
        );

        $repeater = new Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'sadesmarket'),
                'type'  => Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label'       => esc_html__('Title', 'sadesmarket'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $categories = array();
        $query      = new WP_Term_Query([
            'taxonomy'   => 'product_cat',
            'hide_empty' => false,
        ]);
        if (!is_wp_error($query) && !empty($query->terms)) {
            foreach ($query->terms as $item) {
                $categories[$item->slug] = $item->name;
            }
        }

        $repeater->add_control(
            'category',
            [
                'label'       => esc_html__('Products Category', 'sadesmarket'),
                'type'        => Controls_Manager::SELECT2,
                'options'     => $categories,
                'multiple'    => true,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label'       => esc_html__('Link', 'sadesmarket'),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'text_button',
            [
                'type'  => Controls_Manager::TEXT,
                'label' => esc_html__('Text button', 'sadesmarket'),
            ]
        );

        $this->add_control(
            'tabs',
            [
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        $this->carousel_settings();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        echo ovic_do_shortcode($this->get_name(), $settings);
    }
}