<?php include('head.php');?>



<?php


?>


<!-- Page wrapper  -->
<div align="center" padding="50px" class="page-wrapper;  width:100%">
<!-- Bread crumb -->
<div class="row page-titles">
<div class="col-md-5 align-self-center">
<h3 class="text-primary">Order Received!</h3> </div>


</div>
<!-- End Bread crumb -->
<!-- Container fluid  -->
<div class="container-fluid">
<!-- Start Page Content -->

<!-- /# row -->
<div class="row">
<div class="col-lg-8" style="    margin-left: 10%;">
<div class="card">
<div class="card-title">
<?php echo ('                   your order receive successfully'); ?>
<br>
<br>
<br>
<br>
<br>
</div>
<div class="card-body">
<div class="input-states">
<form class="form-horizontal" method="POST" action="\drycleaninghub.com\front_end\frontend_home.php" name="userform" enctype="multipart/form-data">

<input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>">









<button type="submit" name="btn_save" size="50px" align="right" class="btn btn-primary btn-flat m-b-30 m-t-30">Ok..    .  </button>
</form>
</div>
</div>
</div>
</div>

</div>


<?php include('footer.php');?>   

<!--  Author Name: Nikhil Bhalerao - www.nikhilbhalerao.com 
PHP, Laravel and Codeignitor Developer -->

