<?php

namespace CocoBasicElements\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class coco_imageslider extends Widget_Base {

    public function get_name() {
        return 'coco-imageslider';
    }

    public function get_title() {
        return __('Image Slider', 'cocobasic-elementor');
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
                'name', [
            'label' => __('Slider Name', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => esc_attr__('Slider', 'cocobasic-elementor'),
                ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
                'title', [
            'label' => __('Slide Name', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => esc_attr__('Slide Name', 'cocobasic-elementor'),
                ]
        );

        $repeater->add_control(
                'img', [
            'label' => esc_html__('Image', 'cocobasic-elementor'),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
            'label_block' => true,
                ]
        );
        $repeater->add_control(
                'url', [
            'label' => esc_html__('Image Link (optional)', 'cocobasic-elementor'),
            'type' => Controls_Manager::URL,
            'label_block' => true,
            'placeholder' => esc_html__('http://your-link.com', 'cocobasic-elementor'),
                ]
        );

        $this->add_control(
                'items', [
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'prevent_empty' => false,
            'default' => [
                [
                    'title' => esc_attr__('Content', 'cocobasic-elementor'),
                ]
            ],
            'title_field' => '{{{ title }}}',
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'section_process_2', [
            'label' => __('Settings', 'cocobasic-elementor'),
                ]
        );


        $this->add_control(
                'speed', [
            'label' => __('Speed (ms)', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => esc_attr__('2000', 'cocobasic-elementor'),
                ]
        );

        $this->add_control(
                'auto_start', [
            'label' => __('Auto Start', 'cocobasic-elementor'),
            'type' => Controls_Manager::SELECT,
            'label_block' => true,
            'options' => [
                'true' => __('True', 'cocobasic-elementor'),
                'false' => __('Fasle', 'cocobasic-elementor'),
            ],
            'default' => 'true',
                ]
        );


        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();
        require dirname(__FILE__) . '/view.php';
    }

    private function content($content) {

        $out = '';

        foreach ($content as $item) {


            $img = $item['img']['id'] ? wp_get_attachment_image($item['img']['id'], '', '', ["class" => "text-slide-img"]) : '';
            $url = $item['url']['url'];
            $ext = $item['url']['is_external'];
            $nofollow = $item['url']['nofollow'];
            $url = ( isset($url) && $url ) ? 'href=' . esc_url($url) . '' : '';
            $ext = ( isset($ext) && $ext ) ? 'target= _blank' : '';
            $nofollow = ( isset($url) && $url ) ? 'rel=nofollow' : '';
            $link = $url . ' ' . $ext . ' ' . $nofollow;

            if ($img != ''):
                if ($url != ''):
                    $out .= '<div class="swiper-slide"><a ' . $link . '>' . $img . '</a></div>';
                else:
                    $out .= '<div class="swiper-slide">' . $img . '</div>';
                endif;
            endif;
        }

        return $out;
    }

}

$widgets_manager->register_widget_type(new \CocoBasicElements\Widgets\coco_imageslider());
