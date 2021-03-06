<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {
    private $userid;
    function __construct()
    {
        parent::__construct();
        $this->_valid_admin();
        $this->userid=$this->session->userdata(ADMIN_SESS.'user_id');
    }
    
    
    public function index(){
        $comment1=array('val'=>'u.*','table'=>'user_Info as u','where'=>array("type_Of_User"=>'1'),'minvalue'=>'','group_by'=>'','start'=>'','orderby'=>'u.id','orderas'=>'DESC');
        $multijoin1=array(  
            //array('table'=>'user_store_info as usi','on'=>'usi.user_id=u.id','join_type'=>'left'),
        );

        $table=$this->common->multijoin($comment1,$multijoin1);
        $config = array();
        $config["base_url"] = BASE_URL. "admin/seller";
        $config["total_rows"] = ($table['res'])?count($table['rows']):0;
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config); 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //$log["data"]=$this->common->get_all_with_paginaiton($config["per_page"], $page ,$table);
        $resp['users']=$this->common->multijoin($comment1,$multijoin1,$config["per_page"], $page);
        $resp["links"] = $this->pagination->create_links();
        $resp['datashowcount'] = array('total' => $config["total_rows"], 'per_page' => $config["per_page"]);
        $resp['usertype']='seller';
        $resp['usertype2']='seller';
        $this->load->view('admin/include/admin_header');
        $this->load->view('admin/include/admin_left');
        $this->load->view('admin/users/admin_vw_user',$resp);
        $this->load->view('admin/include/admin_footer');
    }
    
    
    public function buyer(){
        $comment1=array('val'=>'','table'=>'user_Info as u','where'=>array("type_Of_User"=>'2'),'minvalue'=>'','group_by'=>'','start'=>'','orderby'=>'u.id','orderas'=>'DESC');
        $multijoin1=array(  
            //array('table'=>'category as cat','on'=>'p.category=cat.id','join_type'=>''),
        );

        $table=$this->common->multijoin($comment1,$multijoin1);
        $config = array();
        $config["base_url"] = BASE_URL. "admin/buyer";
        $config["total_rows"] = ($table['res'])?count($table['rows']):0;
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config); 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //$log["data"]=$this->common->get_all_with_paginaiton($config["per_page"], $page ,$table);
        $resp['users']=$this->common->multijoin($comment1,$multijoin1,$config["per_page"], $page);
        $resp["links"] = $this->pagination->create_links();
        $resp['datashowcount'] = array('total' => $config["total_rows"], 'per_page' => $config["per_page"]);
        $resp['usertype']='buyer';
        $resp['usertype2']='buyer';
        $this->load->view('admin/include/admin_header');
        $this->load->view('admin/include/admin_left');
        $this->load->view('admin/users/admin_vw_user',$resp);
        $this->load->view('admin/include/admin_footer');
    }
    
    
    public function featured(){
        $selectedid=$this->input->post("selectedmail");
        $count=count($selectedid);
        $data=array("table"=>"user_Info","val"=>array("featured"=>'1'),"where"=>array(),"in"=>"id","in_value"=>$selectedid);
        $log=$this->common->update_in_data($data);
        if($log){
            echo json_encode(array("status"=>true,"message"=>"$count User(s) added to featured list."));
        }else{
           echo json_encode(array("status"=>false,"message"=>"Error!"));
        }
    }
    
    
    public function unfeatured(){
        $selectedid=$this->input->post("selectedmail");
        $count=count($selectedid);
        $data=array("table"=>"user_Info","val"=>array("featured"=>'0'),"where"=>array(),"in"=>"id","in_value"=>$selectedid);
        $log=$this->common->update_in_data($data);
        if($log){
            echo json_encode(array("status"=>true,"message"=>"$count User(s) removed from featured list."));
        }else{
           echo json_encode(array("status"=>false,"message"=>"Error!"));
        }
    }
    
    
    public function details($id){
        
        $comment1=array('val'=>'u.*,slist.state as statename','table'=>'user_Info as u','where'=>array('u.id'=>$id),'minvalue'=>'','group_by'=>'','start'=>'','orderby'=>'u.id','orderas'=>'DESC');
        $multijoin1=array(  
            //array('table'=>'category as cat','on'=>'p.category=cat.id','join_type'=>''),
            array('table'=>'statelist as slist','on'=>'u.state=slist.id','join_type'=>'left'),
        );    
        $resp['users']=$this->common->multijoin($comment1,$multijoin1);
        //echo "<pre>";
        //print_r($resp); exit;
        $datastore=array('val'=>array(),'table'=>'user_store_info','where'=>array('user_id'=>$id));
        $resp['storedata']=$this->common->getdata($datastore);
        
        // select penalty buyer
        //$datapenalty=array('val'=>array(),'table'=>'buyer_review','where'=>array('rv_for'=>$id,'status'=>'1'));
        //$resp['datapenalty']=$this->common->getdata($datapenalty);
        
         $comment2=array('val'=>'br.*,u.id as sellerid,u.f_name,u.l_name,u.username','table'=>'buyer_review as br','where'=>array('br.rv_for'=>$id,'br.status'=>'1'),'minvalue'=>'','group_by'=>'','start'=>'','orderby'=>'br.id','orderas'=>'DESC');
        $multijoin2=array(  
            array('table'=>'user_Info as u','on'=>'br.rv_from=u.id','join_type'=>''),
        );

        $table=$this->common->multijoin($comment2,$multijoin2);
        $config = array();
        $config["base_url"] = BASE_URL. "admin/users/details/$id";
        $config["total_rows"] = ($table['res'])?count($table['rows']):0;
        $config["per_page"] = 10;
        $config["uri_segment"] = 5;
        $this->pagination->initialize($config); 
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        //$log["data"]=$this->common->get_all_with_paginaiton($config["per_page"], $page ,$table);
        $resp['datapenalty']=$this->common->multijoin($comment2,$multijoin2,$config["per_page"], $page);
        $resp["links"] = $this->pagination->create_links();
        $resp['datashowcount'] = array('total' => $config["total_rows"], 'per_page' => $config["per_page"]);
        
        
        if(!$resp['users']['res']){
                //$this->session->set_flashdata("warning","This is not valid user.");
                //redirect("404","refresh");
            echo "go to 404";
            }
        
        $this->load->view('admin/include/admin_header');
        $this->load->view('admin/include/admin_left');
        $this->load->view('admin/users/admin_vw_user_details',$resp);
        $this->load->view('admin/include/admin_footer');
    }
    
    
    
    public function penaltybuyer(){
        $comment1=array('val'=>'u.*,p.id as penaltyid','table'=>'penalty_noti as p','where'=>array(),'minvalue'=>'','group_by'=>'','start'=>'','orderby'=>'p.id','orderas'=>'DESC');
        $multijoin1=array(  
            array('table'=>'user_Info as u','on'=>'p.userid=u.id','join_type'=>''),
        );

        $table=$this->common->multijoin($comment1,$multijoin1);
        $config = array();
        $config["base_url"] = BASE_URL. "admin/users";
        $config["total_rows"] = ($table['res'])?count($table['rows']):0;
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config); 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //$log["data"]=$this->common->get_all_with_paginaiton($config["per_page"], $page ,$table);
        $resp['users']=$this->common->multijoin($comment1,$multijoin1,$config["per_page"], $page);
        $resp["links"] = $this->pagination->create_links();
        $resp['datashowcount'] = array('total' => $config["total_rows"], 'per_page' => $config["per_page"]);
        $resp['usertype']='buyer';
        $resp['usertype2']='Penalty Buyer';
        $this->load->view('admin/include/admin_header');
        $this->load->view('admin/include/admin_left');
        $this->load->view('admin/users/admin_vw_user',$resp);
        $this->load->view('admin/include/admin_footer');
    }
    
    
    public function removepenalty(){
        $selectedid=$this->input->post("selectedmail");
        $buyerid=$this->input->post("buyerid");
        $count=count($selectedid);
        $data=array("table"=>"buyer_review","val"=>array("status"=>'0'),"where"=>array(),"in"=>"id","in_value"=>$selectedid);
        $log=$this->common->update_in_data($data);
        if($log){$countdata=array("table"=>"buyer_review","where"=>array("rv_for"=>$buyerid,"status"=>'1'));
        $penaltypoint=$this->common->count_val($countdata);
        if($penaltypoint<3){
            $data1=array("table"=>"penalty_noti","where"=>array('userid'=>$buyerid));
            $log1=$this->common->delete_data($data1);
        } }
        if($log){
            echo json_encode(array("status"=>true,"message"=>"$count penalty point(s) removed from user."));
        }else{
           echo json_encode(array("status"=>false,"message"=>"Error!"));
        }
    }
    
    
    public function activeusers(){
        $selectedid=$this->input->post("selectedmail");
        $count=count($selectedid);
        $data=array("table"=>"user_Info","val"=>array("status"=>'1'),"where"=>array(),"in"=>"id","in_value"=>$selectedid);
        $log=$this->common->update_in_data($data);
        if($log){
            echo json_encode(array("status"=>true,"message"=>"$count User(s) added to active list."));
        }else{
           echo json_encode(array("status"=>false,"message"=>"Error!"));
        }
    }
    
    
    public function inactiveusers(){
        $selectedid=$this->input->post("selectedmail");
        $count=count($selectedid);
        $data=array("table"=>"user_Info","val"=>array("status"=>'0'),"where"=>array(),"in"=>"id","in_value"=>$selectedid);
        $log=$this->common->update_in_data($data);
        if($log){
            echo json_encode(array("status"=>true,"message"=>"$count User(s) removed from active list."));
        }else{
           echo json_encode(array("status"=>false,"message"=>"Error!"));
        }
    }
    
    
     public function search(){
        $searchby=$this->input->get('searchby');
        $val=$this->input->get('val'); $val=trim(urldecode($val));
        $usertype=$this->input->get('usertype');$usertype=trim(urldecode($usertype));
        if($searchby=='username'){ 
        if($usertype=='seller'){
            $query="select id from user_Info where type_Of_User='1' AND  ( f_name Like '%".$val."%' OR l_name Like '%".$val."%' OR  CONCAT(f_name,' ',l_name) Like '%".$val."%' OR  CONCAT(f_name,'',l_name) Like '%".$val."%' OR username Like '%".$val."%' OR email_id Like '%".$val."%' )";
        }else if($usertype=='buyer'){
            $query="select id from user_Info where type_Of_User='2' AND  ( f_name Like '%".$val."%' OR l_name Like '%".$val."%' OR  CONCAT(f_name,' ',l_name) Like '%".$val."%' OR  CONCAT(f_name,'',l_name) Like '%".$val."%' OR username Like '%".$val."%' OR email_id Like '%".$val."%' )";
        }else{
            $query="select id from user_Info where type_Of_User='2' AND  ( f_name Like '%".$val."%' OR l_name Like '%".$val."%' OR  CONCAT(f_name,' ',l_name) Like '%".$val."%' OR  CONCAT(f_name,'',l_name) Like '%".$val."%' OR username Like '%".$val."%' OR email_id Like '%".$val."%' )";
        }
        $result=$this->db->query($query);
        $users=array(); $rows=$result->result();
        foreach($rows as $user){ array_push($users, $user->id); }
        $mailuser=array_unique($users);
        //echo $this->db->last_query();exit;
        $resp=$this->searchbyother($mailuser,$searchby,$val,$usertype);
        
        }
		else if($searchby=='bussi_name')
		{
			if($usertype=='seller'){
            $query="select user_id from user_store_info where business_name Like '%".$val."%'";
			 }
			 
			 $result=$this->db->query($query);
             $users=array(); $rows=$result->result();
				foreach($rows as $user){ array_push($users, $user->user_id); }
				$mailuser=$users;
				//print_r($mailuser);exit;
				$resp=$this->searchbyother($mailuser,$searchby,$val,$usertype);
				//echo $this->db->last_query();
				//print_r($resp);
				//exit;
			
		}
		else{
            $this->session->set_flashdata("warning","Wrong data search");
            redirect("admin/$usertype","refresh");
        }

        $this->load->view('admin/include/admin_header');
        $this->load->view('admin/include/admin_left');
        $this->load->view('admin/users/admin_vw_user',$resp);
        $this->load->view('admin/include/admin_footer');
    }
    
    public function searchbyother($users,$searchby,$val,$usertype){
        $comment1=array('val'=>'','table'=>'user_Info as u','where'=>array(),'minvalue'=>'','group_by'=>'','start'=>'','in'=>'u.id',"in_value"=>'','orderby'=>'u.id','orderas'=>'DESC');
        if(count($users)>0){$comment1['in_value']=$users;}else{
            $resp['users']=array('res'=>false);
            $resp["links"] = '';
            if($usertype=='seller'){$resp['usertype']='seller'; $resp['usertype2']='seller';}else if($usertype=='buyer'){$resp['usertype']='buyer'; $resp['usertype2']='buyer';}else{$resp['usertype']='buyer';$resp['usertype2']='Penalty Buyer';}
            return $resp;
        }
        //$comment1=array('val'=>'','table'=>'user_Info as u','where'=>array("type_Of_User"=>'1'),'minvalue'=>'','group_by'=>'','start'=>'','orderby'=>'u.id','orderas'=>'DESC');
        $multijoin1=array();
        if($usertype=='Penalty Buyer'){$multijoin1=array(array('table'=>'penalty_noti as p','on'=>'u.id=p.userid','join_type'=>'right'));
        $comment1['val']='u.*,p.id as penaltyid';
        }
        $table=$this->common->multijoin_with_in($comment1,$multijoin1);
        $config = array();
        $config["base_url"] = BASE_URL. "admin/users/search?searchby=$searchby&val=$val&usertype=$usertype";
        $config["total_rows"] = ($table['res'])?count($table['rows']):0;
        $config["per_page"] = 20;
        $config["uri_segment"] = $this->input->get('per_page');
        $config['page_query_string']=true;
        $this->pagination->initialize($config); 
        //$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $page = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        //$log["data"]=$this->common->get_all_with_paginaiton($config["per_page"], $page ,$table);
        $resp['users']=$this->common->multijoin_with_in($comment1,$multijoin1,$config["per_page"], $page);
        $resp["links"] = $this->pagination->create_links();
        $resp['datashowcount'] = array('total' => $config["total_rows"], 'per_page' => $config["per_page"]);
        if($usertype=='seller'){$resp['usertype']='seller'; $resp['usertype2']='seller';}else if($usertype=='buyer'){$resp['usertype']='buyer'; $resp['usertype2']='buyer';}else{$resp['usertype']='buyer';$resp['usertype2']='Penalty Buyer';}
        //echo $this->db->last_query();exit;
        return $resp;
    }
  
    
    
    
} 
