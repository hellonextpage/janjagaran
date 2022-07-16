<?php
 
class Occupation extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Occupation_model');
		$is_logged_in = $this->session->userdata("admin_id");
        if($is_logged_in == "" || $is_logged_in == null){
            redirect("dashboard/login");
        }
    } 

    /*
     * Listing of occupations
     */
    function index()
    {
        $data['occupations'] = $this->Occupation_model->get_all_occupations();
        
        $data['_view'] = 'occupation/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new occupation
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('occupation_name','Occupation Name','required|min_length[3]|max_length[50]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'occupation_name' => $this->input->post('occupation_name'),
				'updated_on' => date('Y-m-d H:i:s'),
				'created_on' => date('Y-m-d H:i:s'),
            );
            
            $occupation_id = $this->Occupation_model->add_occupation($params);
            redirect('occupation/index');
        }
        else
        {            
            $data['_view'] = 'occupation/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a occupation
     */
    function edit($occupation_id)
    {   
        // check if the occupation exists before trying to edit it
        $data['occupation'] = $this->Occupation_model->get_occupation($occupation_id);
        
        if(isset($data['occupation']['occupation_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('occupation_name','Occupation Name','required|min_length[3]|max_length[50]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'occupation_name' => $this->input->post('occupation_name'),
					'updated_on' => date('Y-m-d H:i:s'),
                );

                $this->Occupation_model->update_occupation($occupation_id,$params);            
                redirect('occupation/index');
            }
            else
            {
                $data['_view'] = 'occupation/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The occupation you are trying to edit does not exist.');
    } 

    /*
     * Deleting occupation
     */
    function remove($occupation_id)
    {
        $occupation = $this->Occupation_model->get_occupation($occupation_id);

        // check if the occupation exists before trying to delete it
        if(isset($occupation['occupation_id']))
        {
            $this->Occupation_model->delete_occupation($occupation_id);
            redirect('occupation/index');
        }
        else
            show_error('The occupation you are trying to delete does not exist.');
    }
    
}
