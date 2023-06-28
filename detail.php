<?php ob_start(); ?>
<?php
    include('partials/header.php');
if (isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    header("Location: index.php");
}
?>
<?php
$sql = "select * from room where id =$id";
$res = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($res);
$select_id = $rows['id'];
$image = $rows['image'];
$error = 0;
if (isset($_POST['submit'])) {
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $title = $_POST['title'];
        $arrive = $_POST['arrive'];
        $price = $_POST['price'];
        $departure = $_POST['departure'];
        $adult = $_POST['adult'];
        $young = $_POST['young'];
        // if (isset($_POST['adult'])) {
        //     $adult = $_POST['adult'];
        // } else {
        //     $adult = 1;
        // }

        // if (isset($_POST['young'])) {
        //     $young = $_POST['young'];
        // } else {
        //     $young = 0;
        // }
        $room_id = $_POST['room_id'];
        $select = "select * from details where room_id = '$room_id'";
        $exec = mysqli_query($conn, $select);
        $count = mysqli_num_rows($exec);
        if ($count > 0) {
            $error = 1;
        } else {
            $insert = "insert into details SET
                    title = '$title',
                    arrive = '$arrive',
                    departure = '$departure',
                    adult = '$adult',
                    young = '$young',
                    total_price = '$price',
                    room_id = '$room_id'
                ";
            $execute = mysqli_query($conn, $insert);
            if ($execute) {
                header("Location:book.php?id=$id");
            }
        }
    }
}
?>

<style>
    body {
        overflow-x: hidden;
    }

    .top-bar {
        background-image: linear-gradient(rgba(0, 0, 0, .2), rgba(0, 0, 0, .7)), url(img/rooms/room.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        padding: 100px 0;
    }

    img {
        width: 100%;
        transition: all 1s;
    }

    img:hover {
        filter: brightness(.4);
    }
</style>

<?php

if ($error) {
    echo '<div class="alert alert-danger alert-dismissible fade show text-capitalize" role="alert">
  <strong>Ohhh sorry!!</strong> room already booked, kindly try checking on others. Thanks.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>


<div class="container-fluid top-bar text-center">
    <div class="row">
        <div class="col-12">
            <span class="text-center text-uppercase text-white" style="font-size: ">
                <?php echo $rows['title'] ?>
            </span>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <?php
            if ($image != "") {
                ?>
                <img src="<?php echo SITEURL; ?>img/<?php echo $image ?>" class="img-fluid w-100" alt="...">
                <?php
            } else {
                ?>
                <img
                    src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8aG90ZWwlMjBvb218ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=600&q=60">
                <?php
            }
            ?>

            <p class="bg-dark text-left text-capitalize text-white px-3 py-3">
                <?php echo $rows['title'] ?>
            </p>
        </div>

        <div class="col-lg-4 shadow rounded py-5" style="background-color: #d1ccc0; text-align: center">
            <span class="text-dark text-center text-uppercase">starting room from</span>
            <br><br>
            <span style="font-size: 2rem" class="py-4"><b>
                    <?php echo $rows['price'] ?>
                </b><span style="font-size: 1rem;" class="text-secondary"> /night</span></span>
            <br><br>
            <hr class="w-100">
            <div class="mt-4" style="text-align: left">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="arrive" class="form-label text-dark text-uppercase">arrive</label>
                        <input type="date" class="form-control" id="arrive" name="arrive" required>
                    </div>
                    <div class="mb-3">
                        <label for="arrive" class="form-label text-dark text-uppercase">depature</label>
                        <input type="date" class="form-control" id="arrive" name="departure" required>
                    </div>
                    <div class="mb-3">
                        <label for="arrive" class="form-label text-dark text-uppercase">adult</label>
                        <select class="form-select" name="adult">
                            <option selected value="1">select</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="arrive" class="form-label text-dark text-uppercase">young</label>
                        <select class="form-select" name="young">
                            <option selected value="0">select</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="m-3">
                        <!-- title -->
                        <input type="hidden" name="title" value="<?php echo $rows['title'] ?>">
                        <input type="hidden" name="price" value="<?php echo $rows['price'] ?>">
                        <input type="hidden" name="room_id" value="<?php echo $rows['id'] ?>">
                        <input name="submit" type="submit"
                            class="btn btn-dark btn-outline-success btn-block w-100 rounded text-uppercase text-white"
                            value="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('partials/footer.php') ?>

<?php ob_flush(); ?>
