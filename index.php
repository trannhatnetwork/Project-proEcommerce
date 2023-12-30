<?php 
    session_start();
    include 'inc/header.php'; 
    include 'inc/slider.php';
    include 'function/userfunction.php';

?>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Trending Products</h4>
                <hr>
                
                <div class="owl-carousel">
                    <?php
                        $trendingProducts = getAllTrending();
                        if(mysqli_num_rows($trendingProducts) > 0){
                            foreach ($trendingProducts as $item ){
                                ?>
                                    <div class="item">
                                        <a href="product-view.php?product=<?= $item['slug']?>">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <img src="uploads/<?= $item['image']; ?>" alt="products Image" class="w-100">
                                                    <h6 class="text-center"><?= $item['name']; ?></h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                            }
                        }
                    ?>
                </div>
                
            </div>
        </div>
    </div>
</div>
    

<?php include 'inc/footer.php';?>
<script>
    $(document).ready(function () {
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    });
</script>
    