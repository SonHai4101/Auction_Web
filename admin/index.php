<?php
session_start();
if (!isset($_SESSION['loginOK'])) {
    header("Location: login.php");
}
?>
<?php include('../config/config.php'); ?>
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
                            <a class="nav-link active" aria-current="page" href="index.php">
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
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>
                <div class="row" style="margin-top: 50px;">
                    <div class="col-sm-3">
                        <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
                            <div class="card-header"><i class="fas fa-tag"></i><span style="font-weight: bold;"> CATEGORY</span></div>
                            <div class="card-body">
                                <?php
                                $sql = "SELECT * FROM dbo_categories";
                                $res = mysqli_query($conn, $sql);
                                $count = mysqli_num_rows($res);
                                ?>
                                <center>
                                    <h2><?php echo $count; ?></h2>
                                    CATEGORIES
                                </center>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
                            <div class="card-header"><i class="fas fa-tag"></i><span style="font-weight: bold;"> ITEM</span></div>
                            <div class="card-body">
                                <?php
                                $sql2 = "SELECT * FROM dbo_items";
                                $res2 = mysqli_query($conn, $sql2);
                                $count2 = mysqli_num_rows($res2);
                                ?>
                                <center>
                                <h2><?php echo $count2; ?></h2>
                                ITEMS
                                </center>
                                <br />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
                            <div class="card-header"><i class="fas fa-tag"></i><span style="font-weight: bold;"> SALES</span></div>
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p class="card-text"></p>
                                <br><br><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
                            <div class="card-header"><i class="fas fa-tag"></i><span style="font-weight: bold;"> PROFIT</span></div>
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p class="card-text"></p>
                                <br><br><br>
                            </div>
                        </div>
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