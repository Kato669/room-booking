<?php include('./admin/partials/constant.php')?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>James' Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font-family -->
    <link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation:wght@500;600&family=Merienda:wght@400;700&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap"
        rel="stylesheet">
        <!-- font awesome -->
        <script src="https://kit.fontawesome.com/78e0d6a352.js" crossorigin="anonymous"></script>
        <!-- swipper js -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
        <link rel="stylesheet" href="css/styles.css">
         <link rel="icon" href="../img/logo.png">
       
</head>
<body>
      <nav class="navbar navbar-expand-lg bg-white shadow sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="" height=50px></a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active fw-bold me-2" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold me-2" href="rooms.php">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold me-2" href="facilities.php">Facilities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold me-2" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold me-2" href="contact.php">Contact</a>
                    </li>
                </ul>
                <!-- <form class="d-flex" role="search">
                    <button type="button" class="btn border py-2 btn-outline-dark shardow-none mx-2" data-bs-toggle="modal" data-bs-target="#login">
                        Login
                    </button>
                    <button type="button" class="btn border py-2 btn-outline-dark shardow-none mx-2" data-bs-toggle="modal" data-bs-target="#Register">
                        Register
                    </button>
                  
                </form>   -->
            </div>
        </div>
    </nav>

  <!-- Modal login-->
        <!-- <div class="modal fade" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> -->
            <!-- <div class="modal-dialog">
                <div class="modal-content">
                    <form action="">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 d-flex align-items-center" id="staticBackdropLabel">
                                <i class="fa-regular fa-user px-2 text-primary"></i> 
                                User Login
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control shadow-none" id="email" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control shadow-none" id="password" placeholder="Enter your password">
                            </div>
                            <div class="mb-3 d-flex justify-content-between">
                                <button type="submit" class="btn text-center btn-outline-secondary btn-dark shadow-none">Login</button>
                                <a href="javascript: void(0)" class="text-capitalize text-secondary text-decoration-none">forgot password</a>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div> -->

<!-- Modal Register-->
        <!-- <div class="modal fade" id="Register" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <form action="">
                        <div class="modal-header ">
                            <h1 class="modal-title fs-5 d-flex align-items-center" id="staticBackdropLabel">
                                <i class="fa-regular fa-user px-2 text-primary"></i> 
                                Register
                            </h1>
                            <button type="button" class="btn-close border-none shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">Please make sure information provided is accurate as on your Nation ID because it will be used when checking in. Thanks so much</span>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control shadow-none"  id="name" placeholder="Enter your fullname">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control shadow-none" id="email" placeholder="Enter your email">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="mb-3">
                                        <label for="phone_number" class="form-label">Phone Number</label>
                                        <input type="number" class="form-control shadow-none" id="phone_number" placeholder="Enter your Phone number">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="mb-3">
                                        <label for="Place_of_Residence" class="form-label">Place Of Residence</label>
                                        <input type="text" class="form-control shadow-none" id="Place_of_Residence" placeholder="Enter your address">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12">
                                    <div class="mb-3">
                                        <label for="Place_of_Residence" class="form-label">Message</label>
                                        <textarea name="" id="" class="form-control shadow-none" placeholder="Leave a message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Enter Password</label>
                                        <input type="password" class="form-control shadow-none" id="password" placeholder="Enter password">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="mb-3">
                                        <label for="confirm_password" class="form-label">Enter Password</label>
                                        <input type="password" class="form-control shadow-none" id="confirm_password" placeholder="confirm password">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12 text-center">
                                    <input type="submit" value="Register" class="btn btn-large mb-3 btn-dark text-white border btn-outline-secondary shadow-none">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
