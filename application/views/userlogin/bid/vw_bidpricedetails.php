
<div class="col-sm-9">
    <div class="">
        <div class="">
            <div class="contant-head">
                 <h4> <span class="glyphicon glyphicon-th" aria-hidden="true"></span> <a href="<?=BASE_URL?>bid/product"> Bid Product </a> </h4><h5> > price details </h5>
            </div>
        </div>
    </div>
	<?php
	if($this->session->has_userdata("shipto")){ echo "Shipping to :".$this->session->userdata("shipto");echo " "; echo "&nbsp;&nbsp; <a href='javascript:void(0);'  data-toggle='modal' data-target='#changeship'>change</a>"; }
    ?>
<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 cart-total-main table-responsive">  <!-- cart-total-main -->
    <form id="bidform" method="post" action="<?=BASE_URL?>payment/index/<?=$this->uri->segment(3)?>/<?php echo $this->uri->segment(4); ?>?paymenttype=bidproduct" >
   <!-- <table class="table table-bordered text-center">
       <thead class="cus-thead">
         <tr>
           <th class="text-center">Seller</th>
           <th class="text-center">Product price</th>
           <th class="text-center">Tax charged (%)</th>
           <th class="text-center">Total tax</th>
           <th class="text-center">Select shipping</th>
		   <th class="text-center">Direct Pick-up</th>
           <th class="text-center">Subtotal</th>
         </tr>
       </thead>
       <tbody> -->
       <table class="table table-bordered cus-table-bordered">
                            <thead class="cus-thead">
                                <tr>
                                    <td>Seller</td>
                                    <td>Product price</td>                                    
                                    <td width="16%">Tax charged (%)</td>
                                    <td>Total tax</td>
                                    <td width="20%">Select shipping</td>
                                    <td>Direct Pick-up</td>
                                    <td>Subtotal</td>
                                    
                                </tr>
                            </thead>
                            <tbody>
       <?php $total_for_payment=0;$f_total=0;
         $i=1;
         if($tax){
         foreach($tax as $vwtaxamt){ $total_for_payment+=$vwtaxamt->sub_total; ?>
         <tr>
           <td class="cart_text"><?php echo $vwtaxamt->f_name.' '.$vwtaxamt->l_name; ?></td>
           <td class="cart_text">$<?php echo $vwtaxamt->prod_total;?></td>
           <td class="cart_text"><?php echo $vwtaxamt->desc;?> (<?php echo $vwtaxamt->tax;?> %)</td>
           <td class="cart_text">$<?php echo $vwtaxamt->sub_total_tax; ?></td>
           <td>
               <?php 
                  if(count($vwtaxamt->shippingdetails['fedex'])>0){?>
               <select class="form-control shippingclass" name="shipping[]" id="shipping_<?php echo $i; ?>">
                   <optgroup label="Service @ amount">
                       <option value="-1">---Select Shipping Service---</option>
                   <?php if(count($vwtaxamt->shippingdetails['fedex'])>0){ foreach($vwtaxamt->shippingdetails['fedex'] as $key=>$value){ ?>
                       <option value="<?php echo $value; ?>"><?php echo $key; ?> @ $<?php echo $value; ?>  </option>
                   <?php }} ?>
                   </optgroup>
               </select>
<input type="hidden" name="type1[]" id="type1" value="">
			   <span id="fed_directship_<?php echo $i; ?>" style="display:none;">0</span>
                <?php }else{?>
                    <input type="hidden" id="shipping_<?php echo $i; ?>" value="<?php echo $vwtaxamt->local_shipping; ?>">
                    <span id="localship_<?php echo $i; ?>"> <?php echo $vwtaxamt->local_shipping; ?></span>
					<span id="directship_<?php echo $i; ?>" style="display:none;">0</span>
                  <?php 
                    $ls_total=$vwtaxamt->local_shipping+$vwtaxamt->sub_total;
                    $f_total+=$ls_total;
                   }?>
                <?php if(count($vwtaxamt->shippingdetails['fedex'])>0){?>    
                <input type="hidden" name="currentselected[]" id="prevselected_<?php echo $i;?>" value="0">
               <input type="hidden" name="sellerid[]" id="sellerid_<?php echo $i;?>" value="<?php echo $vwtaxamt->user_id;?>">
               <input type="hidden" name="subtotal[]" id="subtotalfield_<?php echo $i;?>" value="<?php echo $vwtaxamt->sub_total; ?>"> 
               <?php } else{?>
               
               <input type="hidden" name="currentselected[]" id="prevselected_<?php echo $i;?>" value="<?php echo $vwtaxamt->local_shipping; ?>">
               <input type="hidden" name="sellerid[]" id="sellerid_<?php echo $i;?>" value="<?php echo $vwtaxamt->user_id;?>">
               <input type="hidden" name="subtotal[]" id="subtotalfield_<?php echo $i;?>" value="<?php echo $ls_total; ?>">
               <?php }?>
			   <input type="hidden" name="shipping[]" id="local_ship_<?php echo $i;?>" value="<?php echo $vwtaxamt->local_shipping; ?>">
           </td>
		   <?php if(count($vwtaxamt->shippingdetails['fedex'])>0){?>
			<td style="text-align: center;"><input type="checkbox" id="fed_directpick_<?php echo $i;?>" onclick="fedchangeshipping(<?php echo $i;?>)"></td>
			<?php }else{?>
			<td><input type="checkbox" id="directpick_<?php echo $i;?>" onclick="changeshipping(<?php echo $i;?>)" ></td>
			<?php }?>
		   
		   
          <?php if(count($vwtaxamt->shippingdetails['fedex'])>0) {?>
            <td class="cart_text" id="subtotal_<?php echo $i;?>">$<?php echo $vwtaxamt->sub_total; ?></td>
            <?php } else{?>
           <td class="cart_text" id="subtotal_<?php echo $i;?>">$<?php echo $ls_total; ?></td>
            <?php } ?>
         </tr>
       <?php $i++; }  ?>
          <?php if(count($vwtaxamt->shippingdetails['fedex'])>0) {?>
            <tr>
               <td colspan="6" align="right"><input type="hidden" id="no_of_sellers" value="<?php echo $i; ?>"><strong>Total For Payment</strong></td>
               <td><strong id="totalforpayment">$<?php echo $total_for_payment; ?></strong><input type="hidden" name="totalforpayment" id="totalforpaymentfield" value="<?php echo $total_for_payment; ?>"> <?php $this->session->set_userdata('total_product_price',$total_for_payment); ?></td>
            </tr>
            <?php } else{ ?>
            <tr>
            <td colspan="6" align="right"><input type="hidden" id="no_of_sellers" value="<?php echo $i; ?>"><strong>Total For Payment</strong></td>
            <td><strong id="totalforpayment">$<?php echo $f_total; ?></strong><input type="hidden" name="totalforpayment" id="totalforpaymentfield" value="<?php echo $f_total; ?>"><?php $this->session->set_userdata('total_product_price',$f_total); ?></td>
            </tr>
          <?php } }?>
       </tbody>
     </table>
</form>

    </div>
    
    
        <div class="col-md-12">
            <div class="pull-right">
            <a  id="submit_viewcart" href="javascript:void(0);" class="btn btn-success btn-sm pull-right pr_det_paynow_btn"> <!--cus_checkout_btn-->
             PAY NOW
        </a>
            </div>
        </div>

</div>

    </div>
</div>  
<!-- Modal -->
  <div class="modal fade" id="changeship" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change shipping</h4>
        </div>
        <form role="form" id="calculateship_form" name="calculateship_form" method="post" action="<?=BASE_URL?>bid/pricedetails/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4); ?>">
        <div class="modal-body">
                <div class="form-group">
                    <label for="email" class="sr-only">Email address:</label>
                    <input type="text" class="form-control" name="new_zip" id="new_zip" placeholder="Zip Code">
                </div>
        </div>
        </form>      
        <div class="modal-footer">
            <button type="button" id="calculateship_btn" class="btn btn-success">Calculate</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script>


$(document).on('change', '.shippingclass', function(e) {
	
	 var id = $(this).find('option:selected').text();
	
	$(this).next('#type1').val(id);
	
});

function changeshipping(id)
{
	
	if($('#directpick_'+id).is(':checked'))
	{
		var localshipchrg=$("#shipping_"+id).val();
		$("#localship_"+id).css('display','none');
		$("#directship_"+id).css('display','block');
		$("#shipping_"+id).val('0');$("#local_ship_"+id).val('0');
		
		var subtotalfield=$("#subtotalfield_"+id).val();
        var totalforpaymentfield=$("#totalforpaymentfield").val();
        var new_subtotal=(parseFloat(subtotalfield)-parseFloat(localshipchrg)).toFixed(2);
        var new_totalforpayment=(parseFloat(totalforpaymentfield)-parseFloat(localshipchrg)).toFixed(2);
        $("#subtotalfield_"+id).val(new_subtotal);
        $("#totalforpaymentfield").val(new_totalforpayment);
        
        $("#subtotal_"+id).html("$"+new_subtotal);
        $("#totalforpayment").html("$"+new_totalforpayment);
		
		
		
	}
	else
	{
		var localshipchrg=$("#localship_"+id).html();
		$("#directship_"+id).css('display','none');
		$("#localship_"+id).css('display','block');
		$("#shipping_"+id).val(localshipchrg);$("#local_ship_"+id).val(localshipchrg);
		
		var subtotalfield=$("#subtotalfield_"+id).val();
        var totalforpaymentfield=$("#totalforpaymentfield").val();
        var new_subtotal=(parseFloat(subtotalfield)+parseFloat(localshipchrg)).toFixed(2);
        var new_totalforpayment=(parseFloat(totalforpaymentfield)+parseFloat(localshipchrg)).toFixed(2);
        $("#subtotalfield_"+id).val(new_subtotal);
        $("#totalforpaymentfield").val(new_totalforpayment);
        
        $("#subtotal_"+id).html("$"+new_subtotal);
        $("#totalforpayment").html("$"+new_totalforpayment);
		
	}
}

function fedchangeshipping(id)
{
	if($('#fed_directpick_'+id).is(':checked'))
	{
		
		var fed_shipchrg=$("#shipping_"+id).val();
		if(fed_shipchrg=='-1'){fed_shipchrg='0';}
		$("#shipping_"+id).css('display','none');
		$("#fed_directship_"+id).css('display','block');
		
		
		var subtotalfield=$("#subtotalfield_"+id).val();
        var totalforpaymentfield=$("#totalforpaymentfield").val();
        var new_subtotal=(parseFloat(subtotalfield)-parseFloat(fed_shipchrg)).toFixed(2);
        var new_totalforpayment=(parseFloat(totalforpaymentfield)-parseFloat(fed_shipchrg)).toFixed(2);
        $("#subtotalfield_"+id).val(new_subtotal);
        $("#totalforpaymentfield").val(new_totalforpayment);
        
        $("#subtotal_"+id).html("$"+new_subtotal);
        $("#totalforpayment").html("$"+new_totalforpayment);
		$("#shipping_"+id).val('0');$("#prevselected_"+id).val('0');$("#local_ship_"+id).val('0');
		
		
	}
	else
	{
		var fed_shipchrg=$("#shipping_"+id).val();
		//alert('first'+fed_shipchrg);
		if(fed_shipchrg==null){fed_shipchrg='0';}
		$("#fed_directship_"+id).css('display','none');
		$("#shipping_"+id).css('display','block');
		
		
		var subtotalfield=$("#subtotalfield_"+id).val();
        var totalforpaymentfield=$("#totalforpaymentfield").val();
        var new_subtotal=(parseFloat(subtotalfield)+parseFloat(fed_shipchrg)).toFixed(2);
        var new_totalforpayment=(parseFloat(totalforpaymentfield)+parseFloat(fed_shipchrg)).toFixed(2);
        $("#subtotalfield_"+id).val(new_subtotal);
        $("#totalforpaymentfield").val(new_totalforpayment);
        
        $("#subtotal_"+id).html("$"+new_subtotal);
        $("#totalforpayment").html("$"+new_totalforpayment);
		$("#shipping_"+id).val('-1');
		$("#prevselected_"+id).val(fed_shipchrg);
		$("#local_ship_"+id).val(fed_shipchrg);
	}
}



$("#calculateship_btn").click(function(){ 
        var new_zip=$("#new_zip").val().trim();
        if(new_zip==''){ alert("if");
            $("#new_zip").parent().addClass("has-error");
            $("#new_zip").focus();
            return false;
        }else{ 
            $("#calculateship_form").submit();
        }   
    });


    $(document).on("change",".shippingclass",function(){
        $(this).parent().removeClass("has-error");
        var id=$(this).attr("id").split("_")[1]; 
        var currentselected=$(this).val();
        var prevselected=$("#prevselected_"+id).val();
        var subtotalfield=$("#subtotalfield_"+id).val();
        var totalforpaymentfield=$("#totalforpaymentfield").val();
        //alert(prevselected+'__'+subtotalfield+'__'+totalforpaymentfield);
        var new_subtotal=(parseFloat(subtotalfield)-parseFloat(prevselected)+parseFloat(currentselected)).toFixed(2);
        var new_totalforpayment=(parseFloat(totalforpaymentfield)-parseFloat(prevselected)+parseFloat(currentselected)).toFixed(2);
        $("#subtotalfield_"+id).val(new_subtotal);
        $("#totalforpaymentfield").val(new_totalforpayment);
        $("#prevselected_"+id).val(currentselected);
        $("#subtotal_"+id).html("$"+new_subtotal);
        $("#totalforpayment").html("$"+new_totalforpayment);
    });
    
    
    $(document).on("click","#submit_viewcart",function(){
        var flag1=0; 
        var no_of_sellers=$("#no_of_sellers").val();
        for(var i=1;i<no_of_sellers;i++){
            var shipping=$("#shipping_"+i).val();
            if(shipping>-1){flag1++;}else{
                alert("Please select shipping");
                $("#shipping_"+i).parent().addClass("has-error").focus();
                return false;
            }
        }
        if(flag1){$('#bidform').submit();}else{ return false; }
        //$('form').submit();
    });
</script>
