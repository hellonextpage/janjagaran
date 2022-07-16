<?php
 
class Vw_nagar_jagaran_tracking_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
  
    /*
     * Get all vw_nagar_jagaran_trackings
     */
	 
    function get_all_vw_nagar_jagaran_trackings()
    {
		
				$nagar_khanda_id = $this->session->userdata('nagar_khanda_id');				
				$zilla_id = $this->session->userdata('zilla_id');
				if($zilla_id!=0)
				{
					//$nagar_id_list=$this->db->query("select nagar_khanda_id from nagar_khanda where zilla_id=".$zilla_id)->result_array();
					
			
					//$this->db->where_in('nagar_khanda_id', $nagar_id_list);
					//$this->db->get('nagar_khanda')->result_array(); 
					    $this->db->order_by('jagaran_date', 'desc');
						$query='select * from vw_nagar_jagaran_tracking where nagar_khanda_id in (select nagar_khanda_id from nagar_khanda where zilla_id='.$zilla_id.')';
        return $this->db->query($query)->result_array();
				}					
				else if($nagar_khanda_id != 0){
					$this->db->where(array('nagar_khanda_id'=>$nagar_khanda_id));
					    $this->db->order_by('jagaran_date', 'desc');
        return $this->db->get('vw_nagar_jagaran_tracking')->result_array();
				}else {  
		
        $this->db->order_by('jagaran_date', 'desc');
        return $this->db->get('vw_nagar_jagaran_tracking')->result_array();
				}
    }
        
   
}
