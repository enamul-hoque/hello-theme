<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

while ( have_posts() ) :
	the_post();
	?>

<main id="content" <?php post_class( 'site-main' ); ?>>
    <?php if ( has_post_thumbnail() ): ?>
    <div class="single_post--img">
        <?php the_post_thumbnail(); ?>
    </div>
    <?php endif; ?>

    <h2 class="single_post--heading"><?php the_title(); ?></h2>

    <ul class="single_post--meta">
        <li><?php the_date('M j, Y'); ?></li>
    </ul>

	<div class="single_post--content page-content">
		<?php the_content(); ?>
	</div>

    <div class="single_post-tags">
        <?php the_tags( '<span class="tag-links">' . esc_html__( 'Tagged ', 'hello-elementor' ), null, '</span>' ); ?>
    </div>
</main>

	<?php
endwhile;
