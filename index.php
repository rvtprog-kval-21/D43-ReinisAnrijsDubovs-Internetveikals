<?php 
session_start();
include "components/head.inc.php"; 
?>
<main>
  <body>
    <?php include "components/header.inc.php" ?>

    <div  id="carouselExampleCaptions" class="carousel d-flex justify-content-center slide " data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-item active">
          <img src="reinis\img\sakuma-slider-kontakti-1024x683.jpg" class="carousel-image d-block w-100" alt="Kontakti-slider">
          <div class="carousel-caption d-none d-sm-block">
            <h5>Pirmais slids</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="reinis\img\sakuma-slider-par-mums-1024x683.jpg" class="carousel-image d-block w-100" alt="par-mums-slider">
          <div class="carousel-caption d-none d-sm-block">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="reinis\img\sakuma-slider-preces-1024x576.jpg" class="carousel-image-3 d-block w-100" alt="preces-slider">
          <div style="margin-bottom: 120px" class="carousel-caption d-none d-sm-block">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
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
 <!-- FOOTER -->
 <?php include "components/footer.inc.php" ?>
</main>
  
  </body>


</html>
