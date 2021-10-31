<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Trang chủ</title>
</head>

<body>
    <?php include('display-front/header.php'); ?>

    <div class="container">
        <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/slider/slide-1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/slider/slide-2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/slider/slide-3.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <div class="container main-content">
        <div class="row">
            <div class="col-lg-4">
                <img src="images/categories/Category_114.jpg" class="img-fluid rounded-circle" alt="" style="height: 140px; width: 140px">

                <h2>Jewelry</h2>
                <p>Some description some description some description some description some description.</p>
                <p><a class="btn btn-secondary" href="categories-jewelry.php">View details &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <img src="images/categories/Category_579.jpg" class="img-fluid rounded-circle" alt="" style="height: 140px; width: 140px">

                <h2>Watches</h2>
                <p>Some description some description some description some description some description.</p>
                <p><a class="btn btn-secondary" href="categories-watches.php">View details &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <img src="images/categories/Category_996.jpg" class="img-fluid rounded-circle" alt="" style="height: 140px; width: 140px">

                <h2>Artwork</h2>
                <p>Some description some description some description some description some description.</p>
                <p><a class="btn btn-secondary" href="categories-artwork.php">View details &raquo;</a></p>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
                <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
            </div>
            <div class="col-md-5">
                <img src="images/items/Item-Name-2190.jpg" alt="" class="img-fluid" alt="" style="height: 500px; width: 500px">

            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
                <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
            </div>
            <div class="col-md-5 order-md-1">
            <img src="images/items/Item-Name-7319.jpg" alt="" class="img-fluid" alt="" style="height: 500px; width: 500px">

            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
            </div>
            <div class="col-md-5">
            <img src="images/items/Item-Name-2557.jpg" alt="" class="img-fluid" alt="" style="height: 500px; width: 500px">

            </div>
        </div>

        <hr class="featurette-divider">
    </div>
    <!--
    <footer class="container">
        <p class="float-end"><a href="#">Back to top</a></p>
        <p>&copy; 2021 Designed For BTL_CNW </p>
    </footer> -->
    <?php include('display-front/footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>