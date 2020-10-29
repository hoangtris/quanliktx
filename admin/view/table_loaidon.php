<!--Grid column-->
<div class="col-md-2 mb-4">

<!--Card-->
<div class="card mb-4 bg-primary text-white">
<!-- Card header -->
	<div class="card-header text-center">
		Loại đơn
	</div>		  

	<!--Card content-->
	<!-- List group links -->
	<div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action waves-effect" href="?loaidon=dondatphong">
            Đơn đặt phòng
        </a>
        <a class="list-group-item list-group-item-action waves-effect" href="?loaidon=donhuyphong">
            Đơn hủy phòng
        </a>
        <a class="list-group-item list-group-item-action waves-effect" href="?loaidon=donyeucau">
            Đơn yêu cầu
        </a><a class="list-group-item list-group-item-action waves-effect" href="?loaidon=donkhac">
            Đơn khác
        </a>  
	</div>
	<!-- List group links -->
</div>
<!--/.Card-->
<script>            
function DelConfirm()
{
	return confirm("Bạn có chắc muốn xóa dòng này ?");
}
</script>  