<?php 
    include('../config/config.php');

    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != "")
        {

            $path = "../images/items/".$image_name;
            $remove = unlink($path);

            if($remove==false)
            {
                header('location:manage-items.php');
                die();
            }

        }

        // Delete from Database
        $sql = "DELETE FROM dbo_items WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            header('location: manage-items.php');
        }
        else
        {
            header('location: manage-items.php');
        }

        

    }
    else
    {
        header('location: manage-items.php');
    }

?>