<?php
if ( !defined( 'ABSPATH' ) ) {
    exit();
}

use Elementor\Core\Schemes;
use Elementor\Controls_Manager as Controls_Manager;

class Elementor_Ovic_Person extends Ovic_Widget_Elementor
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
        return 'ovic_person';
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
        return esc_html__( 'Person', 'sadesmarket' );
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
        return 'eicon-person';
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'general_section',
            array(
                'tab'   => Controls_Manager::TAB_CONTENT,
                'label' => esc_html__( 'General', 'sadesmarket' ),
            )
        );

        $this->add_control(
            'style',
            [
                'type'    => Controls_Manager::SELECT,
                'label'   => esc_html__( 'Select style', 'sadesmarket' ),
                'options' => sadesmarket_preview_options( $this->get_name() ),
                'default' => 'style-01',
            ]
        );

        $this->add_control(
            'avatar',
            [
                'label'   => esc_html__( 'Avatar', 'sadesmarket' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'name',
            [
                'label' => esc_html__( 'Name', 'sadesmarket' ),
                'type'  => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'position',
            [
                'label'     => esc_html__( 'Position', 'sadesmarket' ),
                'type'      => Controls_Manager::TEXT,
                'condition' => [
                    'style' => 'style-02'
                ],
            ]
        );

        $this->add_control(
            'desc',
            [
                'label'       => esc_html__( 'Description', 'sadesmarket' ),
                'type'        => Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'signature',
            [
                'label'     => esc_html__( 'Signature', 'sadesmarket' ),
                'type'      => Controls_Manager::MEDIA,
                'default'   => [
                    'url' => Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'style' => 'style-01'
                ],
            ]
        );

        $this->add_control(
            'link',
            [
                'label'       => esc_html__( 'Link', 'sadesmarket' ),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
            ]
        );

        $this->end_controls_section();
    }
}