
<script data-require="jquery@*" data-semver="2.0.3" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
<script data-require="bootstrap@*" data-semver="3.1.1" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link data-require="bootstrap-css@3.1.1" data-semver="3.1.1" rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />

<div class="row">
 <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
<div class="col-sm-12">
    
            
    <div class="contant-head1 gredient_forum">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 clearfix">
        <h4> <span class="glyphicon glyphicon-th" aria-hidden="true"></span>  Manage Mail </h4> <h5 class="margin_top_28"> > Create mail </h5>
        <!--<span class="add-button">
        <div class="input-group">
         <input type="text" autocomplete="off" class="form-control" name="forum_topic_search" placeholder="search category" id="searchbycategoryname">
         <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
        </div>
        </span>-->
    </div>
    </div>
    
    <div class="contant-body1">
    <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="cus_mail_panel_heading">
                <a href="javascript:void(0);" class="btn btn-success btn-sm" id="attach_btn" ><i class="fa fa-fw fa-paperclip"></i> Attach</a>        
                <a href="<?=BASE_URL?>mail" class="btn btn-success btn-sm">Inbox</a>&nbsp;
                <a href="<?=BASE_URL?>mail/createnew" class="btn btn-success btn-sm">Create New</a>&nbsp;
                <a href="<?=BASE_URL?>mail/send" class="btn btn-success btn-sm">Send Mail</a>&nbsp;
                <a href="<?=BASE_URL?>mail/trash" class="btn btn-success btn-sm">Trash Mail</a>
                
                    </div>
                    
                    <div class="panel-body">
                        <form action="<?=BASE_URL?>mail/createnew" name="form" method="post"  class="form-horizontal" role="form" enctype = 'multipart/form-data' id="data_mail">
                            
                            <div class="form-group">
                                <div class="col-sm-12">          
                                    <div class="input-group" style="display: none;">
                                        <span class="input-group-btn">
                                            <span class="btn btn-success btn-file">
                                                Browse… <input multiple="" id="file" name="file[]" type="file">
                                            </span>
                                        </span>
                                        <input class="form-control" id="image" readonly="" type="text" placeholder="Click on Browse and select images">
<input type="hidden" id="id_user" value="<?php echo $_SESSION['user_id'];?>" name="">
                                    </div>
                                  <span class="text-danger" id="image1_error" style="display: none;" > </span>
                                  </div>
                                <div class="col-sm-12" id="attach_file_list">
                                    <?php if($read_dir['status']){ ?>
                                        <div class="row col-sm-12 col-lg-12 col-md-12"><a href="#attachfolderdelete" title="delete_attachments" data-traget="#attachfolderdelete" data-toggle="modal" class="btn btn-danger btn-sm delete_attach_folder">Delete all Attachment</a></div>
                                        <br/>
                                        
                                    <?php foreach($read_dir['files'] as $file){ ?>
                                        <div class="row col-sm-12 col-lg-12 col-md-12 margin-bottom_10">
                                        <div class="col-sm-8 col-lg-8 col-md-8"><?=$file."<br/>"?></div>
                                        <div class="col-sm-4 col-lg-4 col-md-4"><a href="#attachfiledelete" id="<?=$file?>" title="delete_attach" data-traget="#attachfiledelete" data-toggle="modal" class="btn btn-danger btn-sm delete_attach">Delete</a></div>
                                        </div>
                                    <?php } } ?>
                                         
                                </div>
                                <!--<img src='' id="imgggggg" />-->
                            </div>
                            
                            <div class="form-group">

                              <div class="col-sm-12">     
                                  <!--<input type="text" id="to_id" class="form-control">-->
                                  <input type="text" class="form-control" id="to" value="<?=set_value('to')?>" name="to" placeholder="To:User1,User2" autocomplete="off">
                                  <div class="autosearchuser" id="autosearchuser">
                                      <ul class="userlist" id="userlist">
                                          
                                      </ul>
                                  </div>  
                                  
                                  <?php if(form_error('to')!='') echo form_error('to','<div class="text-danger err">','</div>'); ?>
                                  <span class="text-danger" id="to1_error"></span>
                              </div>
                              <span class="text-danger" id="to_error"></span>

                            </div>
                            
                            <div class="form-group">

                              <div class="col-sm-12">          
                                  <input type="text" class="form-control" id="subject" value="<?=set_value('subject')?>" name="subject" placeholder="Subject">
                                  <?php if(form_error('subject')!='') echo form_error('subject','<div class="text-danger err">','</div>'); ?>
                                  <span class="text-danger" id="subject1_error"></span>
                              </div>
                              <span class="text-danger" id="subject_error"></span>

                            </div>    

                            <div class="form-group">
                              <div class="col-sm-12">          
                                  <textarea class="form-control textarea" id="message" name="message" placeholder=""><?=set_value('message')?></textarea>
                                  <?php if(form_error('message')!='') echo form_error('message','<div class="text-danger err">','</div>'); ?>
                                  <span class="text-danger" id="message1_error"></span>
                              </div>
                              <span class="text-danger" id="message_error"></span>

                            </div> 

                                <div class="form-group">        
                                    <div class="col-sm-offset-10 col-sm-2">
                                        <button type="submit" id="addnewtopic" class="btn btn-success btn-block">Send</button>
                                    </div>
                                  </div>
                        </form>
                        
                        
                        
                        
                    </div>
                    <div class="cus_mail_panel_footer"></div>
                </div>
            </div>
    
    </div>
     </div>
               
        </div>
        
        
    </div>
</div> 



<!-- Modal -->
<div id="attachfiledelete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete</h4>
      </div>
      <div class="modal-body">
          <input type="hidden" name="delete_attach_file" id="delete_attach_file">
          <h4 id="deletemsg"></h4>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-success confirm" id="cnf2delete">Confirm</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!-- Modal -->
<div id="attachfolderdelete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete</h4>
      </div>
      <div class="modal-body">
          
          <h4 id="deletefoldermsg"></h4>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-success confirm" id="cnf2deletefolder">Confirm</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: [],
    toolbar: "undo redo  | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent"
});
</script>

<script>
    var fileattached1=0;
    $(document).ready(function(){
        
        var to;
        var to1;
        $(document).on("keyup","#to",function(){
            to = $(this).val().split(",");
            
            if(to.length>1){
                to1=to[to.length-1];
            }else{
                to1= to[0];
            }
    
            var htm="";
            if(to!=''){
            $.post("<?=BASE_URL?>mail/username",{to:to1},function(data,status){
                console.log(data);
               var obj=$.parseJSON(data);
               if(obj.res){
                   $.each(obj.rows,function(key,val){
                       htm+="<li class='username' id='"+val.id+"'>"+val.username+"</li>";
                   });
                   
                    $(".autosearchuser").slideDown(300);
                    $("#userlist").html(htm);
               }else{
                   htm+="<li>User not found.</li>";
                    $(".autosearchuser").slideDown(1000);
                    $("#userlist").html(htm);
               }
            });
        }else{
                    $(".autosearchuser").slideUp();
        }
        
        });
        
        
        
        $(document).on("click",".username",function(){
            //var id=$(this).prop("id");
            var user=$(this).html();
            to.pop();
            to.push(user);
            //$("#to_id").val(id);
            $("#to").val(to.toString());
            $("#to").focus();
            $(".autosearchuser").slideUp();
        });
        
        
        $("#to").focusout(function(){
            $(".autosearchuser").slideUp();
        });
             
    });
    
    
    
    $(document).on("click","#attach_btn",function(){
        $("#file").click();
    });
    
    
    
    var no_of_file=0;
    $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
        
      });

      $(document).ready( function() {
          $('.btn-file :file').on('fileselect', function(event, numFiles, label) {

              var input = $(this).parents('.input-group').find(':text'),
                  log = numFiles > 1 ? numFiles + ' files selected' : label;

              if( input.length ) {
                  input.val(log);
              } else {
                  if( log ) alert(log);
              }

          });
      });
      
      $(document).on('change','#file',function(e){
          var files = e.target.files;
          var attachfile='';
          var fileattached=0;
          var user_id=$("#id_user").val();
         var attachfile123='';
            var formData = new FormData();
            for(var i=0; i < files.length; i++) {
                    var f = files[i];
                    var file_size = f.size;
                    var file_name = f.name;

                    var checked = 0;                  
                    if(file_size>1024000) {
                        $("#image1_error").css({display:'block'});
                        $("#image1_error").html(file_name+" "+"File size is greater than 1MB.");
                        //$("#image_error").parent().addClass("has-error");
                        //return false;
                        fileattached1++;
                        checked++;
                    }
                       var attachhead='<div class="col-sm-12 col-lg-12 col-md-12"><a href="#attachfolderdelete" title="delete_attachments" data-traget="#attachfolderdelete" data-toggle="modal" class="btn btn-danger btn-sm delete_attach_folder">Delete all Attachment</a></div>';
                    if(fileattached1 == 0){
                     
                        //$( "#attach_file_list" ).prepend( attachhead );
                        $( attachhead ).insertBefore( "#attach_file_list" );
                    }
                    
                    if(checked==0){
                        fileattached++;
                        fileattached1++;
                        // attachfile+='<div class="row col-sm-12 col-lg-12 col-md-12 margin-bottom_10 insertfile">'
                        // attachfile+='<div class="col-sm-8 col-lg-8 col-md-8">'+file_name+'</div>';
                        // attachfile+='<div class="col-sm-4 col-lg-4 col-md-4"><a href="#attachfiledelete" id="'+file_name+'" title="delete_attach" data-traget="#attachfiledelete" data-toggle="modal" class="btn btn-danger btn-sm delete_attach">Delete</a></div>';
                        // attachfile+='</div>';
                        
                        //$("#attach_file_list").append(attachfile);
                        formData.append(i,f);
                    }
            }
            
            
            
                $.ajax({
                        url: '<?=BASE_URL?>mail/attach',
                        type: 'POST',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        async: false,
                        success: function (result) {
                            console.log(result);
                             obj=$.parseJSON(result);                
                             if(obj.status){           
                              result=obj.result;
                              attachfile123+='<div class="row col-sm-12 col-lg-12 col-md-12 margin-bottom_10 insertfile">'
                        attachfile123+='<div class="col-sm-8 col-lg-8 col-md-8">'+result+'</div>';
                        attachfile123+='<div class="col-sm-4 col-lg-4 col-md-4"><a href="#attachfiledelete" id="'+result+'" title="delete_attach" data-traget="#attachfiledelete" data-toggle="modal" class="btn btn-danger btn-sm delete_attach">Delete</a></div>';
                        attachfile123+='</div>';
                                $("#attach_file_list").append(attachfile123);
                                }
                              }
                    });
     });
     
     
     
     $(document).ready(function(){
     
        $(document).on("click",".delete_attach",function(){
           var filename=$(this).attr("id");
           //alert(filename);
           $("#delete_attach_file").val(filename);
           $("#deletemsg").html("Do you want to delete this file?");
        });
        
        $(document).on("click","#cnf2delete",function(){
            var filename=$("#delete_attach_file").val();
            $.post("<?=BASE_URL?>mail/delete_attach_file",{filename:filename},function(data,status){
                var obj= $.parseJSON(data);
                if(obj.status){
                        $("#deletemsg").empty().append(obj.message).addClass("alert alert-success fade in");
                            setTimeout(function(){
                                window.location.reload();
                            }, 1000); 
                    }
            });
        });
        
        
        
        $(document).on("click",".delete_attach_folder",function(){
           $("#deletefoldermsg").html("Do you want to delete all attachments?");
        });
        
        $(document).on("click","#cnf2deletefolder",function(){
            //var filename=$("#delete_attach_file").val();
            $.post("<?=BASE_URL?>mail/delete_attach_folder",function(data,status){
                var obj= $.parseJSON(data);
                if(obj.status){
                        $("#deletefoldermsg").empty().append(obj.message).addClass("alert alert-success fade in");
                            setTimeout(function(){
                                window.location.reload();
                            }, 1000); 
                    }
            });
        });

     });
     $(document).on("click","#addnewtopic",function(){
    
        var to=$('#to').val();
        var subject=$('#subject').val();
        var message=$('#message').val();
      
       
       if(subject==''){
        $('#confirm-delete').modal('show');
          return false;
         
        }
      
     });
     $(document).on("click","#yes_form",function(){
       
              $('#data_mail').submit();
          });

      $(document).on("click",".delete_attach_folder",function(){
        var name=$('#to').val();
        

      });

</script>

