<?php
 
class Dashboard extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        
    }

    function index($id='',$start='',$end='')
    {
		$is_logged_in = $this->session->userdata("admin_id");
        if($is_logged_in == "" || $is_logged_in == null){
            redirect("dashboard/login");
        }else{
			
			$where = "";
			$zwhere = "";
			if($this->session->userdata('zilla_id')!=0){
				$where = "WHERE zilla_id=".$this->session->userdata('zilla_id')."";
				$zwhere = "WHERE zilla_id=".$this->session->userdata('zilla_id')."";
			}
			if($id!="" && $id!=0){
				$where = "WHERE zilla_id=".$id."";
			}
			
			
			
			$data['nagar'] = $this->db->query('SELECT count(`nagar_khanda_id`) as total,`nagar_khanda_name` FROM `vw_contacts` '.$where.' group by `nagar_khanda_id` order by total DESC')->result_array();
			
			
			$data['occupation'] = $this->db->query('SELECT count(`occupation_id`) as total,`occupation_name` FROM `vw_contacts` '.$where.' group by `occupation_id`')->result_array();
			$data['contact_type'] = $this->db->query('SELECT count(`contact_type_id`) as total,`contact_type_name` FROM `vw_contacts` '.$where.' group by `contact_type_id`')->result_array();
			
			
			$data['zilladata'] = $this->db->query('SELECT count(`zilla_id`) as total,`zilla_name` FROM `vw_contacts` '.$zwhere.' group by `zilla_id` order by total DESC')->result_array();
			$data['volunteerdata'] = $this->db->query('SELECT count(`volunteer_name`) as total,`zilla_name` FROM `vw_contacts` '.$zwhere.' group by `zilla_id` order by total DESC')->result_array();

			$data['zilla'] = $this->db->query('SELECT * from zilla')->result_array();
			$data['id'] = $id;
			
			
			$trackwhere = "";
			if($this->input->post('jagaran_start_date')!="" && $this->input->post('jagaran_start_date')!=null){
				$start_date = date('Y-m-d',strtotime($this->input->post('jagaran_start_date')));
				$trackwhere .= " and jagaran_date>='$start_date'";
			}
			
			if($this->input->post('jagaran_end_date')!="" && $this->input->post('jagaran_end_date')!=null){
				$end_date = date('Y-m-d',strtotime($this->input->post('jagaran_end_date')));
				$trackwhere .= " and jagaran_date<='$end_date'";
			}
			
			
			
			if($this->session->userdata('zilla_id')!=0){
				if($this->input->post('zilla_id')!="" && $this->input->post('zilla_id')!=null){
					$zilla_id = $this->input->post('zilla_id');
				}else{
					$zilla_id = $this->session->userdata('zilla_id');
				}				
				$data['tracking'] = $this->db->query('select sum(families_covered) as families_covered,sum(teams_count) as teams_count,nagar_khanda_name from vw_nagar_jagaran_tracking where nagar_khanda_id in (select nagar_khanda_id from nagar_khanda where zilla_id='.$zilla_id.') '.$trackwhere.' group by nagar_khanda_id order by nagar_khanda_name ASC')->result_array();
			}elseif($this->session->userdata('nagar_khanda_id')!=0){
				$nagar_khanda_id = $this->session->userdata('nagar_khanda_id');
				$data['tracking'] = $this->db->query('select sum(families_covered) as families_covered,sum(teams_count) as teams_count,nagar_khanda_name from vw_nagar_jagaran_tracking where nagar_khanda_id ='.$nagar_khanda_id.' '.$trackwhere.' group by nagar_khanda_id order by nagar_khanda_name ASC')->result_array();
			}else{
				if($this->input->post('zilla_id')!="" && $this->input->post('zilla_id')!=null){
					$zilla_id = $this->input->post('zilla_id');
					$trackwhere .= ' and nagar_khanda_id in (select nagar_khanda_id from nagar_khanda where zilla_id='.$zilla_id.')';
				}
				$data['tracking'] = $this->db->query('select sum(families_covered) as families_covered,sum(teams_count) as teams_count,nagar_khanda_name from vw_nagar_jagaran_tracking  where nagar_khanda_id>0 '.$trackwhere.' group by nagar_khanda_id order by nagar_khanda_name ASC ')->result_array();
			}
			
            $data['_view'] = 'dashboard';
			$this->load->view('layouts/main',$data);
        }
        
    }
	
	function login()
    {
        $is_logged_in = $this->session->userdata("admin_id");
        if($is_logged_in == "" || $is_logged_in == null){
            $this->load->view('login');
        }else{
            redirect('dashboard/index');
        }      
        
    }
	
	function logout(){
        $this->session->sess_destroy();
        redirect("dashboard/login");
    }
	
	function checkLogin(){
		
        if(isset($_POST) && count($_POST) > 0)     
        {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $checkUser = $this->db->query("select * from admin_users where login_username='$email' AND login_password='$password'")->row_array();
            if(empty($checkUser)){
                $this->session->set_flashdata('err_msg', 'Please enter valid username and password');
                redirect('dashboard/login');
            }else{
				$this->session->set_userdata('admin_id',$checkUser['admin_id']);
				$this->session->set_userdata('zilla_id',$checkUser['zilla_id']);
				$this->session->set_userdata('nagar_khanda_id',$checkUser['nagar_khanda_id']);
				$this->session->set_userdata('role',$checkUser['role']);
				
				if($checkUser['nagar_khanda_id']==0)
				redirect("dashboard/index");
				else			
                redirect("vw_nagar_jagaran_tracking/index");
			
            }        
        }
        else
        {            
            //$data['_view'] = 'admin/login';
            $this->load->view('login');
        }
    }
}
