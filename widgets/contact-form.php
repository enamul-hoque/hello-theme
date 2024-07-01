<?php
namespace HelloElementorChild;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class ContactForm extends Widget_Base {
    public function get_name() {
        return 'webex-contact-form';
    }

    public function get_title() {
        return 'Webex Contact Form 7';
    }

    public function get_icon() {
        return 'eicon-form-horizontal';
    }

    public function get_categories() {
        return ['layout'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'webex_cf_heading',
            [
                'label' => __('Contact Form 7', 'hello-elementor-child'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
            $this->add_control(
                'webex_cf_sortcode',
                [
                    'label'     => esc_html__( 'Sortcode:', 'hello-elementor-child' ),
                    'type'      => Controls_Manager::TEXTAREA,
                ]
            );
        $this->end_controls_section();

        // Style Tab
        $this->start_controls_section(
            'webex_cf_style_input',
            [
                'label' => __('Form Field', 'hello-elementor-child'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Width Control.
        $this->add_responsive_control(
            'webex_field_width',
            [
                'label'     => __( 'Width', 'hello-elementor-child' ),
                'type'      => Controls_Manager::SLIDER,
                'default'   => [
                    'unit'      => '%',
                ],
                'size_units' => [ '%', 'px' ],
                'range'      => [
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .ha-cf7-form label' => 'width: {{SIZE}}{{UNIT}};'
                ]
            ]
        );

        // Padding Control.
        $this->add_responsive_control(
            'webex_field_padding',
            [
                'label'         => esc_html__( 'Padding', 'hello-elementor-child' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors'     => [
                    '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

            $this->add_responsive_control(
                'input_spacing',
                [
                    'label' => esc_html__( 'Spacing Bottom', 'hello-elementor-child' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'field_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'hello-elementor-child' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'input_typography',
                    'selector' => '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)',
                ]
            );

            $this->add_control(
                'input_color',
                [
                    'label' => esc_html__( 'Text Color', 'hello-elementor-child' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'placeholder_color',
                [
                    'label' => esc_html__( 'Placeholder Text Color', 'hello-elementor-child' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} ::-webkit-input-placeholder' => 'color: {{VALUE}}',
                    ],
                ]
            );



            $this->start_controls_tabs(
                'border_tabs'
            );
    
            $this->start_controls_tab(
                'border_normal_tab',
                [
                    'label' => esc_html__( 'Normal', 'hello-elementor-child' ),
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'border_normal',
                    'selector' => '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'normal_box_shadow',
                    'selector' => '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)',
                ]
            );

            $this->add_control(
                'normal_bg_color',
                [
                    'label' => esc_html__( 'Background Color', 'hello-elementor-child' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            
    
            $this->end_controls_tab();
    
            
            $this->start_controls_tab(
                'border_focus_tab',
                [
                    'label' => esc_html__( 'Focus', 'hello-elementor-child' ),
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'border_focus',
                    'selector' => '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit):focus',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'focus_box_shadow',
                    'selector' => '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit):focus',
                ]
            );

            $this->add_control(
                'focus_bg_color',
                [
                    'label' => esc_html__( 'Background Color', 'hello-elementor-child' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit):focus' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
              
    
            
    
            $this->end_controls_tab();
    
            $this->end_controls_tabs();

            $this->add_responsive_control(
                'textarea_height',
                [
                    'label' => esc_html__( 'TextArea Height', 'hello-elementor-child' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 150,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} textarea' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
        



           
        $this->end_controls_section();


        //label Styling

        $this->start_controls_section(
            'webex_cf_style_label',
            [
                'label' => __('Form Fields Label', 'hello-elementor-child'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'label_spacing',
                [
                    'label' => esc_html__( 'Spacing Bottom', 'hello-elementor-child' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 5,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)' => 'margin-top: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'label_typography',
                    'selector' => '{{WRAPPER}} .wpcf7-form label',
                ]
            );

            $this->add_control(
                'label_color',
                [
                    'label' => esc_html__( 'Text Color', 'hello-elementor-child' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .wpcf7-form label' => 'color: {{VALUE}}',
                    ],
                ]
            );


        $this->end_controls_section();


        //Button Styling

        $this->start_controls_section(
            'webex_cf_style_button',
            [
                'label' => __('Submit Button', 'hello-elementor-child'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'button_margin',
                [
                    'label' => esc_html__( 'Margin', 'hello-elementor-child' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .wpcf7-submit' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'button_padding',
                [
                    'label' => esc_html__( 'Padding', 'hello-elementor-child' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .wpcf7-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );



            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'button_typography',
                    'selector' => '{{WRAPPER}} .wpcf7-submit',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'button_border',
                    'selector' => '{{WRAPPER}} .wpcf7-submit',
                ]
            );

            $this->add_responsive_control(
                'button_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'hello-elementor-child' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .wpcf7-submit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'button_box_shadow',
                    'selector' => '{{WRAPPER}} .wpcf7-submit',
                ]
            );

            $this->start_controls_tabs(
                'button_color_tabs'
            );
    
            $this->start_controls_tab(
                'button_normal_tab',
                [
                    'label' => esc_html__( 'Normal', 'hello-elementor-child' ),
                ]
            );


            $this->add_control(
                'button_normal_color',
                [
                    'label' => esc_html__( 'Text Color', 'hello-elementor-child' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .wpcf7-submit' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'button_normal_bg_color',
                [
                    'label' => esc_html__( 'Background Color', 'hello-elementor-child' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .wpcf7-submit' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            
    
            $this->end_controls_tab();
    
            
            $this->start_controls_tab(
                'button_hover_tab',
                [
                    'label' => esc_html__( 'Hover', 'hello-elementor-child' ),
                ]
            );


            $this->add_control(
                'button_hover_color',
                [
                    'label' => esc_html__( 'Text Color', 'hello-elementor-child' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .wpcf7-submit:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'button_hover_bg_color',
                [
                    'label' => esc_html__( 'Background Color', 'hello-elementor-child' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .wpcf7-submit:hover' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
              
    
            
    
            $this->end_controls_tab();
    
            $this->end_controls_tabs();



        $this->end_controls_section();



    }

    protected function render() {
        $settings = $this->get_settings();
        ?>
        <div class="webex-contact-form">
            <?php
                if ( !empty($settings['webex_cf_sortcode']) ) {
                    echo do_shortcode( $settings['webex_cf_sortcode'] );
                } else {
                    echo '<p>Contact Form 7 Shortcode is missing.</p>';
                }
            ?>
        </div>
        <?php
        // Reset post data
        wp_reset_postdata();
    }
}
