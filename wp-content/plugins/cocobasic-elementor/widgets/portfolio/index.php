<?php

namespace CocoBasicElements\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class coco_portfolio extends Widget_Base {

    public function get_name() {
        return 'coco-portfolio';
    }

    public function get_title() {
        return __('Portfolio', 'cocobasic-elementor');
    }

    public function get_icon() {
        return 'fa fa-th';
    }

    public function get_categories() {
        return array('coco-element');
    }

    protected function _register_controls() {

        $this->start_controls_section(
                'section_process_1', [
            'label' => __('Content', 'cocobasic-elementor'),
                ]
        );

        $this->add_control(
                'num', [
            'label' => __('Number of items before laod more', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => esc_attr__('5', 'cocobasic-elementor'),
                ]
        );

        $this->add_control(
                'loading_option', [
            'label' => __('Loadin More', 'cocobasic-elementor'),
            'type' => Controls_Manager::SELECT,
            'label_block' => true,
            'options' => [
                'button' => __('Button', 'cocobasic-elementor'),
                'scroll' => __('Scroll', 'cocobasic-elementor'),
            ],
            'default' => 'button',
                ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
                'section_general', [
            'label' => esc_attr__('General', 'cocobasic-elementor'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'overlay_color', [
            'label' => __('Item overlay color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .grid-item a.item-link:after' => 'background-color: {{VALUE}};',
            ],
                ]
        );       

        $this->add_control(
                'title_color', [
            'label' => __('Text color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .portfolio-title' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => __('Text Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} .portfolio-title',
                ]
        );       

        $this->end_controls_section();


        $this->start_controls_section(
                'section_loadmore_button', [
            'label' => esc_attr__('Load More Button', 'cocobasic-elementor'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );
   
        $this->add_control(
                'loadmore_text', [
            'label' => __('Load More text', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => 'LOAD MORE',
                ]
        );

        $this->add_control(
                'loadmore_loading_text', [
            'label' => __('Loading text', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => 'LOADING',
                ]
        );

        $this->add_control(
                'loadmore_nomore_text', [
            'label' => __('No more text', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => 'NO MORE',
                ]
        );

        $this->add_control(
                'loadmore_text_color', [
            'label' => __('Load more text color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .more-posts-portfolio-holder' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'loadmore_text_typography',
            'label' => __('Load More Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} .more-posts-portfolio-holder',
                ]
        );       

        $this->end_controls_section();        
    }

    protected function render() {
        $settings = $this->get_settings();
        require dirname(__FILE__) . '/view.php';
    }

}

$widgets_manager->register_widget_type(new \CocoBasicElements\Widgets\coco_portfolio());
