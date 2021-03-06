<?php $category=$category['rows'][0];?>
<section class="content-header">
    <h1>
     Manage Forum
     <small>edit category</small>
    </h1>
<!--    <ol class="breadcrumb">
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
              <div class="pull-right">
                <a href="<?=BASE_URL?>admin/forum" class="btn btn-success btn-sm" id=""><span class="glyphicon glyphicon-eye-open"></span> View Category</a>
                <a href="<?=BASE_URL?>admin/forum/add" class="btn btn-warning btn-sm" id=""><span class="glyphicon glyphicon-plus-sign"></span> Add Category</a>
            </div>
            </div>
              
            <div class="box-body">
              <form class="form-horizontal" role="form" enctype = 'multipart/form-data' method="post" action="<?=BASE_URL?>admin/forum/updatecategory">       
                  <input type="hidden" name="id" value="<?=$category->id?>">
                <div class="form-group">
                    <div class="col-sm-2 col-sm-offset-1"><label class="control-label" for="name">Category Name</label></div>
                  <div class="col-sm-9">          
                      <input type="text" class="form-control" id="name" value="<?=$category->category?>" name="name" placeholder="Category Name">
                      <?php if(form_error('name')!='') echo form_error('name','<div class="text-danger err">','</div>'); ?>
                  </div>
                  <span class="text-danger" id="name_error"></span>

                </div>

                <div class="form-group">
                    <div class="col-sm-2 col-sm-offset-1"><label class="control-label" for="email">Status</label></div>
                  <div class="col-sm-9">
                      <select class="form-control" id="status" name="status">
                            <option value="1" <?php echo set_select('status', "1"); ?> <?php if($category->admin_status=='1'){echo "selected";} ?> >Active</option>
                            <option value="0" <?php echo set_select('status', '0'); ?> <?php if($category->admin_status=='0'){echo "selected";} ?> >Inactive</option>
                    </select>
                      <?php if(form_error('category')!='') echo form_error('category','<div class="text-danger err">','</div>'); ?>
                  </div>


                </div>
                        
                            
                <div class="form-group">        
                  <div class="col-sm-3">
                  </div>
                  <div class="col-sm-9">
                      <button type="submit" id="add_category" class="btn btn-primary pull-right">Update</button>
                  </div>
                </div>
                        
                        
                      </form>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              
            </div>
          </div>
          <!-- /.box -->

        </div>
        
    </div>    
</section>

<script>
    $(document).ready(function(){
        $("#add_category").click(function(){
            var name = $("#name").val().trim();
            if(name == ''){
                    //$("#name_error").html("Enter Your First Name");
                    $("#name").focus();
                    $("#name_error").parent().addClass("has-error");
                    return false;    
              }
              return true;
        });
    });
</script>