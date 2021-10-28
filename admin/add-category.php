<?php
session_start();
if (!isset($_SESSION['loginOK'])) {
    header("Location: login.php");
}
?>
<?php
        include('../config/config.php');

        if(isset($_POST['submit']))
        {
            $title = $_POST['title'];

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

            //Check whether the image is selected or not and set the value for image name accoridingly
            //print_r($_FILES['image']);

            //die();//Break the Code Here

            if(isset($_FILES['image']['name']))
            {
                //Upload the Image
                //To upload image we need image name, source path and destination path
                $image_name = $_FILES['image']['name'];
                
                // Upload the Image only if image is selected
                if($image_name != "")
                {

                    //Auto Rename our Image
                    //Get the Extension of our image (jpg, png, gif, etc) e.g. "specialfood1.jpg"
                    $ext = end(explode('.', $image_name));

                    //Rename the Image
                    $image_name = "Category_".rand(000, 999).'.'.$ext; // e.g. Food_Category_834.jpg
                    

                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = "../images/categories/".$image_name;

                    //Finally Upload the Image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //Check whether the image is uploaded or not
                    //And if the image is not uploaded then we will stop the process and redirect with error message
                    if($upload==false)
                    {
                        //SEt message
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                        //Redirect to Add CAtegory Page
                        header('location: add-category.php');
                        //STop the Process
                        die();
                    }

                }
            }
            else
            {
                //Don't Upload Image and set the image_name value as blank
                $image_name="";
            }

            //2. Create SQL Query to Insert CAtegory into Database
            $sql = "INSERT INTO dbo_categories SET 
                title='$title',
                image_name='$image_name',
                featured='$featured',
                active='$active'
            ";

            //3. Execute the Query and Save in Database
            $res = mysqli_query($conn, $sql);

            //4. Check whether the query executed or not and data added or not
            if($res==true)
            {
                //Query Executed and Category Added
                //Redirect to Manage Category Page
                header('location: manage-categories.php');
            }
            else
            {
                //Failed to Add CAtegory
                $_SESSION['add'] = "<div class='error'>Failed to Add Category.</div>";
                //Redirect to Manage Category Page
                header('location: add-category.php');
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
                            <a class="nav-link active" href="manage-categories.php">
                                <i class="far fa-folder"></i>
                                Categories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manage-items.php">
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
                <div class="main-content">
                    <div class="wrapper">
                        <h1>Add Category</h1>

                        <br><br>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="contaier">
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Select Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="image">
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
                                <button type="submit" name="submit" class="btn btn-secondary">Add Category</button>
                            </div>
                        </form>
                    </div>
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