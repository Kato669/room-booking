<?php 
    include_once('partials/constant.php');
    if(isset($_GET['id']) && isset($_GET['image'])){
        $id = $_GET['id'];
        $image = $_GET['image'];


        if($image != ''){
            $path = 'img/'.$image;
            $remove = unlink($path);

            if($remove == false){
                echo "failed to remove image";
                header('Location: manage_room.php');
                die();
            }
        }

        $sql = "delete from room where id = $id";
        $res = mysqli_query($conn, $sql);
        if($res){
            $_SESSION['deleted'] = 'Room deleted successfully';
            header('Location: manage_room.php');
        }
    }else{
        header('Location: manage_room.php');
    }

?>