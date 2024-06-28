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

        // Style Tab.
           // Width Control.
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
