<?php
 
class Contact_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get contact by contact_id
     */
    function get_contact($contact_id)
    {
        return $this->db->get_where('contacts',array('contact_id'=>$contact_id))->row_array();
    }
        
    /*
     * Get all contacts
     */
    function get_all_contacts()
    {
		$zilla_id = $this->session->userdata('zilla_id');
		if($zilla_id != 0){
			$this->db->where(array('zilla_id'=>$zilla_id));
		}
        $this->db->order_by('contact_id', 'desc');
        return $this->db->get('contacts')->result_array();
    }
        
    /*
     * function to add new contact
     */
    function add_contact($params)
    {
        $this->db->insert('contacts',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update contact
     */
    function update_contact($contact_id,$params)
    {
        $this->db->where('contact_id',$contact_id);
        return $this->db->update('contacts',$params);
    }
    
    /*
     * function to delete contact
     */
    function delete_contact($contact_id)
    {
        return $this->db->delete('contacts',array('contact_id'=>$contact_id));
    }
}
