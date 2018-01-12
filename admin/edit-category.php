<?php

require_once '../vendor/autoload.php';
use App\classes\Login;


$id = $_GET['id'];

$getResult = Login::getEditCategoryData($id);

$getEditCategory = mysqli_fetch_assoc($getResult);

$succesData='';
if (isset($_POST['btn'])){
    $succesData = Login::updateCategoryInfo($_POST, $id);
}
?>



<?php include 'includes/header.php'; ?>

    <div class="container" style="margin-top: 10px;">
        <div class="row">
            <div class="col-sm-10 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <p class="text-success text-center"><?php echo $succesData; ?></p>
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="category_name" value="<?php echo $getEditCategory['category_name'];?>" class="form-control" placeholder="Category Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Category Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="category_description"><?php echo $getEditCategory['category_description'];?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Publication Status</label>
                                <div class="col-sm-9">
                                    <input type="radio" name="publication_status" value="1" checked="checked" /> Published
                                    <input type="radio" name="publication_status" value="0" /> Unpublished
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" name="btn" class="btn btn-primary btn-block">Save Category Info</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php include 'includes/footer.php'; ?>