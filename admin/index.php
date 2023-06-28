<?php include('partials/header.php') ?>
<!-- <script src="https://kit.fontawesome.com/78e0d6a352.js" crossorigin="anonymous"></script> -->
<div class="container">
    <div class="row">
        <div class="h4 text-center text-capitalize text-dark my-5">welcome to room order system dashboard</div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <a href="" class="text-decoration-none">
                <div class="text-decoration-none text-white text-center shadow rounded bg-secondary py-5">
                    <span class="icon"><i class="fa-solid fa-bed" style="font-size: 3rem;"></i></span>
                    <span class="my-3 icon">total rooms</span>
                    <?php
                        $sql = "select * from room";
                        $execute = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($execute);
                    ?>
                    <span class="my-3 icon"><?php echo $count ?></span>

                </div>
            </a>
        </div>

        <div class="col-lg-3">
            <a href="" class="text-decoration-none">
                <div class="text-decoration-none text-white text-center shadow rounded bg-danger py-5">
                    <span class="icon"><i class="fa-brands fa-first-order text-white" style="font-size: 3rem;"></i></span>
                    <span class="my-3 icon">total orders</span>
                    <?php
                        $sql1 = "select * from book";
                        $execute1 = mysqli_query($conn, $sql1);
                        $count1= mysqli_num_rows($execute1);
                    ?>
                    <span class="my-3 icon"><?php echo $count1 ?></span>

                </div>
            </a>
        </div>

        <?php
            $select = "SELECT sum(total) as price FROM book where status='Left'";
            $res = mysqli_query($conn, $select);
            $rows = mysqli_fetch_assoc($res);
            $price = $rows['price'];
            

        ?>

        <div class="col-lg-3">
            <a href="" class="text-decoration-none">
                <div class="text-decoration-none text-white text-center shadow rounded bg-success py-4">
                    <span class="icon"  style="font-size: 3rem;"><i class="fa-solid fa-cash-register"></i></span>
                    <span class="my-3 icon">income generated</span>
                    <span class="my-3 icon">Ugshs: <?php echo number_format($price) ?></span>

                </div>
            </a>
        </div>

        <?php
            $select1 = "SELECT sum(adult + child) as gender FROM book";
            $res1 = mysqli_query($conn, $select1);
            $rows1 = mysqli_fetch_assoc($res1);
            $price1 = $rows1['gender'];


        ?>
        

        <div class="col-lg-3">
            <a href="" class="text-decoration-none">
                <div class="text-decoration-none text-white text-center shadow rounded bg-dark py-4">
                    <span class="icon"  style="font-size: 3rem;"><i class="fa-solid fa-person"></i></span>
                    <span class="my-3 icon">number of visitors</span></span>
                    <span class="my-3 icon"><?php echo $price1 ?></span>

                </div>
            </a>
        </div>
        
    </div>
</div>