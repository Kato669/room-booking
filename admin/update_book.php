<?php 
include_once('partials/header.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        header("Location: book.php");
    }
    $sql = "select status from book where id=$id";
    $res = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($res);
    $status = $rows['status'];

    if (isset($_POST['submit'])) {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $status_u = $_POST['status'];

            $update = "update book set
                status = '$status_u'
                where
                id = '$id'
            ";
            $execute = mysqli_query($conn, $update);
            if ($update) {
                $_SESSION['book_update'] = "updated successfully";
                header("Location: book.php");
            }
        }
    }
 ?>

 <div class="container-fluid bg-light shadow py-3">
    <a href="<?php echo SITEURL; ?>" class="text-capitalize text-dark py-2 text-decoration-none"> <i
            class="fa-solid fa-house"></i> dashboard</a>
    <span> /</span>
    <span class="text-capitalize px-1 text-dark">update book</span>
</div>



<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            <form action="" method="post">
                <select class="form-select shadow-none mb-3" name="status">
                    <option selected value="<?php echo $status ?>" disabled><?php echo $status ?></option>
                    <option value="come">come</option>
                    <option value="Not come">Not Come</option>
                    <option value="reside">Reside</option>
                    <option value="left">Left</option>
                </select>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="submit" value="update status" class="btn btn-primary text-capitalize text-dark btn-outline-secondary text-center rounded shadow-none">
            </form>
        </div>
    </div>
</div>


