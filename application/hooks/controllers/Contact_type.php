<?php
 
class Contact_type extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Contact_type_model');
		$is_logged_in = $this->session->userdata("admin_id");
        if($is_logged_in == "" || $is_logged_in == null){
            redirect("dashboard/login");
        }
    } 

    /*
     * Listing of contact_type
     */
    function index()
    {
        $data['contact_type'] = $this->Contact_type_model->get_all_contact_type();
        
        $data['_view'] = 'contact_type/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new contact_type
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('contact_type_name','Contact Type Name','required|min_length[3]|max_length[50]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'contact_type_name' => $this->input->post('contact_type_name'),
				'updated_on' => date('Y-m-d H:i:s'),
				'created_on' => date('Y-m-d H:i:s'),
            );
            
            $contact_type_id = $this->Contact_type_model->add_contact_type($params);
            redirect('contact_type/index');
        }
        else
        {            
            $data['_view'] = 'contact_type/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a contact_type
     */
    function edit($contact_type_id)
    {   
        // check if the contact_type exists before trying to edit it
        $data['contact_type'] = $this->Contact_type_model->get_contact_type($contact_type_id);
        
        if(isset($data['contact_type']['contact_type_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('contact_type_name','Contact Type Name','required|min_length[3]|max_length[50]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'contact_type_name' => $this->input->post('contact_type_name'),
					'updated_on' => date('Y-m-d H:i:s'),
                );

                $this->Contact_type_model->update_contact_type($contact_type_id,$params);            
                redirect('contact_type/index');
            }
            else
            {
                $data['_view'] = 'contact_type/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The contact_type you are trying to edit does not exist.');
    } 

    /*
     * Deleting contact_type
     */
    function remove($contact_type_id)
    {
        $contact_type = $this->Contact_type_model->get_contact_type($contact_type_id);

        // check if the contact_type exists before trying to delete it
        if(isset($contact_type['contact_type_id']))
        {
            $this->Contact_type_model->delete_contact_type($contact_type_id);
            redirect('contact_type/index');
        }
        else
            show_error('The contact_type you are trying to delete does not exist.');
    }
    
}
