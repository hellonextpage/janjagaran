<?php
 
class Palle extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Palle_model');
		$is_logged_in = $this->session->userdata("admin_id");
        if($is_logged_in == "" || $is_logged_in == null){
            redirect("dashboard/login");
        }
    } 

    /*
     * Listing of palle
     */
    function index()
    {
        $data['palle'] = $this->Palle_model->get_all_palle();
        
        $data['_view'] = 'palle/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new palle
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('palle_name','Palle Name','required|min_length[3]|max_length[50]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'upabasti_gramam_id' => $this->input->post('upabasti_gramam_id'),
				'palle_name' => $this->input->post('palle_name'),
				'updated_on' => $this->input->post('updated_on'),
				'created_on' => $this->input->post('created_on'),
            );
            
            $palle_id = $this->Palle_model->add_palle($params);
            redirect('palle/index');
        }
        else
        {
			$this->load->model('Upabasti_gramam_model');
			$data['all_upabasti_gramam'] = $this->Upabasti_gramam_model->get_all_upabasti_gramam();
            
            $data['_view'] = 'palle/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a palle
     */
    function edit($palle_id)
    {   
        // check if the palle exists before trying to edit it
        $data['palle'] = $this->Palle_model->get_palle($palle_id);
        
        if(isset($data['palle']['palle_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('palle_name','Palle Name','required|min_length[3]|max_length[50]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'upabasti_gramam_id' => $this->input->post('upabasti_gramam_id'),
					'palle_name' => $this->input->post('palle_name'),
					'updated_on' => $this->input->post('updated_on'),
					'created_on' => $this->input->post('created_on'),
                );

                $this->Palle_model->update_palle($palle_id,$params);            
                redirect('palle/index');
            }
            else
            {
				$this->load->model('Upabasti_gramam_model');
				$data['all_upabasti_gramam'] = $this->Upabasti_gramam_model->get_all_upabasti_gramam();

                $data['_view'] = 'palle/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The palle you are trying to edit does not exist.');
    } 

    /*
     * Deleting palle
     */
    function remove($palle_id)
    {
        $palle = $this->Palle_model->get_palle($palle_id);

        // check if the palle exists before trying to delete it
        if(isset($palle['palle_id']))
        {
            $this->Palle_model->delete_palle($palle_id);
            redirect('palle/index');
        }
        else
            show_error('The palle you are trying to delete does not exist.');
    }
    
}
