<?php include_once('partials/header.php') ?>
<?php
 if(isset($_GET['id'])){
    $id = $_GET['id'];
 }
?>
<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $current_image = $_POST['current_image'];
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
    $price = $_POST['price'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];
    if(isset($_FILES['new_image']['name'])){
        $image = $_FILES['new_image']['name'];
        if($image !=''){
            $end = explode('.', $image);
            $ext = end($end);
            $image = "room". rand(000, 999). '.'. $ext;
            $src = $_FILES['new_image']['tmp_name'];
            $destination = 'img/'.$image;
            $upload = move_uploaded_file($src, $destination);

            if($upload == false){
                $_SESSION['upload'] = 'failed to remove';
                die();
            }
            if($current_image != ''){
                $path = 'img/'. $current_image;
                $remove = unlink($path);
                if ($remove == false) {
                    $_SESSION['remove'] = 'failed to remove';
                    die();
                }
            }
        }else{
            $image = $current_image;
        }
    }else{
        $image = $current_image;
    }

    $update = "update room set
            title = '$title',
            f_feature = '$f_feature',
            image = '$image',
            s_feature = '$s_feature',
            t_feature = '$t_feature',
            ft_feature = '$ft_feature',
            adult = '$adult',
            child = '$child',
            facility_1 = '$facility_1',
            facility_2 = '$facility_2',
            facility_3 = '$facility_3',
            facility_4 = '$facility_4',
            price = '$price',
            featured = '$featured',
            active = '$active'
            where
            id = '$id'
        ";
    $res = mysqli_query($conn, $update);
    if ($res == true) {
        $_SESSION['updated'] = "updated successfully";
        header('Location: ' . SITEURL . 'manage_room.php');
    }
}
?>

<div class="container-fluid bg-light shadow py-3">
    <a href="<?php echo SITEURL; ?>" class="text-capitalize text-dark py-2 text-decoration-none"> <i
            class="fa-solid fa-house"></i> dashboard</a>
    <span> /</span>
    <span class="text-capitalize px-1 text-dark">update room</span>
</div>

<form action="" class="w-100" method="POST" enctype="multipart/form-data">
    <?php
        $sql = "select * from room where id = $id";
        $execute = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_assoc($execute);
        $current_image = $rows['image'];
    ?>
    <div class="container mt-5">
        <div class="row">
                <div class="col-lg-4 col-12 mb-3">
                    <label for="title" class="form-label text-capitalize">Title</label>
                    <input type="text" class="form-control shadow-none" id="title" name="title" value="<?php echo $rows['title'] ?>">
                </div>
                <div class="col-lg-4 col-12 mb-3">
                    <label for="" class="form-label text-capitalize text-danger">Current image</label><br>
                    <?php 
                        if($current_image !=""){
                            ?>
                                <img src="<?php echo SITEURL; ?>img/<?php echo $current_image ?>" width="100px" class="img-fluid">
                            <?php
                        }else{
                            echo "Image not found";
                        }
                    ?>
                    
                </div>
                <div class="col-lg-4 col-12 mb-3">
                    <label for="image" class="form-label text-capitalize">upload new image</label><br>
                    <input type="file" class="form-control shadow-none" id="image" name="new_image">
                </div>
                <h4 class="text-capitalize my-3 text-secondary">room feature</h4>
                <div class="col-lg-4 col-12 mb-3">
                    <label for="ffeature" class="form-label text-capitalize">feature 1</label>
                    <input type="text" class="form-control shadow-none" id="ffeature" name="f_feature" value="<?php echo $rows['f_feature'] ?>">
                </div>
                <div class="col-lg-4 col-12 mb-3">
                    <label for="ffeature" class="form-label text-capitalize">feature 2</label>
                    <input type="text" class="form-control shadow-none" id="ffeature" name="s_feature" value="<?php echo $rows['s_feature'] ?>">
                </div>
                <div class="col-lg-4 col-12 mb-3">
                    <label for="tfeature" class="form-label text-capitalize">feature 3</label>
                    <input type="text" class="form-control shadow-none" id="tfeature" name="t_feature" value="<?php echo $rows['t_feature'] ?>">
                </div>
                <div class="col-lg-4 col-12 mb-3">
                    <label for="tfeature" class="form-label text-capitalize">feature 4</label>
                    <input type="text" class="form-control shadow-none" id="ftfeature" name="ft_feature" value="<?php echo $rows['ft_feature'] ?>">
                </div>
                <div class="col-lg-4 col-12 mb-3">
                </div>
                <div class="col-lg-4 col-12 mb-3">
                </div>
                <h4 class="text-capitalize my-3 text-secondary">guests</h4>
                <div class="col-lg-4 col-12 mb-3">
                    <label for="adult" class="form-label text-capitalize">number of adults</label>
                    <input type="text" class="form-control shadow-none" id="adult" name="adult" value="<?php echo $rows['adult'] ?>">
                </div>
                <div class="col-lg-4 col-12 mb-3">
                    <label for="children" class="form-label text-capitalize">number of children</label>
                    <input type="text" class="form-control shadow-none" id="children" name="child" value="<?php echo $rows['child'] ?>">
                </div>
                <div class="col-lg-4 col-12 mb-3">
                </div>
                <h4 class="text-capitalize my-3 text-secondary">facilities</h4>
                <div class="col-lg-4 col-12 mb-3">
                    <label for="facility" class="form-label text-capitalize">facility one</label>
                    <input type="text" class="form-control shadow-none" id="facility" name="facility_1" value="<?php echo $rows['facility_1'] ?>">
                </div>
                <div class="col-lg-4 col-12 mb-3">
                    <label for="facility_2" class="form-label text-capitalize">facility two</label>
                    <input type="text" class="form-control shadow-none" id="facility_2" name="facility_2" value="<?php echo $rows['facility_2'] ?>">
                </div>
                <div class="col-lg-4 col-12 mb-3">
                    <label for="facility_3" class="form-label text-capitalize">facility three</label>
                    <input type="text" class="form-control shadow-none" id="facility_3" name="facility_3" value="<?php echo $rows['facility_3'] ?>">
                </div>
                <div class="col-lg-4 col-12 mb-3">
                    <label for="facility_4" class="form-label text-capitalize">facility four</label>
                    <input type="text" class="form-control shadow-none" id="facility_4" name="facility_4" value="<?php echo $rows['facility_4'] ?>">
                </div>
                <div class="col-lg-4 col-12 mb-3">
                </div>
                <div class="col-lg-4 col-12 mb-3">
                </div>
                <h4 class="text-capitalize my-3 text-secondary">price</h4>
                <div class="col-lg-12 col-12">
                    <div class="mb-3">
                        <label for="price" class="form-label text-capitalize">price</label>
                        <input type="text" class="form-control shadow-none" id="price" name="price" value="<?php echo $rows['price'] ?>">
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <label for="" class="form-label text-capitalize">featured</label>
                    <div class="mb-3">
                        <input type="radio" <?php if($rows['featured'] == 'yes') { echo 'checked';} ?> class="form-check-input shadow-none" value="yes" id="yes" name="featured">
                        <label for="yes" >Yes</label>
                        <input type="radio"  <?php if($rows['featured'] == 'no') { echo 'checked';} ?> class="form-check-input shadow-none" value="no" id="no" name="featured">
                        <label for="no" >No</label>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <label for="" class="form-label text-capitalize">active</label>
                    <div class="mb-3">
                        <input type="radio"  <?php if($rows['active'] == 'yes') { echo 'checked';} ?> class="form-check-input shadow-none" value="yes" id="Yes" name="active">
                        <label for="Yes" >Yes</label>
                        <input type="radio" class="form-check-input shadow-none" <?php if($rows['active'] == 'no') { echo 'checked';} ?> value="no" id="No" name="active">
                        <label for="No" >No</label>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <input type="submit" name="update" class="btn btn-primary btn-large">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image ?>">
                </div>
                
                
        </div>
    </div>
 </form>
