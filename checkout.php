<?php 
    session_start();
    include 'inc/header.php'; 
    include 'function/userfunction.php';
    include 'authenticate.php'

?>
<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a href="index.php" class="text-white">Home / </a>  
            <a href="checkout.php" class="text-white">Checkout</a>  
        </h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body shadow">
                <div class="row">
                    <div class="col-md-7">
                        <h5>Basic Details</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Name</label>
                                <input type="text" name="name" placeholder="Enter your full name" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Email</label>
                                <input type="text" name="email" placeholder="Enter your email address" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Phone</label>
                                <input type="text" name="phone" placeholder="Enter your phone number" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Pin Code</label>
                                <input type="text" name="pincode" placeholder="Enter your pin code" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Address</label>
                                <textarea name="address" class="form-control " rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <h5>Order Details</h5>
                        <hr>
                            <?php 
                                $items = getCartItems();
                                $totalPrice = 0;
                                foreach ($items as $citem){
                                    ?>
                                        <div class="card product_data shadow-sm mb-3">
                                            <div class="row align-items-center">
                                                <div class="col-md-2">
                                                    <img src="uploads/<?= $citem['image']?>" alt="Image" width="50px">
                                                </div>
                                                <div class="col-md-5">
                                                    <h5><?= $citem['name']?></h5>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5><?= $citem['selling_price']?></h5>
                                                </div>
                                                <div class="col-md-2">
                                                    <h5>x<?= $citem['prod_qty']?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
                                }
                            ?>
                            <hr>
                        <h5>Total Price: <span class="float-end fw-bold"><?=$totalPrice?></span></h5>
                        <div class="">
                            <button class="btn btn-primary w-100">Confirm and place order | COD</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    

<?php include 'inc/footer.php';?>
    