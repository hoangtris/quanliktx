<option value="">Chưa chọn phường/xã</option>

<?php
include '../../model/database.php';
include '../../model/sql_query.php';

$result=mysqli_query($conn,"SELECT * FROM phuongxa WHERE _quanhuyen_id = ".$_GET['districtID']);

while($row=mysqli_fetch_array($result)){
    if($row["id"]==$row_select_taikhoan['PhuongXa']){
        echo '<option value='.$row["id"].' selected>'.$row["_tiento"].' '.$row["_ten"].'</option>';
    }else{
        echo '<option value='.$row["id"].'>'.$row["_tiento"].' '.$row["_ten"].'</option>';
    }
}
?>