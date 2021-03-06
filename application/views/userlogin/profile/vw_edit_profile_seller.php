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
                <h4> <span class="glyphicon glyphicon-th" aria-hidden="true"></span> <a href="<?=BASE_URL?>profile"> Manage Profile </a> </h4>
                <h5> > Edit </h5>
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

                    <form id="profile_pic_form" method="post" enctype='multipart/form-data' style="display: none;" action="<?=BASE_URL?>profile/updateprofilepic">
                        <input type="file" id="profile_pic" name="file">
                    </form>
                </div>

                <div class="col-sm-9 col-md-9 col-lg-9">
                    <div class="col-sm-12 col-md-12 col-lg-12 contant-profile-inner-head">
                        <?=$this->session->userdata('user_name')?>
                    </div>
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

                    <form class="form-horizontal" id="store_form" role="form" enctype='multipart/form-data' method="post" action="<?=BASE_URL?>profile/update">
                        <div id="wizard">
                            <ul>
                                <li id="basic-info2">Basic Information</li>
                                <?php if($userdata->store_info){ ?>
                                <li id="business-info2">Selected Theme</li>
                                <li id="business-info1">Store Information</li>
                                <div class="next-line">
                                    <li id="location-info-wizard">Locations</li>
                                    <li id="fee-info">Cost &amp; Fee's</li>
                                    <li id="social-info1">Social Media</li>
                                    <li id="paypal-inof">Paypal Information</li>
                                </div>
                                <?php } ?>
                            </ul>
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
                                    <label class="control-label col-sm-3" for="address1">Address</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="address1" name="address1" placeholder="Address"><?=$userdata->address1?></textarea>
                                        <?php if(form_error('address1')!='') echo form_error('address1','<div class="text-danger err">','</div>'); ?>
                                    </div>
                                    <span class="text-danger" id="address1_error"></span>

                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="address1">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="city" value="<?=$userdata->city?>" name="city" placeholder="City">
                                        <?php if(form_error('city')!='') echo form_error('city','<div class="text-danger err">','</div>'); ?>
                                    </div>
                                    <span class="text-danger" id="city_error"></span>

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
                                    <label class="control-label col-sm-3" for="zip2">Zip Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="zip2" value="<?=$userdata->zip?>" name="zip2" placeholder="Zip COde">
                                        <?php if(form_error('zip2')!='') echo form_error('zip2','<div class="text-danger err">','</div>'); ?>
                                    </div>
                                    <span class="text-danger" id="zip2_error"></span>

                                </div>

                                <?php if(!$userdata->store_info){ ?>
                                <div class="form-group">
                                    <input name="basic_info" value="1" type="hidden" />

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
                                        <img src="<?=BASE_URL?>edit_assets/image/theme1/01.png" id="1001" <?php if($theme[ 'rows'][0]->theam_id=='1001'){ ?> style="height:350px !important;margin-bottom:10px;border: 1px solid rgb(255, 24, 24);box-shadow:
                                        0px 0px 16px 0px rgb(219, 11, 11);"
                                        <?php } ?> class="img img-responsive theme">
                                    </div>


                                    <div class="col-sm-6">
                                        <img src="<?=BASE_URL?>edit_assets/image/theme2/01.png" id="1002" <?php if($theme[ 'rows'][0]->theam_id=='1002'){ ?> style="height:350px !important;margin-bottom:10px;border: 1px solid rgb(255, 24, 24);box-shadow:
                                        0px 0px 16px 0px rgb(219, 11, 11);"
                                        <?php }?> class="img img-responsive theme">
                                    </div>

                                </div>
                                <input type="hidden" id="themeid" name="themeid" value="<?=$theme['rows'][0]->theam_id?>">
                                <input type="hidden" id="themeid2" value="<?=$theme['rows'][0]->theam_id?>">
                                <?php } ?>
                            </div>
                            <div>
                                <?php //print_r($storedata);
                                $farmertype=0;
                                $farmerid=null;
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
                                            if(isset($farmerid) && $farmerid==$ubt->id){ $farmerinput=1;}
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
                                        <input type="text" class="form-control" id="phone" value="<?=$storedata->phone?>" name="phone" placeholder="Phone" onkeyup="checknumber(this.id,this.value)">
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
                                    <label class="control-label col-sm-3" for="city2">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="city2" value="<?=$storedata->city?>" name="city2" placeholder="City">
                                        <?php if(form_error('city2')!='') echo form_error('city2','<div class="text-danger err">','</div>'); ?>
                                        <span class="text-danger" id="city2_error_num"></span>
                                    </div>
                                    <span class="text-danger" id="city2_error"></span>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="state2">State</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="state2" name="state2">
                                        <option value="">-------Select State-------</option>
                                        <?php if($states['res']){foreach($states['rows'] as $state){ ?>
                                        <option value="<?php echo $state->id;?>" <?php if($storedata->state==$state->id){echo "selected";}?> ><?php echo $state->state;?></option>
                                        <?php }} ?>
                                    </select>
                                        <?php if(form_error('state2')!='') echo form_error('state2','<div class="text-danger err">','</div>'); ?>
                                    </div>
                                    <span class="text-danger" id="state2_error"></span>
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

                                <div class="form-group" <?php if($farmerinput){ ?> style="display:block;"
                                    <?php }else{ ?> style="display:none;"
                                    <?php } ?> id="farmer_income_head" >
                                    <label class="control-label col-sm-3" for="address">Farm Income</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">$</span>
                                            <input type="text" class="form-control" id="income" value="<?=$storedata->income?>" name="income" placeholder="Gross Cash Farm Income" onkeyup="checknumber(this.id,this.value)">
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
                            <div class="profile-location-edit">
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="location_list">Location List</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" id="location_list" name="location_list">
                                            <option value="">-------Select Location-------</option>
                                            <?php if($locations['res']){foreach($locations['rows'] as $location_item){ ?>
                                            <option value="<?php echo $location_item->id;?>" <?php if($location_item->id == $locations['rows'][0]->id){echo "selected";}?> ><?php echo $location_item->location_name;?></option>
                                            <?php }} ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <a href="javascript:void(0);" title=" Add More" id="new-location-info" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-plus-sign"></span></a>
                                                <a href="javascript:void(0);" title="Remove" id="remove-location-info" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-minus-sign"></span> </a>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger" id="location_list_error"></span>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="location_name">Location Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="location_name" value="" name="location_name" placeholder="Business Name">
                                        <?php if(form_error('location_name')!='') echo form_error('location_name','<div class="text-danger err">','</div>'); ?>
                                        <span class="text-danger" id="location_name_error"></span>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="location_business_name">Business Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="location_business_name" value="" name="location_business_name" placeholder="Business Name">
                                        <?php if(form_error('location_business_name')!='') echo form_error('location_business_name','<div class="text-danger err">','</div>'); ?>
                                        <span class="text-danger" id="location_business_name_error"></span>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="location_address">Address</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="location_address" value="" name="location_address" placeholder="Address"></textarea>
                                        <?php if(form_error('location_address')!='') echo form_error('location_address','<div class="text-danger err">','</div>'); ?>
                                        <span class="text-danger" id="location_address_error"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="location_city">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="location_city" value="" name="location_city" placeholder="City">
                                        <?php if(form_error('location_city')!='') echo form_error('location_city','<div class="text-danger err">','</div>'); ?>
                                        <span class="text-danger" id="location_city_error"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="location_state">State</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="location_state" name="location_state">
                                        <option value="">-------Select State-------</option>
                                        <?php if($states['res']){foreach($states['rows'] as $state){ ?>
                                        <option value="<?php echo $state->id;?>" <?php if($storedata->state==$state->id){echo "selected";}?> ><?php echo $state->state;?></option>
                                        <?php }} ?>
                                    </select>
                                        <?php if(form_error('location_state')!='') echo form_error('location_state','<div class="text-danger err">','</div>'); ?>
                                        <span class="text-danger" id="location_state_error"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="location_zipcode">Zip Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="location_zipcode" value="" name="location_zipcode" placeholder="Zip Code">
                                        <?php if(form_error('location_zipcode')!='') echo form_error('location_zipcode','<div class="text-danger err">','</div>'); ?>
                                        <span class="text-danger" id="location_zipcode_error"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="location_phone">Phone</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="location_phone" value="" name="location_phone" placeholder="Phone">
                                        <?php if(form_error('location_phone')!='') echo form_error('location_phone','<div class="text-danger err">','</div>'); ?>
                                        <span class="text-danger" id="location_phone_error"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-check-label col-sm-3" for="location_onsite_vendor">Accepting New Onsite Vendors</label>
                                    <div class="col-sm-3">
                                        <input type="checkbox" class="form-check-input" id="location_onsite_vendor" value="" name="location_onsite_vendor">
                                    </div>

                                    <label class="form-check-label col-sm-3" for="location_virtual_vendor">Accepting New Virtual Vendors</label>
                                    <div class="col-sm-3">
                                        <input type="checkbox" class="form-check-input" id="location_virtual_vendor" value="" name="location_virtual_vendor">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="location_status">Status</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" id="location_status" name="location_status">
                                        <option value="1" selected>Active</option>
                                        <option value="0" selected>Inactive</option>
                                    </select>
                                        <?php if(form_error('location_status')!='') echo form_error('location_status','<div class="text-danger err">','</div>'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="button" id="location-info-update" class="btn btn-success pull-right">Update</button>
                                    </div>
                                </div>
                            </div>

                            <div class="cost-fee-section">
                                <div class="cs-border-bottom">
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="location_list">Location Name</label>
                                        <div class="col-sm-6">
                                            <select class="form-control" id="location_list" name="location_list">
                                                <option value="">-------Select Location-------</option>
                                                <?php if($locations['res']){foreach($locations['rows'] as $location_item){ ?>
                                                <option value="<?php echo $location_item->id;?>" <?php if($location_item->id == $locations['rows'][0]->id){echo "selected";}?> ><?php echo $location_item->location_name;?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="cost-fee-section-div1">
                                    <div class="fees-div">
                                        <span class="title cs-border">On-Site Vendor</span>
                                        <div class="cs-border">
                                            <div class="fee-inner-wrapper">
                                                <div class="fee-input-wrapper">
                                                    <span>$</span>
                                                    <input type="number" class="form-control fee" id="location_zipcode" value="" name="location_zipcode" min=0>
                                                    <span> / DAY</span>
                                                </div>
                                                <div class="fee-input-wrapper">
                                                    <span>For</span>
                                                    <input type="number" class="form-control fee" id="location_zipcode" value="" name="location_zipcode" min=0>
                                                    <span> / DAYS</span>
                                                </div>
                                            </div>
                                            <div class="fee-checkbox-inner-wrapper">
                                                <div class="fee-checkbox-wrapper">
                                                    <input type="checkbox" class="form-check-input" id="day_activate" value="" name="day_activate">
                                                    <label for="day_activate">Activate</label>
                                                </div>
                                                <div class="fee-checkbox-wrapper">
                                                    <input type="checkbox" class="form-check-input" id="day_auto_renew" value="" name="day_auto_renew">
                                                    <label for="day_auto_renew">Auto-Renew</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cs-border">
                                            <div class="fee-inner-wrapper">
                                                <div class="fee-input-wrapper">
                                                    <span>$</span>
                                                    <input type="number" class="form-control fee" id="location_zipcode" value="" name="location_zipcode" min=0>
                                                    <span> / WEEK</span>
                                                </div>
                                                <div class="fee-input-wrapper">
                                                    <span>For</span>
                                                    <input type="number" class="form-control fee" id="location_zipcode" value="" name="location_zipcode" min=0>
                                                    <span> / WEEKS</span>
                                                </div>
                                            </div>
                                            <div class="fee-checkbox-inner-wrapper">
                                                <div class="fee-checkbox-wrapper">
                                                    <input type="checkbox" class="form-check-input" id="day_activate" value="" name="day_activate">
                                                    <label for="day_activate">Activate</label>
                                                </div>
                                                <div class="fee-checkbox-wrapper">
                                                    <input type="checkbox" class="form-check-input" id="day_auto_renew" value="" name="day_auto_renew">
                                                    <label for="day_auto_renew">Auto-Renew</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cs-border">
                                            <div class="fee-inner-wrapper">
                                                <div class="fee-input-wrapper">
                                                    <span>$</span>
                                                    <input type="number" class="form-control fee" id="location_zipcode" value="" name="location_zipcode" min=0>
                                                    <span> / MONTH</span>
                                                </div>
                                                <div class="fee-input-wrapper">
                                                    <span>For</span>
                                                    <input type="number" class="form-control fee" id="location_zipcode" value="" name="location_zipcode" min=0>
                                                    <span> / MONTHS</span>
                                                </div>
                                            </div>
                                            <div class="fee-checkbox-inner-wrapper">
                                                <div class="fee-checkbox-wrapper">
                                                    <input type="checkbox" class="form-check-input" id="day_activate" value="" name="day_activate">
                                                    <label for="day_activate">Activate</label>
                                                </div>
                                                <div class="fee-checkbox-wrapper">
                                                    <input type="checkbox" class="form-check-input" id="day_auto_renew" value="" name="day_auto_renew">
                                                    <label for="day_auto_renew">Auto-Renew</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="cs-border">
                                            <div class="fee-checkbox-wrapper">
                                                <input type="checkbox" class="form-check-input" id="day_activate" value="" name="day_activate">
                                                <label for="day_activate">Same for All Location</label>
                                            </div>
                                        </div>

                                        <span class="title cs-border">Commission</span>
                                        <div class="cs-border">
                                            <div class="fee-inner-wrapper p-20">
                                                <div class="fee-input-wrapper">
                                                    <span>$</span>
                                                    <input type="number" class="form-control fee" id="location_zipcode" value="" name="location_zipcode" min=0>
                                                    <span> %</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cs-border">
                                            <div class="fee-inner-wrapper p-20">
                                                <div class="fee-input-wrapper">
                                                    <span>$</span>
                                                    <input type="number" class="form-control fee" id="location_zipcode" value="" name="location_zipcode" min=0>
                                                    <span> Minumum</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cs-border">
                                            <div class="fee-inner-wrapper p-20">
                                                <div class="fee-input-wrapper">
                                                    <span>$</span>
                                                    <input type="number" class="form-control fee" id="location_zipcode" value="" name="location_zipcode" min=0>
                                                    <span> Maximum</span>
                                                </div>
                                            </div>
                                        </div>

                                        <span class="title cs-border">Other Changes</span>
                                        <div class="cs-border">
                                            <div class="fee-inner-wrapper">
                                                <div class="fee-input-wrapper">
                                                    <span>$</span>
                                                    <input type="number" class="form-control fee" id="location_zipcode" value="" name="location_zipcode" min=0>
                                                    <span> Initial Payment</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cs-border">
                                            <div class="fee-inner-wrapper">
                                                <div class="fee-input-wrapper">
                                                    <span>$</span>
                                                    <input type="number" class="form-control fee" id="location_zipcode" value="" name="location_zipcode" min=0>
                                                    <span> / Per Transaction</span>
                                                </div>
                                            </div>
                                        </div>

                                        <span class="title cs-border">Application</span>
                                        <div class="cs-border">
                                            <div class="fee-checkbox-wrapper">
                                                <input type="checkbox" class="form-check-input" id="day_activate" value="" name="day_activate">
                                                <label for="day_activate">Application Required for On-Site Vendor</label>
                                                <div class="fileupload-div">
                                                    <div class="fileUpload btn btn-success">
                                                        <span>Upload</span>
                                                        <input type="file" class="upload uploadBtn" />
                                                    </div>
                                                    <input class="uploadFile" placeholder="(Maximum 4MB file size allowed)" disabled="disabled" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fees-div">
                                        <span class="title cs-border-bottom">Virtual Vendor</span>
                                        <div class="cs-border-bottom">
                                            <div class="fee-inner-wrapper">
                                                <div class="fee-input-wrapper">
                                                    <span>$</span>
                                                    <input type="number" class="form-control fee" id="location_zipcode" value="" name="location_zipcode" min=0>
                                                    <span> / DAY</span>
                                                </div>
                                                <div class="fee-input-wrapper">
                                                    <span>For</span>
                                                    <input type="number" class="form-control fee" id="location_zipcode" value="" name="location_zipcode" min=0>
                                                    <span> / DAYS</span>
                                                </div>
                                            </div>
                                            <div class="fee-checkbox-inner-wrapper">
                                                <div class="fee-checkbox-wrapper">
                                                    <input type="checkbox" class="form-check-input" id="day_activate" value="" name="day_activate">
                                                    <label for="day_activate">Activate</label>
                                                </div>
                                                <div class="fee-checkbox-wrapper">
                                                    <input type="checkbox" class="form-check-input" id="day_auto_renew" value="" name="day_auto_renew">
                                                    <label for="day_auto_renew">Auto-Renew</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cs-border-bottom">
                                            <div class="fee-inner-wrapper">
                                                <div class="fee-input-wrapper">
                                                    <span>$</span>
                                                    <input type="number" class="form-control fee" id="location_zipcode" value="" name="location_zipcode" min=0>
                                                    <span> / WEEK</span>
                                                </div>
                                                <div class="fee-input-wrapper">
                                                    <span>For</span>
                                                    <input type="number" class="form-control fee" id="location_zipcode" value="" name="location_zipcode" min=0>
                                                    <span> / WEEKS</span>
                                                </div>
                                            </div>
                                            <div class="fee-checkbox-inner-wrapper">
                                                <div class="fee-checkbox-wrapper">
                                                    <input type="checkbox" class="form-check-input" id="day_activate" value="" name="day_activate">
                                                    <label for="day_activate">Activate</label>
                                                </div>
                                                <div class="fee-checkbox-wrapper">
                                                    <input type="checkbox" class="form-check-input" id="day_auto_renew" value="" name="day_auto_renew">
                                                    <label for="day_auto_renew">Auto-Renew</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cs-border-bottom">
                                            <div class="fee-inner-wrapper">
                                                <div class="fee-input-wrapper">
                                                    <span>$</span>
                                                    <input type="number" class="form-control fee" id="location_zipcode" value="" name="location_zipcode" min=0>
                                                    <span> / MONTH</span>
                                                </div>
                                                <div class="fee-input-wrapper">
                                                    <span>For</span>
                                                    <input type="number" class="form-control fee" id="location_zipcode" value="" name="location_zipcode" min=0>
                                                    <span> / MONTHS</span>
                                                </div>
                                            </div>
                                            <div class="fee-checkbox-inner-wrapper">
                                                <div class="fee-checkbox-wrapper">
                                                    <input type="checkbox" class="form-check-input" id="day_activate" value="" name="day_activate">
                                                    <label for="day_activate">Activate</label>
                                                </div>
                                                <div class="fee-checkbox-wrapper">
                                                    <input type="checkbox" class="form-check-input" id="day_auto_renew" value="" name="day_auto_renew">
                                                    <label for="day_auto_renew">Auto-Renew</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="cs-border-bottom">
                                            <div class="fee-checkbox-wrapper">
                                                <input type="checkbox" class="form-check-input" id="day_activate" value="" name="day_activate">
                                                <label for="day_activate">Same for All Location</label>
                                            </div>
                                        </div>

                                        <span class="title cs-border-bottom">Commission</span>
                                        <div class="cs-border-bottom">
                                            <div class="fee-inner-wrapper p-20">
                                                <div class="fee-input-wrapper">
                                                    <span>$</span>
                                                    <input type="number" class="form-control fee" id="location_zipcode" value="" name="location_zipcode" min=0>
                                                    <span> %</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cs-border-bottom">
                                            <div class="fee-inner-wrapper p-20">
                                                <div class="fee-input-wrapper">
                                                    <span>$</span>
                                                    <input type="number" class="form-control fee" id="location_zipcode" value="" name="location_zipcode" min=0>
                                                    <span> Minumum</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cs-border-bottom">
                                            <div class="fee-inner-wrapper p-20">
                                                <div class="fee-input-wrapper">
                                                    <span>$</span>
                                                    <input type="number" class="form-control fee" id="location_zipcode" value="" name="location_zipcode" min=0>
                                                    <span> Maximum</span>
                                                </div>
                                            </div>
                                        </div>

                                        <span class="title cs-border-bottom">Other Changes</span>
                                        <div class="cs-border-bottom">
                                            <div class="fee-inner-wrapper">
                                                <div class="fee-input-wrapper">
                                                    <span>$</span>
                                                    <input type="number" class="form-control fee" id="location_zipcode" value="" name="location_zipcode" min=0>
                                                    <span> Initial Payment</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cs-border-bottom">
                                            <div class="fee-inner-wrapper">
                                                <div class="fee-input-wrapper">
                                                    <span>$</span>
                                                    <input type="number" class="form-control fee" id="location_zipcode" value="" name="location_zipcode" min=0>
                                                    <span> / Per Transaction</span>
                                                </div>
                                            </div>
                                        </div>

                                        <span class="title cs-border-bottom">Application</span>
                                        <div class="cs-border-bottom">
                                            <div class="fee-checkbox-wrapper">
                                                <input type="checkbox" class="form-check-input" id="day_activate" value="" name="day_activate">
                                                <label for="day_activate">Application Required for On-Site Vendor</label>
                                                <div class="fileupload-div">
                                                    <div class="fileUpload btn btn-success">
                                                        <span>Upload</span>
                                                        <input type="file" class="upload uploadBtn" />
                                                    </div>
                                                    <input class="uploadFile" placeholder="(Maximum 4MB file size allowed)" disabled="disabled" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix" style="padding: 20px;">
                                    <button type="submit" id="store-info" class="btn btn-success pull-right">Update</button>
                                </div>
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
                <button type="button" class="close resettheme">&times;</button>
                <!-- data-dismiss="modal" -->
                <h4 class="modal-title">Alert!</h4>
            </div>
            <div class="modal-body">
                <p>Warning: If you decide to choose a new theme, all of the custom information and data on your site will be lost. Your custom site will be returned to default settings. Are you sure you want to proceed with a new theme? If Yes click on "Ok"
                    Otherwise click on "Cancel". </p>
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
    $(".uploadBtn").on('change',function(){
        var filename = $(this).context.files[0].name;
        $(this).parents('.fileupload-div').find('.uploadFile').val(filename);
    })
    function update_location_item(location_item)
    {
        $("#location_name").prop('disabled', false);
        $("#location_business_name").prop('disabled', false);
        $("#location_address").prop('disabled', false);
        $("#location_city").prop('disabled', false);
        $("#location_state").prop('disabled', false);
        $("#location_zipcode").prop('disabled', false);
        $("#location_phone").prop('disabled', false);
        $("#location_onsite_vendor").prop('disabled', false);
        $("#location_virtual_vendor").prop('disabled', false);
        $("#location_status").prop('disabled', false);

        $("#location-info-update").prop('disabled',false)
        if(location_item != undefined)
        {
            var location_id = location_item.id;
            if(location_id == 0){ //if Main Location
                $("#location_name").prop('disabled', true);
                $("#location_business_name").prop('disabled', true);
                $("#location_address").prop('disabled', true);
                $("#location_city").prop('disabled', true);
                $("#location_state").prop('disabled', true);
                $("#location_zipcode").prop('disabled', true);
                $("#location_phone").prop('disabled', true);
                $("#location_onsite_vendor").prop('disabled', true);
                $("#location_virtual_vendor").prop('disabled', true);
                $("#location_status").prop('disabled', true);

                $("#location-info-update").prop('disabled',true)
            }

            $("#location_name").val(location_item.location_name);
            $("#location_business_name").val(location_item.business_name);
            $("#location_address").val(location_item.address);
            $("#location_city").val(location_item.city);
            $("#location_state").val(location_item.state);
            $("#location_zipcode").val(location_item.zip_code);
            $("#location_phone").val(location_item.phone);
            $("#location_onsite_vendor").prop('checked',location_item.onsite_vendor == '1'? true: false);
            $("#location_virtual_vendor").prop('checked', location_item.virtual_vendor == '1'? true: false);

            $("#location_status").val(location_item.status);

        }else{
            $("#location_list").val('');
            $("#location_name").val('');
            $("#location_business_name").val('');
            $("#location_address").val('');
            $("#location_city").val('');
            $("#location_state").val('');
            $("#location_zipcode").val('');
            $("#location_phone").val('');
            $("#location_onsite_vendor").prop('checked', false);
            $("#location_virtual_vendor").prop('checked', false);
            $("#location_status").val('1');
        }
    }
    $(document).ready(function(){
        /* Location Handle functions */
        var tab = '<?=$this->session->flashdata("tab");?>';
        if(tab == 'location')
        {
            $("#location-info-wizard").click();
        }
        $("#fee-info").click();
        var locations = <?=json_encode($locations['rows']);?>;
        if(locations && locations.length)
        {
            update_location_item(locations[0])
        }
        $("#location_list").on('change',function(){
            var location_id = $(this).val();
            var location_item = locations.find(function(item){
                return item.id == location_id;
            });
            update_location_item(location_item);
        });

        $("#new-location-info").on('click',function(){
            update_location_item()
        });

        $("#remove-location-info").on('click',function(){
            var location_id = $("#location_list").val();
            if( location_id == 0 )
            {
                alert("You are not allowed to remove Main Location.")
                return false;
            }
            if(location_id != '' && confirm('Are you sure you want to delete selected location?'))
            {
                $.ajax({
                    url:"<?=BASE_URL?>profile/deleteLocation",
                    method: "POST",
                    data: {id: location_id},
                    async: true,
                    success:function(data,status){
                        var obj= $.parseJSON(data);
                        var success = obj.success;
                        location.reload();
                    }
                });
            }
        });

        $("#location-info-update").on('click',function(){
            var location_id = $("#location_list").val().trim(),
                location_name = $("#location_name").val().trim(),
                location_business_name = $("#location_business_name").val().trim(),
                location_address = $("#location_address").val().trim(),
                location_city = $("#location_city").val().trim(),
                location_state = $("#location_state").val().trim(),
                location_zipcode = $("#location_zipcode").val().trim(),
                location_phone = $("#location_phone").val().trim(),
                location_onsite_vendor = $("#location_onsite_vendor").prop('checked'),
                location_virtual_vendor = $("#location_virtual_vendor").prop('checked'),
                location_status = $("#location_status").val().trim();
            var isValid = true;

            if(location_name == ''){
                $("#location_name_error").html("Enter Location Name");
                $("#location_name").focus();
                $("#location_name_error").parent().addClass("has-error");
                isValid = false;
            }else{
                $("#location_name_error").parent().removeClass("has-error");
                $("#location_name_error").html("");
            }

            if(location_business_name == ''){
                $("#location_business_name_error").html("Enter Business Name");
                $("#location_business_name").focus();
                $("#location_business_name_error").parent().addClass("has-error");
                isValid = false;
            }else{
                $("#location_business_name_error").parent().removeClass("has-error");
                $("#location_business_name_error").html("");
            }

            if(location_address == ''){
                $("#location_address_error").html("Enter Address");
                $("#location_address").focus();
                $("#location_address_error").parent().addClass("has-error");
                isValid = false;
            }else{
                $("#location_address_error").parent().removeClass("has-error");
                $("#location_address_error").html("");
            }

            if(location_city == ''){
                $("#location_city_error").html("Enter Address");
                $("#location_city").focus();
                $("#location_city_error").parent().addClass("has-error");
                isValid = false;
            }else{
                $("#location_city_error").parent().removeClass("has-error");
                $("#location_city_error").html("");
            }

            if(location_state == ''){
                $("#location_state_error").html("Enter Location State");
                $("#location_state").focus();
                $("#location_state_error").parent().addClass("has-error");
                isValid = false;
            }else{
                $("#location_state_error").parent().removeClass("has-error");
                $("#location_state_error").html("");
            }

            if(location_zipcode == ''){
                $("#location_zipcode_error").html("Enter Location Zipcode");
                $("#location_zipcode").focus();
                $("#location_zipcode_error").parent().addClass("has-error");
                isValid = false;
            }else{
                $("#location_zipcode_error").parent().removeClass("has-error");
                $("#location_zipcode_error").html("");
            }

            if(location_phone == ''){
                $("#location_phone_error").html("Enter Phone Number");
                $("#location_phone").focus();
                $("#location_phone_error").parent().addClass("has-error");
                isValid = false;
            }else{
                $("#location_phone_error").parent().removeClass("has-error");
                $("#location_phone_error").html("");
            }

            if(isValid){
                var post_data = {
                    id: location_id,
                    location_name: location_name,
                    business_name: location_business_name,
                    address: location_address,
                    city: location_city,
                    state: location_state,
                    zip_code: location_zipcode,
                    phone: location_phone,
                    onsite_vendor: location_onsite_vendor? '1' : '0',
                    virtual_vendor: location_virtual_vendor? '1' : '0',
                    status: location_status
                }

                $.ajax({
                    url:"<?=BASE_URL?>profile/updateLocation",
                    method: "POST",
                    data: {location_info: post_data},
                    async: true,
                    success:function(data,status){
                        var obj= $.parseJSON(data);
                        var success = obj.success;
                        location.reload();
                    }
                });
            }else{
                return false;
            }
        });

        $("#store-info").click(function(){
            var f_name = $("#f_name").val().trim();
            var l_name = $("#l_name").val().trim();
            var business_name = $("#business-name").val().trim();
            var contact_person = $("#contact-person").val().trim();
            var phone = $("#phone").val().trim();
            var mobile = $("#mobile").val().trim();
            var city=$("#city").val().trim();
            var city2=$("#city2").val().trim();
            var state2=$("#state2").val().trim();
            var state=$("#state").val().trim();
            var address = $("#address").val().trim();
            var address1 = $("#address1").val().trim();
            var zip=$("#zip").val().trim();
            var zip2=$("#zip2").val().trim();
            var v_focus='0';

            if(f_name == ''){
                $("#f_name_error").html("Enter Your First Name");
                if(v_focus=='0')
                 {
                  $("#basic-info2").click();
                  $("#f_name").focus();
                  v_focus='1';
                 }
                  $("#f_name_error").parent().addClass("has-error");
                //   return false;
            }else{ $("#f_name_error").parent().removeClass("has-error");
                   $("#f_name_error").html("");}

            if(l_name == ''){
               $("#l_name_error").html("Enter Your Last Name");
                if(v_focus=='0')
                 {
                  $("#basic-info2").click();
                  $("#l_name").focus();
                  v_focus='1';
                 }
                  $("#l_name_error").parent().addClass("has-error");
                  //return false;
            } else {$("#l_name_error").parent().removeClass("has-error");
                    $("#l_name_error").html("");}

            if(mobile == ''){
                  $("#mobile_error").html("Enter Phone Number");
                if(v_focus=='0')
                 {
                  $("#basic-info2").click();
                  $("#mobile").focus();
                  v_focus='1';
                 }
                  $("#mobile_error").parent().addClass("has-error");
               //   return false;
            } else {$("#mobile_error").parent().removeClass("has-error");
                    $("#mobile_error").html("");}

            if(mobile.length>10){
                $("#mobile_error").html("Phone Number must be 10 digits");
                if(v_focus=='0')
                 {
                  $("#basic-info2").click();
                  $("#mobile").focus();
                  v_focus='1';
                 }
                $("#mobile_error").parent().addClass("has-error");
                //return false;
            } else {$("#mobile_error").parent().removeClass("has-error");
                    $("#mobile_error").html("");}

            if(address1 == ''){
                $("#address1_error").html("Enter Your Address");
                if(v_focus=='0')
                 {
                  $("#basic-info2").click();
                  $("#address1").focus();
                  v_focus='1';
                 }
                $("#address1_error").parent().addClass("has-error");
                 //return false;
            } else {$("#address1_error").parent().removeClass("has-error");
                    $("#address1_error").html("");}

           if(city==''){
                $("#city_error").html("Enter City");
                if(v_focus=='0')
                 {
                  $("#basic-info2").click();
                  $("#city").focus();
                  v_focus='1';
                 }
                $("#city_error").parent().addClass("has-error");
                //return false;
           } else {$("#city_error").parent().removeClass("has-error");
                   $("#city_error").html("");}

            if(state==''){
                $("#state_error").html("Enter State");
                if(v_focus=='0')
                 {
                  $("#basic-info2").click();
                  $("#state").focus();
                  v_focus='1';
                 }
                $("#state_error").parent().addClass("has-error");
                //return false;
            } else {$("#state_error").parent().removeClass("has-error");
                    $("#state_error").html("");}

            if(zip2==''){
                $("#zip2_error").html("Enter Zip Code");
                if(v_focus=='0')
                 {
                  $("#basic-info2").click();
                  $("#zip2").focus();
                  v_focus='1';
                 }
                $("#zip2_error").parent().addClass("has-error");
                //return false;
            } else {$("#zip2_error").parent().removeClass("has-error");
                    $("#zip2_error").html("");}

            if(business_name == ''){
                  $("#business-name_error").html("Enter Your Business Name");
                if(v_focus=='0')
                 {
                  $("#business-info1").click();
                  $("#business-name").focus();
                  v_focus='1';
                 }
                $("#business-name_error").parent().addClass("has-error");
                //return false;
            } else {$("#business-name_error").parent().removeClass("has-error");
                    $("#business-name_error").html("");}

            if(contact_person == ''){
                $("#contact-person").html("Enter Contact Person Name");
                if(v_focus=='0')
                 {
                  $("#business-info1").click();
                  $("#contact-person").focus();
                  v_focus='1';
                 }
                $("#contact-person_error").parent().addClass("has-error");
                //return false;
           } else {$("#contact-person_error").parent().removeClass("has-error");
                   $("#contact-person_error").html("");}

            if(phone == ''){
                $("#phone_error").html("Enter Your Business Phone Number");
                if(v_focus=='0')
                 {
                  $("#business-info1").click();
                  $("#phone").focus();
                  v_focus='1';
                 }
                $("#phone_error").parent().addClass("has-error");
                //return false;
            } else {$("#phone_error").parent().removeClass("has-error");
                    $("#phone_error").html("");}

            if(address == ''){
                  $("#address_error").html("Enter Your Business Address");
                if(v_focus=='0')
                 {
                  $("#business-info1").click();
                  $("#address").focus();
                  v_focus='1';
                 }
                $("#address_error").parent().addClass("has-error");
                //return false;
            } else {$("#address_error").parent().removeClass("has-error");
                    $("#address_error").html("");}

            if(city2==''){
                $("#city2_error").html("Enter Business City Name");
                if(v_focus=='0')
                 {
                  $("#business-info1").click();
                  $("#city2").focus();
                  v_focus='1';
                 }
                $("#city2_error").parent().addClass("has-error");
                //return false;
            } else {$("#city2_error").parent().removeClass("has-error");
                    $("#city2_error").html("");}

            if(state2==''){
                $("#state2_error").html("Enter Business State");
                if(v_focus=='0')
                 {
                  $("#business-info1").click();
                  $("#state2").focus();
                  v_focus='1';
                 }
                $("#state2_error").parent().addClass("has-error");
                //return false;
            } else {$("#state2_error").parent().removeClass("has-error");
                    $("#state2_error").html("");}

            if(zip==''){
                $("#zip_error").html("Enter Business Zip Code");
                if(v_focus=='0')
                 {
                  $("#business-info1").click();
                  $("#zip").focus();
                  v_focus='1';
                 }
                $("#zip_error").parent().addClass("has-error");
                //return false;
            } else {$("#zip_error").parent().removeClass("has-error");
                    $("#zip_error").html("");}

            if(v_focus=='0')
            {
                return true;
            } else {
                return false;
            }
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

        $(document).on('change','#f_name',function(){
            var f_name = $("#f_name").val().trim();
            if(f_name == ''){
                $("#f_name_error").html("Enter Your First Name");
                  $("#basic-info2").click();
                  $("#f_name").focus();
                  $("#f_name_error").parent().addClass("has-error");
            }else{ $("#f_name_error").parent().removeClass("has-error");
                   $("#f_name_error").html("");}
        });

        $(document).on('change','#l_name',function(){
            var l_name = $("#l_name").val().trim();
            if(l_name == ''){
               $("#l_name_error").html("Enter Your Last Name");
                  $("#basic-info2").click();
                  $("#l_name").focus();
                  $("#l_name_error").parent().addClass("has-error");
            } else {$("#l_name_error").parent().removeClass("has-error");
                    $("#l_name_error").html("");}
        });

        $(document).on('change','#mobile',function(){
            var mobile = $("#mobile").val().trim();
            if(mobile == ''){
                  $("#mobile_error").html("Enter Phone Number");
                  $("#basic-info2").click();
                  $("#mobile").focus();
                  $("#mobile_error").parent().addClass("has-error");
            } else {$("#mobile_error").parent().removeClass("has-error");
                    $("#mobile_error").html("");}

            if(mobile.length>10){
                $("#mobile_error").html("Phone Number must be 10 digits");
                  $("#basic-info2").click();
                  $("#mobile").focus();
                $("#mobile_error").parent().addClass("has-error");
            } else {$("#mobile_error").parent().removeClass("has-error");
                    $("#mobile_error").html("");}
        });

        $(document).on('change','#address1',function(){
            var address1 = $("#address1").val().trim();
            if(address1 == ''){
                $("#address1_error").html("Enter Your Address");
                  $("#basic-info2").click();
                  $("#address1").focus();
                $("#address1_error").parent().addClass("has-error");
            } else {$("#address1_error").parent().removeClass("has-error");
                    $("#address1_error").html("");}
        });

        $(document).on('change','#city',function(){
            var city=$("#city").val().trim();
           if(city==''){
                $("#city_error").html("Enter City");
                  $("#basic-info2").click();
                  $("#city").focus();
                $("#city_error").parent().addClass("has-error");
           } else {$("#city_error").parent().removeClass("has-error");
                   $("#city_error").html("");}
        });

        $(document).on('change','#state',function(){
            var state=$("#state").val().trim();
            if(state==''){
                $("#state_error").html("Enter State");
                  $("#basic-info2").click();
                  $("#state").focus();
                $("#state_error").parent().addClass("has-error");
            } else {$("#state_error").parent().removeClass("has-error");
                    $("#state_error").html("");}
        });

        $(document).on('change','#zip2',function(){
            var zip2=$("#zip2").val().trim();
            if(zip2==''){
                $("#zip2_error").html("Enter Zip Code");
                  $("#basic-info2").click();
                  $("#zip2").focus();
                $("#zip2_error").parent().addClass("has-error");
            } else {$("#zip2_error").parent().removeClass("has-error");
                    $("#zip2_error").html("");}
        });

        $(document).on('change','#business-name',function(){
            var business_name = $("#business-name").val().trim();
            if(business_name == ''){
                  $("#business-name_error").html("Enter Your Business Name");
                  $("#business-info1").click();
                  $("#business-name").focus();
                $("#business-name_error").parent().addClass("has-error");
            } else {$("#business-name_error").parent().removeClass("has-error");
                    $("#business-name_error").html("");}
        });

        $(document).on('change','#contact-person',function(){
            var contact_person = $("#contact-person").val().trim();
            if(contact_person == ''){
                $("#contact-person").html("Enter Contact Person Name");
                  $("#business-info1").click();
                  $("#contact-person").focus();
                $("#contact-person_error").parent().addClass("has-error");
           } else {$("#contact-person_error").parent().removeClass("has-error");
                   $("#contact-person_error").html("");}
        });

        $(document).on('change','#contact-person',function(){
            var phone = $("#phone").val().trim();
            if(phone == ''){
                $("#phone_error").html("Enter Your Business Phone Number");
                  $("#business-info1").click();
                  $("#phone").focus();
                $("#phone_error").parent().addClass("has-error");
            } else {$("#phone_error").parent().removeClass("has-error");
                    $("#phone_error").html("");}
        });

        $(document).on('change','#address',function(){
            var address = $("#address").val().trim();
            if(address == ''){
                  $("#address_error").html("Enter Your Business Address");
                  $("#business-info1").click();
                  $("#address").focus();
                $("#address_error").parent().addClass("has-error");
            } else {$("#address_error").parent().removeClass("has-error");
                    $("#address_error").html("");}
        });

        $(document).on('change','#city2',function(){
            var city2=$("#city2").val().trim();
            if(city2==''){
                $("#city2_error").html("Enter Business City Name");
                  $("#business-info1").click();
                  $("#city2").focus();
                $("#city2_error").parent().addClass("has-error");
            } else {$("#city2_error").parent().removeClass("has-error");
                    $("#city2_error").html("");}
        });

        $(document).on('change','#state2',function(){
            var state2=$("#state2").val().trim();
            if(state2==''){
                $("#state2_error").html("Enter Business State");
                  $("#business-info1").click();
                  $("#state2").focus();
                $("#state2_error").parent().addClass("has-error");
            } else {$("#state2_error").parent().removeClass("has-error");
                    $("#state2_error").html("");}
        });

        $(document).on('change','#zip',function(){
            var zip=$("#zip").val().trim();
            if(zip==''){
                $("#zip_error").html("Enter Business Zip Code");
                  $("#business-info1").click();
                  $("#zip").focus();
                $("#zip_error").parent().addClass("has-error");
            } else {$("#zip_error").parent().removeClass("has-error");
                    $("#zip_error").html("");}
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
