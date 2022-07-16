<?php
 
class Nagar_jagaran_tracking_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get nagar_jagaran_tracking by nagar_jagaran_tracking_id
     */
    function get_nagar_jagaran_tracking($nagar_jagaran_tracking_id)
    {
        return $this->db->get_where('nagar_jagaran_tracking',array('nagar_jagaran_tracking_id'=>$nagar_jagaran_tracking_id))->row_array();
    }
       
    /*
     * Get nagar_jagaran_tracking by nagar_jagaran_tracking_id
     */
    function get_nagar_jagaran_tracking_byid_date($nagar_id,$jagaran_date)
    {
        return $this->db->get_where('nagar_jagaran_tracking',array('nagar_khanda_id '=>$nagar_id,'jagaran_date'=>$jagaran_date))->row_array();
    }	   
		
		
    /*
     * Get all nagar_jagaran_trackings
     */
    function get_all_nagar_jagaran_trackings()
    {
		$nagar_khanda_id = $this->session->userdata('nagar_khanda_id');
		if($nagar_khanda_id != 0){
			$this->db->where(array('nagar_khanda_id'=>$nagar_khanda_id));
		}
        $this->db->order_by('jagaran_date', 'desc');
        return $this->db->get('nagar_jagaran_tracking')->result_array();
    }
        
    /*
     * function to add new nagar_jagaran_tracking
     */
    function add_nagar_jagaran_tracking($params)
    {
		$this->db->db_debug = false;
        if($this->db->insert('nagar_jagaran_tracking',$params))
		{
			return $this->db->insert_id();
		}
		else {
			echo "Something went wrong. Hope you are saving data to save date";
		exit;
		}
        
    }
    
    /*
     * function to update nagar_jagaran_tracking
     */
    function update_nagar_jagaran_tracking($nagar_id,$jagaran_date,$params)
    {
		
        $this->db->where('nagar_khanda_id',$nagar_id);
		$this->db->where('jagaran_date',$jagaran_date);
        return $this->db->update('nagar_jagaran_tracking',$params);
		 
    }
    
    /*
     * function to delete nagar_jagaran_tracking
     */
    function delete_nagar_jagaran_tracking($nagar_id,$jagaran_date)
    {
        return $this->db->delete('nagar_jagaran_tracking',array('nagar_khanda_id '=>$nagar_id,'jagaran_date'=>$jagaran_date));
    }
}