<?php include('user-display/header.php'); ?>

<section class="item-menu bg-secondary">
    <div class="container">
        <center>
            <br>
            <h1 style="color:lemonchiffon;">Artwork Categories</h1>
            <br>
        </center>

        <?php
        include('../config/config.php');

        $sql2 = "SELECT * FROM dbo_items WHERE categories_id=8";

        $res2 = mysqli_query($conn, $sql2);
        $count2 = mysqli_num_rows($res2);

        if ($count2 > 0) {
            //Item is Available
            while ($row2 = mysqli_fetch_assoc($res2)) {
                $id = $row2['id'];
                $title = $row2['title'];
                $price = $row2['price'];
                $image_name = $row2['image_name'];
                $description = $row2['description'];
                $closedate = date_format(date_create($row2['closing_date']), 'm/d/Y H:i:s');
        ?>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <?php
                        if ($image_name == "") {
                            //Image not Available
                            echo "<div class='error'>Image not Available.</div>";
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
                        <p>Description: <?php echo $description; ?> </p>
                        <?php echo "Closing Date: " . $closedate; ?>
                        <p>Time Left:
                            <script language="JavaScript">
                                TargetDate = "<?php echo $closedate ?>";
                                BackColor = "palegreen";
                                ForeColor = "navy";
                                CountActive = true;
                                CountStepper = -1;
                                LeadingZero = true;
                                DisplayFormat = "%%D%% Days, %%H%% Hours, %%M%% Minutes, %%S%% Seconds.";
                                FinishMessage = "Bidding closed!";
                            </script>
                            <script language="JavaScript" src="../js/countdown.js"></script>
                        </p>
                        
                        <a href="../order.php?item_id=<?php echo $id; ?>" class="btn btn-warning">Bidding Now</a>
                    </div>
                </div>

        <?php
            }
        } else {
            // Item not available
            echo "<div class='error'>Watches not Available.</div>";
        }

        ?>

    </div>

</section>
        <br>

<?php include('user-display/footer.php'); ?>