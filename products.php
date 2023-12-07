<?php 
    session_start();
    include 'inc/header.php'; 
    include 'function/userfunction.php';

    if(isset($_GET['category'])){

        $category_slug = $_GET['category'];
        $category_data = getSlugActive("tbl_category", $category_slug);
        $category = mysqli_fetch_array($category_data);
        
        if($category){
        
            $cid = $category['id'];
            ?>
            <div class="py-3 bg-primary">
                <div class="container">
                    <h6 class="text-white">
                        <a class="text-white" href="index.php">Home /</a>
                        <a class="text-white" href="categories.php">Collections / </a>
                        <?= $category['name'];?> 
                    </h6>
                </div>
            </div>
            <div class="py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1><?= $category['name'];?></h1>
                            <br>
                            <div class="row">
                                <?php
                                    $products = getProdByCategory($cid);
                                    if(mysqli_num_rows($products) > 0){
                                        foreach($products as $item){
                                            ?>
                                                <div class="col-md-3 mb-2">
                                                    <a href="product-view.php?product=<?= $item['slug']?>">
                                                        <div class="card shadow">
                                                            <div class="card-body">
                                                                <img src="uploads/<?= $item['image']?>" height="260px" alt="Product Image" class="w-100">
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
        

            <?php 
        }else{
            echo "Something Went Wrong";
        }
    }else{
        echo "Something Went Wrong";
    }
include 'inc/footer.php';
?>
    