<?php
 
class Basti_upamandal_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
	
	/*
     * Get basti_upamandal by nagar_khanda_id
     */
    function get_basti_upamandal_nagar_khanda_id($nagar_khanda_id)
    {
        return $this->db->select('basti_upamandal_id as id,basti_upamandal_name as name')->order_by('basti_upamandal_name','ASC')->get_where('basti_upamandal',array('nagar_khanda_id'=>$nagar_khanda_id))->result_array();
    }
	
    /*
     * Get basti_upamandal by basti_upamandal_id
     */
    function get_basti_upamandal($basti_upamandal_id)
    {
        return $this->db->get_where('basti_upamandal',array('basti_upamandal_id'=>$basti_upamandal_id))->row_array();
    }
        
    /*
     * Get all basti_upamandal
     */
    function get_all_basti_upamandal()
    {
		return $this->db->query("select b.*,n.nagar_khanda_name from basti_upamandal b left join nagar_khanda n on b.nagar_khanda_id=n.nagar_khanda_id order by b.basti_upamandal_id DESC")->result_array();
        /*
		$this->db->order_by('basti_upamandal_id', 'desc');
        return $this->db->get('basti_upamandal')->result_array();
		*/
    }
        
    /*
     * function to add new basti_upamandal
     */
    function add_basti_upamandal($params)
    {
        $this->db->insert('basti_upamandal',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update basti_upamandal
     */
    function update_basti_upamandal($basti_upamandal_id,$params)
    {
        $this->db->where('basti_upamandal_id',$basti_upamandal_id);
        return $this->db->update('basti_upamandal',$params);
    }
    
    /*
     * function to delete basti_upamandal
     */
    function delete_basti_upamandal($basti_upamandal_id)
    {
        return $this->db->delete('basti_upamandal',array('basti_upamandal_id'=>$basti_upamandal_id));
    }
}
