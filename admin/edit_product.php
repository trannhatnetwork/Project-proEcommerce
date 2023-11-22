<?php
    include('includes/header.php');
    include('../middleware/adminMiddleware.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $product = getByID("tbl_product", $id);

                    if(mysqli_num_rows($product) > 0){
                        $data = mysqli_fetch_array($product);
                        ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Product
                                    <a href="products.php" class="btn btn-primary float-end">Back</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form action="code.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="mb-0" >Select Category</label>
                                                <select name="category_id" class="form-select form-select-lg mb-3">
                                                    <option selected>Select Category</option>
                                                    <?php
                                                        $category = getAll("tbl_category");

                                                        if(mysqli_num_rows($category) > 0){
                                                            foreach ($category as $item){
                                                                ?>
                                                                    <option value="<?= $item['id'];?>" <?= $data['category_id'] == $item['id']?'selected':''?>><?= $item['name']?></option>
                                                                <?php
                                                            }
                                                        }else{
                                                            echo "No Category Available";
                                                        }
                                                        
                                                    ?>
                                                    
                                                </select>
                                            </div>
                                            <input type="hidden" name="product_id" value=<?= $data['id'];?>>
                                            <div class="col-md-6">
                                                <label class="mb-0">Name</label>
                                                <input type="text" name="name" value=<?= $data['name']?> class="form-control mb-2" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="mb-0">Slug</label>
                                                <input type="text" name="slug" value=<?= $data['slug']?> class="form-control mb-2" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Small Description</label>
                                                <textarea name="small_description" rows="3" class="form-control mb-2" required><?= $data['small_description']?></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Description</label>
                                                <textarea name="description" rows="3" class="form-control mb-2" required><?= $data['description']?></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="mb-0">Original Price</label>
                                                <input type="text" name="original_price" value=<?= $data['original_price']?> class="form-control mb-2" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="mb-0">Selling Price</label>
                                                <input type="text" name="selling_price" value=<?= $data['selling_price']?> class="form-control mb-2" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Upload Image</label>
                                                <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
                                                <input type="file" name="image" class="form-control" >
                                                <label class="mb-0"><h6>Current Image:</h6></label>
                                                <img src="../uploads/<?= $data['image']?>" width="70px" height="70px" alt="Product Image">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="mb-0">Quantity</label>
                                                    <input type="number" name="qty" value=<?= $data['qty']?> class="form-control" required>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="mb-0">Status</label> <br>
                                                    <input type="checkbox" name="status" <?= $data['status'] == "0"?'':'checked'?>>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="mb-0">Trending</label> <br>
                                                    <input type="checkbox" name="trending" <?= $data['trending'] == "0"?'':'checked'?>>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Meta Title</label>
                                                <input type="text" name="meta_title" value=<?= $data['meta_title']?> class="form-control mb-2" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Meta Description</label>
                                                <textarea name="meta_description" rows="3" class="form-control mb-2" required><?= $data['meta_description']?></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Meta Keywords</label>
                                                <textarea name="meta_keywords" rows="3" class="form-control mb-2" required><?= $data['meta_keywords']?></textarea>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary" name="update_product_btn">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                
                                </div>
                            </div>
                        <?php
                    }else{
                        echo "Product Not Found For Given Id";
                    }
                }else{
                    echo "Id missing from url";
                }
                
            ?>
            
        </div>
    </div>
</div>