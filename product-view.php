<?php 
    session_start();
    include 'inc/header.php'; 
    include 'function/userfunction.php';

    if(isset($_GET['product'])){

        $product_slug = $_GET['product'];
        $product_data = getSlugActive("tbl_product", $product_slug);
        $product = mysqli_fetch_array($product_data);

        if($product){
            ?>
                <div class="py-3 bg-primary">
                    <div class="container">
                        <h6 class="text-white">
                            <a class="text-white" href="index.php">Home /</a>
                            <a class="text-white" href="categories.php">Collections / </a>
                            <?= $product['name'];?> 
                        </h6>
                    </div>
                </div>
                <div class="bg-light py-4">
                    <div class="container product_data mt-3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="shadow">
                                    <img src="uploads/<?= $product['image']?>" height="300px" width="260px" alt="Product Image" class="w-100">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h4 class="fw-bold"><?=$product['name']?>
                                    <span class="float-end text-danger"><?php if($product['trending']){echo "Trending";}?></span>
                                </h4>
                                <hr>
                                <p><?= $product['small_description']?></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Giá Gốc: <s class="text-danger"><?=$product['original_price'];?> VND</s></h5>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Giá Bán: <span class="text-success fw-bold"><?=$product['selling_price'];?> VND</span></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group mb-3" style="width:130px">
                                            <button class="input-group-text decrement-btn">-</button>
                                            <input type="text" class="form-control text-center input-qty bg-white" value="1" disabled>
                                            <button class="input-group-text increment-btn">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <button class="btn btn-primary px-4 addToCartBtn" value="<?= $product['id'];?>"><i class="fa fa-shopping-cart me-2"></i>Thêm vào Giỏ hàng</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-danger px-4"><i class="fa fa-heart me-2"></i>Thêm vào Wishlist</button>
                                    </div>
                                </div>
                                <hr>
                                <h5>Mô tả sản phẩm: </h5>
                                <p><?= $product['description']?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }else{
            echo "Product Not Found";
        }

    }else{
        echo "Something Went Wrong";
    }
include 'inc/footer.php';
?>