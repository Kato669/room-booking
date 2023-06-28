<?php
    include_once('partials/constant.php');
 if(isset($_GET['id']) && isset($_GET['image'])){
    $id = $_GET['id'];
    $image = $_GET['image'];

    if($image !=''){
        $path = "img/".$image;
        $remove = unlink($path);

        if($remove == false){
            echo "image failed to delete ";
            die();
        }
    }

    $sql = "delete from facilities where id = $id";
    $res = mysqli_query($conn, $sql);

    if($res){
        $_SESSION['facility_deleted'] = "facility deleted successfully";
        header("Location: facilities.php");
    }

 }
?>