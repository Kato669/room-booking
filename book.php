<?php include('partials/header.php') ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$sql = "select *, details.adult, details.young from room, details where room.id=details.room_id and room.id=$id";
$execute = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($execute);
$title = $rows['title'];
$arrive = $rows['arrive'];
$departure = $rows['departure'];
$price = $rows['price'];
$adult = $rows['adult'];
$child = $rows['young'];
//calculate days
$date1 = new DateTime($arrive);
$date2 = new DateTime($departure);
$interval = $date1->diff($date2);
$days = $interval->days;
?>

<?php
$success = 0;
$error = 0;
if (isset($_POST['submit'])) {
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $phone = $_POST['phone'];
        $comment = $_POST['comment'];
        $title = $_POST['title'];
        $arrive = $_POST['arrive'];
        $departure = $_POST['departure'];
        $adult = $_POST['adult'];
        $child = $_POST['child'];
        $total = $_POST['total'];
        $status = "come";
        // && is_numeric($fname) && is_numeric($email) && is_numeric($address) && is_numeric($country) && is_numeric($fname) && is_numeric($comment) && empty($fname) && empty($address) && empty($phone) && empty($country)

        if(!is_numeric($phone) && empty($phone)){
            $error = 1;
        }else{
            $insert = "insert into book SET
                fullname = '$fname', 
                email = '$email',
                address = '$address',
                country = '$country',
                city = '$city',
                phone = '$phone',
                comment = '$comment',
                title = '$title',
                arrive = '$arrive',
                departure = '$departure',
                adult = '$adult',
                child = '$child',
                status = '$status',
                total = '$total'
            ";

            $exec = mysqli_query($conn, $insert);
            if($exec){
                $success = 1;
            }
        }
    }
}
?>






<style>
    body {
        overflow-x: hidden;
    }

    .top-bar {
        background-image: linear-gradient(rgba(0, 0, 0, .2), rgba(0, 0, 0, .7)), url(img/rooms/room.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        padding: 100px 0;
    }
</style>


<?php
    if($success){
    echo '
            <div class="alert alert-success alert-dismissible fade show text-capitalize" role="alert">
        <strong>Conguratulation!</strong> you have booked, We can\'t to serve you.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    ';
    }
    if($error){
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Ohh!!</strong> failed to book, kindly check and try again
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
        ';
    }

?>

<div class="container-fluid top-bar text-center">
    <div class="row">
        <div class="col-12">
            <span class="text-center text-uppercase text-white" style="font-size: ">
                <?php echo $title ?>
            </span>
        </div>
    </div>
</div>
<!-- bio info -->
<div class="container ">
    <div class="row mt-4">
        <div class="col-lg-5 radius border bg-light py-2 rounded">
            <p class="text-white px-3 text-capitalize bg-dark mb-3 py-2 w-100">Booking Information</p>
            <hr class="w-100 mb-3">
            <p class="mb-3 text-dark text-dark px-3 text-capitalize">selected rooms</p>
            <hr class="w-100 mb-3">
            <p style="font-size: 1.4rem" class="mb-3 text-dark text-dark px-3 text-capitalize">
                <?php echo $title ?>
            </p>
            <hr class="w-100 mb-3">
            <p class="mb-3 text-dark text-dark px-3 text-capitalize"><b>
                    <?php echo $days ?> night(s) :
                </b> <span>
                    <?php echo $arrive ?> -
                    <?php echo $departure ?>
                </span></p>
            <hr class="w-100 mb-3">
            <p class="mb-3 text-dark text-dark px-3 text-capitalize"><b>1 room(s) : </b> <span>
                    <?php echo $title ?>
                </span></p>
            <hr class="w-100 mb-3">
            <p class="mb-3 text-dark text-dark px-3 text-capitalize"><b>standard rate : </b> <span>
                    <?php echo $price ?>
                </span></p>
            <p class="mb-3 text-dark text-dark px-3 text-capitalize">
                <b>
                    <?php echo $adult ?> adult(s)
                </b> /
                <b>
                    <?php echo $child ?> children
                </b>

            </p>
            <hr class="w-100 mb-3">
            <p class="mb-3 text-dark text-dark px-3 text-capitalize"><b>Total : </b> <span>
                    <?php
                    $total = (($adult + $child) * $price)*$days;
                    echo $total;
                    ?>
                </span></p>
            <!-- <hr class="w-100 mb-3"> -->
        </div>
        <div class="col-lg-6 mx-3">
            <h2 class="text-dark text-capitalize">guest information</h2>
            <form action="" class="w-100" method="POST">
                <div class="mb-3">
                    <label for="fname" class="form-label text-capitalize">full name</label>
                    <input type="text" class="form-control shadow-none" id="fname" name="fname"
                        placeholder="enter full name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label text-capitalize">email</label>
                    <input type="email" class="form-control shadow-none" id="email" name="email"
                        placeholder="Enter email">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label text-capitalize">address</label>
                    <input type="text" class="form-control shadow-none" id="address" name="address"
                        placeholder="Enter address" required>
                </div>
                <div class="mb-3">
                    <label class="control-label mb-2" for="">Country</label>
                    <select id="" class="form-select" name="country" required>
                        <option value="" selected disabled>Choose A Country</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Tanzania">Tanzania</option>
                        <option value="South Sudan">South Sudan</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Andorra">Andorra</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Albania">Albania</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Angola">Angola</option>
                        <option value="Antarctica">Antarctica</option>
                        <option value="Argentina">Argentina</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Austria">Austria</option>
                        <option value="Australia">Australia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Åland">Åland</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Brunei">Brunei</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Brazil">Brazil</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Canada">Canada</option>
                        <option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Congo">Congo</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Ivory Coast">Ivory Coast</option>
                        <option value="Chile">Chile</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="China">China</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Germany">Germany</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="Algeria">Algeria</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Egypt">Egypt</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Spain">Spain</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Greece">Greece</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Israel">Israel</option>
                        <option value="India">India</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Iran">Iran</option>
                        <option value="Iceland">Iceland</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Japan">Japan</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="North Korea">North Korea</option>
                        <option value="South Korea">South Korea</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Libya">Libya</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Mali">Mali</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Namibia">Namibia</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="Norway">Norway</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Oman">Oman</option>
                        <option value="Panama">Panama</option>
                        <option value="Peru">Peru</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Poland">Poland</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Palestine">Palestine</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Romania">Romania</option>
                        <option value="Serbia">Serbia</option>
                        <option value="Russia">Russia</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Somalia">Somalia</option>
                        <option value="São Tomé and Príncipe">São Tomé and Príncipe</option>
                        <option value="Syria">Syria</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Chad">Chad</option>
                        <option value="Togo">Togo</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United States">United States</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="Yemen">Yemen</option>
                        <option value="South Africa">South Africa</option>
                        <option value="Zambia">Zambia</option>
                        <option value="0">Zimbabwe</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label text-capitalize">city</label>
                    <input type="text" class="form-control shadow-none" id="city" name="city" placeholder="Enter city">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label text-capitalize">phone</label>
                    <input type="tel" class="form-control shadow-none" id="phone" name="phone"
                        placeholder="Enter phone number" maxlength="10" minlength="10" required>
                </div>
                <div class="mb-3">
                    <label for="floatingTextarea" class="text-capitalize mb-2">any Comments</label>
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="comment"></textarea>
                </div>
                <div class="mb-3">
                    <input type="hidden" name="title" value="<?php echo $title ?>">
                    <input type="hidden" name="arrive" value="<?php echo $arrive ?>">
                    <input type="hidden" name="departure" value="<?php echo $departure ?>">
                    <input type="hidden" name="adult" value="<?php echo $adult ?>">
                    <input type="hidden" name="child" value="<?php echo $child ?>">
                    <input type="hidden" name="total" value="<?php echo $total ?>">
                    <input type="submit" name="submit" value="submit"
                        class="btn btn-block btn-success text-center text-capitalize text-white py-2 w-100" id="">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include('partials/footer.php') ?>
