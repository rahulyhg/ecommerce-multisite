<style>
    .custom_form_control{width: auto !important; margin-left: 40px !important; margin-top: 14px !important;}
</style>
<?php //print_r($userdata); ?>
<div class="col-sm-9 col-lg-9 col-md-9 col-xs-12">
            <div class="">
                <div class="">
                    <div class="contant-head">
                         <h4> <span class="glyphicon glyphicon-th" aria-hidden="true"></span> Manage Profile</h4>
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
                            <div class="col-sm-12 col-md-12 col-lg-12 contant-profile-inner-edit">
                                <p class="row col-md-5 col-lg-5 col-sm-5">Edit Profile Picture</p>
                                <p class="row col-md-3 col-lg-3 col-sm-3"><a href="javascript:void(0);" class="edit_profile_pic profile_pencil"><span class="glyphicon glyphicon-pencil"></span></a></p>
                            </div>
                           <div class="col-sm-12 col-md-12 col-lg-12 contant-profile-inner-edit">
                                <p class="row col-md-5 col-lg-5 col-sm-5">Edit Basic Information</p>
                                <p class="row col-md-3 col-lg-3 col-sm-3"><a href="<?=BASE_URL?>profile/edit/<?=$this->session->userdata("user_id")?>" class="edit_business_info profile_pencil" ><span class="glyphicon glyphicon-pencil"></span></a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                <div class="contant-body1">
                <div class="col-sm-12 col-xs-12">

                <div id="wizard">
			<ol>
				<li id="basic_head">Basic Information</li>
                                <li id="theme_head" class="active" aria-selected="true">Select Theme</li>
                                <li id="store_head" onclick="return wizardnextdisable('theme_head');">Store Information</li>
                                <li id="social_head">Social Media</li>

			</ol>
			<div>
				<?php if($res){
                                         //print_r($res);exit;
                                    ?>

                                            <div class="table-responsive">
                                                <table class="table cus-table">

                                                      <tr>
                                                        <td class="profile_heading">Account Type</td>
                                                        <td>:</td>
                                                        <td>Seller</td>
                                                      </tr>

                                                      <tr>
                                                        <td class="profile_heading">Subscription</td>
                                                        <td>:</td>
                                                        <td><?php if($userdata->paid){echo "Premium User";}else{echo "Free User";} ?></td>
                                                      </tr>

                                                      <tr>
                                                        <td class="profile_heading">Username</td>
                                                        <td>:</td>
                                                        <td><?=$userdata->username?></td>
                                                      </tr>

                                                      <tr>
                                                        <td class="profile_heading">First Name</td>
                                                        <td>:</td>
                                                        <td><?=$userdata->f_name?></td>
                                                      </tr>

                                                      <tr>
                                                        <td class="profile_heading">Last Name</td>
                                                        <td>:</td>
                                                        <td><?=$userdata->l_name?></td>
                                                      </tr>

                                                      <tr>
                                                        <td class="profile_heading">Mobile</td>
                                                        <td>:</td>
                                                        <td><?=$userdata->mobile_no?></td>
                                                      </tr>

                                                      <tr>
                                                        <td class="profile_heading">Email</td>
                                                        <td>:</td>
                                                        <td><?=$userdata->email_id?></td>
                                                      </tr>

                                                      <tr>
                                                        <td class="profile_heading">Address</td>
                                                        <td>:</td>
                                                        <td><?=$userdata->address1?></td>
                                                      </tr>

                                                      <tr>
                                                        <td class="profile_heading">State</td>
                                                        <td>:</td>
                                                        <td><?=$userdata->state?></td>
                                                      </tr>

                                                </table>
                                            </div>

                                <?php } ?>
			</div>

                        <div id="theme" class="bwizard-activated" aria-hidden="false">
                            <div class="col-sm-12">
                                <span class="text-denger theme_head_error" id=""></span>
                            <div class="col-sm-6">
                                <img src="<?=BASE_URL?>edit_assets/image/theme1/01.png"  id="1001" class="img img-responsive theme">
                            </div>

                            <div class="col-sm-6">
                                <img src="<?=BASE_URL?>edit_assets/image/theme2/01.png"  id="1002" class="img img-responsive theme">
                            </div>
                            </div>

                            <input type="hidden" id="selectedtheme" value="0">
                        </div>


			<div>

                            <form class="form-horizontal" role="form" enctype = 'multipart/form-data' method="post" action="<?=BASE_URL?>profile/storeinfo">
                                   <?php //print_r($storedata);
                        $farmertype=0;
                        if($businesstype['res']){ foreach($businesstype['rows'] as $businesstype2){
                            if(strtolower($businesstype2->category)=='farmers'){
                                $farmertype=1;
                                $farmerid=$businesstype2->id;
                            }
                        }} ?>
                                <div class="form-group">
                                    <input type="hidden" id="themeid" name="themeid" value="<?=set_value('themeid')?>">
                                <input type="hidden" value="<?php echo $farmertype; ?>" name="farmertype" id="farmertype">
                                </div>
                                <div class="form-group">
                                        <label class="control-label col-sm-3" for="name">Business Type</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="business_type" multiple="multiple" name="business_type[]">
                                            <?php if($businesstype['res']){ foreach($businesstype['rows'] as $businesstype1){ ?>
                                                <option value="<?=$businesstype1->id?>" <?php echo set_select('business_type', "$businesstype1->id"); ?>><?=ucfirst($businesstype1->business_type_name)?></option>
                                            <?php }} ?>
                                            </select>
                                            <?php if(form_error('business_type[]')!='') echo form_error('business_type[]','<div class="text-danger err">','</div>'); ?>
                                        </div>
                                        <span class="text-danger" id="business_type_error"></span>

                                </div>



                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="name">Business Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="business-name" value="<?=set_value('business-name')?>" name="business-name" placeholder="Business Name">
                                            <?php if(form_error('business-name')!='') echo form_error('business-name','<div class="text-danger err">','</div>'); ?>
                                        </div>
                                        <span class="text-danger" id="business-name_error"></span>

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="contact-person">Contact Person Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="contact-person" value="<?=set_value('contact-person')?>" name="contact-person" placeholder="Contact Person Name">
                                            <?php if(form_error('contact-person')!='') echo form_error('contact-person','<div class="text-danger err">','</div>'); ?>
                                        </div>
                                        <span class="text-danger" id="contact-person_error"></span>

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="address">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="phone" value="<?=set_value('phone')?>" name="phone" placeholder="Phone" onkeyup="checknumber(this.id,this.value)">
                                            <?php if(form_error('phone')!='') echo form_error('phone','<div class="text-danger err">','</div>'); ?>
                                            <span class="text-danger" id="phone_error_num"></span>
                                        </div>
                                        <span class="text-danger" id="phone_error"></span>

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="address">Address</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="address" placeholder="Address" id="address"><?=set_value('address')?></textarea>
                                            <?php if(form_error('address')!='') echo form_error('address','<div class="text-danger err">','</div>'); ?>
                                        </div>
                                        <span class="text-danger" id="address_error"></span>

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="address">City</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="city" value="<?=set_value('city')?>" name="city" placeholder="City" >
                                            <?php if(form_error('city')!='') echo form_error('city','<div class="text-danger err">','</div>'); ?>
                                            <span class="text-danger" id="city_error_num"></span>
                                        </div>
                                        <span class="text-danger" id="city_error"></span>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="address">Zip Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="zip" value="<?=set_value('zip')?>" name="zip" placeholder="Zip Code" onkeyup="checknumber(this.id,this.value)">
                                            <?php if(form_error('zip')!='') echo form_error('zip','<div class="text-danger err">','</div>'); ?>
                                            <span class="text-danger" id="zip_error_num"></span>
                                        </div>
                                        <span class="text-danger" id="zip_error"></span>
                                    </div>

                                    <div class="form-group" id="farmer_income_head" style="display:none;">
                                        <label class="control-label col-sm-3" for="address">Farm Income</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">$</span>
                                                <input type="text" class="form-control" id="income" value="<?=set_value('income')?>" name="income" placeholder="Gross Cash Farm Income" onkeyup="checknumber(this.id,this.value)">
                                            </div>

                                            <?php if(form_error('income')!='') echo form_error('income','<div class="text-danger err">','</div>'); ?>
                                            <span class="text-danger" id="income_error_num"></span>
                                        </div>
                                        <span class="text-danger" id="income_error"></span>
                                    </div>

                                    <!-- Start code for payment-->

                                    <!-- <div class="form-group">
                                        <label class="control-label col-sm-3" for="address">Account Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="acno" value="<?php /*set_value('acno')?>" name="acno" placeholder="Account Number" onkeyup="checknumber(this.id,this.value)">
                                            <?php if(form_error('acno')!='') echo form_error('acno','<div class="text-danger err">','</div>'); ?>
                                            <span class="text-danger" id="acno_error_num"></span>
                                        </div>
                                        <span class="text-danger" id="acno_error"></span>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="address">Routing Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="routno" value="<?=set_value('routno')?>" name="routno" placeholder="Routing Number" onkeyup="checknumber(this.id,this.value)">
                                            <?php if(form_error('routno')!='') echo form_error('routno','<div class="text-danger err">','</div>'); */ ?>
                                            <span class="text-danger" id="routno_error_num"></span>
                                        </div>
                                        <span class="text-danger" id="routno_error"></span>
                                    </div> -->

                                    <!-- End code for payment-->

                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="certification">Certification</label>

                                        <div class="col-sm-9">
                                            <div class="row col-sm-12 certification_question">
                                            <small>Do you hold any current industry certifications?</small>
                                            </div>
                                            <div class="row col-sm-6">
                                                <div class="row col-sm-6">
                                                <input type="radio" class="custom_form_control" value="1" name="certification">
                                                </div>
                                                <div class="row col-sm-6 radio-tex">
                                                Yes
                                                </div>
                                            </div>
                                            <div class="row col-sm-6">
                                            <div class="row col-sm-6">
                                                <input type="radio" class="custom_form_control" value="0" name="certification" checked="">
                                                </div>
                                                <div class="row col-sm-6 radio-tex">
                                                No
                                                </div>
                                            </div>
                                                <?php if(form_error('phone')!='') echo form_error('certification','<div class="text-danger err">','</div>'); ?>
                                        </div>
                                        <span class="text-danger" id="certification_error"></span>

                                    </div>

                                    <!--<div class="form-group" id="certification">
                                        <label class="control-label col-sm-3" for="address">Your Certification</label>
                                        <div class="col-sm-9">
                                            <div class="row col-sm-11">
                                            <input type="text" class="form-control" value="<?=set_value('certification')?>" name="certification[]" placeholder="Your Certification">
                                            </div>
                                            <div class="col-sm-1"> <a href="javascript:void(0);" id="add_more_certification" title="Add More"> <span class="glyphicon glyphicon-plus-sign add_more"></span></a></div>
                                            <?php if(form_error('certification')!='') echo form_error('certification','<div class="text-danger err">','</div>'); ?>
                                        </div>
                                        <span class="text-danger" id="phone_error"></span>
                                    </div>-->


                                    <div class="form-group">
                                        <div class="col-sm-offset-9 col-sm-3">
                                            <button type="submit" id="store-info" class="btn btn-success btn-block">Submit</button>
                                        </div>
                                    </div>

                            </form>

			</div>

			<div>
                            <form class="form-horizontal" role="form" enctype = 'multipart/form-data' method="post" action="<?=BASE_URL?>profile/addsocial">
                               <div class="text-danger error-msg"></div>
                       <input type="hidden" value="<?php if($socialdata['res']){ echo count($socialdata['rows']); }else{echo '1';} ?>" id="no_of_social">
                                <div id="main-social">
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
                                              <!--<option value="other"> Other </option>-->
                                          </select>
                                            <?php if(form_error('social-media')!='') echo form_error('social-media','<div class="text-danger err">','</div>'); ?>
                                        </div>
                                        <span class="text-danger" id="category_error"></span>

                                    </div>

                                    <div class="form-group">
                                    <div class="col-sm-8 pull-right link" id="link_0">
                                        <div class="input-group">
                                            <span class="input-group-addon social-link" id="social-link_0"><?php  if($socialdata['res']){ echo $socialdata['rows'][0]->url; }else{ echo "www.example.com/"; } ?></span>
                                            <input type="text" class="form-control user-link" value="<?php if($socialdata['res']){ echo $socialdata['rows'][0]->link; }?>" name="link[]" id="user-link">
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
                                              <!--<option value="other"> Other </option>-->
                                          </select>
                                            <?php if(form_error('social-media')!='') echo form_error('social-media','<div class="text-danger err">','</div>'); ?>
                                        </div>
                                        <span class="text-danger" id="category_error"></span>

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
                                        <div class="col-sm-offset-4 col-sm-8">
                                            <div class="col-sm-3">
                                                <a href="javascript:void(0);" type="submit" id="add_more" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> Add More</a>
                                            </div>

                                            <div class="col-sm-3">
                                                <a href="javascript:void(0);" type="submit" id="remove" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-minus-sign"></span> Remove </a>
                                            </div>

                                            <div class="col-sm-6">
                                            <button type="submit" id="add-social" class="btn btn-success pull-right">Submit</button>
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
                       //$(".next").addClass("disabled");
                       //$(".next").attr("aria-disabled",true);
                       $(".next").hide();
               <?php } ?>
//                   $(".next").click(function(){
//                       var theme = $("#themeid").val().trim();
//                       alert(theme);
//                       if(theme==''){
//                            $("#theam_head").click();
//                            $(".theam_head_error").html("Please Select Theme");
//                            $(".theam_head_error").css({"color":"#D10404"})
//                             return false;
//                        }
//                   });
    //$(".next").hide();
    //$(".previous").hide();
           });

           $(document).ready(function(){
              var themeid=$("#themeid").val();
              //alert(thid);
              if(themeid!=""){
                  $(".theme").css({"border":"none","box-shadow":"none"});
                  $("#"+themeid).css({"border": "1px solid rgb(255, 24, 24)","box-shadow":"0px 0px 16px 0px rgb(219, 11, 11)"});
                  $("#themeid").val(themeid);
                  $(".next").show();
                  $("#store_head").trigger("click");
              }
           });
           function wizardnextdisable(previous){

                var theme = $("#themeid").val().trim();
                        if(theme==''){
                            $("#"+previous).click();
                            //alert(previous);
                            $("."+previous+"_error").html("Please Select Theme");
                            $("."+previous+"_error").css({"color":"#D10404"})
                             return false;
                        }

           }
	</script>

<script>
    $(document).ready(function(){
        $("#store-info").click(function(){
            var theme = $("#themeid").val().trim();
            var business_type=$("#business_type").val();
            var business_name = $("#business-name").val().trim();
            var contact_person = $("#contact-person").val().trim();
            var phone = $("#phone").val().trim();
            var address = $("#address").val().trim();
            var zip = $("#zip").val().trim();
            var acno=$("#acno").val().trim();
            var routno=$("#routno").val().trim();
            //alert(theme);

            if(theme==''){
                $("#theme_head").click();
                $(".theme_head_error").html("Please Select Theme");
                  return false;
            }
            //alert(business_type); return false;
            if(business_type == null){
                  //$("#fname_error").html("Enter Your First Name");
                  $(".multiselect").focus();
                  $(".multiselect").css({"border":"1px solid #9A3E3C"});
                  $("#business_type_error").parent().addClass("has-error");
                  return false;
            }

            if(business_name == ''){
                  //$("#fname_error").html("Enter Your First Name");
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
                  $("#phone").focus();
                  $("#phone_error").parent().addClass("has-error");
                  return false;
            }

            if(address == ''){
                  //$("#name_error").html("Enter Your First Name");
                  $("#address").focus();
                  $("#address_error").parent().addClass("has-error");
                  return false;
            }
            //alert(zip);
            if(zip == ''){
                  //$("#name_error").html("Enter Your First Name");
                  $("#zip").focus();
                  $("#zip_error").parent().addClass("has-error");
                  return false;
            }

            if(acno == ''){
                  //$("#name_error").html("Enter Your First Name");
                  $("#acno").focus();
                  $("#acno_error").parent().addClass("has-error");
                  return false;
            }

            if(routno == ''){
                  //$("#name_error").html("Enter Your First Name");
                  $("#routno").focus();
                  $("#routno_error").parent().addClass("has-error");
                  return false;
            }

            return true;
        });

        $(".multiselect").click(function(){
            $(".multiselect").css({"border":"1px solid #ADADAD"});
            $("#business_type_error").parent().removeClass("has-error");
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
            var themeid=$(this).attr("id");
            $(".theme").css({"border":"none","box-shadow":"none"});
            $("#"+themeid).css({"border": "1px solid rgb(255, 24, 24)","box-shadow":"0px 0px 16px 0px rgb(219, 11, 11)"});
            $("#themeid").val(themeid);
            $(".next").show();
        });
        /*$("#add_more_certification").click(function(){
            var content="";
            content+="<div class='form-group'>";
            content+="<label class='control-label col-sm-3 sr-only' for='address'>Your Certification</label>";
            content+="<div class='col-sm-9'>";
            content+="<div class='row col-sm-11'><input type='text' class='form-control' name='certification[]' placeholder='Your Certification'></div>";
            content+="<div class='col-sm-1'><a href='javascript:void(0);' title='Remove'><span class='glyphicon glyphicon-minus-sign remove remove_certification'></span></a></div>";
            content+="</div></div>";
            $(content).insertAfter("#certification");
        });

        $(document).on("click",".remove_certification",function(){
            $(this).closest(".form-group").remove();
        });*/

        $('.dropdown.keep-open').on({
            "shown.bs.dropdown": function() { this.closable = false; },
            "click":             function() { this.closable = true; },
            "hide.bs.dropdown":  function() { return this.closable; }
        });


        $(".edit_profile_pic").click(function(){
            $("#profile_pic").click();
        });

        $("#profile_pic").change(function(){
            $("#profile_pic_form").submit();
        });

      });

      function checknumber(id,value){
        if(value!=''){
        if(!$.isNumeric( value )){
            $("#"+id+"_error_num").html("Enter Only Numeric Value");
            $("#"+id).focus();
            $("#"+id+"_error").parent().addClass("has-error");
            //return false;
        }}else{
            $("#"+id+"_error_num").html("");
            $("#"+id).focus();
            $("#"+id+"_error").parent().removeClass("has-error");
        }
    }
    $('#contact-person').bind('keyup blur',function(){
    var node = $(this);
    node.val(node.val().replace(/[^a-zA-Z]/g,'') ); }
    );
</script>
