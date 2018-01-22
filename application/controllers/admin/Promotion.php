<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotion extends MY_Controller {
    private $userid;
    function __construct()
    {
        parent::__construct();
        $this->_valid_admin();
        $this->_screen_security_admin('Manage Promotion Code');
        $this->userid=$this->session->userdata(ADMIN_SESS.'user_id');
    }
    
    
    public function index(){
        $comment1=array('val'=>'p.*,count(pu.id) as no_of_users ','table'=>'promotion as p','where'=>array(),'minvalue'=>'','group_by'=>'p.id','start'=>'','orderby'=>'p.id','orderas'=>'DESC');
        $multijoin1=array(
            array('table'=>'promo_users as pu','on'=>'p.id=pu.promo_id','join_type'=>'left'),
        );
        
        $table=$this->common->multijoin($comment1,$multijoin1);
        $config = array();
        $config["base_url"] = BASE_URL. "admin/promotion/";
        $config["total_rows"] = ($table['res'])?count($table['rows']):0;
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        //$config['page_query_string']=true;
        $this->pagination->initialize($config); 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //$page = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        //$log["data"]=$this->common->get_all_with_paginaiton($config["per_page"], $page ,$table);
        $resp['promotion']=$this->common->multijoin($comment1,$multijoin1,$config["per_page"], $page);
        $resp["links"] = $this->pagination->create_links();
        $resp['datashowcount'] = array('total' => $config["total_rows"], 'per_page' => $config["per_page"]);
		//echo $this->db->last_query();
        //print_r($resp['promotion']);exit;
        $this->load->view('admin/include/admin_header');
        $this->load->view('admin/include/admin_left');
        $this->load->view('admin/promotion/admin_vw_promotion',$resp);
        $this->load->view('admin/include/admin_footer');
    }

    public function search(){
        $searchby=$this->input->get('searchby');
        $val=$this->input->get('val');
        $val=trim($val);
        
        if($searchby=='code'){
            $comment1=array('val'=>'p.*,count(pu.id) as no_of_users ','table'=>'promotion as p','where'=>array(),'minvalue'=>'','group_by'=>'p.id','start'=>'','orderby'=>'p.id','orderas'=>'DESC',"like"=>array("likeon"=>"p.code","likeval"=>$val));
            $resp=$this->searchbyother(trim($val),$comment1,$searchby);

        } else if($searchby=='adddate'){

            $from=$this->input->get('from');
            $to=$this->input->get('to');
            $resp=$this->searchbydate(trim($from),trim($to),$searchby);

        }else{
            $this->session->set_flashdata("warning","Wrong data search");
            redirect("admin/promotion","refresh");
        }

        $this->load->view('admin/include/admin_header');
        $this->load->view('admin/include/admin_left');
        $this->load->view('admin/promotion/admin_vw_promotion',$resp);
        $this->load->view('admin/include/admin_footer');
    }

    public function searchbyother($val,$comment1,$searchby){
        $multijoin1=array(
            array('table'=>'promo_users as pu','on'=>'p.id=pu.promo_id','join_type'=>'left'),
        );
        $table=$this->common->multijoin_with_like($comment1,$multijoin1);
        
        $config = array();
        $config["base_url"] = BASE_URL. "admin/promotion/search?searchby=$searchby&val=$val";
        $config["total_rows"] = ($table['res'])?count($table['rows']):0;
        $config["per_page"] = 20;
        $config["uri_segment"] = $this->input->get('per_page');
        $config['page_query_string']=true;
        $this->pagination->initialize($config); 
        //$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $page = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        //$log["data"]=$this->common->get_all_with_paginaiton($config["per_page"], $page ,$table);
        $resp['promotion']=$this->common->multijoin_with_like($comment1,$multijoin1,$config["per_page"], $page);
        $resp["links"] = $this->pagination->create_links();
        $resp['datashowcount'] = array('total' => $config["total_rows"], 'per_page' => $config["per_page"]);
        return $resp;
    }

    public function searchbydate($from,$to,$searchby){
        $comment1=array('val'=>'p.*,count(pu.id) as no_of_users ','table'=>'promotion as p','where'=>array('p.start_date>='=>$from,'p.end_date<='=>$to),'group_by'=>'p.id','start'=>'','orderby'=>'p.id','orderas'=>'DESC');
        $multijoin1=array(
            array('table'=>'promo_users as pu','on'=>'p.id=pu.promo_id','join_type'=>'left'),
        );
        $table=$this->common->multijoin($comment1,$multijoin1);
        
        $config = array();
        $config["base_url"] = BASE_URL. "admin/promotion/search?searchby=$searchby&from=$from&to=$to";
        $config["total_rows"] = ($table['res'])?count($table['rows']):0;
        $config["per_page"] = 20;
        $config["uri_segment"] = $this->input->get('per_page');
        $config['page_query_string']=true;
        $this->pagination->initialize($config); 
        //$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $page = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        //$log["data"]=$this->common->get_all_with_paginaiton($config["per_page"], $page ,$table);
        $resp['promotion']=$this->common->multijoin($comment1,$multijoin1,$config["per_page"], $page);
        $resp["links"] = $this->pagination->create_links();
        $resp['datashowcount'] = array('total' => $config["total_rows"], 'per_page' => $config["per_page"]);
        //print_r($resp['products']['rows']);exit;  
        //echo "aa";exit;
        return $resp;   
    }
    
    public function add(){
        //print_r($_POST); exit;
        $this->form_validation->set_rules('code','Promotion Code', 'trim|required');
        $this->form_validation->set_rules('startdate','Code Valid From','trim|required|is_unique[promotion.code]');
        $this->form_validation->set_rules('enddate','Code Valid To','trim|required');
        $this->form_validation->set_rules('admin_comm','Discount','trim|required');
        if($this->form_validation->run()){
            $code=$this->input->post("code");
            $startdate=$this->input->post("startdate");
            $enddate=$this->input->post("enddate");
            $duration=$enddate;
            $end_date=date('Y-m-d', strtotime('+'.$enddate.' month', strtotime($startdate)));
            //print_r($end_date); exit;
            $discount=$this->input->post("admin_comm");
            $status=$this->input->post("status");
            
            $users=$this->input->post("users");
            //print_r($users);exit;
            //echo $status;exit;
            $data=array('table'=>'promotion','val'=>array('code'=>$code,'start_date'=>$startdate,'end_date'=>$end_date,'discount'=>$discount,'status'=>$status,'duration'=>$duration));                
            $promoid=$this->common->add_data_get_id($data);
            if(count($users)>0){
                foreach($users as $user){
                    $usersdata[]=array( 'promo_id'=>$promoid, 'user_id'=>$user );
                    $username=$this->getusername($user);
                    $message='<table style="width:70%;margin:auto; border:2px solid #ccc;">
                            <tr>
                                <td style="padding-left:10px;"><h3>Promotion Code</h3><br/>
                                Hello '.$username.',<br/>
                                    <strong>Congratulations!</strong> You have got promotion code from Harvest link to  unlock your account as a suscribe user.
                                    Your promotion code is <strong> '.$code.' </strong>
                                     use above code from '.$startdate.' till '.$end_date.' to get '.$discount.'% discount.    
                            </td>
                            </tr>
                            </table><br/>';
                    $sendmessage=$this->_sendmail($user,$message);
                } 
                $data1=array('table'=>'promo_users','val'=>$usersdata);
                $assignuser=$this->common->insert_multi_row($data1);
                //echo "<pre>";
                //print_r($assignuser);exit;
            }
            if($promoid){
                $this->session->set_flashdata("sucess","Code has been added successfully.");
                redirect("admin/promotion/add/","refresh");
            }
        }else{
            $rand['users']=$this->getsellers(array('username','id'),array('type_Of_User'=>'1','paid'=>'0','status'=>'1'));
            //echo "<pre>";
            //print_r($rand); exit;
            $rand['random']=$this->random_string(5);
            $this->load->view('admin/include/admin_header');
            $this->load->view('admin/include/admin_left');
            $this->load->view('admin/promotion/admin_vw_add_promotion',$rand);
            $this->load->view('admin/include/admin_footer');
        }
    }
    
    
    public function edit($id){
        $this->form_validation->set_rules('code','Promotion Code', 'trim|required');
        $this->form_validation->set_rules('startdate','Code Valid From','trim|required|is_unique[promotion.code]');
        $this->form_validation->set_rules('enddate','Code Valid To','trim|required');
        $this->form_validation->set_rules('admin_comm','Discount','trim|required');
        if($this->form_validation->run()){
            $code=$this->input->post("code");
            $startdate=$this->input->post("startdate");
            $enddate=$this->input->post("enddate");
            $duration=$enddate;
            $end_date=date('Y-m-d', strtotime('+'.$enddate.' month', strtotime($startdate)));
            $discount=$this->input->post("admin_comm");
            $status=$this->input->post("status");
            
            $users=$this->input->post("users");
            //print_r($users);exit;
            //echo $status;exit;
            $data=array('table'=>'promotion','where'=>array('id'=>$id),'val'=>array('code'=>$code,'start_date'=>$startdate,'end_date'=>$end_date,'discount'=>$discount,'status'=>$status,'duration'=>$duration));                
            $log=$this->common->update_data($data);
            $promoid=$id;
            $deleteprev=$this->common->delete_data(array("table"=>"promo_users",'where'=>array('promo_id'=>$promoid)));
            if(count($users)>0){
                foreach($users as $user){
                    $usersdata[]=array( 'promo_id'=>$promoid, 'user_id'=>$user );
                    $username=$this->getusername($user);
                    $message='<table style="width:70%;margin:auto; border:2px solid #ccc;">
                            <tr>
                                <td style="padding-left:10px;"><h3>Promotion Code</h3><br/>
                                Hello '.$username.',<br/>
                                    <strong>Congratulations!</strong> You have got promotion code from Harvest link to  unlock your account as a suscribe user. Your promotion code is <strong> '.$code.' </strong>
                                     use above code from '.$startdate.' till '.$end_date.' to get '.$discount.'% discount.
                            </td>
                            </tr>
                            </table><br/>';
                    $sendmessage=$this->_sendmail($user,$message);
                } 
                
                $data1=array('table'=>'promo_users','val'=>$usersdata);
                $assignuser=$this->common->insert_multi_row($data1);
            }
            if($promoid){
                $this->session->set_flashdata("sucess","Code has been updated successfully.");
                redirect("admin/promotion/","refresh");
            }
            
        }else{
            $data=array('val'=>array(),'table'=>'promotion','where'=>array('id'=>$id));
            $log['promotion']=$this->common->getdata($data);
            //print_r($log); exit;
            if($log['promotion']['res']){
            $data=array('val'=>array('user_id'),'table'=>'promo_users','where'=>array('promo_id'=>$id));
            $log['assignusers']=$this->common->getdata($data);

            $log['allusers']=$this->getsellers(array('username','id'),array('type_Of_User'=>'1','status'=>'1'));

            $this->load->view('admin/include/admin_header');
            $this->load->view('admin/include/admin_left');
            $this->load->view('admin/promotion/admin_vw_edit_promotion',$log);
            $this->load->view('admin/include/admin_footer');
            }else{
                $this->session->set_flashdata("warning","Something wend worng pleas try again.");
                redirect("admin/promotion/","refresh");
            }
        }
    }
    
    
    public function details($id){
        $data=array('val'=>array(),'table'=>'promotion','where'=>array('id'=>$id));
        $log['promotion']=$this->common->getdata($data);
        if($log['promotion']['res']){
        //$data=array('val'=>array('user_id'),'table'=>'promo_users','where'=>array());
        $this->db->select('u.username,u.id');$this->db->where('promo_id',$id);
        $this->db->join('user_Info u','u.id=pu.user_id','left');
        $query=$this->db->get('promo_users pu');
       if($query -> num_rows() > 0)
            {$log['assignusers']=array('res'=>true,'rows'=>$query->result());}
            else
            {$log['assignusers']=array('res'=>false);}
       // $log['assignusers']=$this->common->getdata($data);

        //$log['allusers']=$this->getsellers(array('username','id'),array('type_Of_User'=>'1','status'=>'1'));

        $this->load->view('admin/include/admin_header');
        $this->load->view('admin/include/admin_left');
        $this->load->view('admin/promotion/admin_vw_details_promotion',$log);
        $this->load->view('admin/include/admin_footer');
        }else{
            $this->session->set_flashdata("warning","Something wend worng pleas try again.");
            redirect("admin/promotion/","refresh");
        }
    }
    
    
    public function active(){
        $selectedid=$this->input->post("selectedmail");
        $count=count($selectedid);
        $data=array("table"=>"promotion","val"=>array("status"=>'1'),"where"=>array(),"in"=>"id","in_value"=>$selectedid);
        $log=$this->common->update_in_data($data);
        //echo $this->db->last_query();exit;
        if($log){
            echo json_encode(array("status"=>true,"message"=>"This promotion code added active list."));
        }else{
           echo json_encode(array("status"=>false,"message"=>"Error!"));
        }
    }
    
    
    public function inactive(){
        $selectedid=$this->input->post("selectedmail");
        $count=count($selectedid);
        $data=array("table"=>"promotion","val"=>array("status"=>'0'),"where"=>array(),"in"=>"id","in_value"=>$selectedid);
        $log=$this->common->update_in_data($data);
        if($log){
            echo json_encode(array("status"=>true,"message"=>"This promotion code removed from active list."));
        }else{
           echo json_encode(array("status"=>false,"message"=>"Error!"));
        }
    }

    private function _sendmail($to,$message){
        $from='0';
        $subject="Promotion Code";

        //$this->getuserid($to[0]);
        $maildata=array("table"=>"mail","val"=>array("mail_from"=>$from,"subject"=>$subject,"message"=>$message,"timestamp"=>time()));
        $inserted_id=$this->common->add_data_get_id($maildata);

        if($inserted_id){
             $mailtodata=array("table"=>'mail_to',"val"=>array("mail_from"=>$inserted_id,"mail_to"=>$to));
             $log = $this->common->add_data($mailtodata);
        }
        if($log){
            return TRUE;
        }else{
            return FALSE;
        }
            
    
    }
    
    
    function random_string($length) {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }

    
    
} 
