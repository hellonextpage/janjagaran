<?php
 
class Nagar_khanda_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get nagar_khanda by nagar_khanda_id
     */
    function get_nagar_khanda($nagar_khanda_id)
    {
        return $this->db->get_where('nagar_khanda',array('nagar_khanda_id'=>$nagar_khanda_id))->row_array();
    }
        
    /*
     * Get all get_all_nagar_khanda_if_session_has_nagar
     */
    function get_all_nagar_khanda_if_session_has_nagar()
    {
		$nagar_khanda_id = $this->session->userdata('nagar_khanda_id');
		
			$zilla_id = $this->session->userdata('zilla_id');
		if($zilla_id!=0)
		{
					//$nagar_id_list=$this->db->query("select nagar_khanda_id from nagar_khanda where zilla_id=".$zilla_id)->result_array();
					//$this->db->where_in('nagar_khanda_id', $nagar_id_list);
					$this->db->where(array('zilla_id'=>$zilla_id));
					
		}				
		else if($nagar_khanda_id != 0){
			$this->db->where(array('nagar_khanda_id'=>$nagar_khanda_id));
		}
        $this->db->order_by('nagar_khanda_name', 'ASE');
        return $this->db->get('nagar_khanda')->result_array();
    }
	
    /*
     * Get all nagar_khanda
     */
    function get_all_nagar_khanda()
    {
		return $this->db->query("select n.*,z.zilla_name from nagar_khanda n left join zilla z on n.zilla_id=z.zilla_id order by n.nagar_khanda_id DESC")->result_array();
       
    }
	
	/*
     * Get all nagar_khanda
     */
    function get_all_nagar_khanda_zilla($id)
    {
		return $this->db->get_where('nagar_khanda',array('zilla_id'=>$id))->result_array();
    }
        
    /*
     * function to add new nagar_khanda
     */
    function add_nagar_khanda($params)
    {
        $this->db->insert('nagar_khanda',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update nagar_khanda
     */
    function update_nagar_khanda($nagar_khanda_id,$params)
    {
        $this->db->where('nagar_khanda_id',$nagar_khanda_id);
        return $this->db->update('nagar_khanda',$params);
    }
    
    /*
     * function to delete nagar_khanda
     */
    function delete_nagar_khanda($nagar_khanda_id)
    {
        return $this->db->delete('nagar_khanda',array('nagar_khanda_id'=>$nagar_khanda_id));
    }
}
