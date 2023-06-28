<?php include('partials/header.php') ?>

<h2 class="text-center text-secondary text-uppercase mt-5 facilities">our facilities</h2>
<hr class="mb-4">
<p class="text-dark py-3 my-3 text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae aliquid <br> eaque ipsam omnis similique voluptatem at odio, quod cum officia? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, harum.</p>
<div class="container">
    <div class="row mt-5 justify-content-center align-items-center">
        <div class="col-lg-6">
            <img src="img/adminlogo.png" alt="" class="img-fluid rounded" height=200px>
        </div>
        <div class="col-lg-5">
            <h4 class="text-dark text-uppercase"><i>kato james kalemba</i></h4>
            <h6 class="text-dark text-capitalize">the CEO</h6>
            <p class="py-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea obcaecati, nam natus voluptatem incidunt laborum nesciunt voluptate dignissimos saepe quos facere, laboriosam qui veniam. Adipisci saepe autem quam aut velit.</p>
        </div>
    </div>
</div>

<div class="container">
    <h4 class="text-center text-uppercase text-dark my-5">our milestones</h4>
    <div class="row">
        <div class="col-lg-4">
            <div class="text-center py-2 shadow bg-white rounded">
                <i class="fa-solid fa-face-smile text-warning py-5" style="font-size: 4rem"></i>
                <h6 class="text-secondary text-uppercase">happy clients</h6>
                <p>300+</p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="text-center py-2 shadow bg-white rounded">
                <i class="fa-solid fa-user text-warning py-5" style="font-size: 4rem"></i>
                <h6 class="text-secondary text-uppercase">employed staff</h6>
                <p>300+</p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="text-center py-2 shadow bg-white rounded">
                <i class="fa-solid fa-book  text-warning py-5" style="font-size: 4rem"></i>
                <h6 class="text-secondary text-uppercase">years of experience</h6>
                <p>80+</p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <h4 class="text-uppercase py-5 mt-5 text-dark text-center">the management</h4>
         <!-- Swiper -->
        <div class="swiper mySwiper-management">
            <div class="swiper-wrapper">
            <div class="swiper-slide bg-white shadow">
                <img src="img/adminlogo.png" class="w-100" height=200px alt="">
                <h6 class="text-center text-uppercase">manage 1</h6>
            </div>
            <div class="swiper-slide bg-white shadow">
                <img src="img/adminlogo.png" class="w-100" height=200px alt="">
                <h6 class="text-center text-uppercase">manage 2</h6>
            </div>
            <div class="swiper-slide bg-white shadow">
                <img src="img/adminlogo.png" class="w-100" height=200px alt="">
                <h6 class="text-center text-uppercase">manage 3</h6>
            </div>
            <div class="swiper-slide bg-white shadow">
                <img src="img/adminlogo.png" class="w-100" height=200px alt="">
                <h6 class="text-center text-uppercase">manage 3</h6>
            </div>
            <div class="swiper-slide bg-white shadow">
                <img src="img/adminlogo.png" class="w-100" height=200px alt="">
                <h6 class="text-center text-uppercase">manage 3</h6>
            </div>
            <div class="swiper-slide bg-white shadow">
                <img src="img/adminlogo.png" class="w-100" height=200px alt="">
                <h6 class="text-center text-uppercase">manage 3</h6>
            </div>
            <div class="swiper-slide bg-white shadow">
                <img src="img/adminlogo.png" class="w-100" height=200px alt="">
                <h6 class="text-center text-uppercase">manage 3</h6>
            </div>
            <div class="swiper-slide bg-white shadow">
                <img src="img/adminlogo.png" height=200px class="w-100" alt="">
                <h6 class="text-center text-uppercase">manage 3</h6>
            </div>
            <div class="swiper-slide bg-white shadow">
                <img src="img/adminlogo.png" height=200px class="w-100" alt="">
                <h6 class="text-center text-uppercase">manage 3</h6>
            </div>
            </div>
            <!-- <div class="swiper-pagination"></div> -->
        </div>
    </div>
</div>
<?php include('partials/footer.php') ?>
<script>
    var swiper = new Swiper(".mySwiper-management", {
      spaceBetween: 30,
      slidesPerView: 4,
      autoplay: true,
      loop: true,
      breakpoints: {
                300: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                        // spaceBetween: 20,
                },
                768: {
                    slidesPerView: 1,
                    // spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 4,
                    // spaceBetween: 50,
                },
            },
    });
</script>
