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
            $price = $_POST['price'];
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
                //    echo 'image not available';
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
                price = '$price',
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





<div class="container-fluid mt-4">

<h4 class="deleted" id="deleted">
    <?php
        if(isset($_SESSION['deleted'])){
            echo $_SESSION['deleted'];
            unset($_SESSION['deleted']);
        }

    ?>
</h4>

<h4 class="updated" id="updated">
    <?php
        if(isset($_SESSION['updated'])){
            echo $_SESSION['updated'];
            unset($_SESSION['updated']);
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



    <button type="button" class="btn border py-2 btn-outline-dark my-3 text-capitalize btn-primary text-white shardow-none mx-2" data-bs-toggle="modal" data-bs-target="#Register">
                        add new room
    </button>


    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="example" class="table table-hover table-striped text-capitalize">
                    <thead class="bg-dark text-white mt-2">
                        <tr>
                            <th>Sn</th>
                            <th>title</th>
                            <th>image</th>
                            <th>feature 1</th>
                            <th>feature 2</th>
                            <th>feature 3</th>
                            <th>feature 4</th>
                            <th>adult</th>
                            <th>child</th>
                            <th>facility 1</th>
                            <th>facility 2</th>
                            <th>facility 3</th>
                            <th>facility 4</th>
                            <th>price</th>
                            <!-- <th>facility 4</th>  -->
                            <th>feature</th>
                            <th>active</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sn = 1;
                            $sql = "select * from room order by create_date desc";
                            $res = mysqli_query($conn, $sql);
                            if($res == true){
                                $count = mysqli_num_rows($res);
                                if($count > 0){
                                    while($rows = mysqli_fetch_assoc($res)){
                                        $id = $rows['id'];
                                        $image = $rows['image'];
                                        $titlle = $rows['title'];
                                        $f_feature = $rows['f_feature'];
                                        $s_feature = $rows['s_feature'];
                                        $t_feature = $rows['t_feature'];
                                        $ft_feature = $rows['ft_feature'];
                                        $adult = $rows['adult'];
                                        $child = $rows['child'];
                                        $price = $rows['price'];
                                        $facility_1 = $rows['facility_1'];
                                        $facility_2 = $rows['facility_2'];
                                        $facility_3 = $rows['facility_3'];
                                        $facility_4 = $rows['facility_4'];
                                        $featured = $rows['featured'];
                                        $active = $rows['active'];
                                        ?>
                                        <tr>
                                            <td><?php echo $sn++  ?></td>
                                            <td><?php echo $titlle ?></td>
                                            <td>
                                                <?php 
                                                    if($image !='') {
                                                        ?>
                                                        <img src="<?php echo SITEURL; ?>img/<?php echo $image ?>" class="img-fluid" alt="..." width="70px">
                                                        <?php
                                                    }else{
                                                        echo "<span class='error'>image not available</span>";
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $f_feature ?></td>
                                            <td><?php echo $s_feature ?></td>
                                            <td><?php echo $t_feature ?></td>
                                            <td><?php echo $ft_feature ?></td>
                                            
                                            <td><?php echo $adult ?></td>
                                            <td><?php echo $child ?></td>
                                            <td><?php echo $facility_1  ?></td>
                                            <td><?php echo $facility_2  ?></td>
                                            <td><?php echo $facility_3  ?></td>
                                            <td><?php echo $facility_4  ?></td>
                                        
                                            <td><?php  echo $price  ?></td>
                                        
                                            <td><?php echo $featured ?></td>
                                            <td><?php echo $active ?></td>
                                            <td>
                                                <a href="<?php echo SITEURL; ?>update_room.php?id=<?php echo $id ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="<?php echo SITEURL; ?>delete_room.php?id=<?php echo $id ?> & image=<?php echo $image ?>"><i class="fa-solid fa-trash text-danger"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                            }
                        ?>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <!-- Modal Register-->
        <div class="modal fade" id="Register" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="modal-header ">
                            <h1 class="modal-title fs-5 d-flex align-items-center" id="staticBackdropLabel">
                                <i class="fa-solid fa-bed text-primary px-3"></i>
                                Enter New Room
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
                                <h4 class="text-capitalize my-3 text-secondary">room feature</h4>
                                <div class="col-lg-6 col-12">
                                    <div class="mb-3">
                                        <label for="ffeature" class="form-label text-capitalize">feature 1</label>
                                        <input type="text" class="form-control shadow-none" id="ffeature" name="f_feature" placeholder="Enter the first feature">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="mb-3">
                                        <label for="sfeature" class="form-label text-capitalize">feature 2</label>
                                        <input type="text" class="form-control shadow-none" id="sfeature" name="s_feature" placeholder="Enter the second feature">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-6">
                                    <div class="mb-3">
                                        <label for="tfeature" class="form-label text-capitalize">feature 3</label>
                                        <input type="text" class="form-control shadow-none" id="tfeature" name="t_feature" placeholder="Enter the third feature">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="mb-3">
                                        <label for="ftfeature" class="form-label text-capitalize">feature 4</label>
                                        <input type="text" class="form-control shadow-none" id="ftfeature" name="ft_feature" placeholder="Enter the fourth feature">
                                    </div>
                                </div>
                                <h4 class="text-capitalize my-3 text-secondary">guests</h4>
                                <div class="col-lg-6 col-12">
                                    <div class="mb-3">
                                        <label for="adult" class="form-label text-capitalize">number of adults</label>
                                        <input type="text" class="form-control shadow-none" id="adult" name="adult" placeholder="Enter number of adults">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="mb-3">
                                        <label for="children" class="form-label text-capitalize">number of children</label>
                                        <input type="text" class="form-control shadow-none" id="children" name="child" placeholder="Enter number of children">
                                    </div>
                                </div>
                                <h4 class="text-capitalize my-3 text-secondary">facilities</h4>
                                <div class="col-lg-6 col-12">
                                    <div class="mb-3">
                                        <label for="facility" class="form-label text-capitalize">facility one</label>
                                        <input type="text" class="form-control shadow-none" id="facility" name="facility_1" placeholder="Enter facility one">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="mb-3">
                                        <label for="facility_2" class="form-label text-capitalize">facility two</label>
                                        <input type="text" class="form-control shadow-none" id="facility_2" name="facility_2" placeholder="Enter facility two">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="mb-3">
                                        <label for="facility_3" class="form-label text-capitalize">facility three</label>
                                        <input type="text" class="form-control shadow-none" id="facility_3" name="facility_3" placeholder="Enter facility three">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="mb-3">
                                        <label for="facility_4" class="form-label text-capitalize">facility four</label>
                                        <input type="text" class="form-control shadow-none" id="facility_4" name="facility_4" placeholder="Enter facility four">
                                    </div>
                                </div>

                                <h4 class="text-capitalize my-3 text-secondary">price</h4>
                                <div class="col-lg-12 col-12">
                                    <div class="mb-3">
                                        <label for="price" class="form-label text-capitalize">price</label>
                                        <input type="text" class="form-control shadow-none" id="price" name="price" placeholder="Enter price">
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
    let deleted = document.getElementById('deleted');
    let updated = document.getElementById('updated');
    let alert = document.getElementById('alert');
    window.addEventListener('load', ()=>{
        deleted.classList.add('active');
    })
    window.addEventListener('load', ()=>{
        updated.classList.add('active');
    })
    setTimeout(()=> deleted.remove(), 3000);
    setTimeout(()=> alert.remove(), 2000);
    setTimeout(()=> updated.remove(), 2000);
</script>


