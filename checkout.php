<?php 
    session_start();
    include 'function/userfunction.php';
    include 'inc/header.php'; 
    
    require 'authenticate.php'

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
                <form action="function/placeorder.php" method="POST">
                    <div class="row">
                        <div class="col-md-7">
                            <h5>Basic Details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Name</label>
                                    <input type="text" name="name" placeholder="Enter your full name" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Email</label>
                                    <input type="email" name="email" placeholder="Enter your email address" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Phone</label>
                                    <input type="text" name="phone" placeholder="Enter your phone number" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Pin Code</label>
                                    <input type="text" name="pincode" placeholder="Enter your pin code" class="form-control" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Address</label>
                                    <textarea name="address" class="form-control " rows="5" required></textarea>
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
                                <input type="hidden" name="payment_mode" value="COD">
                                <button type="submit" name="placeOrderBtn" class="btn btn-primary w-100">Confirm and place order | COD</button>
                                <div id="paypal-button-container" class="mt-2"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    

<?php include 'inc/footer.php';?>
 <!-- Replace the "test" client-id value with your client-id -->
 <script src="https://www.paypal.com/sdk/js?client-id=AVXxjNYwmDscmCtlu1cYEOKoxIS_Y6JeSfnPEitF7q8EM3ZCM9E3acmFRVBvNGbNFedHXdyiV-I2aHNZ&currency=USD"></script>

<script>
    paypal.Buttons({
        createOrder: (data, actions) =>{
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?= $totalPrice?>'
                    }
                }]
            });
        },
        onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                const transaction = orderData.purchase_units[0].payments.captures[0];
                alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for All availabel detail`);
            });
        }
    }).render('#paypal-button-container');
</script>
 