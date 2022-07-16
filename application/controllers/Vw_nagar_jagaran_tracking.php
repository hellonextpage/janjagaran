<?php

 
class Vw_nagar_jagaran_tracking extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Vw_nagar_jagaran_tracking_model');
		$this->load->model('Nagar_khanda_model');
		
    } 

    /*
     * Listing of Vw_nagar_jagaran_tracking
     */
    function index()
    {
		
		$data['nagar_khanda'] = $this->Nagar_khanda_model->get_all_nagar_khanda_if_session_has_nagar();
        $data['vw_nagar_jagaran_trackings'] = $this->Vw_nagar_jagaran_tracking_model->get_all_vw_nagar_jagaran_trackings();
        
        $data['_view'] = 'vw_nagar_jagaran_tracking/index';
        $this->load->view('layouts/main',$data);
    }
}