
<?php

require_once '../vendor/autoload.php';
use App\classes\Login;

$getResult = Login::getCategoryInfo();

if (isset($_GET['delete'])){
    $id = $_GET['id'];
    Login::deleteCategoryInfo($id);
}


?>



<?php include 'includes/header.php'; ?>


<div class="container">
    <div class="row">
        <div class="col-sm-10 mx-auto">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">SL NO</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Category Description</th>
                                <th scope="col">Publication Status</th>
                                <th scope="col"  width="102">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php while ($getCategory = mysqli_fetch_assoc($getResult)) { ?>

                        <tr>
                            <th scope="row"><?php echo $getCategory['id'] ?></th>
                            <td><?php echo $getCategory['category_name'] ?></td>
                            <td><?php echo $getCategory['category_description'] ?></td>
                            <td><?php echo $getCategory['publication_status'] ?></td>
                            <td>
                                <a href="edit-category.php?id=<?php echo $getCategory['id'] ?>">Edit</a>
                                <a href="?delete=true&&id=<?php echo $getCategory['id'] ?>" onclick="confirm('Are you sure delete this!!')">Delete</a>
                            </td>
                        </tr>

                        <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'includes/footer.php'; ?>