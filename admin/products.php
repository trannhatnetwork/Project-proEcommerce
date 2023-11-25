<?php 
    include('includes/header.php'); 
    include('../middleware/adminMiddleware.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Products</h3>
                </div>
                <div class="card-body" id="products_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>IMAGE</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $products = getAll("tbl_product");
                                $id = 0;
                                if(mysqli_num_rows($products) > 0){
                                    foreach($products as $item){
                                        $id++;
                                        ?>
                                            <tr>
                                                <td><?= $id;?></td>
                                                <td><?= $item['name'];?></td>
                                                <td>
                                                    <img src="../uploads/<?=$item['image'];?>" width="50px" height="50px" alt="<?=$item['name'];?>">
                                                </td>
                                                <td>
                                                    <?=$item['status'] == '0'? "Visible":"Hidden" ?>
                                                </td>
                                                <td>
                                                    <a href="edit_product.php?id=<?= $item['id'];?>" class="btn btn-sm btn-primary">Edit</a>
                                                
                                                    <button type="button" class="btn btn-sm btn-danger delete_product_btn" value=<?= $item['id'];?>>Delete</button>
                                                   
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }else{
                                    echo "No Records Found";
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
