<?php include('user-display/header.php'); ?>

<section>
    <div class="container bg-secondary">
        <?php
        include('../config/config.php');
        $search = mysqli_real_escape_string($conn, $_POST['search']);

        ?>
        <br>
        <h2>Your Search "<?php echo $search; ?>"</h2>
        <br>
        <?php
        $sql = "SELECT * FROM dbo_items WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
        $res = mysqli_query($conn, $sql);

        // Count Rows
        $count = mysqli_num_rows($res);

        if ($count > 0) {
            // Item Available
            while ($row = mysqli_fetch_assoc($res)) {
                //Get the details
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];
        ?>
                <div class="row">
                    <div class="col-md-4 mb-3">

                        <?php
                        if ($image_name == "") {
                            //Image not Available
                            echo "<div class='error'>Image not Available</div>";
                        } else {
                            //Image Available
                        ?>
                            <img src="../images/items/<?php echo $image_name; ?>" alt="" class="img-fluid rounded">
                        <?php

                        }
                        ?>

                    </div>

                    <div class="col-md-8 mb-3">
                        <h4><?php echo $title; ?></h4>
                        <p>$<?php echo $price; ?></p>
                        <p>
                            <?php echo $description; ?>
                        </p>
                        <br>

                        <a href="#" class="btn btn-primary">Bidding Now</a>
                    </div>


            <?php
            }
        } else {
            //Item Not Available
            echo "<div class='error'>Item not found</div>";
        }

            ?>
                </div>
    </div>
</section>
<br><br>
<?php include('user-display/footer.php'); ?>