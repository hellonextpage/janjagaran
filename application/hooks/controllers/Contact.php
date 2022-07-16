<?php
 
class Contact extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Contact_model');
		$is_logged_in = $this->session->userdata("admin_id");
        if($is_logged_in == "" || $is_logged_in == null){
            redirect("dashboard/login");
        }
    } 

    /*
     * Listing of contacts
     */
    function index()
    {
        $data['contacts'] = $this->Contact_model->get_all_contacts();
        
        $data['_view'] = 'contact/index';
        $this->load->view('layouts/main',$data);
    }
   
	
    /*
     * Adding a new contact
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('contact_name','Contact Name','required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('contact_type_id','Contact Type Id','required');
		$this->form_validation->set_rules('mobile_no','Mobile No','min_length[10]|max_length[15]|integer');
		$this->form_validation->set_rules('address','Address','max_length[500]');
		$this->form_validation->set_rules('latitude','Latitude','decimal');
		$this->form_validation->set_rules('longitude','Longitude','decimal');
		$this->form_validation->set_rules('comment','Comment','max_length[500]');
		$this->form_validation->set_rules('added_by','Added By','required');
		
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
				'updated_on' => $this->input->post('updated_on'),
				'created_on' => $this->input->post('created_on'),
            );
            
            $contact_id = $this->Contact_model->add_contact($params);
            redirect('contact/index');
        }
        else
        {
			$this->load->model('Occupation_model');
			$data['all_occupations'] = $this->Occupation_model->get_all_occupations();

			$this->load->model('Contact_type_model');
			$data['all_contact_type'] = $this->Contact_type_model->get_all_contact_type();

			$this->load->model('Palle_model');
			$data['all_palle'] = $this->Palle_model->get_all_palle();

			$this->load->model('Volunteer_model');
			$data['all_volunteers'] = $this->Volunteer_model->get_all_volunteers();
            
            $data['_view'] = 'contact/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a contact
     */
    function edit($contact_id)
    {   
        // check if the contact exists before trying to edit it
        $data['contact'] = $this->Contact_model->get_contact($contact_id);
        
        if(isset($data['contact']['contact_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('contact_name','Contact Name','required|min_length[3]|max_length[50]');
			$this->form_validation->set_rules('contact_type_id','Contact Type Id','required');
			$this->form_validation->set_rules('mobile_no','Mobile No','min_length[10]|max_length[15]|integer');
			$this->form_validation->set_rules('address','Address','max_length[500]');
			$this->form_validation->set_rules('latitude','Latitude','decimal');
			$this->form_validation->set_rules('longitude','Longitude','decimal');
			$this->form_validation->set_rules('comment','Comment','max_length[500]');
			$this->form_validation->set_rules('added_by','Added By','required');
		
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
					'updated_on' => $this->input->post('updated_on'),
					'created_on' => $this->input->post('created_on'),
                );

                $this->Contact_model->update_contact($contact_id,$params);            
                redirect('contact/index');
            }
            else
            {
				$this->load->model('Occupation_model');
				$data['all_occupations'] = $this->Occupation_model->get_all_occupations();

				$this->load->model('Contact_type_model');
				$data['all_contact_type'] = $this->Contact_type_model->get_all_contact_type();

				$this->load->model('Palle_model');
				$data['all_palle'] = $this->Palle_model->get_all_palle();

				$this->load->model('Volunteer_model');
				$data['all_volunteers'] = $this->Volunteer_model->get_all_volunteers();

                $data['_view'] = 'contact/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The contact you are trying to edit does not exist.');
    } 

    /*
     * Deleting contact
     */
    function remove($contact_id)
    {
        $contact = $this->Contact_model->get_contact($contact_id);

        // check if the contact exists before trying to delete it
        if(isset($contact['contact_id']))
        {
            $this->Contact_model->delete_contact($contact_id);
            redirect('contact/index');
        }
        else
            show_error('The contact you are trying to delete does not exist.');
    }
    
}
