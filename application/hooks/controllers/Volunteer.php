<?php
 
class Volunteer extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Volunteer_model');
		$is_logged_in = $this->session->userdata("admin_id");
        if($is_logged_in == "" || $is_logged_in == null){
            redirect("dashboard/login");
        }
    } 

    /*
     * Listing of volunteers
     */
    function index()
    {
        $data['volunteers'] = $this->Volunteer_model->get_all_volunteers();
		if($this->session->userdata('zilla_id')!=0){
			$data['zilla'] = $this->db->query("select * from zilla where zilla_id=".$this->session->userdata('zilla_id'))->result_array();
			
		}else{
			$data['zilla'] = $this->db->query("select * from zilla")->result_array();	
		}
		 $data['zilla_id'] = "";
 $data['v_name'] = "";  
 $data['v_mobile'] = ""; 
$data['start_date'] = "";  
$data['end_date'] = "";   
        
		$data['_view'] = 'volunteer/index';
        $this->load->view('layouts/main',$data);
    }
	
	function search(){
		
		$where = "WHERE volunteer_id>0";
		
		if($this->input->post('zilla')!="" && $this->input->post('zilla')!=null){
			$where .= " AND v.zilla_id=".$this->input->post('zilla')."";
		}
		
		if($this->input->post('v_name')!="" && $this->input->post('v_name')!=null){
			$v_name = $this->input->post('v_name');
			$where .= " AND v.volunteer_name like '%$v_name%'";
		}
		
		
		if($this->input->post('v_mobile')!="" && $this->input->post('v_mobile')!=null){
			$v_mobile = $this->input->post('v_mobile');
			$where .= " AND v.mobile_no like '%$v_mobile%'";
		}
		
		if($this->input->post('start_date')!="" && $this->input->post('start_date')!=null){
			$start_date = strtr($this->input->post('start_date'), '/', '-');
			$start_date = date('Y-m-d',strtotime($start_date));
			$where .= " AND DATE(v.created_on)>='$start_date'";
		}
		
		if($this->input->post('end_date')!="" && $this->input->post('end_date')!=null){
			$end_date = strtr($this->input->post('end_date'), '/', '-');
			$end_date = date('Y-m-d',strtotime($end_date));
			$where .= " AND DATE(v.created_on)=<'%$end_date%'";
		}
		$data['volunteers'] =  $this->db->query("select v.*,z.zilla_name from volunteers v left join zilla z on v.zilla_id=z.zilla_id ".$where." order by v.volunteer_id DESC")->result_array();
		if($this->session->userdata('zilla_id')!=0){
			$data['zilla'] = $this->db->query("select * from zilla where zilla_id=".$this->session->userdata('zilla_id'))->result_array();
			
		}else{
			$data['zilla'] = $this->db->query("select * from zilla")->result_array();	
		}
		 $data['zilla_id'] = $this->input->post('zilla');
 $data['v_name'] = $this->input->post('v_name');  
 $data['v_mobile'] = $this->input->post('v_mobile'); 
$data['start_date'] = $this->input->post('start_date');  
$data['end_date'] = $this->input->post('end_date');   
        
		$data['_view'] = 'volunteer/index';
        $this->load->view('layouts/main',$data);

	}

    /*
     * Adding a new volunteer
     */
    function add()
    {   
	        $this->load->library('form_validation');


		$this->form_validation->set_rules('volunteer_name','Volunteer Name','required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('mobile_no','Mobile No','required|min_length[10]|max_length[15]|integer');
		$this->form_validation->set_rules('zilla_id','Zilla Id','required');
		
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'zilla_id' => $this->input->post('zilla_id'),
				'volunteer_name' => $this->input->post('volunteer_name'),
				'mobile_no' => $this->input->post('mobile_no'),
				'updated_on' => date('Y-m-d H:i:s'),
				'created_on' => date('Y-m-d H:i:s'),
            );
            
            $volunteer_id = $this->Volunteer_model->add_volunteer($params);
			
				
				redirect('volunteer/index');
			
        }
        else
        {
			$this->load->model('Zilla_model');
			$data['all_zilla'] = $this->Zilla_model->get_all_zilla();
          
				
				$data['_view'] = 'volunteer/add';					
            $this->load->view('layouts/main',$data);
			
        }
    }  
	


    /*
     * Editing a volunteer
     */
    function edit($volunteer_id)
    {   
        // check if the volunteer exists before trying to edit it
        $data['volunteer'] = $this->Volunteer_model->get_volunteer($volunteer_id);
        
        if(isset($data['volunteer']['volunteer_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('volunteer_name','Volunteer Name','required|min_length[3]|max_length[50]|alpha_numeric');
			$this->form_validation->set_rules('mobile_no','Mobile No','required|min_length[10]|max_length[15]|integer');
			$this->form_validation->set_rules('zilla_id','Zilla Id','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'zilla_id' => $this->input->post('zilla_id'),
					'volunteer_name' => $this->input->post('volunteer_name'),
					'mobile_no' => $this->input->post('mobile_no'),
					'updated_on' => date('Y-m-d H:i:s'),
                );

                $this->Volunteer_model->update_volunteer($volunteer_id,$params);            
                redirect('volunteer/index');
            }
            else
            {
				$this->load->model('Zilla_model');
				$data['all_zilla'] = $this->Zilla_model->get_all_zilla();

                $data['_view'] = 'volunteer/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The volunteer you are trying to edit does not exist.');
    } 

    /*
     * Deleting volunteer
     */
    function remove($volunteer_id)
    {
        $volunteer = $this->Volunteer_model->get_volunteer($volunteer_id);

        // check if the volunteer exists before trying to delete it
        if(isset($volunteer['volunteer_id']))
        {
            $this->Volunteer_model->delete_volunteer($volunteer_id);
            redirect('volunteer/index');
        }
        else
            show_error('The volunteer you are trying to delete does not exist.');
    }
    
}
