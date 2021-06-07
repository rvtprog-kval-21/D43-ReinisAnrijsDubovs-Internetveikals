<?php 
session_start();

include "components/head.inc.php"; 
include "components/header.inc.php";

$services = new service();

if(isset($_GET['sortByCat'])){
    $products = $services->getAllProductsForGridByCat($_GET['sortByCat']);
}else{
    $products = $services->getAllProductsForGrid();
}
?>

<main>
  <body>
    <div class="home-main-info">
        <div class="container">
            <div class="row">
                <div class=col-12>
                    <span>Kārtot pēc: </span>
                    <button class="btn btn-primary float-left">
                        <a class="text-white text-decoration-none" href="reinis/products-grid.php?sortByCat=asc">
                            Pēc kategorijas augošā secībā
                        </a>
                    </button>
                    <button class="btn btn-primary float-left">
                        <a class="text-white text-decoration-none" href="reinis/products-grid.php?sortByCat=desc">
                            Pēc kategorijas dilstošā secībā
                        </a>
                    </button>
                </div>
            </div>
            <div class="grid-container">
            <?php 
                if($products == false){
                    echo '<h2>Nav produktu!</h2>';
                }else{
                    for ($x = 0; $x < count($products); $x++) {
                        echo '<div class="grid-item"><div class="grid-img">';
                        echo '<img class="img-fluid" src="'. strstr($products[$x][5], 'reinis/').'"></img></div>';
                        echo '<div class="grid-content"><h5>'. $products[$x][4] .'</h5>';
                        echo '<h2 style="font-weight:bold;">'. $products[$x][1] .'</h2>';
                        echo '<h6>'. $products[$x][2] .'</h6>';
                        echo '<p style="font-size:16px;">'. $products[$x][3] .'</p>';
                        echo '</div></div>';
                    }
                }
            ?>
            </div>
       </div>
    </div>
</div>
    <?php include "components/footer.inc.php" ?>
</main>
</body>
</html>
