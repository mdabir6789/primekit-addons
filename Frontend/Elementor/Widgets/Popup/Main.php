<?php
namespace PrimeKit\Frontend\Elementor\Widgets\Popup;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;


class Main extends Widget_Base
{

    public function get_name()
    {
        return 'primekit-popup';
    }
    
    public function get_title()
    {
        return esc_html__('Popup', 'primekit-addons');
    }
    
    public function get_icon()
    {
        return 'eicon-lightbox-expand primekit-addons-icon';
    }
    
    public function get_categories()
    {
        return ['primekit-category'];
    }
    
    public function get_script_depends()
    {
        return ['primekit-popup'];
    }
    

    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'primekit_elementor_popup_section',
            [
                'label' => esc_html__('Popup', 'primekit-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        //content type
        $this->add_control(
            'primekit_elementor_popup_content_type',
            [
                'label' => esc_html__('Content Type', 'primekit-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => 'text',
                'options' => [
                    'text' => esc_html__('Text', 'primekit-addons'),
                    'icon' => esc_html__('Icon', 'primekit-addons'),
                    'image' => esc_html__('Image', 'primekit-addons'),
                ],
            ]
        );
        // popup text
        $this->add_control(
            'primekit_elementor_popup_text',
            [
                'label' => esc_html__('Popup Text', 'primekit-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Popup Text',
                'condition' => [
                    'primekit_elementor_popup_content_type' => 'text',
                ],
            ]
        );
        // popup icon
        $this->add_control(
            'primekit_elementor_popup_icon',
            [
                'label' => esc_html__('Popup Icon', 'primekit-addons'),
                'type' => Controls_Manager::ICONS,
                'condition' => [
                    'primekit_elementor_popup_content_type' => 'icon',
                ],
            ]
        );
        // popup image
        $this->add_control(
            'primekit_elementor_popup_image',
            [
                'label' => esc_html__('Popup Image', 'primekit-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'primekit_elementor_popup_content_type' => 'image',
                ],
            ]
        );

        // popup image al
        $this->add_control(
            'primekit_elementor_popup_img_alt_text',
            [
                'label' => esc_html__('Image Alt Text', 'primekit-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => 'PrimeKit Popup',
                'condition' => [
                    'primekit_elementor_popup_content_type' => 'image',
                ],
            ]
        );


        // popup type
        $this->add_control(
            'primekit_elementor_popup_type',
            [
                'label' => esc_html__('Popup Type', 'primekit-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => 'yt-video',
                'options' => [
                    'yt-video' => esc_html__('Youtube Video', 'primekit-addons'),
                    'vm-video' => esc_html__('Vimeo Video', 'primekit-addons'),
                    'gmap' => esc_html__('Google Map', 'primekit-addons'),
                ],
            ]
        );
        // popup video
        $this->add_control(
            'primekit_elementor_popup_video',
            [
                'label' => esc_html__('Youtube Video', 'primekit-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => 'qtNnAJOGCcw',
                'description' => esc_html__('Enter Youtube video ID', 'primekit-addons'),
                'condition' => [
                    'primekit_elementor_popup_type' => 'yt-video',
                ],
            ]
        );
        // popup vimeo
        $this->add_control(
            'primekit_elementor_popup_vimeo_video',
            [
                'label' => esc_html__('Vimeo Video', 'primekit-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'description' => esc_html__('Enter Vimeo video ID', 'primekit-addons'),
                'condition' => [
                    'primekit_elementor_popup_type' => 'vm-video',
                ],
            ]
        );
        // popup gmap
        $this->add_control(
            'primekit_elementor_popup_gmap',
            [
                'label' => esc_html__('Google Map', 'primekit-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3618057.6387792374!2d-86.44980745076629!3d27.678376067544153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4daec28b478b666b%3A0x40d7d670f849f542!2sSupreoX%20Limited%20USA!5e0!3m2!1sen!2sbd!4v1699363617377!5m2!1sen!2sbd',
                'condition' => [
                    'primekit_elementor_popup_type' => 'gmap',
                ],
            ]
        );

        // end of popup
        $this->end_controls_section();

        // popup style
        $this->start_controls_section(
            'primekit_elementor_popup_style_section',
            [
                'label' => esc_html__('Popup Style', 'primekit-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // popup alignment
        $this->add_control(
            'primekit_elementor_popup_alignment',
            [
                'label' => esc_html__('Alignment', 'primekit-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'primekit-addons'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'primekit-addons'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'primekit-addons'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .primekit-popup-area' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        // popup text style
        $this->add_control(
            'primekit_elementor_popup_text_style',
            [
                'label' => esc_html__('Text Style', 'primekit-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'primekit_elementor_popup_content_type' => 'text',
                ],
            ]
        );
        $this->add_control(
            'primekit_elementor_popup_text_color',
            [
                'label' => esc_html__('Text Color', 'primekit-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-text' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'primekit_elementor_popup_content_type' => 'text',
                ],
            ]
        );

        // popup text background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'primekit-elementor-popup-text-background',
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-text',
                'condition' => [
                    'primekit_elementor_popup_content_type' => 'text',
                ],
            ]
        );
        // popup text typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'primekit_elementor_popup_text_typography',
                'label' => esc_html__('Typography', 'primekit-addons'),
                'selector' => '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-text',
                'condition' => [
                    'primekit_elementor_popup_content_type' => 'text',
                ],
            ]
        );
        // popup text padding
        $this->add_responsive_control(
            'primekit_elementor_popup_text_padding',
            [
                'label' => esc_html__('Padding', 'primekit-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'primekit_elementor_popup_content_type' => 'text',
                ],
            ]
        );
        // popup text border radius
        $this->add_responsive_control(
            'primekit_elementor_popup_text_border_radius',
            [
                'label' => esc_html__('Border Radius', 'primekit-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'primekit_elementor_popup_content_type' => 'text',
                ],
            ]
        );
        // popup icon style
        $this->add_control(
            'primekit_elementor_popup_icon_style',
            [
                'label' => esc_html__('Icon Style', 'primekit-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'primekit_elementor_popup_content_type' => 'icon',
                ],
            ]
        );

        //icon color
        $this->add_control(
            'primekit_elementor_popup_icon_color',
            [
                'label' => esc_html__('Icon Color', 'primekit-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-icon svg' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-icon svg path' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'primekit_elementor_popup_content_type' => 'icon',
                ],
            ]
        );

        // popup icon background    
        $this->add_control(
            'primekit-elementor-popup-icon-background',
            [
                'label' => esc_html__('Icon Background Color', 'primekit-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-icon i' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-icon svg' => 'fill: {{VALUE}};background-color: {{VALUE}};',
                    '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-icon svg circle' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'primekit_elementor_popup_content_type' => 'icon',
                ],
            ]
        );

        //icon hover color
        $this->add_control(
            'primekit_elementor_popup_icon_hov_color',
            [
                'label' => esc_html__('Icon Hover Color', 'primekit-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-icon i:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-icon svg:hover' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-icon svg:hover path' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'primekit_elementor_popup_content_type' => 'icon',
                ],
            ]
        );

        // popup icon hover background    
        $this->add_control(
            'primekit-elementor-popup-icon-hov-background',
            [
                'label' => esc_html__('Icon Hover Background Color', 'primekit-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#b437f5',
                'selectors' => [
                    '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-icon i:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-icon svg:hover' => 'fill: {{VALUE}};background-color: {{VALUE}};',
                    '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-icon svg:hover circle' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'primekit_elementor_popup_content_type' => 'icon',
                ],
            ]
        );

        // popup icon border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'primekit_elementor_popup_icon_border',
                'label' => esc_html__('Border', 'primekit-addons'),
                'selector' => '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-icon',
                'condition' => [
                    'primekit_elementor_popup_content_type' => 'icon',
                ],
            ]
        );

        // popup icon border radius
        $this->add_responsive_control(
            'primekit_elementor_popup_icon_border_radius',
            [
                'label' => esc_html__('Border Radius', 'primekit-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default' => [
                    'top' => 50,
                    'right' => 50,
                    'bottom' => 50,
                    'left' => 50,
                    'unit' => '%',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-icon svg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'primekit_elementor_popup_content_type' => 'icon',
                ],
            ]
        );
        // popup icon size
        $this->add_responsive_control(
            'primekit_elementor_popup_icon_size',
            [
                'label' => esc_html__('Icon Size', 'primekit-addons'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 80,
                ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'primekit_elementor_popup_content_type' => 'icon',
                ],
            ]
        );
        // popup icon padding
        $this->add_responsive_control(
            'primekit_elementor_popup_icon_padding',
            [
                'label' => esc_html__('Icon Padding', 'primekit-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default' => [
                    'top' => 10,
                    'right' => 10,
                    'bottom' => 10,
                    'left' => 10,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-icon i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-icon svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'primekit_elementor_popup_content_type' => 'icon',
                ],
            ]
        );
        // popup image style
        $this->add_control(
            'primekit_elementor_popup_image_style',
            [
                'label' => esc_html__('Image Style', 'primekit-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'primekit_elementor_popup_content_type' => 'image',
                ],
            ]
        );

        // popup image width
        $this->add_responsive_control(
            'primekit_elementor_popup_image_width',
            [
                'label' => esc_html__('Image Width', 'primekit-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'default' => [
                    'size' => 150,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 500,
                        'step' => 5,
                    ],
                ],

                'selectors' => [
                    '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-image img' => 'width: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'primekit_elementor_popup_content_type' => 'image',
                ],
            ]
        );

        // popup image border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'primekit_elementor_popup_image_border',
                'label' => esc_html__('Border', 'primekit-addons'),
                'selector' => '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-image img',
                'condition' => [
                    'primekit_elementor_popup_content_type' => 'image',
                ],
            ]
        );
        // popup image border radius
        $this->add_responsive_control(
            'primekit_elementor_popup_image_border_radius',
            [
                'label' => esc_html__('Border Radius', 'primekit-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .primekit-popup-area .primekit-popup-content-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'primekit_elementor_popup_content_type' => 'image',
                ],
            ]
        );

        // popup style end
        $this->end_controls_section();

        // popup content style section
        $this->start_controls_section(
            'primekit_elementor_popup_content_style_section',
            [
                'label' => esc_html__('Popup Contents', 'primekit-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        //Notice
        $this->add_control(
			'custom_panel_notice',
			[
				'type' => \Elementor\Controls_Manager::NOTICE,
				'notice_type' => 'Notice',
				'dismissible' => false,
				'heading' => esc_html__( 'Notice', 'primekit-addons' ),
				'content' => esc_html__( 'For a better frame view try to set width and height based on a 16:9 ratio. ', 'primekit-addons' ),
			]
		);

        //ifreame width
        $this->add_responsive_control(
            'primekit_elementor_popup_iframe_width',
            [
                'label' => esc_html__('Width', 'primekit-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 150,
                        'max' => 1500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-popup-overlay iframe' => 'width: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .primekit-popup' => 'width: calc({{SIZE}}{{UNIT}} + 2px);',
                ],
            ]
        );

        //iframe height
        $this->add_responsive_control(
            'primekit_elementor_popup_iframe_height',
            [
                'label' => esc_html__('Height', 'primekit-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 150,
                        'max' => 1500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-popup-overlay iframe' => 'height: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .primekit-popup' => 'height: calc({{SIZE}}{{UNIT}} + 2px);',
                ],
            ]
        );        
        
        // Border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'primekit_elementor_popup_border',
                'label' => esc_html__('Border', 'primekit-addons'),
                'selector' => '{{WRAPPER}} .primekit-popup-area .primekit-popup',
            ]
        );

        // Border radius
        $this->add_responsive_control(
            'primekit_elementor_popup_border_radius',
            [
                'label' => esc_html__('Border Radius', 'primekit-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .primekit-popup-area .primekit-popup' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //close icon background size
        $this->add_responsive_control(
            'primekit_elementor_popup_close_icon_background_size',
            [
                'label' => esc_html__('Close Icon Background Size', 'primekit-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-popup-close i' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        // Close icon size
        $this->add_responsive_control(
            'primekit_elementor_popup_close_icon_size',
            [
                'label' => esc_html__('Close Icon Size', 'primekit-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-popup-close i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Icon color
        $this->add_control(
            'primekit_elementor_popup_close_icon_color',
            [
                'label' => esc_html__('Icon Color', 'primekit-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primekit-popup-close i' => 'color: {{VALUE}};',
                ],
            ]
        );

       //close icon background color
       $this->add_control(
           'primekit_elementor_popup_close_icon_bg_color',
           [
               'label' => esc_html__('Close Icon Background Color', 'primekit-addons'),
               'type' => Controls_Manager::COLOR,
               'selectors' => [
                   '{{WRAPPER}} .primekit-popup-close i' => 'background-color: {{VALUE}};',
               ],
           ]
       ); 
       
       // Close icon position - horizontal
       $this->add_responsive_control(
           'primekit_elementor_popup_close_icon_right_position',
           [
               'label' => esc_html__('Close Icon Right indent', 'primekit-addons'),
               'type' => Controls_Manager::SLIDER,
               'label_block' => true,
               'size_units' => ['%', 'px'],
               'range' => [
                   '%' => [
                       'min' => 0,
                       'max' => 100,
                   ],
                   'px' => [
                       'min' => -1000,
                       'max' => 1000,
                   ],
               ],
               'selectors' => [
                   '{{WRAPPER}} .primekit-popup-close' => 'right: {{SIZE}}{{UNIT}};',
               ],
           ]
       );

       // Close icon position - vertical
       $this->add_responsive_control(
           'primekit_elementor_popup_close_icon_top_position',
           [
               'label' => esc_html__('Close Icon Top indent', 'primekit-addons'),
               'type' => Controls_Manager::SLIDER,
               'size_units' => ['%', 'px'],
               'range' => [
                   '%' => [
                       'min' => 0,
                       'max' => 100,
                   ],
                   'px' => [
                       'min' => -1000,
                       'max' => 1000,
                   ],
               ],
               'selectors' => [
                   '{{WRAPPER}} .primekit-popup-close' => 'top: {{SIZE}}{{UNIT}};',
               ],
           ]
       );

       // Close icon border radius
       $this->add_responsive_control(
           'primekit_elementor_popup_close_icon_border_radius',
           [
               'label' => esc_html__('Close Icon Border Radius', 'primekit-addons'),
               'type' => Controls_Manager::DIMENSIONS,
               'label_block' => true,
               'size_units' => ['px', '%'],
               'selectors' => [
                   '{{WRAPPER}} .primekit-popup-close i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               ],
           ]
       );
        
       $this->end_controls_section();

    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'RenderView.php';
    }
}
