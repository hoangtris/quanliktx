<?php
//dùng để kiểm soát tài khoản truy cập vào
include('../model/database.php'); 
if($_SESSION['ID_PhanQuyen']==1 || $_SESSION['ID_PhanQuyen']==2){
	
}else{
    header('location:../trangcanhan/index.php');
}

?>