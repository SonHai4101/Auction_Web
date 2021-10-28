<?php 
    include('../config/config.php');

    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != "")
        {
            $path = "../images/categories/".$image_name;
            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['remove'] = "<div class='error'>Failed to Remove Category Image.</div>";

                header('location: manage-categories.php');
                die();
            }
        }

        $sql = "DELETE FROM dbo_categories WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            // Delete successful
            header('location: manage-categories.php');
        }
        else
        {
            // Delete failed
            header('location: manage-categories.php');
        }

 

    }
    else
    {
        header('location: manage-categories.php');
    }
?>