<?php 
    session_start();
    include 'inc/header.php'; 
    include 'function/userfunction.php';

?>
<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a href="index.php" class="text-white">Home / </a>  
            <a href="cart.php" class="text-white">Cart</a>  
        </h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="card card-body shadow">
            <div class="row">
                <div class="col-md-12">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <h4>Product</h4>
                        </div>
                        <div class="col-md-3">
                            <h4>Price</h4>
                        </div>
                        <div class="col-md-2">
                            <h4>Quantity</h4>
                        </div>
                        <div class="col-md-2">
                            <h4>Action</h4>
                        </div>
                    </div>
                    <?php 
                        $items = getCartItems();
                        foreach ($items as $citem){
                            ?>
                                <div class="card product_data shadow-sm mb-3">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <img src="uploads/<?= $citem['image']?>" alt="Image" width="80px">
                                        </div>
                                        <div class="col-md-3">
                                            <h5><?= $citem['name']?></h5>
                                        </div>
                                        <div class="col-md-3">
                                            <h5><?= $citem['selling_price']?> VND</h5>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="input-group mb-3" style="width:130px">
                                                <button class="input-group-text decrement-btn">-</button>
                                                <input type="text" class="form-control text-center input-qty bg-white" value="<?=$citem['prod_qty']?>" disabled>
                                                <button class="input-group-text increment-btn">+</button>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Remove</button>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                        
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
    

<?php include 'inc/footer.php';?>
    