<?php
 
class Upabasti_gramam extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Upabasti_gramam_model');
		$is_logged_in = $this->session->userdata("admin_id");
        if($is_logged_in == "" || $is_logged_in == null){
            redirect("dashboard/login");
        }
    } 

    /*
     * Listing of upabasti_gramam
     */
    function index()
    {
        $data['upabasti_gramam'] = $this->Upabasti_gramam_model->get_all_upabasti_gramam();
        
        $data['_view'] = 'upabasti_gramam/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new upabasti_gramam
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('upabasti_gramam_name','Upabasti Gramam Name','required|min_length[3]|max_length[50]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'basti_upamandal_id' => $this->input->post('basti_upamandal_id'),
				'upabasti_gramam_name' => $this->input->post('upabasti_gramam_name'),
				'updated_on' => date('Y-m-d H:i:s'),
				'created_on' => date('Y-m-d H:i:s'),
            );
            
            $upabasti_gramam_id = $this->Upabasti_gramam_model->add_upabasti_gramam($params);
            redirect('upabasti_gramam/index');
        }
        else
        {
			$this->load->model('Basti_upamandal_model');
			$data['all_basti_upamandal'] = $this->Basti_upamandal_model->get_all_basti_upamandal();
            
            $data['_view'] = 'upabasti_gramam/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a upabasti_gramam
     */
    function edit($upabasti_gramam_id)
    {   
        // check if the upabasti_gramam exists before trying to edit it
        $data['upabasti_gramam'] = $this->Upabasti_gramam_model->get_upabasti_gramam($upabasti_gramam_id);
        
        if(isset($data['upabasti_gramam']['upabasti_gramam_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('upabasti_gramam_name','Upabasti Gramam Name','required|min_length[3]|max_length[50]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'basti_upamandal_id' => $this->input->post('basti_upamandal_id'),
					'upabasti_gramam_name' => $this->input->post('upabasti_gramam_name'),
					'updated_on' => date('Y-m-d H:i:s'),
                );

                $this->Upabasti_gramam_model->update_upabasti_gramam($upabasti_gramam_id,$params);            
                redirect('upabasti_gramam/index');
            }
            else
            {
				$this->load->model('Basti_upamandal_model');
				$data['all_basti_upamandal'] = $this->Basti_upamandal_model->get_all_basti_upamandal();

                $data['_view'] = 'upabasti_gramam/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The upabasti_gramam you are trying to edit does not exist.');
    } 

    /*
     * Deleting upabasti_gramam
     */
    function remove($upabasti_gramam_id)
    {
        $upabasti_gramam = $this->Upabasti_gramam_model->get_upabasti_gramam($upabasti_gramam_id);

        // check if the upabasti_gramam exists before trying to delete it
        if(isset($upabasti_gramam['upabasti_gramam_id']))
        {
            $this->Upabasti_gramam_model->delete_upabasti_gramam($upabasti_gramam_id);
            redirect('upabasti_gramam/index');
        }
        else
            show_error('The upabasti_gramam you are trying to delete does not exist.');
    }
    
}
