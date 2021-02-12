<?php
/**
 * Template Name: Template Home
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

<div class="home-page">
  <div class="home-slider">
    <?php
    echo do_shortcode('[smartslider3 slider="3"]');
    ?> 
  </div>
  <div class="home-main-info">
    <div class="container">
      <div class="felxbox full blocks-wrapper">
        <div class="back-box-left">
          <div class="back-box-left-title">
            <h3>
              <span>Musu</span> KONTAKTI
            </h3>
          </div>
          <div class="back-box-left-info">
            <p class="col col-5 s-full first">Piezvani mums</p>
            <p class="col col-7 s-full second">+371 67562222<br></p>
            <p class="col col-5 s-full first">Atrodi mūs</p>
            <p class="col col-7 s-full second">Centrs: Rīga, Šmerļa iela 3, LV-1006<br>
            <br>Filiāle "Pārdaugava": Rīga, Lazdu iela 16d, LV-1029</p>
          </div>
          <div class="back-box-left-icon">
            <i class="fa fa-phone fa-5x"></i>
          </div>
        </div>
        <div class="front-box-cenetr">
          <div class="front-box-cenetr-title">
            <h3>
              <span>Par</span> UZNEMUMU
            </h3>
            <p>Vējstiklu auto stiklu servisa centrs ir dinamiski augošs uzņēmums, ko dibinājuši profesionāļi ar vairāk kā 15 gadu pieredzi auto stiklu biznesā, kas nodrošina stabilu darbību, augstu kvalitāti un garantijas.</p>
          </div>
          <div class="front-box-cenetr-icon">
            <i class="fa fa-car fa-5x"></i>
          </div>
        </div>
        <div class="back-box-right">
          <div class="back-box-right-title">
            <h3>
              <span>Musu</span> PARTNERI
            </h3>
            <p>Uzņēmums nodarbojas ar tādu pasaulē pazīstamu un atzītu orģināldaļu ražotāju kā Saint-Gobain Sekurit, Pilkington, AGC Automotive, Guardian, PGW u.c. auto stiklu mazumtirdzniecību un vairumtirdzniecību.</p>
          </div>
          <div class="back-box-right-icon">
            <i class="fa fa-cog fa-5x"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
