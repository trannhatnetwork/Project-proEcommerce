<?php 
    include('includes/header.php'); 
    include('../middleware/adminMiddleware.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Categories</h3>
                </div>
                <div class="card-body">
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
                                $category = getAll("tbl_category");
                                $id = 0;
                                if(mysqli_num_rows($category) > 0){
                                    foreach($category as $item){
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
                                                    <div class="btn-group" role="group">
                                                        <a href="edit_category.php?id=<?= $item['id'];?>" class="btn btn-sm btn-primary">Edit</a>
                                                        <form action="code.php" method="POST">
                                                            <input type="hidden" name="category_id" value="<?= $item['id'];?>">
                                                            <button type="submit" class="btn btn-sm btn-danger" name="delete_category_btn">Delete</button>
                                                        </form>
                                                    </div>
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
