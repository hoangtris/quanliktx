<option value="">Chưa chọn Quận/Huyện</option>

<?php
include '../../model/database.php';
include '../../model/sql_query.php';

$result=mysqli_query($conn,"SELECT * FROM quanhuyen WHERE _tinhthanh_id = ".$_GET['provinceID']);

while($row=mysqli_fetch_array($result)){
    if($row["id"]==$row_select_taikhoan['QuanHuyen']){
	   echo '<option value='.$row["id"].' selected>'.$row["_tiento"].' '.$row["_ten"].'</option>';
    }else{
        echo '<option value='.$row["id"].'>'.$row["_tiento"].' '.$row["_ten"].'</option>';
    }
}
?>