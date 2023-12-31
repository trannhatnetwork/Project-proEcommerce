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

<div class="py-5 bg-f2f2f2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>About Us</h4>
                <div class="underline"></div>
                <p>Welcome to PHP Ecom - Where comfort and coziness come home! We take pride in being your reliable partner in providing efficient and quality cooling solutions.</p>
                <p>At PHP Ecom, we understand the value of comfortable living, which is why we specialize in offering top-notch cooling appliances. From air conditioners, cooling fans to heating devices, we are committed to delivering an optimal experience for you.</p>
                <hr>
                <p>At PHP Ecom, we don't just provide products; we are also your trustworthy companion in maintaining a comfortable and warm living space. With a dedicated customer support team, we are always ready to listen and address all your needs.</p>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="text-white">E-shop</h4>
                <div class="underline mb-2"></div>
                <a href="index.php" class="text-white"><i class="fa fa-angle-right"></i> Home</a><br>
                <a href="#" class="text-white"><i class="fa fa-angle-right"></i> About Us</a><br>
                <a href="cart.php" class="text-white"><i class="fa fa-angle-right"></i> My Cart</a><br>
                <a href="categories.php" class="text-white"><i class="fa fa-angle-right"></i> Our Collections</a><br>
            
            </div>
            <div class="col-md-3">
                <h4 class="text-white">Address</h4>
                <p class="text-white">
                    450, Ngu Hanh Son, TP. Da Nang
                </p>
                <a href="tel:+8424982340234" class="text-white"><i class="fa fa-phone"> +84 0992438234</i></a>
                <a href="Mailto:phpecom@gmail.com" class="text-white"><i class="fa fa-envelope"> phpecom@gmail.com</i></a>
            </div>
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61366.490695590415!2d108.20761954882775!3d15.992384275202046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31420dd4e14b2edb%3A0xbc6e1faf738be4c5!2sThe%20Marble%20Mountains!5e0!3m2!1sen!2s!4v1704010358386!5m2!1sen!2s" class="w-100" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
<div class="py-2 bg-danger">
    <div class="text-center">
        <p class="mb-0 text-white">All rights reserved. Copyright @ <a href="https://github.com/trannhatcoder/" class="text-white">TrannhatProgrammer </a> - <?=date('Y') ?></p>
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
                    items:4
                }
            }
        })
    });
</script>
    