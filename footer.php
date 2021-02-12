<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

<div class="footer-container">
    <div class="footer-flex-box">
        <div class="footer-icons">
            <div class="footer-logo">
                <a class="Logo" href="/">
                    <img src="<?php echo get_template_directory_uri();?>/img/Logo.jpg" alt="Logo">
                </a>
            </div>
            <div class="footer-folow-us">
                <a class="social-accounts" href="https://www.facebook.com/vejstikli/" target="_blank">
                    <img src="<?php echo get_template_directory_uri();?>/img/Facebook-Logo.png" alt="Facebook-Logo" title="facebook-logo">
                </a>
            </div>
        </div>
        <div class="footer-privacy-policy">
            <h4>Privatuma politika</h4>
            <div class="footer-info">
                <ul class="list">
                    <li class="list-item"><a href="/?page_id=187">Privātuma politika</a></li>
                    <li class="list-item"><a href="/?page_id=189">Sīkdatņu izmantošanas politika</a></li>
                    <li class="list-item"><a href="/?page_id=191">Drošība</a></li>
                    <li class="list-item"><a href="/?page_id=193">Garantijas nosacījumi</a></li>  
                </ul>
            </div>
        </div>
        <div class="footer-popular-shortcuts">
            <h4>Populārākās saīsnes</h4>
            <div class="footer-info">
                <ul class="list">
                    <li class="list-item"><a href="/?page_id=169">Pakalpojumi</a></li>
                    <li class="list-item"><a href="/?page_id=198">Rezervacija</a></li>
                    <li class="list-item"><a href="/?page_id=171">Produkti</a></li>
                    <li class="list-item"><a href="/?page_id=173">Par mums</a></li>
                    <li class="list-item"><a href="/?page_id=156">Vakances</a></li>
                    <li class="list-item"><a href="/?page_id=164">Kontakti</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-contacts">
            <h4>Kontakti</h4>
            <ul class="list">
                <li class="list-item"><a href="https://goo.gl/maps/4BG5ZaHsAEY6U27K6" target="_blank"><i class="fa fa-map"></i> Šmerļa iela 3, LV-1006</a></li>
                <li class="list-item"><a href="https://goo.gl/maps/T2Tz3fVghMNbcWua9" target="_blank"><i class="fa fa-map"></i> Lazdu iela 16d, LV-1029</a></li>
                <li class="list-item"><a href="tel:371 67562222" class="bottom-footer-contact-phone"><i class="fa fa-phone"></i> +371 67562222 (Šmerļa iela 3)</a></li>
                <li class="list-item"><a href="tel:371 20033344" class="bottom-footer-contact-phone"><i class="fa fa-phone"></i> +371 20033344 (Lazdu iela 16d)</a></li>
                <li class="list-item"><a href="mailto:info@vejstikli.lv" class="bottom-footer-contact-email"><i class="fa fa-envelope-o"></i> info@vejstikli.lv</a></li>
            </ul>
        </div>
    </div>
    
</div>

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

