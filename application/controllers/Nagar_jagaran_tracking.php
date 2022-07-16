<?php
 
class Nagar_jagaran_tracking extends CI_Controller{
	
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nagar_jagaran_tracking_model');
		$this->load->model('Vw_nagar_jagaran_tracking_model');
		$this->load->model('Nagar_khanda_model');
    } 

    /*
     * Listing of Nagar_jagaran_tracking
     */
    function index()
    {
        		$data['nagar_khanda'] = $this->Nagar_khanda_model->get_all_nagar_khanda_if_session_has_nagar();
        $data['vw_nagar_jagaran_trackings'] = $this->Vw_nagar_jagaran_tracking_model->get_all_vw_nagar_jagaran_trackings();
        
        $data['_view'] = 'vw_nagar_jagaran_tracking/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new nagar_jagaran_tracking
     */
    function add()
    {   
		
		if($this->session->userdata('nagar_khanda_id')){
			
		
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'nagar_khanda_id' => $this->session->userdata('nagar_khanda_id'),
				'jagaran_date' => $this->input->post('jagaran_date'),
				'families_covered' => $this->input->post('families_covered'),
				'teams_count' => $this->input->post('teams_count'),
				'updated_on' => date('Y-m-d H:i:s'),
				'created_on' => date('Y-m-d H:i:s')
				
            );
            
            $nagar_jagaran_tracking_id = $this->Nagar_jagaran_tracking_model->add_nagar_jagaran_tracking($params);
            redirect('vw_nagar_jagaran_tracking/index');
        }
        else
        {            
            $data['_view'] = 'nagar_jagaran_tracking/add';
            $this->load->view('layouts/main',$data);
        }
		}
		else{
			
			show_error('Please login as nagar admin');
    } 
	}	

    /*
     * Editing a nagar_jagaran_tracking
     */
    function edit($nagar_id,$jagaran_date)
    {   
        // check if the nagar_jagaran_tracking exists before trying to edit it
        $data['nagar_jagaran_tracking'] = $this->Nagar_jagaran_tracking_model->get_nagar_jagaran_tracking_byid_date($nagar_id,$jagaran_date);
        //echo $this->db->last_query();
        if(isset($data['nagar_jagaran_tracking']['nagar_khanda_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
				'nagar_khanda_id' => $nagar_id,
				'jagaran_date' => $this->input->post('jagaran_date'),
				'families_covered' => $this->input->post('families_covered'),
				'teams_count' => $this->input->post('teams_count'),
				'updated_on' => date('Y-m-d H:i:s')				
                );

                $this->Nagar_jagaran_tracking_model->update_nagar_jagaran_tracking($nagar_id,$jagaran_date,$params);            
                redirect('nagar_jagaran_tracking/index');
            }
            else
            {
                $data['_view'] = 'nagar_jagaran_tracking/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The nagar jagaran tracking you are trying to edit does not exist.');
    } 

    /*
     * Deleting nagar_jagaran_tracking
     */
    function remove($nagar_id,$jagaran_date)
    {
       // $nagar_jagaran_tracking = $this->Nagar_jagaran_tracking_model->get_nagar_jagaran_tracking($nagar_jagaran_tracking_id);

        // check if the nagar_jagaran_tracking exists before trying to delete it
        if(isset($nagar_id) && isset($jagaran_date))
        {
            $this->Nagar_jagaran_tracking_model->delete_nagar_jagaran_tracking($nagar_id,$jagaran_date);
            redirect('nagar_jagaran_tracking/index');
        }
        else
            show_error('Nagar ID and Date are mandatory');
    }
    
}
