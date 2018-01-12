<?php

require_once '../vendor/autoload.php';
use App\classes\Login;

$getResult = Login::getBlogInfo();


if (isset($_GET['delete'])){
    $id = $_GET['id'];
    Login::deleteBlogInfo($id);
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
                                    <th scope="col">Blog Title</th>
                                    <th scope="col">Publication Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php while ($getBlog = mysqli_fetch_assoc($getResult)) { ?>

                            <tr>
                                <th scope="row"><?php echo $getBlog['id'];?></th>
                                <td><?php echo $getBlog['category_name'];?></td>
                                <td><?php echo $getBlog['blog_title'];?></td>
                                <td><?php echo $getBlog['publication_status'];?></td>
                                <td>
                                    <a href="">View</a>
                                    <a href="edit-blog.php?id=<?php echo $getBlog['id'];?>">Edit</a>
                                    <a href="?delete=true&&id=<?php echo $getBlog['id'];?>" onclick="confirm('Are you sure this')">Delete</a>
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