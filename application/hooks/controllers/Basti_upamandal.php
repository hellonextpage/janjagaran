<?php
 
class Basti_upamandal extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Basti_upamandal_model');
		$is_logged_in = $this->session->userdata("admin_id");
        if($is_logged_in == "" || $is_logged_in == null){
            redirect("dashboard/login");
        }
    } 

    /*
     * Listing of basti_upamandal
     */
    function index()
    {
        $data['basti_upamandal'] = $this->Basti_upamandal_model->get_all_basti_upamandal();
        
        $data['_view'] = 'basti_upamandal/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new basti_upamandal
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('basti_upamandal_name','Basti Upamandal Name','required|min_length[3]|max_length[50]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'nagar_khanda_id' => $this->input->post('nagar_khanda_id'),
				'basti_upamandal_name' => $this->input->post('basti_upamandal_name'),
				'updated_on' => date('Y-m-d H:i:s'),
				'created_on' => date('Y-m-d H:i:s'),
            );
            
            $basti_upamandal_id = $this->Basti_upamandal_model->add_basti_upamandal($params);
            redirect('basti_upamandal/index');
        }
        else
        {
			$this->load->model('Nagar_khanda_model');
			$data['all_nagar_khanda'] = $this->Nagar_khanda_model->get_all_nagar_khanda();

  if (form_error('basti_upamandal_name'))
{
    echo 'Enter email';
	exit;
    
}
            
            $data['_view'] = 'basti_upamandal/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a basti_upamandal
     */
    function edit($basti_upamandal_id)
    {   
        // check if the basti_upamandal exists before trying to edit it
        $data['basti_upamandal'] = $this->Basti_upamandal_model->get_basti_upamandal($basti_upamandal_id);
        
        if(isset($data['basti_upamandal']['basti_upamandal_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('basti_upamandal_name','Basti Upamandal Name','required|min_length[3]|max_length[50]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'nagar_khanda_id' => $this->input->post('nagar_khanda_id'),
					'basti_upamandal_name' => $this->input->post('basti_upamandal_name'),
					'updated_on' => date('Y-m-d H:i:s'),
                );

                $this->Basti_upamandal_model->update_basti_upamandal($basti_upamandal_id,$params);            
                redirect('basti_upamandal/index');
            }
            else
            {
				$this->load->model('Nagar_khanda_model');
				$data['all_nagar_khanda'] = $this->Nagar_khanda_model->get_all_nagar_khanda();

                $data['_view'] = 'basti_upamandal/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The basti_upamandal you are trying to edit does not exist.');
    } 

    /*
     * Deleting basti_upamandal
     */
    function remove($basti_upamandal_id)
    {
        $basti_upamandal = $this->Basti_upamandal_model->get_basti_upamandal($basti_upamandal_id);

        // check if the basti_upamandal exists before trying to delete it
        if(isset($basti_upamandal['basti_upamandal_id']))
        {
            $this->Basti_upamandal_model->delete_basti_upamandal($basti_upamandal_id);
            redirect('basti_upamandal/index');
        }
        else
            show_error('The basti_upamandal you are trying to delete does not exist.');
    }
    
}
