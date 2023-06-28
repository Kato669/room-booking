   <div class="container-fluid mt-5 bg-dark text-white">
            <div class="row p-4">
                <div class="col-lg-4">
                    <h5 class="text-uppercase text-white">contact details</h5>
                    <p class="text-capitalize py-2 text-white">kampala serena hotel </p>
                    <p class="text-capitalize py-2 text-white">Kintu Road P.O. Box 7814 Kampala, Uganda </p>
                    <p class="text-capitalize py-1 text-white">T: +256 312 309000 </p>
                    <p class="text-capitalize py-1 text-white">F: +256 200 415000 </p>
                    <p class="text-capitalize py-1 text-white">E: kampala@serenahotels.com </p>
                </div>
                <div class="col-lg-4">
                    <h5 class="text-uppercase text-white text-center mb-4">james' hotel</h5>
                    <div class="row footer">
                        <div class="col-lg-6">
                            <ul>
                                <li><a href="" class="text-capitalize mb-3 text-decoration-none text-white ">guest book</a></li>
                                <li><a href="" class="text-capitalize mb-3 text-decoration-none text-white ">gallery</a></li>
                                <li><a href="" class="text-capitalize mb-3 text-decoration-none text-white ">dinning</a></li>
                                <li><a href="" class="text-capitalize mb-3 text-decoration-none text-white ">conference</a></li>
                                <li><a href="" class="text-capitalize mb-3 text-decoration-none text-white ">careers</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <li><a href="" class="text-capitalize mb-3 text-decoration-none text-white ">guest book</a></li>
                                <li><a href="" class="text-capitalize mb-3 text-decoration-none text-white ">gallery</a></li>
                                <li><a href="" class="text-capitalize mb-3 text-decoration-none text-white ">dinning</a></li>
                                <li><a href="" class="text-capitalize mb-3 text-decoration-none text-white ">conference</a></li>
                                <li><a href="" class="text-capitalize mb-3 text-decoration-none text-white ">careers</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                     <h5 class="text-uppercase text-white text-center mb-4">SUBSCRIBE TO OUR NEWSLETTER</h5>
                     <form action="">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control shadow-none" placeholder="Enter Email" >
                            <button type="submit" class="btn btn-small text-white bg-dark border">subscribe</button>
                        </div>
                     </form>
                     <p class="text-capitalize text-secondary fs-0.8 icons">
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-youtube"></i>
                     </p>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper-container", {
        spaceBetween: 10,
        effect: "fade",
        loop: true,
        autoplay: {
            delay: 5000,
            },
        
        });

        var swiper = new Swiper(".mySwiper-testimonial", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            loop: true,
            slidesPerView: 3,
            autoplay: {
                delay: 3000,
            },
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
                    slidesPerView: 2,
                    // spaceBetween: 50,
                },
            },
            
            
            
        });
    </script>
</body>

</html>