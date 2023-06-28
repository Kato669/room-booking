<?php 
    include_once('partials/constant.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        header("Location: book.php");
    }

    $sql = "delete from book where id = $id";
    //execute the querry
    $execute = mysqli_query($conn, $sql);
    if($execute == true){
        $_SESSION['book_deleted'] = "Booking has been deleted";
        header("Location: book.php");
    }else{
        header("Location: book.php");
    }
?>