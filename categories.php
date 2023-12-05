<?php 
    session_start();
    include 'inc/header.php'; 
    include 'function/userfunction.php';

?>
<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">Home / Collections</h6>
    </div>
</div>
<div class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Our Collections</h1>
                <br>
                <div class="row">
                    <?php
                        $categories = getAllActive("tbl_category");
                        if(mysqli_num_rows($categories) > 0){
                            foreach($categories as $item){
                                ?>
                                    <div class="col-md-3 mb-2">
                                        <a href="products.php?category=<?= $item['slug'];?>">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <img src="uploads/<?= $item['image']?>" height="260px" alt="Category Image" class="w-100">
                                                   <h4 class="text-center"><?= $item['name'];?></h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                <?php
                            }
                        }else{
                            echo "No Data Available";
                        }
                    ?>
                </div>
                
            </div>
        </div>
    </div>
</div>
    

<?php include 'inc/footer.php';?>
    