<style>
    .book_deleted{
        text-transform: capitalize;
        color: red;
        font-size: 1rem;
        position: absolute;
        top: -20%;
        left: 40%;
        transition: all 1s;
    }
    .book_deleted.active{
        top: 20%;
    }
    .come{
        color: green;
    }
    .not_come{
        color: red;
    }
    .reside{
        color: #2980b9;
    }
    .Left{
        color: #f1c40f;
    }
</style>

<?php include('partials/header.php') ?>

<div class="container my-5">
    <class="row">
        <class="col-lg-12">
            <h4 class="text-capitalize text-secondary text-center">manage bookings</h4>
        </class=col-lg-12>
    </class=row>
</div>

<h4 class="book_deleted" id="book_deleted">
    <?php
        if(isset($_SESSION['book_deleted'])){
            echo $_SESSION['book_deleted'];
            unset($_SESSION['book_deleted']);
        }

    ?>
</h4>


<div class="container-fluid">
   <div class="row">
        <div class="col-lg-4">
            <form action="export.php" method="POST">
                <input type="submit" value="export excel" class="btn btn-success text-capitalize text-center text-white rounded shadow-none" name="submit">
            </form>
        </div>
   </div>
</div>
<div class="container-fluid my-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="example" class="table table-hover table-striped text-capitalize">
                    <thead class="mt-2">
                        <tr>
                            <th>Sn</th>
                            <th>fullname</th>
                            <th>email</th>
                            <th>address</th>
                            <th>country</th>
                            <th>city</th>
                            <th>phone</th>
                            <th>status</th>
                            <th>comment</th>
                            <th>title</th>
                            <th>arrive</th>
                            <th>departure</th>
                            <th>total</th>
                            <th>Booking date</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "select * from book";
                            $execute = mysqli_query($conn, $sql);
                            $sn = 1;
                            while($rows=mysqli_fetch_assoc($execute)){
                                $id = $rows['id'];
                                $fullname = $rows['fullname'];
                                $email = $rows['email'];
                                $address = $rows['address'];
                                $country = $rows['country'];
                                $city = $rows['city'];
                                $phone = $rows['phone'];
                                $comment = $rows['comment'];
                                $status = $rows['status'];
                                $title = $rows['title'];
                                $arrive = $rows['arrive'];
                                $departure = $rows['departure'];
                                $total = $rows['total'];
                                $book_date = $rows['create_date'];
                                ?>
                                    <tr>
                                        <td><?php echo $sn++; ?> </td>
                                        <td><?php echo $fullname ?> </td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $address?></td>
                                        <td><?php echo $country ?></td>
                                        <td><?php echo $city ?></td>
                                        <td><?php echo $phone ?></td>
                                        <td>
                                            <?php 
                                                if($status === 'come'){
                                                    echo "<span class='come'>come</span>";
                                                }elseif ($status === 'Not come') {
                                                    echo "<span class='not_come'>Not come</span>";
                                                } elseif ($status === 'reside') {
                                                    echo "<span class='reside'>reside</span>";
                                                }else{
                                                    echo "<span class='Left'>Left</span>";
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $comment?></td>
                                        <td><?php echo $title?></td>
                                        <td><?php echo $arrive?></td>
                                        <td><?php echo $departure?></td>
                                        <td><?php echo $total?></td>
                                        <td><?php echo $book_date?></td>
                                        <td>
                                            <a href="<?php echo SITEURL ?>delete_book.php?id=<?php echo $id ?>"><i class="fa-solid fa-trash text-danger"></i></a>
                                            <a href="<?php echo SITEURL ?>update_book.php?id=<?php echo $id ?>"><i class="fa-solid fa-pen-to-square text-primary"></i></a>
                                        </td>
                                    </tr>
                                <?php
                            }
                         ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    let book_deleted =document.getElementById('book_deleted');
    window.addEventListener('load',()=>{
        book_deleted.classList.add('active');
    })
    setTimeout(()=> book_deleted.remove(), 3000);
</script>