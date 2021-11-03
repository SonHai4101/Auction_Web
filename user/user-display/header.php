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
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="logo">
                    <img src="/BTL_CNW/images/logo.png" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-9">
                <div class="option">
                    <div class="option-1">
                        <ul class="nav justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="sell.php">Sell</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                    <form action="item-search.php" method="POST">
                        <div class="input-group flex-nowrap">
                            <input type="search" name="search" required class="form-control" placeholder="Search for item" aria-hidden="true" required aria-label="Search" aria-describedby="addon-wrapping">
                            <input type="submit" name="submit" class="btn btn-primary" value="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>