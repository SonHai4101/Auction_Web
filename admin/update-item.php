<?php
session_start();
if (!isset($_SESSION['loginOK'])) {
    header("Location: login.php");
}
?>
<?php include('../config/config.php'); ?>
<?php 
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql2 = "SELECT * FROM dbo_items WHERE id=$id";
        $res2 = mysqli_query($conn, $sql2);

        $row2 = mysqli_fetch_assoc($res2);

        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_image = $row2['image_name'];
        $current_category = $row2['categories_id'];
        $featured = $row2['featured'];
        $active = $row2['active'];

    }
    else
    {
        header('location: manage-items.php');
    }
?>
<?php 
        
            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];

                $featured = $_POST['featured'];
                $active = $_POST['active'];

                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];

                    if($image_name!="")
                    {
                        // REname Image
                        $ext = end(explode('.', $image_name));

                        $image_name = "Item-Name-".rand(0000, 9999).'.'.$ext;

                        $src_path = $_FILES['image']['tmp_name'];
                        $dest_path = "../images/items/".$image_name;

                        $upload = move_uploaded_file($src_path, $dest_path);

                        if($upload==false)
                        {
                            header('location: manage-items.php');
                            die();
                        }
                        if($current_image!="")
                        {
                            $remove_path = "../images/items/".$current_image;

                            $remove = unlink($remove_path);

                            if($remove==false)
                            {
                                header('location: manage-items.php');
                                die();
                            }
                        }
                    }
                    else
                    {
                        $image_name = $current_image;
                    }
                }
                else
                {
                    $image_name = $current_image;
                }

                

                // Update in Database
                $sql3 = "UPDATE dbo_items SET 
                    title = '$title',
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    categories_id = '$category',
                    featured = '$featured',
                    active = '$active'
                    WHERE id=$id
                ";

                $res3 = mysqli_query($conn, $sql3);

                if($res3==true)
                {
                    header('location: manage-items.php');
                }
                else
                {
                    header('location: update-item.php');
                }    
            }
        ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/BTL_CNW/css/style.css">
    <title>Hello, world!</title>
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Management</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="logout.php">Logout</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">
                                <i class="fas fa-home"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manage-categories.php">
                                <i class="far fa-folder"></i>
                                Categories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="manage-items.php">
                                <i class="far fa-file"></i>
                                Items
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manage-orders.php">
                                <i class="fas fa-shopping-cart"></i>
                                Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manage-admin.php">
                                <i class="fas fa-user-tie"></i>
                                Admin
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Items</h1>
                </div>
                <div>
                    <br>

                    <br /><br />

                    <form action="" method="post" enctype="multipart/form-data">
                        <div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title" value="<?php echo $title; ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" style="height: 100px" name="description"><?php echo $description; ?></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Starting Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="price" value="<?php echo $price; ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Current Image</label>
                                <div class="col-sm-10">
                                    <?php
                                    if ($current_image == "") {
                                        echo "<div class='error'>Image not Available</div>";
                                    } else {
                                    ?>
                                        <img src="../images/items/<?php echo $current_image; ?>" width="150px">
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Select New Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select name="category">

                                        <?php
                                        $sql = "SELECT * FROM dbo_categories WHERE active='Yes'";
                                        $res = mysqli_query($conn, $sql);
                                        $count = mysqli_num_rows($res);

                                        if ($count > 0) {
                                            // Have category
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                $category_title = $row['title'];
                                                $category_id = $row['id'];

                                        ?>
                                                <option <?php if ($current_category == $category_id) {
                                                            echo "selected";
                                                        } ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                        <?php
                                            }
                                        } else {
                                            // Dont have category
                                            echo "<option value='0'>Category Not Available</option>";
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Featured</label>
                                <div class="col">
                                    <input <?php if ($featured == "Yes") {echo "checked";} ?> type="radio" class="form-check-input" name="featured" value="Yes">Yes
                                    <input <?php if ($featured == "No") {echo "checked";} ?> type="radio" class="form-check-input" name="featured" value="No">No
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Active</label>
                                <div class="col">
                                    <input <?php if ($active == "Yes") {echo "checked";} ?> type="radio" class="form-check-input" name="active" value="Yes">Yes
                                    <input <?php if ($active == "No") {echo "checked";} ?> type="radio" class="form-check-input" name="active" value="No">No
                                </div>
                            </div>
                            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <button type="submit" name="submit" class="btn btn-secondary">Update Item</button>
                        </div>
                    </form>
                </div>


            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>