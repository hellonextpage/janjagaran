<?php
 
class Web extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        		$this->load->model('Zilla_model');
		$this->load->model('Nagar_khanda_model');
        $this->load->model('Basti_upamandal_model');
		$this->load->model('Upabasti_gramam_model');
		$this->load->model('Palle_model');
		$this->load->model('Volunteer_model');
		$this->load->model('Occupation_model');
		$this->load->model('Contact_type_model');
		$this->load->model('Contact_model');
    }

    function index()
    {
		
		$data['all_zilla'] = $this->Zilla_model->get_all_zilla();
        $data['_view'] = 'web/volunteercheckin';
        $this->load->view('layouts/web',$data);
    }
	function contact($id="")
    {
		$zilla_id = $id;
		//$data['zilla'] = $this->Zilla_model->get_all_zilla();
		$data['nagar_khanda'] = $this->Nagar_khanda_model->get_all_nagar_khanda_zilla($zilla_id);
        //$data['basti_upamandal'] = $this->Basti_upamandal_model->get_all_basti_upamandal();
	//	$data['upabasti_gramam'] = $this->Upabasti_gramam_model->get_all_upabasti_gramam();
		//$data['palles'] = $this->Palle_model->get_all_palle();		
		$data['occupations'] = $this->Occupation_model->get_all_occupations();
		$data['contact_type'] = $this->Contact_type_model->get_all_contact_type();
		$basthi = $this->db->query("select basti_upamandal_id as child_id,basti_upamandal_name as child_name,nagar_khanda_id as parent_id from basti_upamandal")->result_array();
		$upabasthi = $this->db->query("select upabasti_gramam_id as child_id,upabasti_gramam_name as child_name,basti_upamandal_id as parent_id from upabasti_gramam")->result_array();
		$data['basthi'] = $basthi;
		$data['upabasthi'] = $upabasthi;
        $data['_view'] = 'web/contact';
		$data['message']="";
		
        $this->load->view('layouts/web',$data);
    }
	function getnagar(){
		$zilla_id = $this->input->post('zilla_id');
		$result = $this->Nagar_khanda_model->get_all_nagar_khanda_zilla($zilla_id);
		$basthi = $this->db->query("select basti_upamandal_id as child_id,basti_upamandal_name as child_name,nagar_khanda_id as parent_id from basti_upamandal")->result_array();
		$upabasthi = $this->db->query("select upabasti_gramam_id as child_id,upabasti_gramam_name as child_name,basti_upamandal_id as parent_id from upabasti_gramam")->result_array();
			$data['basthi'] = $basthi;
			$data['data'] = $result;
			$data['upabasthi'] = $upabasthi;
			$data['message'] = "Data returned successfully.";
			echo json_encode($data);

	}
		    /*
     * Adding a new volunteer
     */
    function add_volunteer()
    {   
	        $this->load->library('form_validation');


		$this->form_validation->set_rules('volunteer_name','Volunteer Name','required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('mobile_no','Mobile No','required|min_length[10]|max_length[15]|integer');
		$this->form_validation->set_rules('zilla_id','Zilla','required');
		$this->form_validation->set_rules('latitude','Latitude','decimal');
		$this->form_validation->set_rules('longitude','Longitude','decimal');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'zilla_id' => $this->input->post('zilla_id'),
				'volunteer_name' => $this->input->post('volunteer_name'),
				'mobile_no' => $this->input->post('mobile_no'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'auth_key' => $this->input->post('auth_key'),
				'device_id' => $this->input->post('device_id'),
				'updated_on' => date('Y-m-d H:i:s'),
				'created_on' => date('Y-m-d H:i:s'),
            );
            
            $volunteer_id = $this->Volunteer_model->add_volunteer($params);
		
				$this->session->set_userdata('is_volunteer_just_checkedin', true);
				$this->session->set_userdata('checked_in_name', $this->input->post('volunteer_name'));
				$this->session->set_userdata('added_by', $volunteer_id);
				$this->session->set_userdata('zilla_id', $this->input->post('zilla_id'));
				
				redirect('web/contact/'.$this->input->post('zilla_id'));	
		
        }
        else
        {
			$this->load->model('Zilla_model');
			$data['all_zilla'] = $this->Zilla_model->get_all_zilla();
            			
            $data['_view'] = 'web/volunteercheckin';					
            $this->load->view('layouts/web',$data);
			
        }
    } 
	
	 /*
     * Adding a new contact
     */
	 
	 function save_contact(){
		 
        $this->load->library('form_validation');

		$this->form_validation->set_rules('contact_name','Contact Name','required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('contact_type_id','Contact Type Id','required');
		$this->form_validation->set_rules('mobile_no','Mobile No','min_length[10]|max_length[15]|integer');
		$this->form_validation->set_rules('address','Address','max_length[500]');
		//$this->form_validation->set_rules('latitude','Latitude','decimal');
		//$this->form_validation->set_rules('longitude','Longitude','decimal');
		$this->form_validation->set_rules('comment','Comment','max_length[500]');
		//$this->form_validation->set_rules('added_by','Added By','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'occupation_id' => $this->input->post('occupation_id'),
				'contact_type_id' => $this->input->post('contact_type_id'),
				'locality_id' => $this->input->post('gramam'),
				'added_by' => $this->input->post('added_by'),
				'contact_name' => $this->input->post('contact_name'),
				'mobile_no' => $this->input->post('mobile_no'),
				'locality_type' => $this->input->post('locality_type'),
				'address' => $this->input->post('address'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'comment' => $this->input->post('comment'),
				'updated_on' => date('Y-m-d H:i:s'),
				'created_on' => date('Y-m-d H:i:s'),
            );
            
            $contact_id = $this->Contact_model->add_contact($params);
			echo true;
        }else{
			echo false;
		}
	 }
    function add_contact()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('contact_name','Contact Name','required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('contact_type_id','Contact Type Id','required');
		$this->form_validation->set_rules('mobile_no','Mobile No','min_length[10]|max_length[15]|integer');
		$this->form_validation->set_rules('address','Address','max_length[500]');
		//$this->form_validation->set_rules('latitude','Latitude','decimal');
		//$this->form_validation->set_rules('longitude','Longitude','decimal');
		$this->form_validation->set_rules('comment','Comment','max_length[500]');
		//$this->form_validation->set_rules('added_by','Added By','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'occupation_id' => $this->input->post('occupation_id'),
				'contact_type_id' => $this->input->post('contact_type_id'),
				'locality_id' => $this->input->post('locality_id'),
				'added_by' => $this->input->post('added_by'),
				'contact_name' => $this->input->post('contact_name'),
				'mobile_no' => $this->input->post('mobile_no'),
				'locality_type' => $this->input->post('locality_type'),
				'address' => $this->input->post('address'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'comment' => $this->input->post('comment'),
				'updated_on' => date('Y-m-d H:i:s'),
				'created_on' => date('Y-m-d H:i:s'),
            );
            
            $contact_id = $this->Contact_model->add_contact($params);
			//echo "saved";
            //redirect('web/contact');
			$data['_view'] = 'web/contact';
			$data['message'] = 'Contact has saved successfully';		
		$data['nagar_khanda'] = $this->Nagar_khanda_model->get_all_nagar_khanda();        		
		$data['occupations'] = $this->Occupation_model->get_all_occupations();
		$data['contact_type'] = $this->Contact_type_model->get_all_contact_type();
            $this->load->view('layouts/web',$data);
        }
        else
        {
			        		$this->load->model('Zilla_model');
		$this->load->model('Nagar_khanda_model');
        $this->load->model('Basti_upamandal_model');
		$this->load->model('Upabasti_gramam_model');
		$this->load->model('Palle_model');
		$this->load->model('Volunteer_model');
		$this->load->model('Occupation_model');
		$this->load->model('Contact_type_model');
		$this->load->model('Contact_model');
		
				$data['zilla'] = $this->Zilla_model->get_all_zilla();
		$data['nagar_khanda'] = $this->Nagar_khanda_model->get_all_nagar_khanda();
        $data['basti_upamandal'] = $this->Basti_upamandal_model->get_all_basti_upamandal();
		$data['upabasti_gramam'] = $this->Upabasti_gramam_model->get_all_upabasti_gramam();
		$data['palles'] = $this->Palle_model->get_all_palle();		
		$data['occupations'] = $this->Occupation_model->get_all_occupations();
		$data['contact_type'] = $this->Contact_type_model->get_all_contact_type();
            
            $data['_view'] = 'web/contact';
			$data['message'] = 'Something went wrong. Please try again';
			//echo "not saved";
            $this->load->view('layouts/web',$data);
        }
    } 
	
	function getData()
	{
		$id = $this->input->post('id');
		$tablekey = $this->input->post('tablekey');
		if($tablekey == 'khanda'){
			$result =    $this->db->select('nagar_khanda_id as id,nagar_khanda_name as name')->order_by('nagar_khanda_name','ASC')->get_where('nagar_khanda',array('zilla_id'=>$id))->result_array();
		}else if($tablekey == 'upamandal'){
			$result = $this->Basti_upamandal_model->get_basti_upamandal_nagar_khanda_id($id);
		}else if($tablekey == 'gramam'){
			$result = $this->Upabasti_gramam_model->get_upabasti_gramam_basti_upamandal_id($id);
		}else{
			$result = $this->Palle_model->get_palle_upabasti_gramam_id($id);
		}
		if(empty($result)){
			$data['status'] = false;
			$data['data'] = array();
			$data['message'] = "No records founded.";
		}else{
			$data['status'] = true;
			$data['data'] = $result;
			$data['message'] = "Data returned successfully.";
		}
		echo json_encode($data);
	}
}