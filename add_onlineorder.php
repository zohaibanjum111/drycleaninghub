<?php include('head.php');?>

<?php
include('connect.php');
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');

?>





<!-- Page wrapper  -->
<div class="page-wrapper">
<!-- Bread crumb -->
<div class="row page-titles">
<div class="col-md-5 align-self-center">
<h3 class="text-primary">order Details</h3> </div>
<div class="col-md-7 align-self-center">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
<li class="breadcrumb-item active">order Management</li>
</ol>
</div>
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

</div>
<div class="card-body">
<div class="input-states">
<form class="form-horizontal" method="POST" action="pages/save_order.php" name="userform" enctype="multipart/form-data">

<input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>">

<div class="form-group">
<div class="row">
<label class="col-sm-3 control-label">customer  Name</label>
<div class="col-sm-9">
<select name="fname" id="event" class="form-control" required="">



<option value=" ">--Select customer--</option>
<?php  
$sql2 = "SELECT * FROM customer where id!=1";
$result2 = $conn->query($sql2); 
while($row2= mysqli_fetch_array($result2)){
?>
<option value ="<?php echo $row2['id'];?>"><?php echo $row2['fname'].' '.$row2['lname'];?> </option>
<?php } ?>
</select>




</div>
</div>
</div>




<div class="form-group">
<div class="row">
<label class="col-sm-3 control-label">Service Name</label>
<div class="col-sm-9">
<select name="sname" id="sname" class="form-control" required="" onchange="s();">



<option value=" ">--Select service--</option>
<?php  
$sql2 = "SELECT * FROM service where id!=1";
$result2 = $conn->query($sql2); 
while($row2= mysqli_fetch_array($result2)){
?>
<option value ="<?php echo $row2['id'].','.$row2['prize'];?>"><?php echo $row2['sname'];?> </option>
<?php } ?>
</select>
</div>
</div>
</div>

<!--  Author Name: Nikhil Bhalerao - www.nikhilbhalerao.com 
PHP, Laravel and Codeignitor Developer -->


<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    
    <script src="js2/jquery.min.js"></script>
    <script src="js2/bootstrap.min.js"></script>
    <script src="js2/jquery.dataTables.min.js"></script>
    <script src="js2/dataTables.bootstrap.min.js"></script>
   
    <script src="js2/bootstrap-datepicker.js"></script>    
  </head>
      
    
    
    <div class="container-fluid">
        <br> 
      <form method="post" id="invoice_form">
<!--          <?php var_dump($_REQUEST); ?>-->
        <div class="table-responsive">
            <nav class="navbar navbar-default card">
          <div class="container-fluid">
            <div class="navbar-header" >
              <a>Billing System</a>
            </div>
          </div>
        </nav>
          <table class="table table-bordered card">
            
            <tr>
                <td colspan="2">
                  </div>
                  <br />
                  <table id="invoice-item-table" class="table table-bordered table-hover table-striped">
                    <tr>
                      <th width="10%">S/N.</th>
                      <th width="20%">Item Name</th>
                      <th width="20%">services</th>
                      <th width="10%">Quantity</th>
                      <th width="10%">Price($)</th>
                      <th width="50%">Actual Amt.</th>
                      
                    </tr>

                    <tr>
                      <td><span id="sr_no">1</span></td>
                      <td><input type="text" name="item_name[]" id="item_name1" class="form-control input-sm" /></td>
                      <td><input type="text" name="order_item_quantity[]" id="order_item_quantity1" data-srno="1" class="form-control input-sm order_item_quantity" /></td>
                      <td><input type="text" name="order_item_service[]" id="order_item_service1" data-srno="1" class="form-control input-sm order_item_service" /></td>
                      <td><input type="text" name="order_item_price[]" id="order_item_price1" data-srno="1" class="form-control input-sm number_only order_item_price" /></td>
                      <td><input type="text" name="order_item_actual_amount[]" id="order_item_actual_amount1" data-srno="1" class="form-control input-sm order_item_actual_amount" readonly /></td>
                      <td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount1" data-srno="1" readonly class="form-control input-sm order_item_final_amount" /></td>
                      <td></td>
                    </tr>
                  </table>
                
                  <div align="right">
                    //
                    <div class="form-group">
<div class="row">
<label class="col-sm-3 control-label">Discription</label>
<div class="col-sm-8">
<textarea class="form-control" rows="4" name="discription" placeholder="Discription" style="height: 80px;"></textarea>
</div>
</div>
</div>//
                    <button type="button" name="add_row" id="add_row" class="btn btn-success">+</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td align="right"><b>Total</b></td>
                <td align="right"><b><span id="final_total_amt"></span></b></td>
              </tr>

          </table>
        </div>
      </form>


      <script>
      $(document).ready(function(){
        var final_total_amt = $('#final_total_amt').text();
        var count = 1;
        
        $(document).on('click', '#add_row', function(){
          count++;
          $('#total_item').val(count);
          var html_code = '';
          html_code += '<tr id="row_id_'+count+'">';
          html_code += '<td><span id="sr_no">'+count+'</span></td>';
          
          html_code += '<td><input type="text" name="item_name[]" id="item_name'+count+'" class="form-control input-sm" /></td>';
          
          html_code += '<td><input type="text" name="order_item_quantity[]" id="order_item_quantity'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_quantity" /></td>';
          html_code += '<td><input type="text" name="order_item_service[]" id="order_item_service'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_service" /></td>';
          html_code += '<td><input type="text" name="order_item_price[]" id="order_item_price'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_price" /></td>';
          html_code += '<td><input type="text" name="order_item_actual_amount[]" id="order_item_actual_amount'+count+'" data-srno="'+count+'" class="form-control input-sm order_item_actual_amount" readonly /></td>';
          html_code += '<td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_final_amount" /></td>';
          html_code += '<td><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger btn-xs remove_row">X</button></td>';
          html_code += '</tr>';
          $('#invoice-item-table').append(html_code);
        });
        
        $(document).on('click', '.remove_row', function(){
          var row_id = $(this).attr("id");
          var total_item_amount = $('#order_item_final_amount'+row_id).val();
          var final_amount = $('#final_total_amt').text();
          var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);
          $('#final_total_amt').text(result_amount);
          $('#row_id_'+row_id).remove();
          count--;
          $('#total_item').val(count);
        });

        function cal_final_total(count)
        {
          var final_item_total = 0;
          for(j=1; j<=count; j++)
          {
            var quantity = 0;
            var price = 0;
            var actual_amount = 0;
      
            var item_total = 0;
            quantity = $('#order_item_quantity'+j).val();
            if(quantity > 0)
            {
              price = $('#order_item_price'+j).val();
              if(price > 0)
              {
                actual_amount = parseFloat(quantity) * parseFloat(price);
                $('#order_item_actual_amount'+j).val(actual_amount);
                tax1_rate = $('#order_item_tax1_rate'+j).val();
               
  
                item_total = parseFloat(actual_amount);
                final_item_total = parseFloat(final_item_total) + parseFloat(item_total);
                $('#order_item_final_amount'+j).val(item_total);
              }
            }
          }
          $('#final_total_amt').text(final_item_total);
        }

        $(document).on('blur', '.order_item_price', function(){
          cal_final_total(count);
        });

        $('#create_invoice').click(function(){
          
          for(var no=1; no<=count; no++)
          {
            if($.trim($('#item_name'+no).val()).length == 0)
            {
              alert("Please Enter Item Name");
              $('#item_name'+no).focus();
              return false;
            }

            if($.trim($('#order_item_quantity'+no).val()).length == 0)
            {
              alert("Please Enter Quantity");
              $('#order_item_quantity'+no).focus();
              return false;
            }
         if($.trim($('#order_item_service'+no).val()).length == 0)
            {
              alert("Please Enter Quantity");
              $('#order_item_service'+no).focus();
              return false;
            }

            if($.trim($('#order_item_price'+no).val()).length == 0)
            {
              alert("Please Enter Price");
              $('#order_item_price'+no).focus();
              return false;
            }

          }

          $('#invoice_form').submit();

        });

      });
      
      </script>

    </div>
    <br>
    
  </body>
</html>



</div>
</div>
</div> 
<div class="form-group">
<div class="row">
<label class="col-sm-3 control-label">PRICE</label>
<div class="col-sm-9">
  <input type="number" name="prizes" id="prizes" readonly>
</div>
</div>
</div>




<div class="form-group">
<div class="row">
<label class="col-sm-3 control-label">Delivery Date</label>
<div class="col-sm-9">
<input type="date" name="dod" class="form-control" placeholder="Delivery Date">
</div>
</div>
</div>


<div class="form-group">
<div class="row">
<label class="col-sm-3 control-label">Todays Date</label>
<div class="col-sm-9">
<input  name="todays_date" class="form-control"  value="<?php echo date('y/m/d'); ?>">
</div>
</div>
</div>




<button type="submit" name="btn_save" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
</form>
</div>
</div>
</div>
</div>


</div>




<?php include('footer.php');?>

<!--  Author Name: Nikhil Bhalerao - www.nikhilbhalerao.com 
PHP, Laravel and Codeignitor Developer -->

<!--  Author Name: Nikhil Bhalerao - www.nikhilbhalerao.com 
PHP, Laravel and Codeignitor Developer -->

<script>
function s() {
  //alert($('#sname').val());
  var sname=$('#sname').val();
  var price=sname.split(',');
  $('#prizes').val(price[1]);
}
</script>