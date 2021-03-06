<style> 
    .search_form_display{ display: none !important; }
</style>
<section class="content-header">
    <h1>
     Manage Order
     <small>Details</small>
    </h1>
<!--<ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
     <li class="active">Dashboard</li>
    </ol>-->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">    
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <!--<h3 class="box-title"></h3>-->   
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                
              <table class="table table-bordered">
                  <?php  $transactions=$transdetails['rows'][0]; ?>
                <tbody>   
                    <tr>
                        <td colspan="2"><h3>Transaction Information</h3></td>
                    </tr>
                    
                    <tr>
                        <th>Transaction Id</th>
                        <td><?=$transactions->trans_id?></td>
                    </tr>
                    
                    <tr>
                        <th>Amount</th>
                        <td>$<?=$transactions->price?></td>
                    </tr>
                    
                    <tr>
                        <th>Date</th>
                        <td><?=$transactions->date?></td>
                    </tr>
                    
                    <tr>
                        <td colspan="2"><h3>Shipping Address</h3></td>
                    </tr>
                    
                    <tr>
                        <th>Name</th>
                        <td><?=$transactions->name?></td>
                    </tr>
                    
                    <tr>
                        <th>Email</th>
                        <td><?=$transactions->email?></td>
                    </tr>
                    
                    <tr>
                        <th>Street</th>
                        <td><?=$transactions->street?></td>
                    </tr>
                    
                    <tr>
                        <th>City</th>
                        <td><?=$transactions->city?></td>
                    </tr>
                    
                    <tr>
                        <th>State</th>
                        <td><?=$transactions->state?></td>
                    </tr>
                    
                    <tr>
                        <th>Zip Code</th>
                        <td><?=$transactions->zipCode?></td>
                    </tr>
					
					
					<?php if($billinginfo['res']){ $billinginformation=$billinginfo['rows'];?>
					<tr>
                        <td colspan="2"><h3>Billing Address</h3></td>
                    </tr>
                    
                    <tr>
                        <th>Name</th>
                        <td><?=$billinginformation->bill_name?></td>
                    </tr>
                    
                    <tr>
                        <th>Email</th>
                        <td><?=$billinginformation->bill_email?></td>
                    </tr>
                    
                    <tr>
                        <th>Street</th>
                        <td><?=$billinginformation->bill_street?></td>
                    </tr>
                    
                    <tr>
                        <th>City</th>
                        <td><?=$billinginformation->bill_city?></td>
                    </tr>
                    
                    <tr>
                        <th>State</th>
                        <td><?=$billinginformation->bill_state?></td>
                    </tr>
                    
                    <tr>
                        <th>Zip Code</th>
                        <td><?=$billinginformation->bill_zipCode?></td>
                    </tr>
					<?php }?>
					
                    
                    <tr>
                        <td colspan="2"><h3>Buyer Information</h3></td>
                    </tr>
                    
                    <tr>
                        <th>Name</th>
                        <td><?=$transactions->f_name.' '.$transactions->l_name?></td>
                    </tr>
					
					<tr>
                        <th>UserName</th>
                        <td><?=$transactions->username;?></td>
                    </tr>
                    
                    <tr>
                        <th>Email</th>
                        <td><?=$transactions->email_id?></td>
                    </tr>
                    
                    <tr>
                        <th>Mobile</th>
                        <td><?=$transactions->mobile_no?></td>
                    </tr>
                    
                </tbody>
                    
              </table>
                <br/>
			
				
					
                
                
                <?php if($taxdetails['res']){ ?>   
                        <h3>Price Details</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered cus-table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Seller</th>
										<th>Seller's username</th>
                                        <th>Product price</th>
                                        <th>Tax</th>
                                        <th>Shipping Price</th>
					<th>Shipping Type</th>
										<th>Total Payment</th>
                                        <th>Admin commission</th>
                                        <th>Seller's Payment</th>
                                        
                                        
                                    </tr>
                                    <?php foreach($taxdetails['rows'] as $taxdetail){ ?>
                                    <tr>
                                        <td><?php echo $taxdetail->f_name.' '.$taxdetail->l_name;?></td>
										<td><?php echo $taxdetail->username;?></td>
                                        <td>$<?php echo $taxdetail->total;?></td>
                                        <td>$<?php echo (($taxdetail->total*$taxdetail->tax)/100);?> &nbsp;&nbsp; (<?php echo $taxdetail->tax;?>) %</td>
                                        <td>$<?php echo $taxdetail->shippingcharge; ?></td>
					<td><?php echo $taxdetail->payment_shipping; ?></td>
										<td>$<?php echo (($taxdetail->total*$taxdetail->tax)/100)+$taxdetail->total+$taxdetail->shippingcharge;?></td>
                                        <td>$<?php echo $taxdetail->commission;?></td>
                                        <td>$<?php echo ($taxdetail->total-$taxdetail->commission)+(($taxdetail->total*$taxdetail->tax)/100)+($taxdetail->shippingcharge);?></td>    
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>    
                     <?php } ?> 
                
                
              <table class="table table-bordered">
                <tbody>
                    
                    <tr>
                        <td colspan="7"><h3>Order Product List</h3></td>
                    </tr>
                    
                    <tr>
                        <th style="width: 10px">#</th>
<!--                        <th style="width: 10px"><input type="checkbox" id="select-all">&nbsp;</th>-->
                        <th>Seller</th>
						<th>Seller's username</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Change Status</th>
                    </tr>

                    
                    <?php if($products['res']){
                        $i=1;
                        foreach($products['rows'] as $product){
                               if($product->status==1){
                                        $status='Order Received';
                                    }else if($product->status==2){
                                        $status='Order Processed';
                                    }else if($product->status==3){
                                        $status='Order Shipped';
                                    }else if($product->status==4){
                                        $status='Order Delivered';
                                    }else if($product->status==5){
                                        $status='Order Rejected';
                                    }else{
					$status='';	
					} 
                                    if($product->bid_status){
                                        $produrl=BASE_URL.'admin/bidproduct/details/'.$product->prodId;
                                    }  else {
                                        $produrl=BASE_URL.'admin/product/details/'.$product->prodId;
                                    }
                            ?>
                    <tr>
                      <td><?=$i?>.</td>
<!--                      <td><input type="checkbox" value="<?=$product->id?>" class="innercheckbox" name="id[]"></td>-->
                      <td><?=$product->f_name.' '.$product->l_name?></td>
					  <td><?=$product->username;?></td>
                      <td><a href="<?php echo $produrl;?>" target="_blank"><?=$product->prod_name?></a></td>
                      <td><?=$product->quantity?></td>
                      <td>$<?=$product->price?></td>
                      <td><?=$status?></td>
                   
                      <td><a href="javascript:void(0)" onClick="statuschange(<?=$product->id?>,<?=$product->status?>)" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                    
<!--                      <td><a href="<?=BASE_URL?>admin/order/details/<?=$product->id?>" class="btn btn-info btn-sm" title="View details"><span class="glyphicon glyphicon-eye-open"></span></a></td>-->
                    </tr>
                    
                    <?php $i++;}?>
                    
                    <?php }else{ ?>
                    <tr>
                        <td colspan="11"><p class="text-danger">No record found.</p></td>
                    </tr>
                    <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
               <?=$links?>
              </ul>
            </div>
          </div>
          <!-- /.box -->

        </div>
        
    </div>    
</section>


<div id="changestatus" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Status Change</h4>
      </div>
        <div class="modal-body" id="change-form">
          <div id="e-result-change"></div>
          <input type="hidden" id="orderId" >
           <div class="form-group">
            <label for="sel1">Select Status:</label>
            <select class="form-control" id="statusoption">
                <!--<option value="1">Pending</option>
                <option value="2">Delivered</option>-->
                <option value="5">Cancel Order</option>
            </select>
          </div>
      </div>
      <div class="modal-footer"> 
          <button type="button" class="btn btn-success" id="changest">Change</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="changestatusmsg" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Status Change</h4>
      </div>
      <div class="modal-body" id="change-formmsg">
          
      </div>
      <div class="modal-footer"> 
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>

    

 function statuschange(orderid,currentstatus){

       var orderid =  parseInt(orderid);
       var currentstatus =  parseInt(currentstatus);

        if(currentstatus==4){  
            $("#change-formmsg").empty().append("This order delivered so you cann't change status");
        $('#changestatusmsg').modal('show');

        }else if(currentstatus==5){  
            $("#change-formmsg").empty().append("This order rejected so you cann't change status");
        $('#changestatusmsg').modal('show');
        }else{   
        $("#orderId").val(orderid);
        $('#statusoption option[value="'+currentstatus+'"]').prop("selected", true);
        $('#changestatus').modal('show');
        }
    }

    $( document ).ready(function() {
          $("#changest").click(function(){
                var orderid=$("#orderId").val();
                var status=$("#statusoption").val();
                //alert(orderid);alert(status);
                $.post("<?=BASE_URL?>admin/order/changestatus",{orderid:orderid,status:status},function(data,status){
                    var obj = $.parseJSON(data);
                    if(obj.status){
                       $("#e-result-change").empty().append(obj.message).addClass("alert alert-success fade in");
                        setTimeout(function(){
                            window.location.reload();
                        }, 1000); 
                    }else{
                        $("#e-result-change").empty().append(obj.message).addClass("alert alert-error fade in");
                        }
                });
            });
            
       
     });

  

</script>