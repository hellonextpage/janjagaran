<?php
 
class Zilla_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get zilla by zilla_id
     */
    function get_zilla($zilla_id)
    {
        return $this->db->get_where('zilla',array('zilla_id'=>$zilla_id))->row_array();
    }
        
    /*
     * Get all zilla
     */
    function get_all_zilla()
    {
        $this->db->order_by('zilla_name', 'ASC');
        return $this->db->get('zilla')->result_array();
    }
        
    /*
     * function to add new zilla
     */
    function add_zilla($params)
    {
        $this->db->insert('zilla',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update zilla
     */
    function update_zilla($zilla_id,$params)
    {
        $this->db->where('zilla_id',$zilla_id);
        return $this->db->update('zilla',$params);
    }
    
    /*
     * function to delete zilla
     */
    function delete_zilla($zilla_id)
    {
        return $this->db->delete('zilla',array('zilla_id'=>$zilla_id));
    }
}
