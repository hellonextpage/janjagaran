<?php
 
class Occupation_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get occupation by occupation_id
     */
    function get_occupation($occupation_id)
    {
        return $this->db->get_where('occupations',array('occupation_id'=>$occupation_id))->row_array();
    }
        
    /*
     * Get all occupations
     */
    function get_all_occupations()
    {
        $this->db->order_by('occupation_id', 'desc');
        return $this->db->get('occupations')->result_array();
    }
        
    /*
     * function to add new occupation
     */
    function add_occupation($params)
    {
        $this->db->insert('occupations',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update occupation
     */
    function update_occupation($occupation_id,$params)
    {
        $this->db->where('occupation_id',$occupation_id);
        return $this->db->update('occupations',$params);
    }
    
    /*
     * function to delete occupation
     */
    function delete_occupation($occupation_id)
    {
        return $this->db->delete('occupations',array('occupation_id'=>$occupation_id));
    }
}
