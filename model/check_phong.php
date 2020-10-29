<?php
/*---------Đếm số lượng người ở---------*/
$id_phong=$row[ID_Phong];
$select_soluongnguoio="select ID_Phong, COUNT(ID_Phong) as 'SoLuongNguoiO'
					from chitietthuephong
					where ID_Phong=$id_phong
					group by ID_Phong";
$result_select_soluongnguoio=mysqli_query($conn,$select_soluongnguoio);
$row_select_soluongnguoio=mysqli_fetch_array($result_select_soluongnguoio);

if($row_select_soluongnguoio[1]>=$row[SucChua]){ #[1] = COUNT(ID_Phong) as 'SoLuongNguoiO'
	echo '<span class="badge badge-danger">Phòng đã đầy</span>';
}
?>	