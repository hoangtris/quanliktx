<?php
//thiết lập kết nối db
	error_reporting('all');
	session_start();
	$conn=mysqli_connect('localhost','root','','quanliktx')
		or die ('
		Không thể kết nối đến CSDL!
		');
	mysqli_query($conn,"set names 'utf8'");
	date_default_timezone_set('Asia/Ho_Chi_Minh');

?>