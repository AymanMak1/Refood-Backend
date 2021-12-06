<?php

 
class Donation_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get donation by donationId
     */
    function get_donation($donationId)
    {
        return $this->db->get_where('donation',array('donationId'=>$donationId))->row_array();
    }
    
    /*
     * Get all donations count
     */
    function get_all_donations_count()
    {
        $this->db->from('donation');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all donations
     */
    function get_all_donations($params = array())
    {
        $this->db->order_by('donationId', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('donation')->result_array();
    }
        
    /*
     * function to add new donation
     */
    function add_donation($params)
    {
        $this->db->insert('donation',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update donation
     */
    function update_donation($donationId,$params)
    {
        $this->db->where('donationId',$donationId);
        return $this->db->update('donation',$params);
    }
    
    /*
     * function to delete donation
     */
    function delete_donation($donationId)
    {
        return $this->db->delete('donation',array('donationId'=>$donationId));
    }
}
