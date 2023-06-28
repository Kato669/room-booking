<?php include('partials/constant.php') ?>
<?php
$output = '';
$sn = 1;
 if(isset($_POST['submit'])){
    $sql = "select * from book order by id desc";
    $execute = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($execute);
    if($count> 0){
        $output.='
            <table class="table" border="1">
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
                    
                </tr>
          
        ';
    
        while($rows =mysqli_fetch_assoc($execute) ){

            $output .= '
                <tr>
                    <td>'.$sn++.' </td>
                    <td>'.$rows["fullname"].' </td>
                    <td>'. $rows["email"].' </td>
                    <td>'.$rows["address"].'</td>
                    <td>'.$rows["country"].'</td>
                    <td>'.$rows["city"].'</td>
                    <td>'.$rows["phone"].'</td>
                    <td>'.$rows["status"].'</td>
                    <td>'.$rows["comment"].'</td>
                    <td>'.$rows["title"].'</td>
                    <td>'.$rows["arrive"].'</td>
                    <td>'.$rows["departure"].'</td>
                    <td>'.$rows["total"].'</td>
                    <td>'.$rows["create_date"].'</td>
                </tr>
                
            ';
        }
        $output.='</table>';
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename = download.xls");
        echo $output;
    }
    
}