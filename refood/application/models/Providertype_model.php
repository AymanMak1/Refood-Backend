<?php

 
class Providertype_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get providertype by providerTypeId
     */
    function get_providertype($providerTypeId)
    {
        return $this->db->get_where('providerType',array('providerTypeId'=>$providerTypeId))->row_array();
    }
    
    /*
     * Get all providertypes count
     */
    function get_all_providertypes_count()
    {
        $this->db->from('providerType');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all providertypes
     */
    function get_all_providertypes($params = array())
    {
        $this->db->order_by('providerTypeId', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('providerType')->result_array();
    }
        
    /*
     * function to add new providertype
     */
    function add_providertype($params)
    {
        $this->db->insert('providerType',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update providertype
     */
    function update_providertype($providerTypeId,$params)
    {
        $this->db->where('providerTypeId',$providerTypeId);
        return $this->db->update('providerType',$params);
    }
    
    /*
     * function to delete providertype
     */
    function delete_providertype($providerTypeId)
    {
        return $this->db->delete('providerType',array('providerTypeId'=>$providerTypeId));
    }
}
