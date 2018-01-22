<style>
    .custom_form_control{width: auto !important; margin-left: 40px !important; margin-top: 13px !important;}
    .well{
        padding-bottom:0px;
    }
</style>
<?php //print_r($userdata);?>
<div class="col-sm-9 col-lg-9 col-md-9 col-xs-12">
            <div class="">
                <div class="">
                    <div class="contant-head">
                        <h4> <span class="glyphicon glyphicon-th" aria-hidden="true"></span> <a href="<?=BASE_URL?>profile"> Manage Profile </a> </h4><h5> > Edit </h5>
                    </div>
                </div>
            </div>
            <div class="">
                
                <div class="col-sm-12">
                    <div class="contant-head2">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <div class="img-responsive profile_img"> 
                                   <img src="<?=BASE_URL?>assets/image/user/thumb/<?=$userdata->profile_Pic?>" class="img-responsive"> 
                            </div>
                            
                            <form id="profile_pic_form" method="post" enctype = 'multipart/form-data' style="display: none;" action="<?=BASE_URL?>profile/updateprofilepic">
                                <input type="file" id="profile_pic" name="file">
                            </form> 
                        </div>

                        <div class="col-sm-9 col-md-9 col-lg-9">
                            <div class="col-sm-12 col-md-12 col-lg-12 contant-profile-inner-head"><?=$this->session->userdata('user_name')?></div>
                            <!--<div class="col-sm-12 col-md-12 col-lg-12 contant-profile-inner-edit">
                                <p class="row col-md-5 col-lg-5 col-sm-5">Edit Profile Picture</p>
                                <p class="row col-md-3 col-lg-3 col-sm-3"><a href="javascript:void(0);" class="edit_profile_pic profile_pencil"><span class="glyphicon glyphicon-pencil"></span></a></p>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 contant-profile-inner-edit">
                                <p class="row col-md-5 col-lg-5 col-sm-5">Edit Business Information</p>
                                <p class="row col-md-3 col-lg-3 col-sm-3"><a href="<?=BASE_URL?>profile/edit/<?=$this->session->userdata("user_id")?>" class="edit_business_info profile_pencil" ><span class="glyphicon glyphicon-pencil"></span></a></p>
                            </div>-->
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-12">
                <div class="contant-body1">
                <div class="col-sm-12 col-xs-12">
                    
                <form class="form-horizontal" id="store_form" role="form" enctype = 'multipart/form-data' method="post" action="<?=BASE_URL?>profile/update">
                <div id="wizard">
			<ol>
                            <li id="basic-info2">Basic Information</li>
                            <?php if($userdata->store_info){ ?>
                            <li id="business-info1">Selected Theme</li>
                            <li id="business-info1">Store Information</li>
                            <li id="social-info1">Social Media</li>
                            <?php } ?>
				
			</ol>
                    <div> 
                            <div class="form-group">
                             <label class="control-label col-sm-3" for="name">First Name</label>
                             <div class="col-sm-9">          
                                 <input type="text" class="form-control" id="f_name" value="<?=$userdata->f_name;?>" name="f_name" placeholder="First Name">
                                 <?php if(form_error('f_name')!='') echo form_error('f_name','<div class="text-danger err">','</div>'); ?>
                             </div>
                             <span class="text-danger" id="f_name_error"></span>

                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3" for="contact-person">Last Name</label>
                                <div class="col-sm-9">          
                                    <input type="text" class="form-control" id="l_name" value="<?=$userdata->l_name?>" name="l_name" placeholder="Last Name">
                                    <?php if(form_error('l_name')!='') echo form_error('l_name','<div class="text-danger err">','</div>'); ?>
                                </div>
                                <span class="text-danger" id="l_name_error"></span>

                            </div>

                           <div class="form-group">
                                <label class="control-label col-sm-3" for="mobile">Mobile</label>
                                <div class="col-sm-9">          
                                    <input type="text" class="form-control" id="mobile" value="<?=$userdata->mobile_no?>" name="mobile" placeholder="Mobile" onkeyup="checknumber(this.id,this.value)">
                                    <?php if(form_error('mobile')!='') echo form_error('mobile','<div class="text-danger err">','</div>'); ?>
                                </div>
                                <span class="text-danger" id="mobile_error"></span>

                            </div>
                        
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="contact-person">State</label>
                                <div class="col-sm-9">          
                                    <select class="form-control" id="state" name="state">
                                        <option value="">-------Select State-------</option>
                                        <?php if($states['res']){foreach($states['rows'] as $state){ ?>
                                        <option value="<?php echo $state->id;?>" <?php if($userdata->stateid==$state->id){echo "selected";}?> ><?php echo $state->state;?></option>
                                        <?php }} ?>
                                    </select>
                                    <?php if(form_error('state')!='') echo form_error('state','<div class="text-danger err">','</div>'); ?>
                                </div>
                                <span class="text-danger" id="state_error"></span>
                            </div>
                        
                            <div class="form-group">
                             <label class="control-label col-sm-3" for="address1">Address</label>
                             <div class="col-sm-9">          
                                 <textarea class="form-control" id="address1"  name="address1" placeholder="Address"><?=$userdata->address1?></textarea>
                                 <?php if(form_error('address1')!='') echo form_error('address1','<div class="text-danger err">','</div>'); ?>
                             </div>
                             <span class="text-danger" id="address1_error"></span>

                         </div>
                            <?php if(!$userdata->store_info){ ?>
<div class="form-group">
<input name="basic_info" value="1" type="hidden"/>

<div class=" col-sm-9 col-xs-6 col-md-4 col-lg-6 col-sm-offset-2 col-lg-offset-6 col-lg-offset-6">
    <button type="submit" id="basic-info" class="btn btn-success pull-right">Update</button>
</div>
</div>
        <?php }?>
                              
			</div>
                    <div>  
                         <?php //print_r($theme);
                            if($theme['res']){
                        ?>
                        <div class="col-sm-12"> 
                            <span class="text-denger theme_head_error" id=""></span> 
                            
                        <div class="col-sm-6">
                            <img src="<?=BASE_URL?>edit_assets/image/theme1/01.png"  id="1001"  <?php if($theme['rows'][0]->theam_id=='1001'){  ?> style="height:350px !important;margin-bottom:10px;border: 1px solid rgb(255, 24, 24);box-shadow: 0px 0px 16px 0px rgb(219, 11, 11);" <?php } ?> class="img img-responsive theme">
                        </div>
                            
                            
                        <div class="col-sm-6">
                            <img src="<?=BASE_URL?>edit_assets/image/theme2/01.png"  id="1002"  <?php if($theme['rows'][0]->theam_id=='1002'){  ?> style="height:350px !important;margin-bottom:10px;border: 1px solid rgb(255, 24, 24);box-shadow: 0px 0px 16px 0px rgb(219, 11, 11);"  <?php }?> class="img img-responsive theme"> 
                        </div>
                           
                        </div> 
                        <input type="hidden" id="themeid" name="themeid" value="<?=$theme['rows'][0]->theam_id?>">
                        <input type="hidden" id="themeid2" value="<?=$theme['rows'][0]->theam_id?>">
                            <?php } ?>
                    </div>
			<div >
			<?php //print_r($storedata);
                        $farmertype=0;
                        if($businesstype['res']){ foreach($businesstype['rows'] as $businesstype2){
                            if(strtolower($businesstype2->business_type_name)=='farmers'){
                                $farmertype=1;
                                $farmerid=$businesstype2->id;
                            }
                        }}
                            $storedata=$storedata["rows"][0];
                            $farmerinput=0;
                            if($userbusinesstype['res']){
                                foreach($userbusinesstype['rows'] as $ubt){ 
                                    if($farmerid==$ubt->id){ $farmerinput=1;}
                                    $userbusinesstype1[]=ucfirst($ubt->id);
                                }
                                //$userbusinesstype1=implode(',',$userbusinesstype1);
                            }
                        ?>
                            <div class="form-group">
                                <input type="hidden" value="<?php echo $farmertype; ?>" name="farmertype" id="farmertype">
                            </div>    
                            
                                    <div class="form-group">
                                       
                                        <label class="control-label col-sm-3" for="name">Business Type</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="business_type" multiple="multiple" name="business_type[]">
                                            <?php if($businesstype['res']){ foreach($businesstype['rows'] as $businesstype1){ ?>
                                                <option value="<?=$businesstype1->id?>" <?php if(in_array($businesstype1->id,$userbusinesstype1)){echo "selected";}?> ><?=ucfirst($businesstype1->business_type_name)?></option>
                                            <?php }} ?>
                                            </select>    
                                        </div>
                                        <span class="text-danger" id="business_type_error"></span>

                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="name">Business Name</label>
                                        <div class="col-sm-9">          
                                            <input type="text" class="form-control" id="business-name" value="<?=$storedata->business_name;?>" name="business-name" placeholder="Business Name">
                                            <?php if(form_error('business-name')!='') echo form_error('business-name','<div class="text-danger err">','</div>'); ?>
                                        </div>
                                        <span class="text-danger" id="business-name_error"></span>

                                    </div>
                                
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="contact-person">Contact Person Name</label>
                                        <div class="col-sm-9">          
                                            <input type="text" class="form-control" id="contact-person" value="<?=$storedata->contact_person_name?>" name="contact-person" placeholder="Contact Person Name">
                                            <?php if(form_error('contact-person')!='') echo form_error('contact-person','<div class="text-danger err">','</div>'); ?>
                                        </div>
                                        <span class="text-danger" id="contact-person_error"></span>

                                    </div>
                                
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="address">Phone</label>
                                        <div class="col-sm-9">          
                                            <input type="text" class="form-control" id="phone" value="<?=$storedata->phone?>" name="phone" placeholder="Phone" onkeyup="checknumber(this.id,this.value)" >
                                            <?php if(form_error('phone')!='') echo form_error('phone','<div class="text-danger err">','</div>'); ?>
                                        </div>
                                        <span class="text-danger" id="phone_error"></span>

                                    </div>
                                
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="address">Address</label>
                                        <div class="col-sm-9">          
                                            <textarea class="form-control" name="address" placeholder="Address" id="address"><?=$storedata->address?></textarea>
                                            <?php if(form_error('address')!='') echo form_error('address','<div class="text-danger err">','</div>'); ?>
                                        </div>
                                        <span class="text-danger" id="address_error"></span>

                                    </div>
                            
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="address">Zip Code</label>
                                        <div class="col-sm-9">          
                                            <input type="text" class="form-control" id="zip" value="<?=$storedata->zip?>" name="zip" placeholder="Zip Code" onkeyup="checknumber(this.id,this.value)">
                                            <?php if(form_error('zip')!='') echo form_error('zip','<div class="text-danger err">','</div>'); ?>
                                            <span class="text-danger" id="zip_error_num"></span>
                                        </div>
                                        <span class="text-danger" id="zip_error"></span>
                                    </div>
                            
                            
                            
                            <div class="form-group" <?php if($farmerinput){ ?> style="display:block;" <?php }else{ ?> style="display:none;" <?php } ?> id="farmer_income_head" >
                                        <label class="control-label col-sm-3" for="address">Farm Income</label>
                                        <div class="col-sm-9"> 
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                                <input type="text" class="form-control" id="income" value="<?=$storedata->income?>" name="income" placeholder="Gross Cash Farm Income" onkeyup="checknumber(this.id,this.value)" >
                                            </div>
                                            
                                            <?php if(form_error('income')!='') echo form_error('income','<div class="text-danger err">','</div>'); ?>
                                            <span class="text-danger" id="income_error_num"></span>
                                        </div>
                                        <span class="text-danger" id="income_error"></span>
                                    </div>
                            
                            
                            <!-- Start code for payment--> 
                                    
<!--                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="address">Account Number</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="text" class="form-control" disabled="" id="acno" value="<?=$storedata->acc_no?>" name="acno" placeholder="Account Number" onkeyup="checknumber(this.id,this.value)">
                                                <span class="input-group-btn">
                                                  <button class="btn btn-success" type="button"><span class="glyphicon glyphicon-pencil"></span></button>
                                                </span>
                                            </div>
                                            <?php if(form_error('acno')!='') echo form_error('acno','<div class="text-danger err">','</div>'); ?>
                                            <span class="text-danger" id="acno_error_num"></span>
                                        </div>
                                        <span class="text-danger" id="acno_error"></span>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="address">Routing Number</label>
                                        <div class="col-sm-9">          
                                            
                                            <div class="input-group">
                                                <input type="text" class="form-control" disabled="" id="routno" value="<?=$storedata->rout_no?>" name="routno" placeholder="Routing Number" onkeyup="checknumber(this.id,this.value)">
                                                <span class="input-group-btn">
                                                  <button class="btn btn-success" type="button"><span class="glyphicon glyphicon-pencil"></span></button>
                                                </span>
                                            </div>
                                            <?php if(form_error('routno')!='') echo form_error('routno','<div class="text-danger err">','</div>'); ?>
                                            <span class="text-danger" id="routno_error_num"></span>
                                        </div>
                                        <span class="text-danger" id="routno_error"></span>
                                    </div>-->
                                    
                                    <!-- End code for payment--> 
                                    
                                    
                                
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="certification">Certification</label>
                                        <div class="col-sm-9"> 
                                            <div class="row col-sm-12 certification_question">
                                            <small>Do you hold any current industry certifications?</small>
                                            </div>
                                            <div class="row col-sm-6">
                                                <div class="row col-sm-6">
                                                <input type="radio" class="custom_form_control" value="1" name="certification" <?php if($storedata->certification==1){echo "checked";} ?>>
                                                </div>
                                                <div class="row col-sm-6 radio-tex">
                                                Yes
                                                </div>
                                            </div>
                                            <div class="row col-sm-6">
                                            <div class="row col-sm-6">
                                                <input type="radio" class="custom_form_control" value="0" name="certification" <?php if($storedata->certification==0){echo "checked";} ?> >
                                                </div>
                                                <div class="row col-sm-6 radio-tex">
                                                No
                                                </div>
                                            </div>
                                                <?php if(form_error('phone')!='') echo form_error('certification','<div class="text-danger err">','</div>'); ?>
                                        </div>
                                        <span class="text-danger" id="certification_error"></span>

                                    </div>
                                    
                                
                                    <!--<div class="form-group">        
                                        <div class="col-sm-offset-9 col-sm-3">
                                            <button type="submit" id="store-info" class="btn btn-success btn-block">Submit</button>
                                        </div>
                                    </div>-->
                                
                           
                            
			</div>
                    <div>
                            
                        <div class="text-danger error-msg"></div>    
                        <input type="hidden" value="<?php if($socialdata['res']){ echo count($socialdata['rows']); }else{echo '1';} ?>" id="no_of_social">
                        <?php //print_r($socialdata);?>
                        
                        <div id="main-social" class="main-social">
                                     <div class="form-group">  
                                        <label class="control-label col-sm-3" for="email">Social Media</label>
                                        <div class="col-sm-9">
                                            <select class="form-control social-media" id="0" name="social-media[]">
                                              <option value="">----Select Social Media-----</option>
                                             <?php
                                                if($social['res']){
                                                    foreach($social['rows'] as $social1){

                                            ?>
                                              <option value="<?=$social1->id?>" <?php if($socialdata['res']){ if($socialdata['rows'][0]->social_id==$social1->id){echo "selected";} } ?> ><?=$social1->title?></option>
                                             <?php } } ?>     
                                              <!--<option value="other"> Other </option>>-->
                                          </select>
                                            <?php if(form_error('social-media')!='') echo form_error('social-media','<div class="text-danger err">','</div>'); ?>
                                        </div>
                                        <span class="text-danger" id="category_error"></span>

                                    </div>
                                
                                    <div class="form-group"> 
                                    <div class="col-sm-8 pull-right link" id="link_0">
                                        <div class="input-group">
                                            <span class="input-group-addon social-link" id="social-link_0"><?php if($socialdata['res']){ echo $socialdata['rows'][0]->url; }else{ echo "www.example.com/"; } ?></span>
                                            <input type="text" class="form-control user-link" value="<?php if($socialdata['res']){ echo $socialdata['rows'][0]->link; } ?>" name="link[]" id="user-link">
                                        </div>
                                    </div>   
                                    </div>
                                </div> 
                                <div id="other-social">
                                    <?php if($socialdata['res']){
                                        for($i=1;$i < count($socialdata['rows']);$i++){  
                                            
                                            
                                     ?>
                                    <div id="main-social_<?=$i?>" class="main-social">
                                     <div class="form-group">  
                                        <label class="control-label col-sm-3" for="email">Social Media</label>
                                        <div class="col-sm-9">
                                            <select class="form-control social-media" id="<?=$i?>" name="social-media[]">
                                              <option value="">----Select Social Media-----</option>
                                             <?php
                                                if($social['res']){
                                                    foreach($social['rows'] as $social2){
                                            ?>
                                              <option value="<?=$social2->id?>" <?php if($socialdata['rows'][$i]->social_id==$social2->id){echo "selected";} ?>><?=$social2->title?></option>
                                             <?php } } ?>     
                                              <!--<option value="other"> Other </option>>-->
                                          </select>
                                            <?php if(form_error('social-media')!='') echo form_error('social-media','<div class="text-danger err">','</div>'); ?>
                                        </div>
                                        <span class="text-danger" id="category_error"></span>
                                        <!--<div class="col-sm-1">
                                        <span class="glyphicon glyphicon-minus-sign"></span>
                                        </div>-->
                                    </div>
                                
                                    <div class="form-group"> 
                                    <div class="col-sm-8 pull-right link" id="link_<?=$i?>">
                                        <div class="input-group">
                                            <span class="input-group-addon social-link" id="social-link_<?=$i?>"><?php echo $socialdata['rows'][$i]->url; ?></span>
                                            <input type="text" class="form-control user-link" name="link[]" value="<?php echo $socialdata['rows'][$i]->link; ?>" id="user-link_<?=$i?>">
                                        </div>
                                    </div>   
                                    </div>
                                </div>
                                    <?php }} ?>    
                                    
                                </div>
                                
                                    <div class="form-group">        
                                        <div class="col-sm-offset-4 col-md-offset-4  col-lg-offset-4 col-sm-8 col-md-8 col-lg-8 col-xs-12">
                                            <div class="col-sm-2 col-xs-3 col-md-1 col-lg-1">
                                                <a href="javascript:void(0);" type="submit" title=" Add More" id="add_more" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-plus-sign"></span></a>
                                            </div>
                                            
                                            <div class="col-sm-2 col-xs-3 col-md-1 col-lg-1">
                                                <a href="javascript:void(0);" type="submit" title="Remove" id="remove" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-minus-sign"></span> </a>
                                            </div>
                                            
                                            <div class="col-sm-6 col-xs-6 col-md-4 col-lg-4 col-sm-offset-2 col-lg-offset-6 col-lg-offset-6">
                                            <button type="submit" id="store-info" class="btn btn-success pull-right">Update</button>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                            
			</div>
			
		</div>
                </form>    
                    
                
            </div>
            </div>
            </div>                                
                                            
        </div>
        </div>
    
    </div>
</div>    
<!-- 
class="bwizard-activated" aria-hidden="false"

class="active" aria-selected="true"
-->

<!-- Modal -->
  <div class="modal fade" id="theme_warning" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close resettheme">&times;</button> <!-- data-dismiss="modal" -->
          <h4 class="modal-title">Alert!</h4>
        </div>
        <div class="modal-body">
          <p>Warning: If you decide to choose a new theme, all of the custom information and data on your site will be lost.  Your custom site will be returned to default settings.  Are you sure you want to proceed with a new theme? If Yes click on "Ok" Otherwise click on "Cancel". </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success changetheme">Ok</button>
          <button type="button" class="btn btn-danger resettheme">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>

<script type="text/javascript">
            $(document).ready(function() {
                $('#business_type').multiselect();
            });
        </script>
        <script type="text/javascript">
	   $("#wizard").bwizard();
           
           $(document).ready(function(){
               <?php if(!$userdata->store_info){ ?>
                       $(".next").css('display','none');
                       $(".previous").css('display','none');
               <?php } ?>     
                   //$(".next").hide();
                    //$(".previous").hide();
           });
           
	</script>
        
<script>
    $(document).ready(function(){
        $("#store-info").click(function(){
            var f_name = $("#f_name").val().trim();
            var l_name = $("#l_name").val().trim();
            var business_name = $("#business-name").val().trim();
            var contact_person = $("#contact-person").val().trim();
            var phone = $("#phone").val().trim();
            var state=$("#state").val().trim();
            var address = $("#address").val().trim();
            
            if(f_name == ''){
                  //$("#fname_error").html("Enter Your First Name");
                  $("#basic-info2").click();
                  $("#f_name").focus();
                  $("#f_name_error").parent().addClass("has-error");  
                   return false;    
            }

            if(l_name == ''){
                  //$("#fname_error").html("Enter Your First Name");
                  $("#basic-info2").click();
                  $("#l_name").focus();
                  $("#l_name_error").parent().addClass("has-error");
                  return false;    
            }

            if(business_name == ''){
                  //$("#fname_error").html("Enter Your First Name");
                  $("#business-info1").click();
                  $("#business-name").focus();
                  $("#business-name_error").parent().addClass("has-error");
                  return false;    
            }

            if(contact_person == ''){
                  //$("#name_error").html("Enter Your First Name");
                  $("#contact-person").focus();
                  $("#contact-person_error").parent().addClass("has-error");
                  return false;    
            }

            if(phone == ''){
                  //$("#name_error").html("Enter Your First Name");
                  $("#business-info1").click();
                  $("#phone").focus();
                  $("#phone_error").parent().addClass("has-error");
                  return false;    
            }
            if(mobile == ''){
                  //$("#name_error").html("Enter Your First Name");
                  
                  
                  $("#mobile").focus();
                  $("#mobile_error").parent().addClass("has-error");
                  return false;    
            }
            if(mobile.length>10){
                $("#mobile").focus();
                $("#mobile_error").parent().addClass("has-error");
                return false; 
            }
            
            if(state==''){
                $("#state").focus();
                $("#state_error").parent().addClass("has-error");
                return false; 
            }

            if(address == ''){
                  //$("#name_error").html("Enter Your First Name");
                  $("#business-info1").click();
                  $("#address").focus();
                  $("#address_error").parent().addClass("has-error");
                  return false;    
            }

            return true;
        });
        
        $("#basic-info").click(function(){

            var f_name = $("#f_name").val().trim();
            var l_name = $("#l_name").val().trim();
            var mobile = $("#mobile").val().trim();
            var state=$("#state").val().trim();
            var address = $("#address1").val().trim();
            if(f_name == ''){
                  //$("#fname_error").html("Enter Your First Name");
                  
                  $("#basic-info2").click();
                  $("#f_name").focus();
                  $("#f_name_error").parent().addClass("has-error");  
                   return false;    
            }

            if(l_name == ''){
                  //$("#fname_error").html("Enter Your First Name");
                  
                  $("#basic-info2").click();
                  $("#l_name").focus();
                  $("#l_name_error").parent().addClass("has-error");
                  return false;    
            }
            if(mobile == ''){
                  //$("#name_error").html("Enter Your First Name");
                  
                  
                  $("#mobile").focus();
                  $("#mobile_error").parent().addClass("has-error");
                  return false;    
            }
            if(mobile.length>10){
                $("#mobile").focus();
                $("#mobile_error").parent().addClass("has-error");
                return false; 
            }
            if(state==''){
                
                $("#state").focus();
                $("#state_error").parent().addClass("has-error");
                return false; 
            }

            if(address == ''){
                  //$("#name_error").html("Enter Your First Name");
                  
                  $("#address").focus();
                  $("#address_error").parent().addClass("has-error");
                  return false;    
            }

            return true;
        });
        
        $(document).on('change','#business_type',function(){
            var farmertype=$("#farmertype").val();
            var businesstype=$(this).val();
            var res=$.inArray( farmertype, businesstype );
            if(res<0){
                $("#income").attr("disabled",true);
                $("#farmer_income_head").css({'display':'none'});
            }else{
                $("#income").attr("disabled",false);
                $("#farmer_income_head").css({'display':'block'});
            }
            //alert(businessarray[0]);  
        });
        
        
        $(document).on('change', '.social-media', function () {
            var id=$(this).val();
            var divid=$(this).attr("id");
            //alert(divid);
            if(id==''){$("#social-link_"+divid).html("www.example.com/");}
            else if(id=='other'){
                $("#link_"+divid).html("<input class='form-control' type='text' name='otherlink[]'>");
            }else{
                $.get("<?=BASE_URL?>profile/getsociallink/"+id,function(data,status){
                    //console.log(data);
                    var obj=$.parseJSON(data);
                    console.log(obj.sociallink.url);
                    if(obj.status){
                        $("#social-link_"+divid).html(obj.sociallink.url);
                    }    
                });
            }
        });
        
        /*$(".social-media").change(function(){
            var id=$(this).val();
            $.get("<?=BASE_URL?>profile/getsociallink/"+id,function(data,status){
                //console.log(data);
                var obj=$.parseJSON(data);
                console.log(obj.sociallink.url);
                if(obj.status){
                    $("#social-link").html(obj.sociallink.url);
                }    
            });
        });*/
        
        $("#add_more").click(function(){
            var no_of_social = $("#no_of_social").val();
            var data=$("#main-social").html();
            
            $("#other-social").append("<div id='main-social_"+no_of_social+"' class='main-social'>"+data+"</div>");
            $("#main-social_"+no_of_social).find(".social-media").attr("id",no_of_social);
            
            var myDDL = $('#'+no_of_social);
            myDDL[0].selectedIndex = 0;
            
            var a="link_"+no_of_social;
            $("#main-social_"+no_of_social).find(".link").attr("id",a);
            
            var aa="social-link_"+no_of_social;
            $("#main-social_"+no_of_social).find(".social-link").attr("id",aa);
            $("#"+aa).html("www.example.com/");
            
            var bb="user-link_"+no_of_social;
            $("#main-social_"+no_of_social).find(".user-link").attr("id",bb);
            $("#"+bb).val("");
            
            $("#no_of_social").val(++(no_of_social));
            
        });
        
        $("#remove").click(function(){
            var no_of_social = $("#no_of_social").val();
            if(no_of_social>1){
                $("#no_of_social").val(--(no_of_social));
                $("#main-social_"+no_of_social).remove();
            }else{
                $(".error-msg").html("You Can not Remove This Field");
            }
            
        });
        
        $(".theme").click(function(){
            var prevtheme=$("#themeid2").val();
            var themeid=$(this).attr("id"); 
            if(parseInt(prevtheme)!=parseInt(themeid)){ $("#theme_warning").modal("show");}
            $(".theme").css({"border":"none","box-shadow":"none"});
            $("#"+themeid).css({"border": "1px solid rgb(255, 24, 24)","box-shadow":"0px 0px 16px 0px rgb(219, 11, 11)"});
            $("#themeid").val(themeid);
            
        });
        
        $(".changetheme").click(function(){
            var selectedtheme=$("#themeid").val();
            //alert(selectedtheme);
            $("#themeid").val(selectedtheme);
            $("#theme_warning").modal("hide");
	    $("#store_form").submit();
        });
        
        $(".resettheme").click(function(){ 
            var prevtheme=$("#themeid2").val();
            $(".theme").css({"border":"none","box-shadow":"none"});
            $("#"+prevtheme).css({"border": "1px solid rgb(255, 24, 24)","box-shadow":"0px 0px 16px 0px rgb(219, 11, 11)"});
            $("#themeid").val(prevtheme);
            $("#theme_warning").modal("hide");
        });
        
      });
      
      
      function checknumber(id,value){
        if(value!=''){
            if(!$.isNumeric( value )){
                $("#"+id+"_error_num").html("Enter Only Numeric Value");
                $("#"+id).focus();
                $("#"+id+"_error").parent().addClass("has-error");
                
                //return false;
            }else if(value.length>10){
                $("#"+id+"_error_num").html("Enter Only 10 digits");
                $("#"+id).focus();
                $("#"+id+"_error").parent().addClass("has-error");
            }
            
        }else{
            $("#"+id+"_error_num").html("");
            $("#"+id).focus();
            $("#"+id+"_error").parent().removeClass("has-error");
        }
    }
    $('#f_name').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^a-zA-Z]/g,'') ); }
    );
    $('#l_name').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^a-zA-Z]/g,'') ); }
    );
    $('#contact-person').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^a-zA-Z]/g,'') ); }
    );
</script>        
