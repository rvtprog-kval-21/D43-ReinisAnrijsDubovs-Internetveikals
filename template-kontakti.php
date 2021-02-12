<?php
/**
 * Template Name: Kontakti page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() ) : ?>
  <?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="page-header-hholder">
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
</div>

<div class="wrapper template-kontakti" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">			
			<div class="iframe-holder">
				<iframe src="https://www.google.com/maps/d/embed?mid=1TkyFn51xtb_EAKe8vEkTsM3JmfhAXc9w&hl=en" width="640" height="480"></iframe>
			</div>
			
			<main class="site-main" id="main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'page' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

					<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- .row end -->

		<div class="work-time-info-box">
			<h3 class="title"> 
			<span>Darba</span>
			Laiki</h3>
			<div class="list-wrapper">
				<span class="heading">Šmerļa iela 3:</span><ul class="list"><li class="day flexbox full col sb">
				<span>P. - Pk.</span>
				<span>09:00 - 18:00</span></li><li class="day flexbox full col sb">
				<span>Se., Sv.</span>
				<span>Brīvdiena</span></li></ul></div><div class="list-wrapper">
				<span class="heading">Lazdu iela 16d:</span><ul class="list"><li class="day flexbox full col sb">
				<span>P. - Pk.</span>
				<span>09:00 - 18:00</span></li><li class="day flexbox full col sb">
				<span>Se., Sv.</span>
				<span>Brīvdiena</span></li></ul>
			</div>
		</div>

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
