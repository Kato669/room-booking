<?php include('partials/header.php') ?>

<?php
$success = 0;
$error = 0;
    if(isset($_POST['submit'])){
        if($_SERVER['REQUEST_METHOD'] ==='POST'){
            $title = $_POST['title'];
            $description = $_POST['description'];

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
            
            if(isset($_FILES['image']['name'])){
                $image = $_FILES['image']['name'];
                if($image != ""){
                    $ext = explode('.', $image);
                    $end_ext = end($ext);
                    $image = 'facilities'. rand(000, 999). '.'. $end_ext;


                    $src = $_FILES['image']['tmp_name'];
                    $destination = "img/".$image;
                    $upload = move_uploaded_file($src, $destination);
                    if($upload == false){
                        echo 'failed to upload image';
                        die();
                    }
                }
            }
            
            $sql = "insert into facilities SET
                title = '$title',
                image = '$image',
                description = '$description',
                featured = '$featured',
                active = '$active'
            ";

            $res = mysqli_query($conn, $sql);
            if($res == true){
                $success = 1;
            }
        }
   }
?>



<h4 class="facility_deleted" id="facility_deleted">
    <?php
    if (isset($_SESSION['facility_deleted'])) {
        echo $_SESSION['facility_deleted'];
        unset($_SESSION['facility_deleted']);
    }

    ?>
</h4>

<h4 class="facility_updated" id="facility_updated">
    <?php
    if (isset($_SESSION['facility_updated'])) {
        echo $_SESSION['facility_updated'];
        unset($_SESSION['facility_updated']);
    }

    ?>
</h4>

<?php

if ($success) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
            <strong>Success!</strong> data submitted successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}


?>





<div class="container-fluid bg-light shadow py-3">
    <a href="<?php echo SITEURL; ?>" class="text-capitalize text-dark py-2 text-decoration-none"> <i
            class="fa-solid fa-house"></i> dashboard</a>
    <span> /</span>
    <span class="text-capitalize px-1 text-dark">facilities</span>
</div>

<button type="button" class="btn border text-capitalize py-2 btn-outline-dark my-2 btn-primary text-white shardow-none mx-2" data-bs-toggle="modal" data-bs-target="#Register">
        add facility
    </button>
<div class="container-fluid mt-4">
    <div class="row">
        <table id="example" class="table table-hover table-striped text-capitalize">
            <thead class="bg-dark text-white mt-2">
                <tr>
                    <th>Sn</th>
                    <th>title</th>
                    <th>image</th>
                    <th>description</th>
                    <th>feature </th>
                    <th>active</th>
                    <th>action</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php
                    $sn = 1;
                    $select = "select * from facilities";
                    $execute = mysqli_query($conn, $select);
                    while($row = mysqli_fetch_assoc($execute)){
                        $id = $row['id'];
                        $select_title = $row['title'];
                        $description_s = $row['description'];
                        $featured_s = $row['featured'];
                        $image_s = $row['image'];
                        $active_s = $row['active'];
                        ?>
                            <tr>
                                <td><?php echo $sn++ ?></td>
                                <td><?php echo $select_title ?></td>
                                <td>
                                    <?php 
                                        if($image_s !=''){
                                            ?>
                                                <img src="<?php echo SITEURL; ?>img/<?php echo $image_s ?>" width="100px">
                                            <?php
                                        }else{
                                            echo "<span class='error'>image not found</span>";
                                        }
                                    ?>
                                </td>
                                <td><?php echo $description_s ?></td>
                                <td><?php echo $featured_s ?></td>
                                <td><?php echo $active_s ?></td>
                               
                                <td>
                                    <a href="<?php echo SITEURL; ?>delete_facility.php?id=<?php echo $id ?> & image=<?php echo $image_s ?>"><i class="fa-solid fa-trash text-danger"></i></a>
                                    <a href="<?php echo SITEURL ?>update_facility.php?id=<?php echo $id ?>"><i class="fa-solid fa-pen-to-square text-primary"></i></a>
                                </td>
                            </tr>
                        <?php

                    }
                ?>
               
            </tbody>
        </table>
    </div>
</div>


<!-- Modal Register-->
        <div class="modal fade" id="Register" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="modal-header ">
                            <h1 class="modal-title fs-5 d-flex align-items-center" id="staticBackdropLabel">
                                <i class="fa-solid fa-wifi text-capitalize text-primary px-2"></i>
                                Enter New facilities
                            </h1>
                            <button type="button" class="btn-close border-none shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">Please enter all the relevant infomation in the entries below. Thanks</span>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-12">

                                    <div class="mb-3">
                                        <label for="title" class="form-label text-capitalize">Tile</label>
                                        <input type="text" class="form-control shadow-none" id="title" name="title" placeholder="Enter room title">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="mb-3">
                                        <label for="image" class="form-label text-capitalize">Image</label>
                                        <input type="file" class="form-control shadow-none" id="image" name="image">
                                    </div>
                                </div>
                                

                                <div class="col-lg-12 col-12">
                                    <div class="mb-3">
                                        <label for="floatingTextarea2" class="form-label text-capitalize">description</label>
                                        <textarea class="form-control shadow-none" placeholder="Leave a comment here" id="floatingTextarea2"name="description"></textarea>
                                        
                                    </div>
                                </div>
                                

                                <div class="col-lg-6 col-12">
                                    <label for="" class="form-label text-capitalize">featured</label>
                                    <div class="mb-3">
                                        <input type="radio" class="form-check-input shadow-none" value="yes" id="yes" name="featured">
                                        <label for="yes" >Yes</label>
                                        <input type="radio" class="form-check-input shadow-none" value="no" id="no" name="featured">
                                        <label for="no" >No</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <label for="" class="form-label text-capitalize">active</label>
                                    <div class="mb-3">
                                        <input type="radio" class="form-check-input shadow-none" value="yes" id="Yes" name="active">
                                        <label for="Yes" >Yes</label>
                                        <input type="radio" class="form-check-input shadow-none" value="no" id="No" name="active">
                                        <label for="No" >No</label>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-12">
                                    <div class="mb-3">
                                        <input type="submit" value="submit" name="submit" class="btn btn-outline-dark text-white btn-success btn-large text-center py-2 text-capitalize">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



<script>
    let deleted = document.getElementById('facility_deleted');
    let facility_updated = document.getElementById('facility_updated');
    let alert = document.getElementById('alert');
    window.addEventListener('load', ()=>{
        facility_deleted.classList.add('active');
    })
    window.addEventListener('load', ()=>{
        facility_updated.classList.add('active');
    })
    setTimeout(()=> facility_deleted.remove(), 3000);
    setTimeout(()=> facility_updated.remove(), 2000);
    setTimeout(()=> alert.remove(), 2000);
</script>
