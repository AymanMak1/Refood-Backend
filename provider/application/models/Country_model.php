<?php

 
class Country_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get country by countryID
     */
    function get_country($countryID)
    {
        return $this->db->get_where('country',array('countryID'=>$countryID))->row_array();
    }
    
    /*
     * Get all countries count
     */
    function get_all_countries_count()
    {
        $this->db->from('country');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all countries
     */
    function get_all_countries($params = array())
    {
        $this->db->order_by('countryID', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('country')->result_array();
    }
        
    /*
     * function to add new country
     */
    function add_country($params)
    {
        $this->db->insert('country',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update country
     */
    function update_country($countryID,$params)
    {
        $this->db->where('countryID',$countryID);
        return $this->db->update('country',$params);
    }
    
    /*
     * function to delete country
     */
    function delete_country($countryID)
    {
        return $this->db->delete('country',array('countryID'=>$countryID));
    }
}
