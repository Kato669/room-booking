<?php include('partials/header.php') ?>
<h2 class="text-center text-secondary text-uppercase mt-5 facilities">our rooms</h2>
<hr class="mb-4">
<p class="text-dark py-3 my-3 text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae aliquid <br> eaque ipsam omnis similique voluptatem at odio, quod cum officia? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, harum.</p>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-3">

                <?php
                    $sql = "select * from room";
                    //execute the querry
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    if ($count > 0) {
                        while ($rows = mysqli_fetch_assoc($res)) {
                            $id = $rows['id'];
                            $img = $rows['image'];
                            $title = $rows['title'];
                            $f_feature = $rows['f_feature'];
                            $s_feature = $rows['s_feature'];
                            $t_feature = $rows['t_feature'];
                            $ft_feature = $rows['ft_feature'];
                            $facility_1 = $rows['facility_1'];
                            $facility_2 = $rows['facility_2'];
                            $facility_3 = $rows['facility_3'];
                            $facility_4 = $rows['facility_4'];
                            $adult = $rows['adult'];
                            $child = $rows['child'];
                            $price = $rows['price'];
                            ?>
                                <div class="row g-0 mb-3 align-items-center shadow rounded border-none">
                                    <div class="col-lg-5 col-md-5">
                                        <?php
                                            if($img !=""){
                                                ?>
                                                     <img src="<?php  echo SITEURL;?>img/<?php echo $img ?>" class="img-fluid rounded-start" alt="...">
                                                <?php
                                            }else{
                                                ?>
                                                 <img src="https://cdn.pixabay.com/photo/2020/10/18/09/16/bedroom-5664221_1280.jpg" class="img-fluid rounded-start" alt="...">
                                                <?php
                                            }

                                        ?>
                                       
                                    </div>
                                    <div class="col-lg-5 col-md-5 px-3">
                                        <h5 class="mb-1 text-capitalize"><?php echo $title ?></h5>
                                        <div class="div mb-3">
                                            <span class="text-capitalize text-dark">features</span><br>
                                            <span class="badge rounded-pill text-bg-light text-capitalize"><?php echo $f_feature ?></span>
                                            <span class="badge rounded-pill text-bg-light text-capitalize"><?php echo $s_feature ?></span>
                                            <span class="badge rounded-pill text-bg-light text-capitalize"><?php echo $t_feature ?></span>
                                            <span class="badge rounded-pill text-bg-light text-capitalize"><?php echo $ft_feature ?></span>
                                        </div>
                                        <div class="mb-3">
                                            <span class="text-capitalize text-dark">facilities</span><br>
                                            <span class="badge rounded-pill text-bg-light text-capitalize"><?php echo $facility_1 ?></span>
                                            <span class="badge rounded-pill text-bg-light text-capitalize"><?php echo $facility_2 ?></span>
                                            <span class="badge rounded-pill text-bg-light text-capitalize"><?php echo $facility_3 ?></span>
                                            <span class="badge rounded-pill text-bg-light text-capitalize"><?php echo $facility_4 ?></span>
                                        </div>
                                        <div class="mb-3">
                                            <span class="text-capitalize text-dark">guests</span><br>
                                            <span class="badge rounded-pill text-bg-light text-capitalize"><?php echo $adult ?> adults</span>
                                            <span class="badge rounded-pill text-bg-light text-capitalize"><?php echo $child ?> children</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 mr-2 text-align-center">
                                            <p class="mb-4">$<?php echo $price ?></p>
                                            <a href="detail.php?id=<?php echo $id ?>" class="btn btn-dark mb-2 w-90 text-capitalize btn-outline-secondary text-white">book now</a>
                                            <a href="#" class="btn w-90 btn-outline-secondary  text-capitalize text-dark">more details</a>
                                    </div>
                                </div>

                            <?php

                        }
                    }
                ?>

            </div>
            
        </div>
    </div>
</div>
<?php include('partials/footer.php') ?>
