<?php

class Zilla extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Zilla_model');
		$is_logged_in = $this->session->userdata("admin_id");
        if($is_logged_in == "" || $is_logged_in == null){
            redirect("dashboard/login");
        }
    } 

    /*
     * Listing of zilla
     */
    function index()
    {
        $data['zilla'] = $this->Zilla_model->get_all_zilla();
        
        $data['_view'] = 'zilla/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new zilla
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('zilla_name','Zilla Name','required|min_length[3]|max_length[50]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'zilla_name' => $this->input->post('zilla_name'),
				'updated_on' => date('Y-m-d H:i:s'),
				'created_on' => date('Y-m-d H:i:s'),
            );
            
            $zilla_id = $this->Zilla_model->add_zilla($params);
            redirect('zilla/index');
        }
        else
        {            
            $data['_view'] = 'zilla/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a zilla
     */
    function edit($zilla_id)
    {   
        // check if the zilla exists before trying to edit it
        $data['zilla'] = $this->Zilla_model->get_zilla($zilla_id);
        
        if(isset($data['zilla']['zilla_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('zilla_name','Zilla Name','required|min_length[3]|max_length[50]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'zilla_name' => $this->input->post('zilla_name'),
					'updated_on' => date('Y-m-d H:i:s'),
                );

                $this->Zilla_model->update_zilla($zilla_id,$params);            
                redirect('zilla/index');
            }
            else
            {
                $data['_view'] = 'zilla/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The zilla you are trying to edit does not exist.');
    } 

    /*
     * Deleting zilla
     */
    function remove($zilla_id)
    {
        $zilla = $this->Zilla_model->get_zilla($zilla_id);

        // check if the zilla exists before trying to delete it
        if(isset($zilla['zilla_id']))
        {
            $this->Zilla_model->delete_zilla($zilla_id);
            redirect('zilla/index');
        }
        else
            show_error('The zilla you are trying to delete does not exist.');
    }
    
}
