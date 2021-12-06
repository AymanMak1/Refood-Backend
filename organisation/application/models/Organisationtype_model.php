<?php

 
class Organisationtype_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get organisationtype by organisationTypeId
     */
    function get_organisationtype($organisationTypeId)
    {
        return $this->db->get_where('organisationType',array('organisationTypeId'=>$organisationTypeId))->row_array();
    }
    
    /*
     * Get all organisationtypes count
     */
    function get_all_organisationtypes_count()
    {
        $this->db->from('organisationType');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all organisationtypes
     */
    function get_all_organisationtypes($params = array())
    {
        $this->db->order_by('organisationTypeId', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('organisationType')->result_array();
    }
        
    /*
     * function to add new organisationtype
     */
    function add_organisationtype($params)
    {
        $this->db->insert('organisationType',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update organisationtype
     */
    function update_organisationtype($organisationTypeId,$params)
    {
        $this->db->where('organisationTypeId',$organisationTypeId);
        return $this->db->update('organisationType',$params);
    }
    
    /*
     * function to delete organisationtype
     */
    function delete_organisationtype($organisationTypeId)
    {
        return $this->db->delete('organisationType',array('organisationTypeId'=>$organisationTypeId));
    }
}
