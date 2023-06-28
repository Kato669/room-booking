<?php include('partials/header.php') ?>


<?php 
        $success = 0;
        $error = 0;
    if(isset($_POST['submit'])){
       
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $title = $_POST['title'];
            $f_feature = $_POST['f_feature'];
            $s_feature = $_POST['s_feature'];
            $t_feature = $_POST['t_feature'];
            $ft_feature = $_POST['ft_feature'];
            $adult = $_POST['adult'];
            $child = $_POST['child'];
            $facility_1 = $_POST['facility_1'];
            $facility_2 = $_POST['facility_2'];
            $facility_3 = $_POST['facility_3'];
            $facility_4 = $_POST['facility_4'];
            if(isset($_POST['featured'])){
                $featured = $_POST['featured'];
            }else{
                $featured = 'no';
            }

            if(isset($_POST['active'])){
                $active = $_POST['active'];
            }else{
                $active = 'no';
            }
            

            // uploading image
            if(isset($_FILES['image']['name'])){
                //we need image name, source and destination
                $image = $_FILES['image']['name'];
                if($image !=''){
                $ext = explode('.', $image);
                $file_ext = end($ext);
            
                $image = 'room'.time().rand(000, 999). '.'.$file_ext;
                $image_src = $_FILES['image']['tmp_name'];
                $image_destination = "img/".$image;
            
                //upload image
                $upload = move_uploaded_file($image_src, $image_destination);
                if($upload == false){
                    $_SESSION['failed'] = 'image failed to upload';
                    exit;
                }
                }else{
                echo 'image not available';
                }
            
            }else{
                $image = 'hello';
            }

            $sql = "insert into room SET
                image = '$image',
                title = '$title',
                f_feature = '$f_feature',
                s_feature = '$s_feature',
                t_feature = '$t_feature',
                ft_feature = '$ft_feature',
                adult = '$adult',
                child = '$child',
                facility_1 = '$facility_1',
                facility_2 = '$facility_2',
                facility_3 = '$facility_3',
                facility_4 = '$facility_4',
                featured = '$featured',
                active = '$active'
            ";
            $res = mysqli_query($conn, $sql);
            if($res){
                $success = 1;
            }else{
                $error = 1;
            }
        }
    }

?>








    <?php 
        if($success){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> data submitted successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    ?>
    <form action="" class="w-100 mx-3 my-4" method="post" enctype="multipart/form-data">
        <div class="row">
                <div class="mb-3 col-lg-4">
                    <label for="title" class="form-label text-capitalize">Tile</label>
                    <input type="text" class="form-control shadow-none" id="title" name="title" placeholder="Enter room title">
                </div>
                <div class="mb-3 col-lg-5">
                    <label for="image" class="form-label text-capitalize">Image</label>
                    <input type="file" class="form-control shadow-none" id="image" name="image">
                </div>
                <h4 class="text-capitalize my-3 text-secondary">room feature</h4>
                <div class="mb-3 col-lg-4">
                    <label for="ffeature" class="form-label text-capitalize">feature 1</label>
                    <input type="text" class="form-control shadow-none" id="ffeature" name="f_feature" placeholder="Enter the first feature">
                </div>
                <div class="mb-3 col-lg-5">
                    <label for="sfeature" class="form-label text-capitalize">feature 2</label>
                    <input type="text" class="form-control shadow-none" id="sfeature" name="s_feature" placeholder="Enter the second feature">
                </div>
                <div class="mb-3 col-lg-4">
                    <label for="tfeature" class="form-label text-capitalize">feature 3</label>
                    <input type="text" class="form-control shadow-none" id="tfeature" name="t_feature" placeholder="Enter the third feature">
                </div>
                <div class="mb-3 col-lg-5">
                    <label for="ftfeature" class="form-label text-capitalize">feature 4</label>
                    <input type="text" class="form-control shadow-none" id="ftfeature" name="ft_feature" placeholder="Enter the fourth feature">
                </div>
                <h4 class="text-capitalize my-3 text-secondary">guests</h4>
                <div class="mb-3 col-lg-4">
                    <label for="adult" class="form-label text-capitalize">number of adults</label>
                    <input type="text" class="form-control shadow-none" id="adult" name="adult" placeholder="Enter number of adults">
                </div>
                <div class="mb-3 col-lg-5">
                    <label for="children" class="form-label text-capitalize">number of children</label>
                    <input type="text" class="form-control shadow-none" id="children" name="child" placeholder="Enter number of children">
                </div>
                <h4 class="text-capitalize my-3 text-secondary">facilities</h4>
                <div class="mb-3 col-lg-4">
                    <label for="facility" class="form-label text-capitalize">facility one</label>
                    <input type="text" class="form-control shadow-none" id="facility" name="facility_1" placeholder="Enter facility one">
                </div>
                <div class="mb-3 col-lg-5">
                    <label for="facility_2" class="form-label text-capitalize">facility two</label>
                    <input type="text" class="form-control shadow-none" id="facility_2" name="facility_2" placeholder="Enter facility two">
                </div>
                <div class="mb-3 col-lg-4">
                    <label for="facility_3" class="form-label text-capitalize">facility three</label>
                    <input type="text" class="form-control shadow-none" id="facility_3" name="facility_3" placeholder="Enter facility three">
                </div>
                <div class="mb-3 col-lg-5">
                    <label for="facility_4" class="form-label text-capitalize">facility four</label>
                    <input type="text" class="form-control shadow-none" id="facility_4" name="facility_4" placeholder="Enter facility four">
                </div>
                <label for="" class="form-label text-capitalize">featured</label>
                <div class="mb-3 col-lg-4">
                    <input type="radio" class="form-check-input shadow-none" value="yes" id="yes" name="featured">
                    <label for="yes" >Yes</label>
                    <input type="radio" class="form-check-input shadow-none" value="no" id="no" name="featured">
                    <label for="no" >No</label>
                </div>
                <label for="" class="form-label text-capitalize">active</label>
                <div class="mb-3 col-lg-4">
                    <input type="radio" class="form-check-input shadow-none" value="yes" id="Yes" name="active">
                    <label for="Yes" >Yes</label>
                    <input type="radio" class="form-check-input shadow-none" value="no" id="No" name="active">
                    <label for="No" >No</label>
                </div>
                
        </div>
        <div class="mb-3 col-lg-6">
            <input type="submit" value="submit" name="submit" class="btn btn-outline-dark text-white btn-success btn-large text-center py-2 text-capitalize">
        </div>
    </form>


