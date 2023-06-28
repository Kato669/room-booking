<?php include_once('partials/header.php') ?>
<!-- navbar starts here -->



<!-- carousel -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="swiper mySwiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="img/rooms/room9.jpg" class="w-100 d-block">
                    </div>
                    <div class="swiper-slide">
                        <img src="img/rooms/room1.jpg" class="w-100 d-block">
                    </div>
                    <div class="swiper-slide">
                        <img src="img/rooms/room6.jpg" class="w-100 d-block">
                    </div>
                    <div class="swiper-slide">
                        <img src="img/rooms/room7.jpg" class="w-100 d-block">
                    </div>
                </div>
                <!-- <div class="swiper-pagination"></div> -->
            </div>
        </div>
    </div>
</div>

<!-- check in form -->
<div class="container availability-form">
    <div class="row">
        <div class="col-lg-12 bg-white rounded shadow py-3">
            <h6 class="text-capitalize py-2 fw-bold text-dark ">check room availability</h6>
            <form action="">
                <div class="row align-items-end">
                    <div class="col-lg-2 mb-3">
                        <label for="check_in" class="form-label">Check-in</label>
                        <input type="date" class="form-control shadow-none" id="check_in">
                    </div>
                    <div class="col-lg-2 mb-3">
                        <label for="check_in" class="form-label">Check-out</label>
                        <input type="date" class="form-control shadow-none" id="check_in">
                    </div>
                    <div class="col-lg-2 mb-3">
                        <label for="" class="form-label">Adult</label>
                        <select class="form-select" class="shadow-none">
                            <option selected>select</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <label for="" class="form-label">Child</label>
                        <select class="form-select" class="shadow-none">
                            <option selected>select</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-lg-3 mb-3">
                        <a href="rooms.php"
                            class="btn btn-dark text-white shadow-none btn-outline-success text-capitalize">find the
                            best rate</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Our Rooms -->
<div class="container rooms">
    <div class="row">
        <h4 class="text-center text-secondary text-uppercase fw-bold py-5">our rooms</h4>
        <!-- room one -->
        <?php
        $sql = "select * from room where featured = 'yes' and active = 'yes' order by create_date desc limit 3";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if ($count > 0) {
            while ($rows = mysqli_fetch_assoc($res)) {
                $id = $rows['id'];
                $image = $rows['image'];
                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card shadow border-0" style="max-width: 350px; margin: auto;">
                        <?php
                        if ($image != "") {
                            ?>
                            <img src="<?php echo SITEURL; ?>img/<?php echo $image ?>" class="card-img-top" alt="...">
                            <?php
                        } else {
                            ?>
                            <img
                                src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8aG90ZWwlMjBvb218ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=600&q=60">
                            <?php
                        }
                        ?>

                        <div class="card-body">
                            <h5 class="card-title text-capitalize">
                                <?php echo $rows['title'] ?>
                            </h5>
                            <h6 class="text-secondary py-1 text-capitalize">UgShs:
                                <?php echo $rows['price'] ?> per night
                            </h6>
                            <div class="div mb-3">
                                <span class="text-capitalize text-dark">features</span><br>
                                <span class="badge rounded-pill text-bg-light text-capitalize">
                                    <?php echo $rows['f_feature'] ?>
                                </span>
                                <span class="badge rounded-pill text-bg-light text-capitalize">
                                    <?php echo $rows['s_feature'] ?>
                                </span>
                                <span class="badge rounded-pill text-bg-light text-capitalize">
                                    <?php echo $rows['t_feature'] ?>
                                </span>
                                <span class="badge rounded-pill text-bg-light text-capitalize">
                                    <?php echo $rows['ft_feature'] ?>
                                </span>
                            </div>
                            <div class="div mb-3">
                                <span class="text-capitalize text-dark">facilities</span><br>
                                <span class="badge rounded-pill text-bg-light text-capitalize">
                                    <?php echo $rows['facility_1'] ?>
                                </span>
                                <span class="badge rounded-pill text-bg-light text-capitalize">
                                    <?php echo $rows['facility_2'] ?>
                                </span>
                                <span class="badge rounded-pill text-bg-light text-capitalize">
                                    <?php echo $rows['facility_3'] ?>
                                </span>
                                <span class="badge rounded-pill text-bg-light text-capitalize">
                                    <?php echo $rows['facility_4'] ?>
                                </span>
                            </div>
                            <span class="text-warning mb-4 d-block">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <div class="div">
                                <a href="detail.php?id=<?php echo $id ?>" class="btn btn-dark text-capitalize btn-outline-secondary text-white">book
                                    now</a>
                                <a href="#" class="btn  btn-outline-secondary text-dark">more deatails</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>



        <!-- room two -->

        <div class="col-12 mt-3 py-3 text-center">
            <a href="rooms.php" class="btn btn-outline-secondary text-uppercase fw-bold shadow-none rounded">more rooms</a>
        </div>
    </div>
</div>
<!-- testimonial -->
<div class="container">
    <h4 class="text-center text-secondary text-uppercase fw-bold py-3 mt-5">testimonials</h4>
    <div class="swiper mySwiper-testimonial">
        <div class="swiper-wrapper mt-lg-5">

            <div class="swiper-slide bg-white p-2 shadow">
                <div class="profile d-flex align-items-center py-4">
                    <img src="img/adminlogo.png" alt="" class="img-fluid rounded" style="height: 100px">
                    <h6 class="text-dark py-2 text-capitalize px-4">worker one</h6>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem ex odit repellat, aliquam molestias
                    sed dolores sunt cupiditate commodi deleniti.
                </p>
                <div class="rating text-warning">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
            </div>

            <div class="swiper-slide bg-white">
                <div class="profile d-flex align-items-center py-4">
                    <img src="img/adminlogo.png" alt="" class="img-fluid rounded" style="height: 100px">
                    <h6 class="text-dark py-2 text-capitalize px-4">worker two</h6>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem ex odit repellat, aliquam molestias
                    sed dolores sunt cupiditate commodi deleniti.
                </p>
                <div class="rating text-warning">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
            </div>

            <div class="swiper-slide bg-white">
                <div class="profile d-flex align-items-center py-4">
                    <img src="img/adminlogo.png" alt="" class="img-fluid rounded" style="height: 100px">
                    <h6 class="text-dark py-2 text-capitalize px-4">worker three</h6>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem ex odit repellat, aliquam molestias
                    sed dolores sunt cupiditate commodi deleniti.
                </p>
                <div class="rating text-warning">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
            </div>

            <div class="swiper-slide bg-white">
                <div class="profile d-flex align-items-center py-4">
                    <img src="img/adminlogo.png" alt="" class="img-fluid rounded" style="height: 100px">
                    <h6 class="text-dark py-2 text-capitalize px-4">worker four</h6>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem ex odit repellat, aliquam molestias
                    sed dolores sunt cupiditate commodi deleniti.
                </p>
                <div class="rating text-warning">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- --contact us--- -->
<div class="container">
    <h4 class="text-center text-secondary text-uppercase fw-bold py-3 mt-5">locate us</h4>
    <div class="row">
        <div class="col-lg-6 col-md-6 mt-3">
            <div class="mapouter">
                <div class="gmap_canvas"><iframe width="500" height="410" id="gmap_canvas"
                        src="https://maps.google.com/maps?q=nkenge kyotera&t=&z=10&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                        href="https://2yu.co">2yu</a><br>
                    <style>
                        .mapouter {
                            position: relative;
                            text-align: right;
                            height: 410px;
                            width: 500px;
                        }
                    </style><a href="https://embedgooglemap.2yu.co">html embed google map</a>
                    <style>
                        .gmap_canvas {
                            overflow: hidden;
                            background: none !important;
                            height: 410px;
                            width: 500px;
                        }
                    </style>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 mt-3">
            <h5 class="text-transform text-dark ">Talk to Us</h5>
            <form class="p-3 m-3 shadow rounded">
                <div class="mb-3">
                    <label for="username" class="form-label">Enter Name</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter your fullname">
                </div>
                <div class="mb-3">
                    <label for="contact" class="form-label">Enter Contact</label>
                    <input type="number" class="form-control" id="contact" placeholder="Enter your contact">
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">comment</label>
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                </div>


                <button type="submit" class="btn btn-secondary shadow-none ">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- footer -->
<?php include("partials/footer.php") ?>