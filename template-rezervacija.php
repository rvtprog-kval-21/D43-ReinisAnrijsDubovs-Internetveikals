<?php
/**
 * Template Name: Rezervacijas page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

global $wpdb;
	$table_name = $wpdb->prefix.'darbnicas';
	
	$Get_Adres = $wpdb->get_results("SELECT * FROM $table_name"); 
?>

<?php if ( is_front_page() ) : ?>
  <?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="page-header-hholder">
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
</div>

<div class="wrapper template-reservation" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">
			<div id="id03" class="reservation">
				<form class="reservation-content animate" method="post">
					<div class="res-container">
						<div class="res-map">
							<div class="iframe-holder">
								<iframe src="https://www.google.com/maps/d/embed?mid=1TkyFn51xtb_EAKe8vEkTsM3JmfhAXc9w&hl=en" width="350" height="500"></iframe>
							</div>
						</div>
						<div class="users-data">
							<input type="text" placeholder="Ievadiet Vardu" name="name" required>
							<span class="validity"></span>
							<input type="text" placeholder="Ievadiet Uzvardu" name="sirName" required>
							<span class="validity"></span>
							<input type="text" placeholder="Ievadiet Epastu" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
							<span class="validity"></span>
							<input type="tel" placeholder="Ievadiet Telefona Nr" name="Phone" pattern="([0-9]{8})|([0-9]{2}-[0-9]{3}-[0-9]{3})" required>
							<span class="validity"></span>
							<select name="location" id="loc" required>
								<?php foreach ($Get_Adres as $Get_Adres_name): ?>
									<option value="loc0"><?php echo $Get_Adres_name->Darbnica ;?></option>	
								<?php endforeach;?>
							</select>
							<label for="Time" name="Work-hours-text">Darba laiks: 09:00 - 18:00 </label>
						</div>
						<div class="Date-time">
							<input type="date"  name="Date" required>
							<span class="validity"></span>
							<input type="time"  name="Time" min="09:00" max="17:00" required>
							<span class="validity"></span>
						</div>
						<div class="res-button">
							<button type="submit" name="submit_Reservation">Rezervet</button>
						</div>
					</div>
				</form>
			</div>

			<div class="col-md-12 content-area" id="primary">

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

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
