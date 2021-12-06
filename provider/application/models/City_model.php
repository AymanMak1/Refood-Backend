<?php

 
class City_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get city by cityId
     */
    function get_city($cityId)
    {
        return $this->db->get_where('city',array('cityId'=>$cityId))->row_array();
    }
    
    /*
     * Get all cities count
     */
    function get_all_cities_count()
    {
        $this->db->from('city');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all cities
     */
    function get_all_cities($params = array())
    {
        $this->db->order_by('cityId', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('city_country')->result_array();
    }
        
    /*
     * function to add new city
     */
    function add_city($params)
    {
        $this->db->insert('city',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update city
     */
    function update_city($cityId,$params)
    {
        $this->db->where('cityId',$cityId);
        return $this->db->update('city',$params);
    }
    
    /*
     * function to delete city
     */
    function delete_city($cityId)
    {
        return $this->db->delete('city',array('cityId'=>$cityId));
    }
}
