<?php
 
class Nagar_khanda extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nagar_khanda_model');
		$is_logged_in = $this->session->userdata("admin_id");
        if($is_logged_in == "" || $is_logged_in == null){
            redirect("dashboard/login");
        }
    } 

    /*
     * Listing of nagar_khanda
     */
    function index()
    {
        $data['nagar_khanda'] = $this->Nagar_khanda_model->get_all_nagar_khanda();
        
        $data['_view'] = 'nagar_khanda/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new nagar_khanda
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('nagar_khanda_name','Nagar Khanda Name','required|min_length[3]|max_length[50]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'zilla_id' => $this->input->post('zilla_id'),
				'nagar_khanda_name' => $this->input->post('nagar_khanda_name'),
				'updated_on' => date('Y-m-d H:i:s'),
				'created_on' => date('Y-m-d H:i:s'),
            );
            
            $nagar_khanda_id = $this->Nagar_khanda_model->add_nagar_khanda($params);
            redirect('nagar_khanda/index');
        }
        else
        {
			$this->load->model('Zilla_model');
			$data['all_zilla'] = $this->Zilla_model->get_all_zilla();
            
            $data['_view'] = 'nagar_khanda/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a nagar_khanda
     */
    function edit($nagar_khanda_id)
    {   
        // check if the nagar_khanda exists before trying to edit it
        $data['nagar_khanda'] = $this->Nagar_khanda_model->get_nagar_khanda($nagar_khanda_id);
        
        if(isset($data['nagar_khanda']['nagar_khanda_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('nagar_khanda_name','Nagar Khanda Name','required|min_length[3]|max_length[50]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'zilla_id' => $this->input->post('zilla_id'),
					'nagar_khanda_name' => $this->input->post('nagar_khanda_name'),
					'updated_on' => date('Y-m-d H:i:s'),
                );

                $this->Nagar_khanda_model->update_nagar_khanda($nagar_khanda_id,$params);            
                redirect('nagar_khanda/index');
            }
            else
            {
				$this->load->model('Zilla_model');
				$data['all_zilla'] = $this->Zilla_model->get_all_zilla();

                $data['_view'] = 'nagar_khanda/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The nagar_khanda you are trying to edit does not exist.');
    } 

    /*
     * Deleting nagar_khanda
     */
    function remove($nagar_khanda_id)
    {
        $nagar_khanda = $this->Nagar_khanda_model->get_nagar_khanda($nagar_khanda_id);

        // check if the nagar_khanda exists before trying to delete it
        if(isset($nagar_khanda['nagar_khanda_id']))
        {
            $this->Nagar_khanda_model->delete_nagar_khanda($nagar_khanda_id);
            redirect('nagar_khanda/index');
        }
        else
            show_error('The nagar_khanda you are trying to delete does not exist.');
    }
    
}
