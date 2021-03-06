<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Vw_contact extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Vw_contact_model');
		$is_logged_in = $this->session->userdata("admin_id");
        if($is_logged_in == "" || $is_logged_in == null){
            redirect("dashboard/login");
        }
    } 

    /*
     * Listing of vw_contacts
     */
    function index()
    {
        $data['vw_contacts'] = $this->Vw_contact_model->get_all_vw_contacts();
		if($this->session->userdata('zilla_id')!=0){
			$data['zilla'] = $this->db->query("select * from zilla where zilla_id=".$this->session->userdata('zilla_id'))->result_array();
			
		}else{
			$data['zilla'] = $this->db->query("select * from zilla")->result_array();	
		}
		if($this->session->userdata('nagar_khanda_id')==0 && $this->session->userdata('zilla_id')==0){
			$data['nagar_data'] = [];
			
		}elseif($this->session->userdata('zilla_id')!=0 && $this->session->userdata('nagar_khanda_id')==0){
			$data['nagar_data'] = $this->db->query("select * from nagar_khanda where zilla_id=".$this->session->userdata('zilla_id'))->result_array();
			
		}else{
			$data['nagar_data'] = $this->db->query("select * from nagar_khanda where nagar_khanda_id=".$this->session->userdata('nagar_khanda_id'))->result_array();	
		}		
		$data['basti_data'] = [];//$this->db->query("select * from basti_upamandal")->result_array();
		$data['upabasti_data'] = [];//$this->db->query("select * from upabasti_gramam")->result_array();
		$data['occupation_data'] = $this->db->query("select * from occupations")->result_array();
		$data['contact_data'] = $this->db->query("select * from contact_type")->result_array();
        $data['_view'] = 'vw_contact/index';
		$data['nagar'] = '';
		$data['zilla_id'] = '';
		$data['basthi'] = '';
		$data['upabasti'] = '';
		$data['v_mobile'] = '';
		$data['d_mobile'] = '';
		$data['occupation'] = '';
		$data['contact_type'] = '';
		
        $this->load->view('layouts/main',$data);
    }
	
	function search()
	{
		$data['basti_data'] = [];//$this->db->query("select * from basti_upamandal")->result_array();
		$data['upabasti_data'] = [];//$this->db->query("select * from upabasti_gramam")->result_array();
		
		$where = "WHERE contact_id>0";
		
		if($this->input->post('zilla')!="" && $this->input->post('zilla')!=null){
			$where .= " AND zilla_id=".$this->input->post('zilla')."";
		}
		
		
		
		if($this->input->post('nagar')!="" && $this->input->post('nagar')!=null){
			$where .= " AND nagar_khanda_id=".$this->input->post('nagar')."";
			$data['nagar_data'] = $this->db->query("select * from nagar_khanda where nagar_khanda_id=".$this->input->post('nagar'))->result_array();
		}
		
		if($this->input->post('basthi')!="" && $this->input->post('basthi')!=null){
			$where .= " AND basti_upamandal_id=".$this->input->post('basthi')."";
			$data['basti_data'] = $this->db->query("select * from basti_upamandal where basti_upamandal_id=".$this->input->post('basthi'))->result_array();
		}
		
		if($this->input->post('upabasti')!="" && $this->input->post('upabasti')!=null){
			$where .= " AND upabasti_gramam_id=".$this->input->post('upabasti')."";
			$data['upabasti_data'] = $this->db->query("select * from upabasti_gramam where upabasti_gramam_id=".$this->input->post('upabasti'))->result_array();
		}
		
		if($this->input->post('v_mobile')!="" && $this->input->post('v_mobile')!=null){
			$v_mobile = $this->input->post('v_mobile');
			$where .= " AND volunteer_mobileno like '%$v_mobile%'";
		}
		
		if($this->input->post('d_mobile')!="" && $this->input->post('d_mobile')!=null){
			$d_mobile = $this->input->post(d_mobile);
			$where .= " AND mobile_no like '%$d_mobile%'";
		}
		
		if($this->input->post('occupation')!="" && $this->input->post('occupation')!=null){
			$where .= " AND occupation_id=".$this->input->post('occupation')."";
		}
		
		if($this->input->post('contact_type')!="" && $this->input->post('contact_type')!=null){
			$where .= " AND contact_type_id=".$this->input->post('contact_type')."";
		}
		$data['vw_contacts'] = $this->db->query("select * from vw_contacts ".$where."")->result_array();
		if($this->input->post('export') == 1){
			$output = '';
			$exportdata = $this->db->query("select contact_name,mobile_no,contact_type_name,occupation_name,volunteer_name,volunteer_mobileno,upabasti_gramam_name,basti_upamandal_name,nagar_khanda_name,zilla_name from vw_contacts ".$where." group by mobile_no,contact_name")->result_array();

			if(count($exportdata)>0){
				
			  header('Content-Type: text/csv; charset=utf-8');  
			  header('Content-Disposition: attachment; filename=contactdata.csv');  
			  $output = fopen("php://output", "w");  
			  fputcsv($output, array('Name', 'Mobile', 'Contact Type', 'Occupation', 'Volunteer', 'Volunteer Mobile', 'Upabasti', 'Basti', 'Nagar', 'Zilla'));  
			    
			  foreach($exportdata as $key=>$value)
			  {  
				   fputcsv($output, $value);  
			  }  
			  fclose($output);
			}
			
			
		}else{
			if($this->session->userdata('zilla_id')!=0){
			$data['zilla'] = $this->db->query("select * from zilla where zilla_id=".$this->session->userdata('zilla_id'))->result_array();
			
		}else{
			$data['zilla'] = $this->db->query("select * from zilla")->result_array();	
		}
		
		if($this->session->userdata('nagar_khanda_id')==0 && $this->session->userdata('zilla_id')==0){
			$data['nagar_data'] = [];
			
		}elseif($this->session->userdata('zilla_id')!=0 && $this->session->userdata('nagar_khanda_id')==0){
			$data['nagar_data'] = $this->db->query("select * from nagar_khanda where zilla_id=".$this->session->userdata('zilla_id'))->result_array();
			
		}else{
			$data['nagar_data'] = $this->db->query("select * from nagar_khanda where nagar_khanda_id=".$this->session->userdata('nagar_khanda_id'))->result_array();	
		}
		$data['occupation_data'] = $this->db->query("select * from occupations")->result_array();
		$data['contact_data'] = $this->db->query("select * from contact_type")->result_array();
		$data['zilla_id'] = $this->input->post('zilla');
		$data['nagar'] = $this->input->post('nagar');
		$data['basthi'] = $this->input->post('basthi');
		$data['upabasti'] = $this->input->post('upabasti');
		$data['v_mobile'] = $this->input->post('v_mobile');
		$data['d_mobile'] = $this->input->post('d_mobile');
		$data['occupation'] = $this->input->post('occuption');
		$data['contact_type'] = $this->input->post('contact_type');
        $data['_view'] = 'vw_contact/index';
        $this->load->view('layouts/main',$data);
		}
		
	}

    /*
     * Adding a new vw_contact
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
					'contact_name' => $this->input->post('contact_name'),
					'occupation_id' => $this->input->post('occupation_id'),
					'contact_type_id' => $this->input->post('contact_type_id'),
					'locality_id' => $this->input->post('upabasti_gramam_id'),
					'mobile_no' => $this->input->post('mobile_no'),
					'address' => $this->input->post('address'),					
					'comment' => $this->input->post('comment'),
					'updated_on' => date('Y-m-d H:i:s'),
					'created_on' => date('Y-m-d H:i:s'),
                );
            
            $vw_contact_id = $this->Vw_contact_model->add_vw_contact($params);
            redirect('vw_contact/index');
        }
        else
        {  
			$data['occupation'] = $this->db->query('select * from occupations')->result_array();
			$data['contact'] = $this->db->query('select * from contact_type')->result_array();
			$data['nagar'] = $this->db->query('select * from nagar_khanda')->result_array();
			$data['basthi'] = $this->db->query('select * from basti_upamandal')->result_array();
			$data['upabasthi'] = $this->db->query('select * from upabasti_gramam')->result_array();
			$data['zilla'] = $this->db->query('select * from zilla')->result_array();	
            $data['_view'] = 'vw_contact/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a vw_contact
     */
    function edit($id)
    {   
        // check if the vw_contact exists before trying to edit it
        $data['vw_contact'] = $this->Vw_contact_model->get_vw_contact($id);
        
        if(isset($data['vw_contact']['contact_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'contact_name' => $this->input->post('contact_name'),
					'occupation_id' => $this->input->post('occupation_id'),
					'contact_type_id' => $this->input->post('contact_type_id'),
					'locality_id' => $this->input->post('upabasti_gramam_id'),
					'mobile_no' => $this->input->post('mobile_no'),
					'address' => $this->input->post('address'),					
					'comment' => $this->input->post('comment'),
					'updated_on' => date('Y-m-d H:i:s'),
                );

                $this->Vw_contact_model->update_vw_contact($id,$params);            
                redirect('vw_contact/index');
            }
            else
            {
                $data['_view'] = 'vw_contact/edit';
				$data['occupation'] = $this->db->query('select * from occupations')->result_array();
				$data['contact'] = $this->db->query('select * from contact_type')->result_array();
				$data['nagar'] = $this->db->query('select * from nagar_khanda')->result_array();
				$data['basthi'] = $this->db->query('select * from basti_upamandal')->result_array();
				$data['upabasthi'] = $this->db->query('select * from upabasti_gramam')->result_array();
				$data['zilla'] = $this->db->query('select * from zilla')->result_array();
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The vw_contact you are trying to edit does not exist.');
    } 

    /*
     * Deleting vw_contact
     */
    function remove($id)
    {
        $vw_contact = $this->Vw_contact_model->get_vw_contact($id);

        // check if the vw_contact exists before trying to delete it
        if(isset($vw_contact['id']))
        {
            $this->Vw_contact_model->delete_vw_contact($id);
            redirect('vw_contact/index');
        }
        else
            show_error('The vw_contact you are trying to delete does not exist.');
    }
    
}
