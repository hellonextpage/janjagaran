<?php
 
class Palle_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
	
	/*
     * Get palle by upabasti_gramam_id
     */
    function get_palle_upabasti_gramam_id($upabasti_gramam_id)
    {
        return $this->db->select('palle_id as id,palle_name as name')->order_by('palle_name','ASC')->get_where('palle',array('upabasti_gramam_id'=>$upabasti_gramam_id))->result_array();
    }
	
    /*
     * Get palle by palle_id
     */
    function get_palle($palle_id)
    {
        return $this->db->get_where('palle',array('palle_id'=>$palle_id))->row_array();
    }
        
    /*
     * Get all palle
     */
    function get_all_palle()
    {
        $this->db->order_by('palle_id', 'desc');
        return $this->db->get('palle')->result_array();
    }
        
    /*
     * function to add new palle
     */
    function add_palle($params)
    {
        $this->db->insert('palle',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update palle
     */
    function update_palle($palle_id,$params)
    {
        $this->db->where('palle_id',$palle_id);
        return $this->db->update('palle',$params);
    }
    
    /*
     * function to delete palle
     */
    function delete_palle($palle_id)
    {
        return $this->db->delete('palle',array('palle_id'=>$palle_id));
    }
}
