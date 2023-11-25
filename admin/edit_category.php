<?php
    
    include('includes/header.php');
    include('../middleware/adminMiddleware.php');
    
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php 
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                    $category = getByID("tbl_category", $id);
                    if(mysqli_num_rows($category) > 0){
                        $data = mysqli_fetch_array($category);
                        ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Category
                                    <a href="category.php" class="btn btn-primary float-end">Back</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form action="code.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="hidden" name="category_id" value="<?= $data['id']?>">
                                                <label for="">Name</label>
                                                <input type="text" name="name" value=<?= $data['name'] ?> class="form-control" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Slug</label>
                                                <input type="text" name="slug" value=<?= $data['slug'] ?> class="form-control" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Description</label>
                                                <textarea name="description" rows="3"  class="form-control" required><?= $data['description'] ?></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Upload Image</label>
                                                <input type="file" name="image" class="form-control">
                                                <label for=""><h6>Current Image</h6></label>
                                                <input type="hidden" name="old_image" value="<?= $data['image']?>">
                                                <img src="../uploads/<?= $data['image'] ?>" width="60px" height="60px" alt="">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Meta Title</label>
                                                <input type="text" name="meta_title" value=<?= $data['meta_title'] ?>  class="form-control" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Meta Description</label>
                                                <textarea name="meta_description"  rows="3" class="form-control" required><?= $data['meta_description'] ?></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Meta Keywords</label>
                                                <textarea name="meta_keywords"  rows="3" class="form-control" required><?= $data['meta_keywords'] ?></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Status</label>
                                                <input type="checkbox" <?= $data['status'] ? "checked":"" ?> name="status">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Popular</label>
                                                <input type="checkbox" <?= $data['popular'] ? "checked":"" ?> name="popular">
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary" name="update_category_btn">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                
                                </div>
                            </div>
                        <?php
                    }else{
                        echo "Category not found";
                    }
                    
                }else{
                    echo "ID missing from url";
                }
            ?>
        </div>
    </div>
</div>