<?php
namespace HelloElementorChild;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class BlogPosts extends Widget_Base {
    public function get_name() {
        return 'htc-blog-posts';
    }

    public function get_title() {
        return 'Blog Posts';
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
        return ['basic'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'htc_post_heading',
            [
                'label' => __('Heading', 'hello-elementor-child'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'      => 'heading_typography',
                    'selector'  => '{{WRAPPER}} .post_grid--heading',
                ]
            );

            $this->add_control(
                'heading_color',
                [
                    'label'     => esc_html__( 'Color', 'hello-elementor-child' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post_grid--heading' => 'color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'heading_hcolor',
                [
                    'label'     => esc_html__( 'Color (Hover)', 'hello-elementor-child' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post_grid--item:hover .post_grid--heading' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'heading_padding',
                [
                    'label'     => esc_html__( 'Padding', 'hello-elementor-child' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .post_grid--heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
            'htc_post_meta',
            [
                'label' => __('Meta', 'hello-elementor-child'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'      => 'meta_typography',
                    'selector'  => '{{WRAPPER}} .post_grid--meta',
                ]
            );

            $this->add_control(
                'meta_color',
                [
                    'label'     => esc_html__( 'Color', 'hello-elementor-child' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post_grid--meta' => 'color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
            'htc_post_pagi',
            [
                'label' => __('Pagination', 'hello-elementor-child'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'      => 'pagi_typography',
                    'selector'  => '{{WRAPPER}} .post_grid--pagination',
                ]
            );

            $this->add_control(
                'pagi_color',
                [
                    'label'     => esc_html__( 'Color', 'hello-elementor-child' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post_grid--pagination' => 'color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'pagi_hcolor',
                [
                    'label'     => esc_html__( 'Color (Hover)', 'hello-elementor-child' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .post_grid--pagination a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'pagi_padding',
                [
                    'label'     => esc_html__( 'Padding', 'hello-elementor-child' ),
                    'type'      => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .post_grid--pagination' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();

        $query = new \WP_Query([
            'posts_per_page' => 1,
        ]);
        ?>

        <div class="post_grid">
            <?php
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    ?>
                    <div class="post_grid--item">
                        <?php if ( has_post_thumbnail() ): ?>
                        <div class="post_grid--img">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                        <?php endif; ?>

                        <h3 class="post_grid--heading"><?php the_title(); ?></h3>

                        <ul class="post_grid--meta">
                            <li><?php the_date('M j, Y'); ?></li>
                        </ul>

                        <a href="<?php the_permalink(); ?>" class="post_grid--link"></a>
                    </div>
                    <?php
                }

                // Pagination
                the_posts_pagination();
            } else {
                echo __('No posts found', 'hello-elementor-child');
            }
            ?>
        </div>

        <div class="post_grid--pagination">
            <?php
            $total_pages = $query->max_num_pages;
            if ($total_pages > 1){
                $current_page = max(1, get_query_var('paged'));

                echo paginate_links(array(
                    'base' => get_pagenum_link(1) . '%_%',
                    'format' => '/page/%#%',
                    'current' => $current_page,
                    'total' => $total_pages,
                ));
            }
            ?>
        </div>

        <?php
        // Reset post data
        wp_reset_postdata();
    }
}
