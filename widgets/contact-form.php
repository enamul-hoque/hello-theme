<?php
/*
 * Contact Form Widget.
 * 
 * Contributors: Mohon, Niaj, Shapu.
 */
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
                    'label'     => __( 'Sortcode:', 'hello-elementor-child' ),
                    'type'      => Controls_Manager::TEXTAREA,
                ]
            );
        $this->end_controls_section();

        // Style Tab

        // Label Controls
        $this->start_controls_section(
            'webex_cf_style_label',
            [
                'label' => __('Label', 'hello-elementor-child'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            // Color
            $this->add_control(
                'webex_label_color',
                [
                    'label'     => __( 'Text Color', 'hello-elementor-child' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .wpcf7-form label' => 'color: {{VALUE}}',
                    ],
                ]
            );

            // Typography
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'      => 'webex_label_typography',
                    'selector'  => '{{WRAPPER}} .wpcf7-form label',
                ]
            );

            // Spacing Bottom
            $this->add_responsive_control(
                'webex_label_spacing',
                [
                    'label'         => __( 'Spacing Bottom', 'hello-elementor-child' ),
                    'type'          => Controls_Manager::SLIDER,
                    'size_units'    => [ '%', 'px', 'em', 'rem', 'custom' ],
                    'range'         => [
                        'px'        => [
                            'min'   => 0,
                            'max'   => 1000,
                            'step'  => 1,
                        ],
                    ],
                    'default'       => [
                        'unit'      => 'px',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)' => 'margin-top: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
        $this->end_controls_section();


        // Input Controls
        $this->start_controls_section(
            'webex_cf_style_input',
            [
                'label' => __('Input Box', 'hello-elementor-child'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            // Input Color
            $this->add_control(
                'webex_input_color',
                [
                    'label'     => __( 'Text Color', 'hello-elementor-child' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)' => 'color: {{VALUE}}',
                    ],
                ]
            );

            // Placeholder Color
            $this->add_control(
                'webex_placeholder_color',
                [
                    'label'     => __( 'Placeholder Text Color', 'hello-elementor-child' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} ::-webkit-input-placeholder' => 'color: {{VALUE}}',
                    ],
                ]
            );

            // Typography
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'webex_input_typography',
                    'selector' => '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)',
                ]
            );

            // Width
            $this->add_responsive_control(
                'webex_input_width',
                [
                    'label'      => __( 'Width', 'hello-elementor-child' ),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => [ '%', 'px', 'em', 'rem', 'custom' ],
                    'range'      => [
                        'px' => [
                            'min'   => 0,
                            'max'   => 1000,
                            'step'  => 1,
                        ],
                        '%' => [
                            'min'   => 0,
                            'max'   => 100,
                            'step'  => 1,
                        ],
                    ],
                    'default'   => [
                        'unit'  => '%',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .wpcf7-form label' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            // Padding 
            $this->add_responsive_control(
                'webex_input_padding',
                [
                    'label'      => __( 'Padding', 'hello-elementor-child' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors'  => [
                        '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Spacing Bottom
            $this->add_responsive_control(
                'webex_input_spacing',
                [
                    'label'      => __( 'Spacing Bottom', 'hello-elementor-child' ),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range'      => [
                        'px'     => [
                            'min'   => 0,
                            'max'   => 1000,
                            'step'  => 1,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .wpcf7-form-control-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            // Border
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name'     => 'webex_input_border',
                    'selector' => '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)',
                ]
            );

            // Border Radius
            $this->add_responsive_control(
                'webex_input_border_radius',
                [
                    'label'      => __( 'Border Radius', 'hello-elementor-child' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors'  => [
                        '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            
            // Tab Control
            $this->start_controls_tabs(
                'border_tabs'
            );
                // Normal Tab
                $this->start_controls_tab(
                    'border_normal_tab',
                    [
                        'label' => __( 'Normal', 'hello-elementor-child' ),
                    ]
                );
                    // Normal Background Color
                    $this->add_control(
                        'webex_input_bg_color',
                        [
                            'label'     => __( 'Background Color', 'hello-elementor-child' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)' => 'background-color: {{VALUE}}',
                            ],
                        ]
                    );


                    // Normal Box Shadow
                    $this->add_group_control(
                        \Elementor\Group_Control_Box_Shadow::get_type(),
                        [
                            'name'     => 'normal_box_shadow',
                            'selector' => '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)',
                        ]
                    );
                $this->end_controls_tab();
        
                // Focus Tab
                $this->start_controls_tab(
                    'border_focus_tab',
                    [
                        'label' => __( 'Focus', 'hello-elementor-child' ),
                    ]
                );
                    // Focus Background Color
                    $this->add_control(
                        'focus_bg_color',
                        [
                            'label'     => __( 'Background Color', 'hello-elementor-child' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit):focus' => 'background-color: {{VALUE}}',
                            ],
                        ]
                    );

                    // Border Color
                    $this->add_control(
                        'focus_bd_color',
                        [
                            'label'     => __( 'Border Color', 'hello-elementor-child' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit):focus' => 'border-color: {{VALUE}}',
                            ],
                        ]
                    );

                    // Focus Box Shadow
                    $this->add_group_control(
                        \Elementor\Group_Control_Box_Shadow::get_type(),
                        [
                            'name'     => 'focus_box_shadow',
                            'selector' => '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit):focus',
                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();


        // Textarea controls
        $this->start_controls_section(
            'webex_cf_style_textarea',
            [
                'label' => __('Textarea', 'hello-elementor-child'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            // Height
            $this->add_responsive_control(
                'webex_textarea_height',
                [
                    'label'      => __( 'Height', 'hello-elementor-child' ),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => [ '%', 'px', 'em', 'rem', 'custom' ],
                    'range'      => [
                        'px'     => [
                            'min'   => 0,
                            'max'   => 1000,
                            'step'  => 1,
                        ],
                    ],
                    'default'   => [
                        'unit'  => 'px',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} textarea' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
        $this->end_controls_section();

        // Error Message controls
        $this->start_controls_section(
            'webex_cf_style_error_message',
            [
                'label' => __('Error Message', 'hello-elementor-child'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

            // Text Color
            $this->add_control(
                'webex_error_message_color',
                [
                    'label'     => __( 'Text Color', 'hello-elementor-child' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .wpcf7-not-valid-tip' => 'color: {{VALUE}}',
                    ],
                ]
            );

            // Margin
            $this->add_responsive_control(
                'webex_error_message_margin',
                [
                    'label'      => __( 'Margin', 'hello-elementor-child' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors'  => [
                        '{{WRAPPER}} .wpcf7-not-valid-tip' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
        $this->end_controls_section();


        // Button Controls
        $this->start_controls_section(
            'webex_cf_style_button',
            [
                'label' => __('Submit Button', 'hello-elementor-child'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            // Alignment
            $this->add_responsive_control(
                'webex_button_align',
                [
                    'label'     => __( 'Alignment', 'hello-elementor-child' ),
                    'type'      => Controls_Manager::CHOOSE,
                    'options'   => [
                        'left'  => [
                            'title' => __( 'Left', 'hello-elementor-child' ),
                            'icon'  => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'hello-elementor-child' ),
                            'icon'  => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'hello-elementor-child' ),
                            'icon'  => 'eicon-text-align-right',
                        ],
                    ],
                    'default'   => 'left',
                    'toggle'    => true,
                    'selectors' => [
                        '{{WRAPPER}} .wpcf7-form p:last-of-type' => 'text-align: {{VALUE}};',
                    ],
                ]
            );

            // Padding
            $this->add_responsive_control(
                'webex_button_padding',
                [
                    'label'         => __( 'Padding', 'hello-elementor-child' ),
                    'type'          => Controls_Manager::DIMENSIONS,
                    'size_units'    => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors'     => [
                        '{{WRAPPER}} .wpcf7-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Typography
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'      => 'webex_button_typography',
                    'selector'  => '{{WRAPPER}} .wpcf7-submit',
                ]
            );

            // Border
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name'      => 'webex_button_border',
                    'selector'  => '{{WRAPPER}} .wpcf7-submit',
                ]
            );

            // Border Radius
            $this->add_responsive_control(
                'webex_button_border_radius',
                [
                    'label'         => __( 'Border Radius', 'hello-elementor-child' ),
                    'type'          => Controls_Manager::DIMENSIONS,
                    'size_units'    => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors'     => [
                        '{{WRAPPER}} .wpcf7-submit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Box Shadow
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name'      => 'webex_button_box_shadow',
                    'selector'  => '{{WRAPPER}} .wpcf7-submit',
                ]
            );

            // Tab Control
            $this->start_controls_tabs(
                'webex_button_color_tabs'
            );
                // Normal Tab
                $this->start_controls_tab(
                    'webex_button_normal_tab',
                    [
                        'label' => __( 'Normal', 'hello-elementor-child' ),
                    ]
                );
                    // Normal Text Color
                    $this->add_control(
                        'webex_button_normal_color',
                        [
                            'label'     => __( 'Text Color', 'hello-elementor-child' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .wpcf7-submit' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    // Normal Background Color
                    $this->add_control(
                        'webex_button_normal_bg_color',
                        [
                            'label'     => __( 'Background Color', 'hello-elementor-child' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .wpcf7-submit' => 'background-color: {{VALUE}}',
                            ],
                        ]
                    );
                $this->end_controls_tab();
        
                // Hover Tab
                $this->start_controls_tab(
                    'webex_button_hover_tab',
                    [
                        'label' => __( 'Hover', 'hello-elementor-child' ),
                    ]
                );
                    // Hover Text Color
                    $this->add_control(
                        'webex_button_hover_color',
                        [
                            'label'     => __( 'Text Color', 'hello-elementor-child' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .wpcf7-submit:hover' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    // Hover Background Color
                    $this->add_control(
                        'webex_button_hover_bg_color',
                        [
                            'label'     => __( 'Background Color', 'hello-elementor-child' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .wpcf7-submit:hover' => 'background-color: {{VALUE}}',
                            ],
                        ]
                    );

                    // Border Color
                    $this->add_control(
                        'webex_button_hover_bd_color',
                        [
                            'label'     => __( 'Border Color', 'hello-elementor-child' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .wpcf7-submit:hover' => 'border-color: {{VALUE}}',
                            ],
                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();


        // Response Messages Controls
        $this->start_controls_section(
            'webex_cf_style_response',
            [
                'label' => __('Response Messages', 'hello-elementor-child'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            // Color
            $this->add_control(
                'webex_cf_rs_color',
                [
                    'label'     => __( 'Text Color', 'hello-elementor-child' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .wpcf7-response-output' => 'color: {{VALUE}}',
                    ],
                ]
            );

            // Typography
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'      => 'webex_cf_rs_typo',
                    'selector'  => '{{WRAPPER}} .wpcf7-response-output',
                ]
            );

            // Padding 
            $this->add_responsive_control(
                'webex_cf_rs_pd',
                [
                    'label'      => __( 'Padding', 'hello-elementor-child' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors'  => [
                        '{{WRAPPER}} .wpcf7-response-output' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Border
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name'      => 'webex_cf_rs_bd',
                    'selector'  => '{{WRAPPER}} .wpcf7-response-output',
                ]
            );

            // Alignment
            $this->add_responsive_control(
                'webex_cf_rs_align',
                [
                    'label'     => __( 'Alignment', 'hello-elementor-child' ),
                    'type'      => Controls_Manager::CHOOSE,
                    'options'   => [
                        'left'  => [
                            'title' => __( 'Left', 'hello-elementor-child' ),
                            'icon'  => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'hello-elementor-child' ),
                            'icon'  => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'hello-elementor-child' ),
                            'icon'  => 'eicon-text-align-right',
                        ],
                    ],
                    'toggle'    => true,
                    'selectors' => [
                        '{{WRAPPER}} .wpcf7-response-output' => 'text-align: {{VALUE}};',
                    ],
                ]
            );
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
