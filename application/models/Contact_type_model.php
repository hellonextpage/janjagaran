<?php
 
class Contact_type_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get contact_type by contact_type_id
     */
    function get_contact_type($contact_type_id)
    {
        return $this->db->get_where('contact_type',array('contact_type_id'=>$contact_type_id))->row_array();
    }
        
    /*
     * Get all contact_type
     */
    function get_all_contact_type()
    {
        $this->db->order_by('contact_type_id', 'ASC');
        return $this->db->get('contact_type')->result_array();
    }
        
    /*
     * function to add new contact_type
     */
    function add_contact_type($params)
    {
        $this->db->insert('contact_type',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update contact_type
     */
    function update_contact_type($contact_type_id,$params)
    {
        $this->db->where('contact_type_id',$contact_type_id);
        return $this->db->update('contact_type',$params);
    }
    
    /*
     * function to delete contact_type
     */
    function delete_contact_type($contact_type_id)
    {
        return $this->db->delete('contact_type',array('contact_type_id'=>$contact_type_id));
    }
}
