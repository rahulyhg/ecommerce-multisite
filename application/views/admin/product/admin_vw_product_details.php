<?php  $product=$products['rows'][0];?>

<section class="content-header">
    <h1>
     Manage Product
     <small>details</small>
    </h1>

</section>


<section class="content">
    <div class="row">    
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                <div class="col-md-2 col-lg-2 col-sm-2">
                <img src="<?=BASE_URL?>assets/image/product/thumb/<?=$product->prod_img?>" class="img img-responsive">
                
                </div>
                <div class="col-md-9 col-lg-9 col-sm-9">
                    <?php if($product->type_Of_User==1){ ?>
                    <div class="col-md-12 col-lg-12 col-sm-12"><a href="<?=BASE_URL?>admin/users/details/<?=$product->userid?>" target="_blank" ><p class="vw_username"><?=$product->username?></p></a></div>
                    <?php } ?>
                </div>    
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-bordered">
                <tbody>
                    <tr> 
                        <th>Category</th>
                        <td><?=$product->category?></td>
                    </tr>
                    <tr> 
                        <th>Sub Category</th>
                        <td><?=$product->sub_category?></td>
                    </tr>
                    <tr> 
                        <th>Product</th>
                        <td><?=$product->prod_name?></td>
                    </tr>
                    <tr> 
                        <th>Price</th>
                        <td>$<?=$product->prod_price?></td>
                    </tr>
                    <tr> 
                        <th>Available</th>
                        <td><?=$product->no_of_prod?></td>
                    </tr>
                    <tr> 
                        <th>Details</th>
                        <td><?=$product->pord_detail?></td>
                    </tr>
                    <tr> 
                        <th>Product Date</th>
                        <td><?=$product->date?></td>
                    </tr>
                    <tr> 
                        <th>Weight</th>
                        <td><?=$product->weight?> (<?=$product->weight_unit?>)</td>
                    </tr>
                    <tr> 
                        <th>Dimension</th>
                        <td><?=$product->length?>* <?=$product->width?>* <?=$product->height?> (<?=$product->die_unit?>)</td>
                    </tr>
                    <tr> 
                        <th>Local shipping</th>
                        <td><?=$product->local_shipping ?></td>
                    </tr>
                    
                    <tr> 
                        <th>Seller status</th>
                        <td><?php if($product->status==1){echo "Active";}else{echo "In-active";} ?></td>
                    </tr>
                    
                    <tr> 
                        <th>Admin status</th>
                        <td><?php if($product->admin_status==1){echo "Active";}else{echo "In-active";} ?></td>
                    </tr>
                    <tr> 
                        <th>Taxable status</th>
                        <td><?php if($product->taxable_status==1){echo "Yes";}else{echo "No";} ?></td>
                    </tr>
                    
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              
            </div>
          </div>
          <!-- /.box -->

        </div>
        
    </div>    
</section>


