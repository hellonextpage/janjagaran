<?php
 
class Upabasti_gramam_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
	/*
     * Get upabasti_gramam by basti_gramam_id
     */
    function get_upabasti_gramam_basti_upamandal_id($basti_upamandal_id)
    {
        return $this->db->select('upabasti_gramam_id as id,upabasti_gramam_name as name')->order_by('upabasti_gramam_name','ASC')->get_where('upabasti_gramam',array('basti_upamandal_id'=>$basti_upamandal_id))->result_array();
    }
	
    /*
     * Get upabasti_gramam by upabasti_gramam_id
     */
    function get_upabasti_gramam($upabasti_gramam_id)
    {
        return $this->db->get_where('upabasti_gramam',array('upabasti_gramam_id'=>$upabasti_gramam_id))->row_array();
    }
        
    /*
     * Get all upabasti_gramam
     */
    function get_all_upabasti_gramam()
    {
		return $this->db->query("select u.*,b.basti_upamandal_name from upabasti_gramam u left join basti_upamandal b on u.basti_upamandal_id=b.basti_upamandal_id order by u.upabasti_gramam_id DESC")->result_array();
        /*$this->db->order_by('upabasti_gramam_id', 'desc');
        return $this->db->get('upabasti_gramam')->result_array();
		*/
    }
        
    /*
     * function to add new upabasti_gramam
     */
    function add_upabasti_gramam($params)
    {
        $this->db->insert('upabasti_gramam',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update upabasti_gramam
     */
    function update_upabasti_gramam($upabasti_gramam_id,$params)
    {
        $this->db->where('upabasti_gramam_id',$upabasti_gramam_id);
        return $this->db->update('upabasti_gramam',$params);
    }
    
    /*
     * function to delete upabasti_gramam
     */
    function delete_upabasti_gramam($upabasti_gramam_id)
    {
        return $this->db->delete('upabasti_gramam',array('upabasti_gramam_id'=>$upabasti_gramam_id));
    }
}
