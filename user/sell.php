<?php
session_start();
if (!isset($_SESSION['loginOK'])) {
    header("Location:../index.php");
}
?>
<?php include('../config/config.php'); ?>
<?php 
            if(isset($_POST['submit']))
            {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];

                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else
                {
                    $featured = "No";
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No";
                }
                // add the image to folder images
                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];

                    if($image_name!="")
                    {
                        $ext = end(explode('.', $image_name));

                        // Rename image
                        $image_name = "Item-Name-".rand(0000,9999).".".$ext;
                        $src = $_FILES['image']['tmp_name'];
                        $dst = "../images/items/".$image_name;

                        $upload = move_uploaded_file($src, $dst);

                        if($upload==false)
                        {
                            header('location: sell.php');
                            die();
                        }

                    }

                }
                else
                {
                    $image_name = "";
                }

                // Insert Into Database
                $sql2 = "INSERT INTO dbo_items SET 
                    title = '$title',
                    description = '$description',
                    price = '$price',
                    image_name = '$image_name',
                    categories_id = $category,
                    featured = '$featured',
                    active = '$active'
                ";

                $res2 = mysqli_query($conn, $sql2);
                if($res2 == true)
                {
                    //Data inserted Successfullly
                    header('location: index.php');
                }
                else
                {
                    echo '<div>failed</div>';
                }

                
            }

        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Auction</title>
</head>
    
<body>
    <?php include('user-display/header.php'); ?>
    <div class="container bg-secondary form-bidding">
        <br>
        <h1>Add Your Product For Bidding</h1>
        <br>

        <section>
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" style="height: 100px" name="description"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Starting Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="price">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Select Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Select Category</label>
                        <div class="col-sm-10">
                            <select name="category">

                                <?php
                                $sql = "SELECT * FROM dbo_categories WHERE active='Yes'";
                                $res = mysqli_query($conn, $sql);
                                $count = mysqli_num_rows($res);

                                if ($count > 0) {
                                    // Have categories
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $id = $row['id'];
                                        $title = $row['title'];

                                ?>

                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                    <?php
                                    }
                                } else {
                                    // don't have category
                                    ?>
                                    <option value="0">No Category Found</option>
                                <?php
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Featured</label>
                        <div class="col">
                            <input type="radio" class="form-check-input" name="featured" value="Yes">Yes
                            <input type="radio" class="form-check-input" name="featured" value="No">No
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Active</label>
                        <div class="col">
                            <input type="radio" class="form-check-input" name="active" value="Yes">Yes
                            <input type="radio" class="form-check-input" name="active" value="No">No
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Add Item</button>
                    <br><br>
                </div>
            </form>
        </section>

    </div>
    <br>

    <?php include('user-display/footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>