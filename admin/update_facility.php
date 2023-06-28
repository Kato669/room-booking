<?php include_once('partials/header.php') ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>
<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $current_image = $_POST['current_image'];
    $description = $_POST['description'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];
    if (isset($_FILES['new_image']['name'])) {
        $image = $_FILES['new_image']['name'];
        if ($image != '') {
            $end = explode('.', $image);
            $ext = end($end);
            $image = "facilities" . rand(000, 999) . '.' . $ext;
            $src = $_FILES['new_image']['tmp_name'];
            $destination = 'img/' . $image;
            $upload = move_uploaded_file($src, $destination);

            if ($upload == false) {
                $_SESSION['upload'] = 'failed to remove';
                die();
            }
            if ($current_image != '') {
                $path = 'img/' . $current_image;
                $remove = unlink($path);
                if ($remove == false) {
                    $_SESSION['remove'] = 'failed to remove';
                    die();
                }
            }
        } else {
            $image = $current_image;
        }
    } else {
        $image = $current_image;
    }

    $update = "update facilities set
            title = '$title',
            description = '$description',
            image = '$image',
            featured = '$featured',
            active = '$active'
            where
            id = '$id'
        ";
    $res = mysqli_query($conn, $update);
    if ($res == true) {
        $_SESSION['facility_updated'] = "facility updated successfully";
        header('Location: ' . SITEURL . 'facilities.php');
    }
}
?>

<div class="container-fluid bg-light shadow py-3">
    <a href="<?php echo SITEURL; ?>" class="text-capitalize text-dark py-2 text-decoration-none"> <i
            class="fa-solid fa-house"></i> dashboard</a>
    <span> /</span>
    <span class="text-capitalize px-1 text-dark">update facility</span>
</div>

<form action="" class="w-100" method="POST" enctype="multipart/form-data">
    <?php
    $sql = "select * from facilities where id = $id";
    $execute = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($execute);
    $current_image = $rows['image'];
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 col-12 mb-3">
                <label for="title" class="form-label text-capitalize">Title</label>
                <input type="text" class="form-control shadow-none" id="title" name="title"
                    value="<?php echo $rows['title'] ?>">
            </div>
            <div class="col-lg-12 col-12 mb-3">
                <label for="" class="form-label text-capitalize text-danger">Current image</label><br>
                <?php
                if ($current_image != "") {
                    ?>
                    <img src="<?php echo SITEURL; ?>img/<?php echo $current_image ?>" width="100px" class="img-fluid">
                    <?php
                } else {
                    echo "Image not found";
                }
                ?>

            </div>
            <div class="col-lg-12 col-12 mb-3">
                <label for="image" class="form-label text-capitalize">upload new image</label><br>
                <input type="file" class="form-control shadow-none" id="image" name="new_image">
            </div>
            
            <div class="col-lg-12 col-12 mb-3">
                <label for="description" class="form-label text-capitalize">description</label>
                <input type="text" class="form-control shadow-none" id="description" name="description"
                    value="<?php echo $rows['description'] ?>">
            </div>
            

            <div class="col-lg-12 col-12">
                <label for="" class="form-label text-capitalize">featured</label>
                <div class="mb-3">
                    <input type="radio" <?php if ($rows['featured'] == 'yes') {
                        echo 'checked';
                    } ?>
                        class="form-check-input shadow-none" value="yes" id="yes" name="featured">
                    <label for="yes">Yes</label>
                    <input type="radio" <?php if ($rows['featured'] == 'no') {
                        echo 'checked';
                    } ?>
                        class="form-check-input shadow-none" value="no" id="no" name="featured">
                    <label for="no">No</label>
                </div>
            </div>
            <div class="col-lg-12 col-12">
                <label for="" class="form-label text-capitalize">active</label>
                <div class="mb-3">
                    <input type="radio" <?php if ($rows['active'] == 'yes') {
                        echo 'checked';
                    } ?>
                        class="form-check-input shadow-none" value="yes" id="Yes" name="active">
                    <label for="Yes">Yes</label>
                    <input type="radio" class="form-check-input shadow-none" <?php if ($rows['active'] == 'no') {
                        echo 'checked';
                    } ?> value="no" id="No" name="active">
                    <label for="No">No</label>
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